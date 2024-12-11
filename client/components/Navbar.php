<nav class="navbar">
    <div class="container">
        <!-- Logo -->
        <div href="javascript:void(0)" class="logo">
            <img src="/katalis/public/img/katalis.png" class="sidebar-logo-img" alt="Katalis Logo" />
            <span class="logo-text font-bold">Katalis JTI</span>
        </div>

        <!-- Navbar Content (Links) -->
        <div class="navbar-content" id="navbar-cta">
            <ul class="navbar-list font-semi-bold">
                <li><a href="javascript:void(0)" onclick="window.location.href='/katalis/'" class="navbar-link">Home</a>
                </li>
                <li><a href="javascript:void(0)" onclick="window.location.href='/katalis/leaderboard'"
                        class="navbar-link">Leaderboard</a></li>
                <li><a href="javascript:void(0)" onclick="window.location.href='/katalis/competition'"  class="navbar-link">Competition</a></li>
                <li><a href="javascript:void(0)" onclick="window.location.href='/katalis/blog'" class="navbar-link">Blog</a></li>
            </ul>
        </div>
        <!-- Actions (Button) -->
        <div class="actions gap-5">
            <?php
            if (isset($_SESSION['is_login'])) {
                echo '<button type="button" class="button-primary font-bold"
                onclick="window.location.href=\'/katalis/logout\'">Keluar</button>';
            } else {
                echo '<button type="button" class="button-primary font-bold"
                onclick="window.location.href=\'/katalis/login\'">Masuk</button>';
            }
            ?>
            <div href="https://flowbite.com" class="navbar-bar" id="sidebar-toggle">
                <svg class="bar-navbar" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                </svg>
            </div>
        </div>
    </div>
</nav>