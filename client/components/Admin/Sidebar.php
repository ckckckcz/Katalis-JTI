<nav class="sidebar-nav">
    <div class="sidebar-container">
        <div class="sidebar-flex sidebar-justify-between">
            <div class="sidebar-flex sidebar-justify-start">
                <!-- <button class="sidebar-button" onclick="toggleSidebar()">
                    <span class="sidebar-sr-only">Open sidebar</span>
                    <svg class="sidebar-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button> -->
                <div href="https://flowbite.com" class="sidebar-logo">
                    <img src="/katalis/public/img/katalis.png" class="sidebar-logo-img" alt="Katalis Logo" />
                    <span class="sidebar-logo-text font-bold">Katalis JTI</span>
                </div>
            </div>
            <div class="sidebar-profile">
                <img class="sidebar-profile-img" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                    alt="user photo">
            </div>
        </div>
    </div>
</nav>

<aside id="sidebar" class="sidebar-aside" aria-label="Sidebar">
    <div class="sidebar-menu">
        <ul class="sidebar-ul">
            <li class="sidebar-li">
                <div href="#" class="sidebar-link">
                    <svg class="sidebar-svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="sidebar-text font-bold">Dashboard</span>
                </div>
            </li>
            <!-- Add more links as needed -->
        </ul>
    </div>
</aside>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('translate-x-0');
        sidebar.classList.toggle('-translate-x-full');
    }
</script>