<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MULTIMEDIA<sup>Lab</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      @if(auth()->user()->hasRole('admin'))
      <div class="sidebar-heading">
        Admin
      </div>  
      @endif
      
      @if(auth()->user()->can('add exam') || auth()->user()->can('edit exam') || auth()->user()->can('delete exam') )
      
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-user-friends"></i>
          <span>Daftar User</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('new_user') }}">
          <i class="fas fa-fw fa-user"></i>
          <span>User Baru</span></a>
      </li>
        <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Komponen</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ujian:</h6>
            <a class="collapse-item" href="buttons.html">Tulis</a>
            <a class="collapse-item" href="cards.html">Hardware</a>
            <a class="collapse-item" href="cards.html">Software</a>
            <a class="collapse-item" href="cards.html">Wawancara</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Nav Item - Utilities Collapse Menu
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">



      <!-- Heading -->
      @if(auth()->user()->can('report exam') || auth()->user()->can('view report') || auth()->user()->can('acc caslab') )
      <div class="sidebar-heading">
          Asisten
        </div>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Daftar Ujian</span></a>
      </li>
      @endif

    

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

       <!-- Heading -->
       @if(auth()->user()->can('view exam') || auth()->user()->can('do exam') || auth()->user()->can('viewMyReport') )
      <div class="sidebar-heading">
          Calon Asisten
        </div>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-user-friends"></i>
          <span>Daftar Peserta</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Upload Portofolio</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Ujian</span></a>
      </li>
      @endif

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
