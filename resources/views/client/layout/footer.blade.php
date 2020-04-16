<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Novotel</h2>
                    <p>Chúng Tôi Luôn Ở Bên Bạn, Chúng Tôi Thấu Hiểu Bạn...</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Liên Kết</h2>
                    <ul class="list-unstyled">
                        <li><a href="blog.html" class="py-2 d-block">Cộng Đồng</a></li>
                        <li><a href="rooms.html" class="py-2 d-block">Phòng</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Bảo Mật</h2>
                    <ul class="list-unstyled">

                        <li><a href="#" class="py-2 d-block">Về Chúng Tôi</a></li>
                        <li><a href="#" class="py-2 d-block">Liên Hệ Với Chúng Tôi</a></li>
                        <li><a href="#" class="py-2 d-block">Dịch Vụ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Đặt Câu Hỏi Cho Chúng Tôi?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Duy Tan UNIVERSITY</span>
                            </li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+84 342762999</span></a>
                            </li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text"> baotrank22tpm4@gmail.com</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                </p>
            </div>
        </div>
    </div>
</footer>

<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00"/>
    </svg>
</div>


<script src="{{asset('client/js/jquery.min.js')}}"></script>
<script src="{{asset('client/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('client/js/popper.min.js')}}"></script>
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('client/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('client/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('client/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('client/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('client/js/aos.js')}}"></script>

<script src="{{asset('client/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('client/js/jquery.mb.YTPlayer.min.js')}}"></script>
<script src="{{asset('client/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('client/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('client/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('client/js/google-map.js')}}"></script>
<script src="{{asset('client/js/main.js')}}"></script>
<script src="{{asset('client/js/custom.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('client/js/ajax.js')}}"></script>--}}
<script src="{{asset('libraries/js/toastr.min.js')}}"></script>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker();
    });
</script>
@if(session('thongbao'))
    <script type="text/javascript">
        messageSuccess('{{ session('thongbao') }}');
    </script>
@endif

@if(session('error'))
    <script type="text/javascript">
        messageError('{{ session('error') }}');
    </script>
@endif
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e042e3127773e0d832aae8a/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
