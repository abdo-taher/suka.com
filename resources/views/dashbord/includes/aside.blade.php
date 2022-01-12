<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/image/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/image/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('Dashbord')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  {{__('admin/aside.Dashboard')}}
              </p>
            </a>

          </li>
          {{--header  --}}
          <li class="nav-header">{{__('admin/aside.language')}}</li>
          {{--languages--}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <ion-icon name="globe-outline"></ion-icon>
              <p>
                {{__('admin/aside.Web-Language')}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{App\Models\Dashbord\language::count()}}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.languages')}}" class="nav-link">
                  <i class="far fa-eye nav-icon"></i>
                  <p>{{__('admin/aside.View-Languages')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.addLanguages')}}" class="nav-link">
                  <i class="far fa-plus-square nav-icon"></i>
                  <p>{{__('admin/aside.add-Languages')}}</p>
                </a>
              </li>
            </ul>
          </li>
          {{--header  --}}
          <li class="nav-header">{{__('admin/aside.category')}}</li>
          {{--Main-categories--}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <ion-icon name="grid-outline"></ion-icon>
            <p>
                {{__('admin/aside.Main-Categories')}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{App\Models\Dashbord\mainCategorie::mainCat()->count()}}</span>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-eye nav-icon"></i>
                    <p>{{__('admin/aside.View-Categories')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>{{__('admin/aside.add-Categories')}}</p>
                </a>
            </li>
            </ul>
            </li>
          {{--sub-categories--}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <ion-icon name="apps-outline"></ion-icon>
            <p>
                {{__('admin/aside.sub_categories')}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{App\Models\Dashbord\subcategories::subCat()->count()}}</span>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-eye nav-icon"></i>
                    <p>{{__('admin/aside.View-sub-Categories')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>{{__('admin/aside.add-sub-Categories')}}</p>
                </a>
            </li>
            </ul>
            </li>
          {{--header  --}}
          <li class="nav-header">{{__('admin/aside.person')}}</li>
          {{--vendors--}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <ion-icon name="people-circle-outline"></ion-icon>
            <p>
                {{__('admin/aside.vendors')}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">{{App\Models\Dashbord\vendor::count()}}</span>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-eye nav-icon"></i>
                    <p>{{__('admin/aside.View-vendors')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>{{__('admin/aside.add-vendors')}}</p>
                </a>
            </li>
            </ul>
            </li>
          {{--users--}}
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <ion-icon name="people-outline"></ion-icon>
                    <p>
                        {{__('admin/aside.users')}}
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right">{{App\Models\Dashbord\User::count()}}</span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-eye nav-icon"></i>
                            <p>{{__('admin/aside.View-users')}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                            <i class="far fa-plus-square nav-icon"></i>
                            <p>{{__('admin/aside.add-users')}}</p>
                        </a>
                    </li>
                </ul>
            </li>
          {{--header  --}}
          <li class="nav-header">{{__('admin/aside.product')}}</li>
          {{--Productes--}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <ion-icon name="bag-handle-outline"></ion-icon>
            <p>
                {{__('admin/aside.productes')}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">0</span>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-eye nav-icon"></i>
                    <p>{{__('admin/aside.View-productes')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>{{__('admin/aside.add-productes')}}</p>
                </a>
            </li>
            </ul>
            </li>
          {{--Brands--}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <ion-icon name="logo-laravel"></ion-icon>
            <p>
                {{__('admin/aside.brands')}}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">0</span>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-eye nav-icon"></i>
                    <p>{{__('admin/aside.View-brands')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>{{__('admin/aside.add-brands')}}</p>
                </a>
            </li>
            </ul>
            </li>
          {{--offers--}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <ion-icon name="pricetags-outline"></ion-icon>
            <p>
                {{__('admin/aside.offers')}}
                <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
            </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-eye nav-icon"></i>
                    <p>{{__('admin/aside.View-offers')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-plus-square nav-icon"></i>
                    <p>{{__('admin/aside.add-offers')}}</p>
                </a>
            </li>
            </ul>
            </li>
          {{--header  --}}
          <li class="nav-header">ads</li>
          {{--product-ads--}}
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <ion-icon name="megaphone-outline"></ion-icon>
                    <p>
                        {{__('admin/aside.product-ads')}}
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-eye nav-icon"></i>
                            <p>{{__('admin/aside.View-product-ads')}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                            <i class="far fa-plus-square nav-icon"></i>
                            <p>{{__('admin/aside.add-product-ads')}}</p>
                        </a>
                    </li>
                </ul>
            </li>
          {{--outdoor-ads--}}
          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <ion-icon name="bookmarks-outline"></ion-icon>
                    <p>
                        {{__('admin/aside.outdoor-ads')}}
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-eye nav-icon"></i>
                            <p>{{__('admin/aside.View-outdoor-ads')}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                            <i class="far fa-plus-square nav-icon"></i>
                            <p>{{__('admin/aside.add-outdoor-ads')}}</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
