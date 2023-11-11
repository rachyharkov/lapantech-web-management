<!-- Main Sidebar -->
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0" style="z-index: 1;">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                        src="{{ asset('images/shards-dashboards-logo.svg')}}" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">Lapan Tech</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
        <div class="input-group input-group-seamless ml-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <input class="navbar-search form-control" type="text" placeholder="Search for something..."
                aria-label="Search">
        </div>
    </form>
    <div class="nav-wrapper">
        <ul class="nav flex-column">
            <x-admin.menu-item
                :route="route('admin.dashboard')"
                :icon="'edit'"
                :title="'Dashboard'"
                :active="request()->routeIs('admin.dashboard')"
            />

            <x-admin.menu-item
                :route="route('admin.posts.index')"
                :icon="'vertical_split'"
                :title="'Daftar Postingan'"
                :active="request()->routeIs('admin.posts.index')"
            />

            <x-admin.menu-item
                :route="route('admin.posts.create')"
                :icon="'note_add'"
                :title="'Tambah Post'"
                :active="request()->routeIs('admin.posts.create')"
            />

            <x-admin.menu-item
                :route="route('admin.productandservices.index')"
                :icon="'view_module'"
                :title="'Product and Services'"
                :active="request()->routeIs('admin.productandservices.index')"
            />

            <x-admin.menu-item
                :route="route('admin.projects.index')"
                :icon="'table_chart'"
                :title="'Project'"
                :active="request()->routeIs('admin.projects.index')"
            />

            <x-admin.menu-item
                :route="route('admin.users.index')"
                :icon="'person'"
                :title="'Users'"
                :active="request()->routeIs('admin.users.index')"
            />

            <x-admin.menu-item
                :route="route('admin.settings.create')"
                :icon="'settings'"
                :title="'Pengaturan'"
                :active="request()->routeIs('admin.settings.create')"
            />
        </ul>
    </div>
</aside>
<!-- End Main Sidebar -->
