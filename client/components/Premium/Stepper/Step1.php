<form id="team-form" class="max-w-xl mx-auto bg-gray-50 p-5 border-2 rounded-xl border-gray-200 mt-10">
    <div class="grid grid-cols-2 gap-3">
        <div class="mb-5">
            <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Tim Name</label>
            <input type="text" id="text"
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


    <div id="team-members" class="grid grid-cols-2 gap-3"></div>
    <hr class="border-2 rounded-full">
    <div id="member-role" class="grid grid-cols-2 gap-3 mt-5"></div>

    <!-- <label for="repeat-text" class="block mb-2 text-sm font-medium text-gray-900">Upload KTP</label>
    <div class="flex items-center justify-center w-full">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg class="w-8 h-8 mb-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and
                    drop</p>
                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            <input id="dropzone-file" type="file" class="hidden" />
        </label>
    </div> -->

    <!-- <div class="flex items-start mb-5 mt-5">
        <div class="flex items-center h-5">
            <input id="terms" type="checkbox" value=""
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-red-300 checked:bg-red-600">
        </div>
        <label for="terms" class="ms-2 text-sm font-medium text-gray-900">I agree with the <a href="#"
                class="text-red-600 hover:underline">terms and conditions</a></label>
    </div> -->

    <button type="submit"
        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Next
        Step</button>
</form>