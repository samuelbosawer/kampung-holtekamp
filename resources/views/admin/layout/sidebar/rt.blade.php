<li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == null) active @endif">
       <a href="{{ route('dashboard.home') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bxs-dashboard"></i>
           <div data-i18n="Analytics">Dashboard</div>
       </a>
   </li>


   <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'rw') active @endif">
       <a href="{{ route('dashboard.rw') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-box"></i>
           <div data-i18n="Analytics">Informasi RW</div>
       </a>
   </li>

   <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'rt') active @endif">
       <a href="{{ route('dashboard.rt') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-box"></i>
           <div data-i18n="Analytics">Informasi RT</div>
       </a>
   </li>


    <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'warga') active @endif">
       <a href="{{ route('dashboard.warga') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-user"></i>
           <div data-i18n="Analytics">Informasi Warga</div>
       </a>
   </li>


    <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'user') active @endif">
       <a href="{{ route('dashboard.user') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-user"></i>
           <div data-i18n="Analytics">Informasi Pengguna</div>
       </a>
   </li>

    

   

    <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'surat') active @endif">
       <a href="{{ route('dashboard.surat') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-file"></i>
           <div data-i18n="Analytics">Laporan Surat</div>
       </a>
   </li>