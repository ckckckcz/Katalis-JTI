<div class="flex items-center justify-center min-h-screen bg-background">
    <div class="bg-card border-2 border-gray-200 rounded-xl shadow-lg p-6 lg:w-96 w-[350px]">
        <div class="flex items-center justify-center mb-4 gap-3">
            <img aria-hidden="true" alt="Flowbite logo" src="/UTS/public/img/gritGrand.png"
                class="h-auto w-12 mb-2 mt-2" />
            <h5 class="">Grit & <br> Grind</h5>
        </div>
        <!-- Form untuk login -->
        <form action="/UTS/server/auth/processLogin.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm text-gray-900">Email</label>
                <input type="email" id="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                    required />
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-bold text-gray-900">Kata Sandi</label>
                <input type="password" id="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                    required />
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="terms" type="checkbox"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-red-300" />
                </div>
                <label for="terms" class="ms-2 text-sm font-medium text-gray-900">Ingat Saya</label>
            </div>
            <button type="submit"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Masuk
            </button>
        </form>
        <p class="mt-4 text-sm text-muted-foreground text-center">
            Belum Punya Akun?
            <a href="javascript:void(0);" onclick="window.location.href='/UTS/daftar';"
                class="text-primary hover:underline font-medium text-red-600">Buat Akun</a>
        </p>
    </div>
</div>


<!-- Toast Success -->
<div id="toast-success"
    class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white rounded-lg shadow top-5 right-5 hidden"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Login berhasil.</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-gray-100"
        onclick="hideToast('toast-success')">
        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>

<!-- Toast Error -->
<div id="toast-danger"
    class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white rounded-lg shadow top-5 right-5 hidden"
    role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
        </svg>
        <span class="sr-only">Error icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Login gagal. Email atau Kata Sandi Salah</div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg p-1.5 hover:bg-gray-100"
        onclick="hideToast('toast-danger')">
        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>

<script>
    window.onload = function () {
        // Check if session has login success or error
        <?php if (isset($_SESSION['login_success'])): ?>
            showToast('toast-success');
            <?php unset($_SESSION['login_success']); ?>
        <?php elseif (isset($_SESSION['login_error'])): ?>
            showToast('toast-danger');
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>
    };

    function showToast(id) {
        document.getElementById(id).classList.remove('hidden');
        setTimeout(() => {
            hideToast(id);
        }, 3000); // Hide after 3 seconds
    }

    function hideToast(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>