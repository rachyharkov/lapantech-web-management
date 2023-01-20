<!-- navbar -->
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="#"><img src="assets/img/logo_navbar.svg" alt="logo_navbar"></a>
        </div>
        <div class="nav-link scroll-spy">
            <ul>
                <li><button id="menu-home" wire:click="changePage('home')">Home</button></li>
                <li><button id="menu-product_and_services" wire:click="changePage('product_and_services')">Product and Services</button></li>
                <li><button id="menu-feedback" wire:click="changePage('feedback')">Feedback</button></li>
                <li><button id="menu-projects" wire:click="changePage('projects')">Projects</button></li>
                <li><button id="menu-contact" wire:click="changePage('contact')">Contact</button></li>
            </ul>
        </div>
        <div class="nav-toggle">
            <input type="checkbox">
            <i id="checkbtn" class="fas fa-bars"></i>
        </div>
    </div>
</nav>
