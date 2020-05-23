<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon">
            <img src="https://www.freelogodesign.org/file/app/client/thumb/74c59f4e-ccef-4118-a250-8086ebcd74d6_200x200.png?1589823320764" style="height:70px;" alt="logo">
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quay lại Novotel</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Chỉnh sửa phòng
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if(Auth::user()->role == 1)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Các loại phòng</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục phòng</h6>
                <a class="collapse-item" href="{{route('category.index')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('category.create')}}">Thêm mới</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kindrooms"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Kiểu phòng</span>
        </a>
        <div id="kindrooms" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục phòng</h6>
                <a class="collapse-item" href="{{route('kindrooms.index')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('kindrooms.create')}}">Thêm mới</a>

            </div>
        </div>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rooms"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Phòng</span>
        </a>
        <div id="rooms" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục phòng</h6>
                <a class="collapse-item" href="{{route('rooms.index')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('rooms.create')}}">Thêm mới</a>

            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Danh mục phòng
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#booking"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý phòng đặt</span>
        </a>
        <div id="booking" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục phòng đặt</h6>
                <a class="collapse-item" href="{{route('adminbooking.index')}}">Danh sách</a>
                <a class="collapse-item" href="">Phong</a>

            </div>
        </div>

    </li>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Danh mục dịch vụ
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#serviceslug"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Các loại dịch vụ</span>
        </a>
        <div id="serviceslug" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục dịch vụ</h6>
                <a class="collapse-item" href="{{route('serviceslug.index')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('serviceslug.create')}}">Thêm mới</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#service"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Dịch vụ phòng</span>
        </a>
        <div id="service" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Dịch vụ phòng</h6>
                <a class="collapse-item" href="{{route('service.index')}}">Danh sách</a>
                <a class="collapse-item" href="{{route('service.create')}}">Thêm mới</a>

            </div>
        </div>
    </li>
    <hr class="sidebar-divider">

    <!-- Heading -->
    @if(Auth::user()->role == 1)
    <div class="sidebar-heading">
        Danh mục user
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#member"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý người dùng</span>
        </a>
        <div id="member" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh mục nhân viên</h6>
                <a class="collapse-item" href="{{route('member.create')}}">Thêm nhân viên</a>
                <a class="collapse-item" href="{{route('member.index')}}">Danh sách</a>
                {{--                <a class="collapse-item" href="{{route('serviceslug.create')}}">Thêm mới</a>--}}
                <h6 class="collapse-header">Danh mục khách hàng</h6>
                <a class="collapse-item" href="{{route('customer.index')}}">Danh sách</a>
            </div>
        </div>
    </li>
    <!-- Heading -->
    <div class="sidebar-heading">
        Danh mục doanh thu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#revenue"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản lý doanh thu</span>
        </a>
        <div id="revenue" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Doanh thu trong tháng</h6>
                <a class="collapse-item" href="{{route('revenue.index')}}">Doanh thu </a>
            </div>
        </div>
    </li>

    {{--    <li class="nav-item">--}}
    {{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#user"--}}
    {{--           aria-expanded="true" aria-controls="collapseTwo">--}}
    {{--            <i class="fas fa-fw fa-cog"></i>--}}
    {{--            <span>Quản lý user</span>--}}
    {{--        </a>--}}
    {{--        <div id="user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
    {{--            <div class="bg-white py-2 collapse-inner rounded">--}}
    {{--                <h6 class="collapse-header">Dịch vụ user</h6>--}}
    {{--                <a class="collapse-item" href="{{route('service.index')}}">Danh sách</a>--}}
    {{--                <a class="collapse-item" href="{{route('service.create')}}">Thêm mới</a>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </li>--}}
        @endif
</ul>
