<div class="flex items-center justify-center min-h-screen bg-background">
    <div class="bg-card border-2 border-gray-200 rounded-xl shadow-lg p-6 lg:w-96 w-[350px]">
        <div class="flex items-center justify-center mb-4 gap-3">
            <img aria-hidden="true" alt="Flowbite logo" src="/UTS/public/img/gritGrand.png"
                class="h-auto w-12 mb-2 mt-2" />
            <h5 class="">Grit & <br> Grind</h5>
        </div>
        <form action="/UTS/server/auth/processRegister.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm text-gray-900">Email</label>
                <input type="email" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                    required>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-bold text-gray-900">Kata Sandi</label>
                <input type="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                    required>
            </div>
            <div class="mb-4">
                <label for="password_confirm" class="block mb-2 text-sm font-bold text-gray-900">Ulangi Kata
                    Sandi</label>
                <input type="password" name="password_confirm"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                    required>
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="terms" type="checkbox" name="remember_me"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-red-300"
                        required>
                </div>
                <label for="terms" class="ms-2 text-sm font-medium text-gray-900">Ingat Saya</label>
            </div>
            <button type="submit"
                class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Buat
                Akun</button>
        </form>
        <p class="mt-4 text-sm text-muted-foreground text-center">
            Sudah Punya Akun ?
            <a href="javascript:void(0);" onclick="window.location.href='/UTS/login';"
                class="text-primary hover:underline font-medium text-red-600">Masuk</a>
        </p>
    </div>
</div>