<form id="team-form" class="max-w-xl mx-auto bg-gray-50 p-5 border-2 rounded-xl border-gray-200 mt-10" method="POST"
    enctype="multipart/form-data">
    <!-- Team Information -->
    <h2 class="text-lg font-semibold mb-5 text-red-700">Team Information</h2>
    <div class="grid grid-cols-2 gap-3">
        <div class="mb-5">
            <label for="team-name" class="block mb-2 text-sm font-medium text-gray-900">Team Name</label>
            <input type="text" id="team-name"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                required />
        </div>
        <div class="mb-5">
            <label for="games" class="block mb-2 text-sm font-medium text-gray-900">Select Game</label>
            <select id="games"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                required>
                <option selected disabled>-</option>
                <option value="ML">Mobile Legends</option>
                <option value="PG">Pubg</option>
                <option value="FF">Free Fire</option>
            </select>
        </div>
    </div>

    <!-- Team Members and Roles -->
    <div id="team-members" class="grid grid-cols-2 gap-3"></div>
    <div id="member-role" class="grid grid-cols-2 gap-3 mt-5"></div>

    <hr class="border-2 rounded-full mb-5">

    <!-- Game Information -->
    <h2 class="text-lg font-semibold mb-5 text-red-700">Game Information</h2>
    <div id="game-info-container" class="grid grid-cols-2 gap-3"></div>

    <hr class="border-2 rounded-full mb-5">


    <!-- Payment -->
    <h2 class="text-lg font-semibold mb-5 text-red-700">Payment</h2>
    <div id="payment-info-container" class="grid grid-cols-2 gap-3"></div>

    <!-- Confirm Button -->
    <button type="button"
        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
        onclick="confirmTournament()">Confirm Tournament</button>
</form>