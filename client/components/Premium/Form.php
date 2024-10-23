<form id="multi-step-form" class="max-w-xl mx-auto bg-gray-50 p-5 border-2 rounded-xl border-gray-200 mt-10">
    <!-- Step 1 -->
    <div id="step-1" class="step">
        <h2 class="text-lg font-semibold">Step 1: Team Information</h2>
        <div class="grid grid-cols-2 gap-3">
            <!-- Input Tim Name -->
            <div class="mb-5">
                <label for="team-name" class="block mb-2 text-sm font-medium text-gray-900">Tim Name</label>
                <input type="text" id="team-name"
                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                    required />
            </div>
            <!-- Select Game -->
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

        <div id="team-members" class="grid grid-cols-2 gap-3"></div>
        <hr class="border-2 rounded-full">
        <div id="member-role" class="grid grid-cols-2 gap-3 mt-5"></div>

        <button type="button"
            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            onclick="showStep(2)">Next Step</button>
    </div>

    <!-- Step 2 (hidden initially) -->
    <div id="step-2" class="step hidden">
        <h2 class="text-lg font-semibold">Step 2: Additional Information</h2>
        <div class="mb-5">
            <label for="additional-info" class="block mb-2 text-sm font-medium text-gray-900">Additional Info</label>
            <input type="text" id="additional-info"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                required />
        </div>
        <button type="button"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            onclick="showStep(3)">Next Step</button>
    </div>

    <!-- Step 3 (hidden initially) -->
    <div id="step-3" class="step hidden">
        <h2 class="text-lg font-semibold">Step 3: Document Information</h2>
        <div class="mb-5">
            <label for="document-info" class="block mb-2 text-sm font-medium text-gray-900">Document Information</label>
            <input type="text" id="document-info"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                required />
        </div>
        <button type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            onclick="showStep(4)">Next Step</button>
    </div>

    <!-- Step 4 (hidden initially) -->
    <div id="step-4" class="step hidden">
        <h2 class="text-lg font-semibold">Step 4: Confirm Registration</h2>
        <p class="mb-5">Please review your details and confirm your registration.</p>
        <button type="submit" id="confirm-btn"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Confirm
            Registration</button>
    </div>
</form>