<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; 2019. <a href="#">Project Booking Hotel</a> by <a href="https://www.facebook.com/nducthach" target="_blank">Đức Thạch</a></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn chắc chắn đăng xuất?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Chọn "Logout" để xác nhận.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{'logout'}}">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('libraries/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('libraries/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('libraries/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('libraries/js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('libraries/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libraries/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('libraries/js/demo/datatables-demo.js')}}"></script>
<script src="{{asset('libraries/js/ajax.js')}}"></script>
<script src="{{asset('libraries/js/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'demo' );
</script>

@if(session('thongbao'))
    <script type="text/javascript">
        toastr.success('{{ session('thongbao') }}', 'Thông báo', {timeOut: 500});
    </script>
@endif
@if(session('error'))
    <script type="text/javascript">
        toastr.error('{{ session('error') }}', 'Thông báo', {timeOut: 500});
    </script>
@endif
