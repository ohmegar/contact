@if (Session::get('emp_name') !== '')

<ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview {{ Request::is('backend/') ? 'menu-open' : '' }}">
        <a href="{{ url('/backend')}}" class="nav-link {{ Request::is('backend') ? 'active' : '' }}">
            <p><i class="fas fa-home" style="color:rgb(255, 0, 140)"></i> หน้าแรก</p>
        </a>
    </li>
</ul>

<ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview {{ Request::is('backend/info') ? 'menu-open' : '' }}">
        <a href="{{ url('/backend/info')}}" class="nav-link {{ Request::is('backend/info') ? 'active' : '' }} or {{ Request::is('backend/v/*') ? 'active' : '' }}">
            <p><i class="fa fa-address-card" style="color:rgb(0, 225, 255)"></i> จัดการข้อมูลส่วนตัว</p>
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



{{-- 12744 โอห์ม | 16103 เบ้น | 21664 เชียร์ | 15404 พี่แมน | 21564  จ๋า --}}
@if (Session::get('emp_id') == '12744' || Session::get('emp_id') == '16103' || Session::get('emp_id') == '21564' || Session::get('emp_id') == '21664' || Session::get('emp_id') == '15404')

<hr>
<ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
    <a href="#" class="nav-link" align="left"><p style="color:rgb(255, 255, 255)">ส่วนสำหรับเจ้าหน้าที่ IT เท่านั้น</p></a>
    <li class="nav-item has-treeview {{ Request::is('backend/viewAdmin') ? 'menu-open' : '' }}">
        <a href="{{ url('/backend/viewAdmin')}}" class="nav-link {{ Request::is('backend/viewAdmin') ? 'active' : '' }} or {{ Request::is('backend/editAdmin/*') ? 'active' : '' }}">
            <p title="จัดการได้คือ โอห์ม เบ้น พี่แมน จ๋า เชียร์"><i class="fa fa-users-cog" style="color:rgb(8, 242, 74)"></i> จัดการข้อมูลส่วนตัว (ทั้งหมด)</p>
        </a>
    </li>
</ul>

@endif


{{-- กลุ่มพัสดุเท่านั้น org_id = 1619 | 12744 โอห์ม | 16103 เบ้น | 21664 เชียร์  |  21564  จ๋า --}}
{{-- @if (Session::get('emp_id') == '12744' || Session::get('emp_id') == '16103' || Session::get('emp_id') == '21564' || Session::get('emp_id') == '21664' || Session::get('org_id') == '1619')

<hr>
<p style="color:rgb(255, 255, 255)" align="center">เมนูสำหรับกลุ่มพัสดุ</p>
<ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview {{ Request::is('backend/viewProcurement') ? 'menu-open' : '' }}">
        <a href="{{ url('/backend/viewProcurement')}}" class="nav-link {{ Request::is('backend/viewProcurement') ? 'active' : '' }} or {{ Request::is('backend/vs/*') ? 'active' : '' }}">
            <p title="กลุ่มพัสดุจัดการได้เท่านั้น"><i class="fa fa-users" style="color:rgb(242, 211, 8)"></i> จัดการข้อมูลจ้างเหมา (ลาออก)</p>
        </a>
    </li>
</ul>

@endif --}}
