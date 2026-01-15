<li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == null) active @endif">
       <a href="{{ route('dashboard.home') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-home-circle"></i>
           <div data-i18n="Analytics">Dashboard</div>
       </a>
   </li>
<li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pengaduan') active @endif">
       <a href="{{ route('dashboard.pengaduan') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-file"></i>
           <div data-i18n="Analytics">Pengaduan</div>
       </a>
   </li>

     <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'pendampingan') active @endif">
       <a href="{{ route('dashboard.pendampingan') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-message"></i>
           <div data-i18n="Analytics">Pendampingan</div>
       </a>
   </li>

      <li class="menu-item @if (Request::segment(1) == 'dashboard' && Request::segment(2) == 'nilai') active @endif">
       <a href="{{ route('dashboard.nilai') }}" class="menu-link">
           <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
           <div data-i18n="Analytics"> Nilai Pengaduan</div>
       </a>
   </li>
