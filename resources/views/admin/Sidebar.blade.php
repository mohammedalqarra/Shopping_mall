  <style>
      .sidebar-dark .nav-item .nav-link[data-toggle=collapse]::after {
          color: rgba(255, 255, 255, .5);
          rotate: 90deg;
      }
  </style>
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('site.index') }}">
          <div class="sidebar-brand-icon">
              <i class="fas fa-store"></i>
          </div>
          <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.index') }}">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>{{ __('site.dashboard') }}</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCatogorie"
              aria-expanded="true" aria-controls="collapseCatogorie">
              <i class="fas fa-fw fa-tags"></i>
              <span>{{ __('site.categories') }}</span>
          </a>
          <div id="collapseCatogorie" class="collapse {{ str_contains(request()->url(), 'categories') ? 'show' : '' }}"
              aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}"
                      href="{{ route('admin.categories.index') }}">ALL categories</a>
                  <a class="collapse-item {{ request()->routeIs('admin.categories.create') ? 'active' : '' }}"
                      href="{{ route('admin.categories.create') }}">Add New </a>
              </div>
          </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Pages Collapse Menu Products -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducte"
              aria-expanded="true" aria-controls="collapseProducte">
              <i class="fas fa-fw fa-heart"></i>
              <span>{{ __('site.products') }}</span>
          </a>
          <div id="collapseProducte" class="collapse {{ str_contains(request()->url(), 'products') ? 'show' : '' }}"
              aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item {{ request()->routeIs('admin.products.index') ? 'active' : '' }}"
                      href="{{ route('admin.products.index') }}">ALL products</a>
                  <a class="collapse-item {{ request()->routeIs('admin.products.create') ? 'active' : '' }}"
                      href="{{ route('admin.products.create') }}">Add New products</a>
              </div>
          </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Orders -->
      <li class="nav-item">
          <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-cart-plus"></i>
              <span>{{ __('site.orders') }}</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Payments -->
      <li class="nav-item">
          <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-money-bill"></i>
              <span>{{ __('site.payments') }}</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Users -->
      <li class="nav-item">
          <a class="nav-link" href="index.html">
              <i class="fas fa-fw fa-users"></i>
              <span>{{ __('site.users') }}</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

  </ul>
  <!-- End of Sidebar -->
