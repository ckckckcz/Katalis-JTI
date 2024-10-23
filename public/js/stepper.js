document.getElementById("games").addEventListener("change", function () {
  const selectedGame = this.value;
  const teamMembersContainer = document.getElementById("team-members");

  // Clear any existing input fields
  teamMembersContainer.innerHTML = "";

  let numberOfMembers = 0;

  // Determine number of team members based on the selected game
  if (selectedGame === "ML") {
    numberOfMembers = 4; // Mobile Legends has 4 members + 1 captain
  } else if (selectedGame === "PG" || selectedGame === "FF") {
    numberOfMembers = 3; // PUBG and Free Fire have 4 members + 1 captain
  }

  // Dynamically create input fields for the captain and members
  if (numberOfMembers > 0) {
    // Add captain input into the grid layout
    teamMembersContainer.innerHTML += `
            <div class="mb-5">
                <label for="captain" class="block mb-2 text-sm font-medium text-gray-900">Captain</label>
                <input type="text" id="captain" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="Enter captain's name">
            </div>
        `;

    // Add inputs for each team member into the grid layout
    for (let i = 1; i <= numberOfMembers; i++) {
      teamMembersContainer.innerHTML += `
                <div class="mb-5">
                    <label for="member${i}" class="block mb-2 text-sm font-medium text-gray-900">Member ${i}</label>
                    <input type="text" id="member${i}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" placeholder="Enter member ${i}'s name">
                </div>
            `;
    }
  }
});
