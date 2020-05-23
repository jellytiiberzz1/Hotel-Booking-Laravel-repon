$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $('.editCate').click(function () {
        $('.errorName').hide();
        $('.errorPrice').hide();
        $('.errorUSD').hide();
        $('.errorDescription').hide();
        $('.errorImage').hide();
        let id = $(this).data('id');
        $.ajax({
            url: '/admin/category/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function (data) {
                $('.name').val(data.category.name);
                $('.price').val(data.category.price);
                $('.usd').val(data.category.usd);
                $('.sale').val(data.category.sale);
                $('.imageThu').attr('src', '/img/upload/category/' + data.category.image);
                CKEDITOR.instances['demo'].setData(data.category.description);
                if (data.category.status == 1) {
                    $('.ht').attr('selected', 'selected');
                } else {
                    $('.kht').attr('selected', 'selected');
                }
            }
        });
        $('#updateCategory').on('submit', function (event) {
            //chặn form submit
            event.preventDefault();
            $.ajax({
                url: '/admin/updateCate/' + id,
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                type: 'post',
                success: function (data) {
                    console.log(data);
                    if (data.error == 'true') {
                        if (data.message.image) {
                            $('.errorImage').show();
                            $('.errorImage').text(data.message.image[0]);
                            $('.image').val('');
                        }
                        if (data.message.name) {
                            $('.errorName').show();
                            $('.errorName').text(data.message.name[0]);
                            $('.name').val('');
                        }
                        if (data.message.price) {
                            $('.errorPrice').show();
                            $('.errorPrice').text(data.message.price[0]);
                            $('.price').val('');
                        }
                        if (data.message.usd) {
                            $('.errorUSD').show();
                            $('.errorUSD').text(data.message.usd[0]);
                            $('.usd').val('');
                        }
                        if (data.message.description) {
                            $('.errorDescription').show();
                            $('.errorDescription').text(data.message.description[0]);
                            $('.description').val('');
                        }
                    } else {
                        toastr.success(data.result, 'Thông báo', {timeOut: 5000});
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            });
        });
    });
    //Delete category
    $('.deleteCate').click(function () {
        let id = $(this).data('id');
        $('.del').click(function () {
            $.ajax({
                url: '/admin/category/' + id,
                dataType: 'json',
                type: 'delete',
                success: function ($result) {
                    toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });

    //Edit ProductType
    $('.editKindRooms').click(function () {
        $('.error').hide();
        let id = $(this).data('id');
        $.ajax({
            url: '/admin/kindrooms/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function ($result) {
                $('.name').val($result.kindrooms.name);
                if ($result.kindrooms.status == 1) {
                    $('.ht').attr('selected', 'selected');
                } else {
                    $('.kht').attr('selected', 'selected');
                }
                var html = '';
                $.each($result.category, function ($key, $value) {
                    if ($value['id'] == $result.kindrooms.idCategory) {
                        html += '<option value=' + $value['id'] + ' selected>';
                        html += $value['name'];
                        html += '</option>';
                    } else {
                        html += '<option value=' + $value['id'] + '>';
                        html += $value['name'];
                        html += '</option>';
                    }
                });
                $('.idCategory').html(html);

            }
        });
        $('.updateKindRooms').click(function () {
            let idCategory = $('.idCategory').val();
            let name = $('.name').val();
            let status = $('.status').val();
            $.ajax({
                url: '/admin/kindrooms/' + id,
                dataType: 'json',
                data: {
                    idCategory: idCategory,
                    name: name,
                    status: status,
                },
                type: 'put',
                success: function ($data) {
                    if ($data.error == 'true') {
                        $('.error').show();
                        $('.error').text($data.message.name[0]);
                    } else {
                        toastr.success($data.result, 'Thông báo', {timeOut: 5000});
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            })
        });
    });
    $('.deleteKindRooms').click(function () {
        let id = $(this).data('id');
        $('.delKindRooms').click(function () {
            $.ajax({
                url: '/admin/kindrooms/' + id,
                dataType: 'json',
                type: 'delete',
                success: function ($data) {
                    toastr.success($data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });
    $('.cateRooms').change(function () {
        let idCate = $(this).val();
        $.ajax({
            url: '/getkindrooms',
            data: {
                idCate: idCate
            },
            type: 'get',
            dataType: 'json',
            success: function ($data) {
                console.log($data);
                let html = '';
                $.each($data, function ($key, $value) {
                    html += '<option value=' + $value['id'] + '>';
                    html += $value['name'];
                    html += '</option>';
                });
                $('.roomkindRooms').html(html);
            }
        });
    });
    //Edit room
    $('.editRooms').click(function () {
        $('.errorNumber_room').hide();
        $('.errorName').hide();
        $('.errorAddress').hide();
        $('.errorCMND').hide();
        $('.errorPhone').hide();
        $('.errorDate_from').hide();
        $('.errorDate_to').hide();
        let id = $(this).data('id');
        $.ajax({
            url: '/admin/rooms/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function (data) {
                $('.number_room').val(data.room.number_room);
                $('.name').val(data.room.name);
                $('.address').val(data.room.address);
                $('.CMND').val(data.room.CMND);
                $('.phone').val(data.room.phone);
                if (data.room.status == 1) {
                    $('.t').attr('selected', 'selected');
                    if (data.room.status == 2)
                        $('.dt').attr('selected', 'selected');

                } else {
                    $('.sd').attr('selected', 'selected');
                }
                let html1 = '';
                $.each(data.category, function (key, value) {
                    if (data.room.idCategory == value['id']) {
                        html1 += '<option value="' + value['id'] + '" selected>';
                        html1 += value['name'];
                        html1 += '</option>';
                    } else {
                        html1 += '<option value="' + value['id'] + '">';
                        html1 += value['name'];
                        html1 += '</option>';
                    }
                });
                $('.cateRooms').html(html1);
                let html2 = '';
                $.each(data.kindrooms, function (key, value) {
                    if (data.room.idKindRooms == value['id']) {
                        html2 += '<option value="' + value['id'] + '" selected>';
                        html2 += value['name'];
                        html2 += '</option>';
                    } else {
                        html2 += '<option value="' + value['id'] + '">';
                        html2 += value['name'];
                        html2 += '</option>';
                    }
                });
                $('.roomkindRooms').html(html2);
                var unixtimestamp = data.room.date_to;
                var date = new Date(unixtimestamp);
                var year = date.getFullYear();
                var month = date.getMonth() + 1;
                if (month < 10) {
                    month = ("0" + month);
                }
                var day = date.getDate();
                var date_to = year + "-" + month + "-" + day;
                $('.date_to').val(date_to);
                //
                var unixtimestamp2 = data.room.date_from;
                var date2 = new Date(unixtimestamp2);
                var year2 = date2.getFullYear();
                var month2 = date2.getMonth() + 1;
                if (month2 < 10) {
                    month2 = ("0" + month2);
                }
                var day2 = date.getDate();
                var date_from = year2 + "-" + month2 + "-" + day2;

                $('.date_from').val(date_from);


            }
        });
        $('#updateRoom').on('submit', function (event) {
            //chặn form submit
            event.preventDefault();
            $.ajax({
                url: '/admin/updateRoom/' + id,
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                type: 'post',
                success: function (data) {
                    console.log(data);
                    if (data.error == 'true') {
                        if (data.message.name) {
                            $('.errorName').show();
                            $('.errorName').text(data.message.name[0]);
                            $('.name').val('');
                        }
                        if (data.message.number_room) {
                            $('.errorNumber_room').show();
                            $('.errorNumber_room').text(data.message.number_room[0]);
                            $('.number_room').val('');
                        }
                        if (data.message.CMND) {
                            $('.errorCMND').show();
                            $('.errorCMND').text(data.message.CMND[0]);
                            $('.CMND').val('');
                        }
                        if (data.message.phone) {
                            $('.errorPhone').show();
                            $('.errorPhone').text(data.message.phone[0]);
                            $('.phone').val('');
                        }
                        if (data.message.date_from) {
                            $('.errorDate_from').show();
                            $('.errorDate_from').text(data.message.date_from[0]);
                            $('.date_from').val('');
                        }
                        if (data.message.date_to) {
                            $('.errorDate_to').show();
                            $('.errorDate_to').text(data.message.date_to[0]);
                            $('.date_to').val('');
                        }
                    } else {
                        toastr.success(data.result, 'Thông báo', {timeOut: 5000});
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            });
        });
    });
    //Delete Rooms
    $('.deleteRooms').click(function () {
        let id = $(this).data('id');
        $('.delRooms').click(function () {
            $.ajax({
                url: '/admin/rooms/' + id,
                type: 'delete',
                dataType: 'json',
                success: function (data) {
                    toastr.success(data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });
    //edit service
    $('.editServiceSlug').click(function () {
        $('.error').hide();
        let id = $(this).data('id');
        //Edit
        $.ajax({
            url: '/admin/serviceslug/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function ($result) {
                console.log($result);
                $('.name').val($result.name);
                $('.title').text($result.name);
                if ($result.status == 1) {
                    $('.ht').attr('selected', 'selected');
                } else {
                    $('.kht').attr('selected', 'selected');
                }
            }
        });
        $('.updateServiceSlug').click(function () {
            let ten = $('.name').val();
            let status = $('.status').val();
            $.ajax({
                url: '/admin/serviceslug/' + id,
                data: {
                    name: ten,
                    status: status
                },
                type: 'put',
                dataType: 'json',
                success: function ($result) {
                    console.log($result);
                    if ($result.error == 'true') {
                        $('.error').show();
                        $('.error').text($result.message.name[0]);
                    } else {
                        toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                        $('#edit').modal('hide');
                        location.reload();
                    }

                }
            });
        });
    });
    //Delete ServiceSlug
    $('.deleteServiceSlug').click(function () {
        let id = $(this).data('id');
        $('.del').click(function () {
            $.ajax({
                url: '/admin/serviceslug/' + id,
                dataType: 'json',
                type: 'delete',
                success: function ($result) {
                    toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });
    $('.editService').click(function () {
        $('.errorQuantity').hide();
        $('.errorPrice').hide();
        $('.errorCreated_at').hide();
        let id = $(this).data('id');
        $.ajax({
            url: '/admin/service/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function (data) {
                $('.serviceQuantity').val(data.service.quantity);
                $('.servicePrice').val(data.service.price);
                let html1 = '';
                $.each(data.rooms, function (key, value) {
                    if (data.service.idRoom == value['id']) {
                        html1 += '<option value="' + value['id'] + '" selected>';
                        html1 += value['number_room'];
                        html1 += '</option>';
                    } else {
                        html1 += '<option value="' + value['id'] + '">';
                        html1 += value['number_room'];
                        html1 += '</option>';
                    }
                });
                $('.serviceRooms').html(html1);
                let html2 = '';
                $.each(data.serviecSlug, function (key, value) {
                    if (data.service.idServiceslug == value['id']) {
                        html2 += '<option value="' + value['id'] + '" selected>';
                        html2 += value['name'];
                        html2 += '</option>';
                    } else {
                        html2 += '<option value="' + value['id'] + '">';
                        html2 += value['name'];
                        html2 += '</option>';
                    }
                });
                $('.serviceType').html(html2);
                var unixtimestamp1 = data.service.created_at;
                var date1 = new Date(unixtimestamp1);
                var year1 = date1.getFullYear();
                var month1 = date1.getMonth() + 1;
                if (month1 < 10) {
                    month1 = ("0" + month1);
                }
                var day1 = date1.getDate();
                var created_at1 = year1 + "-" + month1 + "-" + day1;
                $('.created_at').val(created_at1);
            }
        });
        $('#updateService').on('submit', function (event) {
            //chặn form submit
            event.preventDefault();
            $.ajax({
                url: '/admin/updateService/' + id,
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                type: 'post',
                success: function (data) {
                    console.log(data);
                    if (data.error == 'true') {
                        if (data.message.quantity) {
                            $('.errorQuantity').show();
                            $('.errorQuantity').text(data.message.quantity[0]);
                            $('.serviceQuantity').val('');
                        }
                        if (data.message.price) {
                            $('.errorPrice').show();
                            $('.errorPrice').text(data.message.price[0]);
                            $('.servicePrice').val('');
                        }
                        if (data.message.created_at) {
                            $('.errorCreated_at').show();
                            $('.errorCreated_at').text(data.message.created_at[0]);
                            $('.created_at').val('');
                        }
                    } else {
                        toastr.success(data.result, 'Thông báo', {timeOut: 5000});
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            });
        });
    });
    $('.deleteService').click(function () {
        let id = $(this).data('id');
        $('.delService').click(function () {
            $.ajax({
                url: '/admin/service/' + id,
                type: 'delete',
                dataType: 'json',
                success: function (data) {
                    toastr.success(data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });

    //Edit ProductType
    $('.editBooking').click(function () {
        $('.error').hide();
        let id = $(this).data('id');
        //Edit
        $.ajax({
            url: '/admin/adminbooking/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function ($result) {
                console.log($result);
                if ($result.status == 1) {
                    $('.ht').attr('selected', 'selected');
                } else {
                    $('.kht').attr('selected', 'selected');
                }
            }
        });
        $('.updateBooking').click(function () {
            let status = $('.status').val();
            $.ajax({
                url: '/admin/adminbooking/' + id,
                data: {
                    status: status
                },
                type: 'put',
                dataType: 'json',
                success: function ($result) {
                    console.log($result);
                    if ($result.error == 'true') {
                        $('.error').show();
                        $('.error').text($result.message.name[0]);
                    } else {
                        toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                        $('#edit').modal('hide');
                        location.reload();
                    }

                }
            });
        });
    });
    //Delete category
    $('.deleteBooking').click(function () {
        let id = $(this).data('id');
        $('.delBooking').click(function () {
            $.ajax({
                url: '/admin/adminbooking/' + id,
                dataType: 'json',
                type: 'delete',
                success: function ($result) {
                    toastr.success($result.success, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });
    $('.editMember').click(function () {
        $('.errorName').hide();
        $('.errorAddress').hide();
        $('.errorCMND').hide();
        $('.errorPhone').hide();
        $('.errorBirthday').hide();
        $('.errorEmail').hide();
        $('.errorAvatar').hide();
        let id = $(this).data('id');
        $.ajax({
            url: '/admin/member/' + id + '/edit',
            dataType: 'json',
            type: 'get',
            success: function (data) {
                $('.name').val(data.member.name);
                $('.address').val(data.member.address);
                $('.CMND').val(data.member.CMND);
                $('.phone').val(data.member.phone);
                $('.email').val(data.member.email);
                $('.imageAva').attr('src', '/img/upload/avatar/' + data.member.avatar);
                if (data.member.status == 0) {
                    $('.ht').attr('selected', 'selected');
                } else {
                    $('.kht').attr('selected', 'selected');
                }
                if (data.member.gender == 1) {
                    $('.nam').attr('selected', 'selected');
                } else {
                    $('.nu').attr('selected', 'selected');
                }
                if (data.member.role == 1) {
                    $('.ad').attr('selected', 'selected');
                } else {
                    $('.vn').attr('selected', 'selected');
                }
                var unixtimestamp = data.member.birthday;
                var date = new Date(unixtimestamp);
                var year = date.getFullYear();
                var month = date.getMonth() + 1;
                if (month < 10) {
                    month = ("0" + month);
                }
                var day = date.getDate();
                if (day < 10) {
                    day = ("0" + day);
                }
                var birthday = year + "-" + month + "-" + day;
                $('.birthday').val(birthday);
            }
        });
        $('#updateUser').on('submit', function (event) {
            //chặn form submit
            event.preventDefault();
            $.ajax({
                url: '/admin/updatemember/' + id,
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                type: 'post',
                success: function (data) {
                    console.log(data);
                    if (data.error == 'true') {
                        if (data.message.avartar) {
                            $('.errorAvatar').show();
                            $('.errorAvatar').text(data.message.avatar[0]);
                            $('.avatar').val('');
                        }
                        if (data.message.name) {
                            $('.errorName').show();
                            $('.errorName').text(data.message.name[0]);
                            $('.name').val('');
                        }
                        if (data.message.CMND) {
                            $('.errorCMND').show();
                            $('.errorCMND').text(data.message.CMND[0]);
                            $('.CMND').val('');
                        }
                        if (data.message.phone) {
                            $('.errorPhone').show();
                            $('.errorPhone').text(data.message.phone[0]);
                            $('.phone').val('');
                        }
                        if (data.message.email) {
                            $('.errorEmail').show();
                            $('.errorEmail').text(data.message.email[0]);
                            $('.email').val('');
                        }
                    } else {
                        toastr.success(data.result, 'Thông báo', {timeOut: 5000});
                        $('#edit').modal('hide');
                        location.reload();
                    }
                }
            });
        });
    });
    $('.deleteMember').click(function () {
        let id = $(this).data('id');
        $('.delMember').click(function () {
            $.ajax({
                url: '/admin/member/' + id,
                dataType: 'json',
                type: 'delete',
                success: function ($data) {
                    toastr.success($data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });
    $('.deleteCustomer').click(function () {
        let id = $(this).data('id');
        $('.delCustomer').click(function () {
            $.ajax({
                url: '/admin/customer/' + id,
                dataType: 'json',
                type: 'delete',
                success: function ($data) {
                    toastr.success($data.result, 'Thông báo', {timeOut: 5000});
                    $('#delete').modal('hide');
                    location.reload();
                }
            });
        });
    });
});




