   <!-- Dashboard -->
   <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == null) active @endif">
       <a href="{{ route('dashboard.home') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-home-circle"></i>
           <div data-i18n="Analytics">Dashboard</div>
       </a>
   </li>


   <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pengaduan') active @endif">
       <a href="{{ route('dashboard.pengaduan') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-file"></i>
           <div data-i18n="Analytics">Laporan Pengaduan</div>
       </a>
   </li>


   <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'petugas') active @endif">
       <a href="{{ route('dashboard.petugas') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-user"></i>
           <div data-i18n="Analytics"> Laporan Petugas</div>
       </a>
   </li>

   <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pendampingan') active @endif">
       <a href="{{ route('dashboard.pendampingan') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-message"></i>
           <div data-i18n="Analytics"> Laporan Pendampingan</div>
       </a>
   </li>


   <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'rekomendasi') active @endif">
       <a href="{{ route('dashboard.rekomendasi') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-star"></i>
           <div data-i18n="Analytics">Laporan Rekomendasi</div>
       </a>
   </li>

   <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pengajuan') active @endif">
       <a href="{{ route('dashboard.pengajuan') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-edit"></i>
           <div data-i18n="Analytics"> Laporan Pengajuan </div>
       </a>
   </li>
