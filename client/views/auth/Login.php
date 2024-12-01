<div class="login-container">
    <div class="login-card">
        <div class="login-logo">
            <img aria-hidden="true" alt="Katalis logo" src="/katalis/public/img/katalis.png" class="login-image" />
        </div>
        <form class="login-form" method="POST" action="./server/proses/Login.php" onsubmit="return validateForm(event)">
            <div class="input-group nim">
                <label for="text" class="login-label font-bold">NIM</label>
                <input type="text" id="text" name="username" class="login-input font-semi-bold nimInput" placeholder="Masukkan nim anda">
                <span class="error-message font-semi-bold"></span>
            </div>
            <div class="input-group password">
                <label for="password" class="login-label font-bold">Kata Sandi</label>
                <input type="password" id="password" name="password" class="login-input font-semi-bold"
                    placeholder="Masukkan kata sandi anda">
                <span class="error-message font-semi-bold"></span>
            </div>
            <button type="submit" class="login-button font-bold">Masuk</button>
        </form>
    </div>
</div>