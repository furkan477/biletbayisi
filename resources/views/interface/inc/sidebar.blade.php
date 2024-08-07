<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link text-center">
      <span class="brand-text font-weight-light"><i class="fa-solid fa-plane-lock"></i> Bilet Bayisi</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <a href="#" class="d-block"><i class="fa-regular fa-user"></i> User Name</a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="fa-solid fa-plane-departure"></i> 
              <p> 
                 Bilet Bayisi Uçuşlar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('flights.search')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Uçuş Ara</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('flights')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Uçuşları Listele</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>#</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>