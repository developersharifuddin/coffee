
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar mt-0">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('uploads/profile/avater.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link {{Request::is('admin/dashboard*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Dashboard </p>
                </a>
            </li>
  
            <li class="nav-item">
                <a href="{{route('slider.index')}}" class="nav-link {{Request::is('admin/slider*') ? 'active' : '' }}">
                <i class="nav-icon far fa-image"></i>
                <p> Slider </p>
                </a>
            </li>
  
            <li class="nav-item">
                <a href="{{route('reservation.index')}}" class="nav-link {{Request::is('admin/reservation*') ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                <p> Reservation </p>
                </a>
            </li>
  
  
            <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{Request::is('admin/category*') ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                <p> category </p>
                </a>
            </li>
  
            <li class="nav-item">
                <a href="{{route('item.index')}}" class="nav-link {{Request::is('admin/item*') ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                <p> Item </p>
                </a>
            </li>
  
            <li class="nav-item d-none">
                <a href="{{route('subitem.index')}}" class="nav-link {{Request::is('admin/subitem*') ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                <p> Sub_item</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('order.index')}}" class="nav-link {{Request::is('admin/order*') ? 'active' : '' }}">
                 <i class="far fa-circle nav-icon"></i>
                <p> Order List</p>
                </a>
            </li>
   
          <li class="nav-item d-none">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
               
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="pages/examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/faq.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contact-us.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact us</p>
                </a>
              </li>
            </ul>
          </li>

 
                  <li class="nav-item">
                    <a href="{{route('subadmin.register')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register Sub Admin</p>
                    </a>
                  </li>
                  
                  <li class="nav-item d-none">
                    <a href="#" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register Blog writer</p>
                    </a>
                  </li>

                  <li class="nav-item">
                     @if (Route::has('password.request'))
                      <a class="nav-link" href="{{ route('password.request') }}">
                        <i class="far fa-circle nav-icon"></i>
                     <p> {{ __('Recover Password?') }}</p>
                         </a>
                      @endif
                    </a>
                  </li>
  
                  
           <li class="nav-item">
              <a class="dropdown-item nav-link bg-transparent" id="logout" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="far fa-circle nav-icon"></i>
                        
                    {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
      
          </a>
         </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>