<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="https://www.freelogodesign.org/file/app/client/thumb/5481a076-624b-4ffe-a7b5-b497e79eeebf_200x200.png?1588064113680" style="width: 80px; height: 70px;" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">Trang Chủ</a></li>
                <li class="nav-item"><a href="rooms" class="nav-link">Phòng</a></li>
                <li class="nav-item"><a href="restaurant" class="nav-link">Nhà Hàng</a></li>
                <li class="nav-item"><a href="about" class="nav-link">Về Chúng Tôi</a></li>
                <li class="nav-item"><a href="contact" class="nav-link">Liên Hệ</a></li>
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                            <img class="img-profile rounded-circle" style="width: 27px;"
                                 src="@if(Auth::user()->avatar==""){{asset('client//images/default.png')}} @else {{Auth::user()->avatar}}@endif">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="editinfor">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Thông tin cá nhân
                            </a>
                            <a class="dropdown-item" href="reservation">
                                <i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-gray-400"></i>
                                Quản lý đặt phòng
                            </a>
                            <a class="dropdown-item" href="logout">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Đăng xuất
                            </a>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a href="#" data-toggle="modal" data-target="#login" class="nav-link">Đăng
                            Nhập</a></li>
                    <li class="nav-item">
                        <a href="#" data-toggle="modal" data-target="#register" class="nav-link">
                            Đăng Ký
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>

</nav>
