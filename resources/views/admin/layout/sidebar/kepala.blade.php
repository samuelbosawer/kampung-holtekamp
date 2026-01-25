<li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == null) active @endif">
       <a href="{{ route('dashboard.home') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bxs-dashboard"></i>
           <div data-i18n="Analytics">Dashboard</div>
       </a>
   </li>


   


   
    <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pengumuman') active @endif">
       <a href="{{ route('dashboard.pengumuman') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-news"></i>
           <div data-i18n="Analytics">Data Pengumuman</div>
       </a>
   </li>



    <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'surat') active @endif">
       <a href="{{ route('dashboard.surat') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-file"></i>
           <div data-i18n="Analytics">Laporan Surat</div>
       </a>
   </li>