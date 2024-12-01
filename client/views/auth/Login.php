<div class="login-container">
    <div class="login-card">
        <div class="login-logo">
            <img aria-hidden="true" alt="Katalis logo" src="/katalis/public/img/katalis.png" class="login-image" />
        </div>
        <form class="login-form" method="POST" action="./server/proses/Login.php">
            <div class="input-group nim">
                <label for="text" class="login-label font-bold">NIM</label>
                <input type="text" id="text" name="username" class=" login-input font-semi-bold" placeholder="Masukkan nim anda">
                <p>
                    <?php
                        if (isset($errors['username'])) {
                            echo $errors['username'];
                        }
                    ?>
                </p>
            </div>
            <div class="input-group password">
                <label for="password" class="login-label font-bold">Kata Sandi</label>
                <input type="password" id="password" name="password" class=" login-input font-semi-bold"
                    placeholder="Masukkan kata sandi anda">
                </p>
            </div>
            <button class="login-button font-bold">Masuk</button>
        </form>
    </div>
</div>