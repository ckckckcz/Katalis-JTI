document.getElementById("games").addEventListener("change", function () {
  const selectedGame = this.value;
  const teamMembersContainer = document.getElementById("team-members");
  const memberRoleContainer = document.getElementById("member-role");

  // Clear any existing input fields
  teamMembersContainer.innerHTML = "";
  memberRoleContainer.innerHTML = "";

  let numberOfMembers = 0;

  // Determine number of team members based on the selected game
  if (selectedGame === "ML") {
    numberOfMembers = 4; // Mobile Legends has 4 members + 1 captain
  } else if (selectedGame === "PG" || selectedGame === "FF") {
    numberOfMembers = 3; // PUBG and Free Fire have 3 members + 1 captain
  }

  // Dynamically create input fields for the captain and members
  if (numberOfMembers > 0) {
    // Add captain input
    teamMembersContainer.innerHTML += `
            <div class="mb-5">
                <label for="captain" class="block mb-2 text-sm font-medium text-gray-900">Captain</label>
                <input type="text" id="captain" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter captain's name">
            </div>
        `;

    // Add Role Captain at the end
    memberRoleContainer.innerHTML += `
            <div class="mb-5">
                <label for="role-captain" class="block mb-2 text-sm font-medium text-gray-900">Role Captain</label>
                <input type="text" id="role-captain" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter captain's role">
            </div>
        `;

    // Add inputs for each team member
    for (let i = 1; i <= numberOfMembers; i++) {
      teamMembersContainer.innerHTML += `
                <div class="mb-5">
                    <label for="member${i}" class="block mb-2 text-sm font-medium text-gray-900">Member ${i}</label>
                    <input type="text" id="member${i}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter member ${i}'s name">
                </div>
            `;

      // Add role input for each member
      memberRoleContainer.innerHTML += `
                <div class="mb-5">
                    <label for="role${i}" class="block mb-2 text-sm font-medium text-gray-900"> Role ${i}</label>
                    <input type="text" id="role${i}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter role for member ${i}">
                </div>
            `;
    }
  }
});

document.getElementById("team-form").addEventListener("submit", function (e) {
  e.preventDefault(); // Prevent the form from submitting normally

  // Get team name
  const teamName = document.getElementById("text").value.trim();

  // Gather input data
  const captain = document.getElementById("captain").value.trim();
  const roleCaptain = document.getElementById("role-captain").value.trim();
  const members = [];
  const roles = [];

  // Collect member names and roles
  const numberOfMembers = document.getElementById("games").value === "ML" ? 4 : 3;

  for (let i = 1; i <= numberOfMembers; i++) {
    members.push(document.getElementById(`member${i}`).value.trim());
    roles.push(document.getElementById(`role${i}`).value.trim());
  }

  // Create data object
  const teamData = {
    teamName: teamName,
    captain: {
      name: captain,
      role: roleCaptain,
    },
    members: members.map((name, index) => ({
      name: name,
      role: roles[index],
    })),
  };

  // Send data to server via AJAX
  fetch("/UTS/server/dataTeam.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(teamData),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        alert("Team data saved successfully!");
        // Optionally, you can clear the form here or redirect
      } else {
        alert("Failed to save team data: " + data.message);
      }
    })
    .catch((error) => console.error("Error:", error));
});
