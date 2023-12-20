@if (Session::get('emp_name') !== '')
    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item has-treeview {{ Request::is('backend/') ? 'menu-open' : '' }}">
            <a href="{{ url('/backend') }}" class="nav-link {{ Request::is('backend') ? 'active' : '' }}">
                <p><i class="fas fa-home" style="color:rgb(255, 0, 140)"></i> หน้าแรก</p>
            </a>
        </li>
    </ul>

    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item has-treeview {{ Request::is('backend/info') ? 'menu-open' : '' }}">
            <a href="{{ url('/backend/info') }}"
                class="nav-link {{ Request::is('backend/info') ? 'active' : '' }} or {{ Request::is('backend/v/*') ? 'active' : '' }}">
                <p><i class="fa fa-address-card" style="color:rgb(0, 225, 255)"></i> จัดการข้อมูลส่วนตัว</p>
            </a>
        </li>
    </ul>



    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
            <a href="{{ url(asset('/manual/manualadmin.pdf')) }}" target="_NEW" class="nav-link">
                <p><i class="fas fa-file" style="color:rgb(232, 232, 25)"></i> คู่มือการใช้งาน </p>
            </a>
        </li>
    </ul>
@endif


@can('admin')
    <hr>
    <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu"
        data-accordion="false">
        <a href="#" class="nav-link" align="left">
            <p style="color:rgb(255, 255, 255)">เมนูสำหรับ Admin เท่านั้น</p>
        </a>
        <li class="nav-item has-treeview {{ Request::is('backend/viewAdmin') ? 'menu-open' : '' }}">
            <a href="{{ url('/backend/viewAdmin') }}"
                class="nav-link {{ Request::is('backend/viewAdmin') ? 'active' : '' }} or {{ Request::is('backend/editAdmin/*') ? 'active' : '' }}">
                <p title="เมนูนี้จะเห็นเฉพาะ Admin เท่านั้น"><i class="fa fa-users-cog" style="color:rgb(8, 242, 74)"></i>
                    จัดการข้อมูลบุคคลากร ทั้งหมด</p>
            </a>
        </li>
    </ul>
@endcan
