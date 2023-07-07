@if (Session::get('emp_name') !== '')

<ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview {{ Request::is('backend/') ? 'menu-open' : '' }}">
        <a href="{{ url('/backend')}}" class="nav-link {{ Request::is('backend') ? 'active' : '' }}">
            <p><i class="fas fa-home" style="color:rgb(255, 0, 140)"></i> หน้าแรก</p>
        </a>
    </li>
</ul>

<ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview {{ Request::is('backend/viewall') ? 'menu-open' : '' }}">
        <a href="{{ url('/backend/viewall')}}" class="nav-link {{ Request::is('backend/viewall') ? 'active' : '' }} or {{ Request::is('backend/v/*') ? 'active' : '' }}">
            <p><i class="fas fa-search" style="color:rgb(0, 225, 255)"></i> ข้อมูล URL/QR Code ทั้งหมด</p>
        </a>
    </li>
</ul>


<ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview {{ Request::is('backend/view') ? 'menu-open' : '' }}">
        <a href="{{ url('/backend/view')}}" class="nav-link {{ Request::is('backend/view') ? 'active' : '' }} or {{ Request::is('backend/vs/*') ? 'active' : '' }}">
            <p><i class="fas fa-search" style="color:rgb(255, 0, 8)"></i> ข้อมูล URL/QR Code (เฉพาะตนเอง)</p>
        </a>
    </li>
</ul>



<ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ url(asset('/manual/manualadmin.pdf')) }}" target="_NEW" class="nav-link">
            <p><i class="fas fa-file" style="color:rgb(232, 232, 25)"></i> คู่มือการใช้งาน </p>
        </a>
    </li>
</ul>


@endif
