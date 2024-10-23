document.getElementById("games").addEventListener("change", function () {
  const selectedGame = this.value;
  const teamMembersContainer = document.getElementById("team-members");
  const memberRoleContainer = document.getElementById("member-role");
  const gameInfoContainer = document.getElementById("game-info-container");
  const documentInfoContainer = document.getElementById("document-info-container");
  const paymentInfoContainer = document.getElementById("payment-info-container");

  // Clear existing input fields
  teamMembersContainer.innerHTML = "";
  memberRoleContainer.innerHTML = "";
  gameInfoContainer.innerHTML = "";
  documentInfoContainer.innerHTML = "";
  paymentInfoContainer.innerHTML = "";

  let numberOfMembers = 0;

  // Show inputs based on selected game
  if (selectedGame === "ML") {
    numberOfMembers = 4; // Mobile Legends
  } else if (selectedGame === "PG" || selectedGame === "FF") {
    numberOfMembers = 3; // PUBG and Free Fire
  }

  if (numberOfMembers > 0) {
    // Captain input
    teamMembersContainer.innerHTML += `
      <div class="mb-5">
        <label for="captain" class="block mb-2 text-sm font-medium text-gray-900">Captain</label>
        <input type="text" id="captain" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter captain's name">
      </div>
    `;

    // Role for Captain
    memberRoleContainer.innerHTML += `
      <div class="mb-5">
        <label for="role-captain" class="block mb-2 text-sm font-medium text-gray-900">Role Captain</label>
        <input type="text" id="role-captain" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter captain's role">
      </div>
    `;

    // Inputs for each team member
    for (let i = 1; i <= numberOfMembers; i++) {
      teamMembersContainer.innerHTML += `
        <div class="mb-5">
          <label for="member${i}" class="block mb-2 text-sm font-medium text-gray-900">Member ${i}</label>
          <input type="text" id="member${i}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter member ${i}'s name">
        </div>
      `;

      memberRoleContainer.innerHTML += `
        <div class="mb-5">
          <label for="role${i}" class="block mb-2 text-sm font-medium text-gray-900">Role ${i}</label>
          <input type="text" id="role${i}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter role for member ${i}">
        </div>
      `;
    }

    // Menambahkan field Game Information
    gameInfoContainer.innerHTML += `
      <div class="mb-5">
        <label for="game-info-1" class="block mb-2 text-sm font-medium text-gray-900">ID Game Captain</label>
        <input type="text" id="game-info-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter game info Captain">
      </div>
      `;

    for (let i = 1; i <= numberOfMembers; i++) {
      gameInfoContainer.innerHTML += `
        <div class="mb-5">
          <label for="game-info-${i + 1}" class="block mb-2 text-sm font-medium text-gray-900">ID Game Member ${i}</label>
          <input type="text" id="game-info-${i + 1}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5" required placeholder="Enter game info Member ${i}">
        </div>
      `;
    }

    // Menambahkan field Document Information
    documentInfoContainer.innerHTML += `
    <div class="mb-5">
      <label for="document-info-1" class="block mb-2 text-sm font-medium text-gray-900">ID Card Photo Captain</label>
      <div class="flex items-center justify-center w-full text-center">
        <label for="dropzone-file-1" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
          </div>
          <input id="dropzone-file-1" type="file" class="hidden" />
        </label>
      </div>
    </div>
  `;

    // Menggunakan loop untuk anggota 1-4
    for (let i = 1; i <= numberOfMembers; i++) {
      documentInfoContainer.innerHTML += `
    <div class="mb-5">
      <label for="document-info-${i + 1}" class="block mb-2 text-sm font-medium text-gray-900">ID Card Photo ${i}</label>
      <div class="flex items-center justify-center w-full text-center">
        <label for="dropzone-file-${i + 1}" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
          </div>
          <input id="dropzone-file-${i + 1}" type="file" class="hidden" />
        </label>
      </div>
    </div>
  `;
    }

    // Add Payment fields (example)
    paymentInfoContainer.innerHTML += `
      <div class="mb-5">
      <label for="document-info-1" class="block mb-2 text-sm font-medium text-gray-900">ID Card Photo Captain</label>
      <div class="flex items-center justify-center w-full text-center">
        <label for="dropzone-file-1" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100 ">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
            </svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
          </div>
          <input id="dropzone-file-1" type="file" class="hidden" />
        </label>
      </div>
    </div>
    `;
  }
});

// Handle confirm button
function confirmTournament() {
  const teamName = document.getElementById("team-name").value;
  const captain = document.getElementById("captain").value;
  const members = [];
  const roles = [];

  const numberOfMembers = document.getElementById("games").value === "ML" ? 4 : 3;

  for (let i = 1; i <= numberOfMembers; i++) {
    members.push(document.getElementById(`member${i}`).value);
    roles.push(document.getElementById(`role${i}`).value);
  }

  const teamData = {
    teamName,
    captain,
    members,
    roles,
  };

  // Example: send team data via fetch
  fetch("/UTS/server/dataTeam.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(teamData),
  })
    .then((response) => response.json())
    .then((data) => {
      alert("Team registered successfully!");
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
