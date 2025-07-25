  <!--begin::Sidebar-->
  <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <!--begin::Sidebar Brand-->
      <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="{{asset('/admin/dashboard')}}" class="brand-link">
              <!--begin::Brand Image-->
              <img src="{{ asset('/Backend/dist/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                  class="brand-image opacity-75 shadow" />
              <!--end::Brand Image-->
              <!--begin::Brand Text-->
              <span class="brand-text fw-light">Admin Dashboard</span>
              <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
      </div>
      <!--end::Sidebar Brand-->
      <!--begin::Sidebar Wrapper-->
      <div class="sidebar-wrapper">
          <nav class="mt-2">
              <!--begin::Sidebar Menu-->
              <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                  <li class="nav-item menu-open">
                      <a href="#" class="nav-link">
                          <i class="nav-icon bi bi-speedometer"></i>
                          <p>
                              Category
                              <i class="nav-arrow bi bi-chevron-right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('/admin/category/list')}}" class="nav-link">
                                  <i class="nav-icon bi bi-circle"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('/admin/category/create')}}" class="nav-link">
                                  <i class="nav-icon bi bi-circle"></i>
                                  <p>Add New</p>
                              </a>
                          </li>
                         
                      </ul>
                  </li>


                   <li class="nav-item menu-open">
                      <a href="#" class="nav-link">
                          <i class="nav-icon bi bi-speedometer"></i>
                          <p>
                              Sub Category
                              <i class="nav-arrow bi bi-chevron-right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{url('/admin/sub-category/list')}}" class="nav-link">
                                  <i class="nav-icon bi bi-circle"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('/admin/sub-category/create')}}" class="nav-link">
                                  <i class="nav-icon bi bi-circle"></i>
                                  <p>Add New</p>
                              </a>
                          </li>
                         
                      </ul>
                  </li>

                   <li class="nav-item menu-open">
                      <a href="#" class="nav-link">
                          <i class="nav-icon bi bi-speedometer"></i>
                          <p>
                              Product
                              <i class="nav-arrow bi bi-chevron-right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/admin/product/list" class="nav-link">
                                  <i class="nav-icon bi bi-circle"></i>
                                  <p>List</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('/admin/product/create')}}" class="nav-link">
                                  <i class="nav-icon bi bi-circle"></i>
                                  <p>Add New</p>
                              </a>
                          </li>
                         
                      </ul>
                  </li>

                  
                   



              </ul>
              <!--end::Sidebar Menu-->
          </nav>
      </div>
      <!--end::Sidebar Wrapper-->
  </aside>
  <!--end::Sidebar-->
