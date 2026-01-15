 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo">
         <a href="{{ route('dashboard.home') }}" class="app-brand-link">
             <span class="app-brand-logo demo">
                 <img src="{{ asset('assets/img/logo.png') }}" width="40px" class="img-fluid" alt=""
                     srcset="">
             </span>
             <span class=" menu-text fw-bolder ms-2">SIMPEL DESA</span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">

         @if (Auth::user()->hasRole('admin'))
             @include('admin.layout.sidebar.admin')
         @elseif (Auth::user()->hasRole('rw'))
             @include('admin.layout.sidebar.rw')
         @elseif (Auth::user()->hasRole('rt'))
             @include('admin.layout.sidebar.rt')
         @elseif (Auth::user()->hasRole('warga'))
             @include('admin.layout.sidebar.warga')
         @elseif (Auth::user()->hasRole('kepala'))
             @include('admin.layout.sidebar.kepala')
         @endif

         <li class="menu-item ">
             <a href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-door-open"></i>
                 <div data-i18n="Analytics">Keluar </div>
             </a>
         </li>


         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>


     </ul>
 </aside>
 <!-- / Menu -->
