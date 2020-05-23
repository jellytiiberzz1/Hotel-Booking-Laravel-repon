<base href="{{ asset('') }}">
<div marginheight="0" marginwidth="0" style="background:#f0f0f0">
    <div id="wrapper" style="background-color:#f0f0f0">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="margin:0 auto;width:600px!important;min-width:600px!important" class="container">
            <tbody>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff">
                    <table style="width:580px;border-bottom:1px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td align="left" valign="middle" style="width:500px;height:60px">
                                <a href="#" style="border:0" target="_blank" width="130" height="35" style="display:block;border:0px">
                                    <i class="fad fa-hotel" height="100" width="115" style="display:block;border:0px;float: left;"></i> <b style="float: left;line-height: 100px;color: red;font-size: 20px;">Supportel</b>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff">
                    <table style="width:580px" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:24px;color:#ff3333;text-transform:uppercase;font-weight:bold;padding:25px 10px 15px 10px">
                                Thông báo đặt phòng thành công
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:0 10px 20px 10px;line-height:17px">
                                Chào {{ $booking->name }},
                                <br> Cám ơn bạn đã đặt phòng tại khách sạn SUPPORTEL
                                <br>
                                <br> Đơn đặt phòng của bạn đang
                                <b>được kiểm tra</b>
                                <b>xác nhận</b> (trong vòng 24h)
                                <br> Chúng tôi sẽ sớm thông báo <b>trạng thái đơn đặt phòng</b> trong email tiếp theo.
                                <br> Bạn vui lòng kiểm tra email thường xuyên nhé.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff">
                    <table style="width:580px;border:1px solid #ff3333;border-top:3px solid #ff3333" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td colspan="2" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#666666;padding:10px 10px 20px 15px;line-height:17px">
                                <b>Đơn đặt phòng của bạn #</b>
                                <a href="#" style="color:#ed2324;font-weight:bold;text-decoration:none" target="_blank">{{ $booking->code_order }}
                                </a>
                                <span style="font-size:12px">({{ $booking->created_at }})</span>
                            </td>
                        </tr>

                            <tr>
                                <td align="left" valign="top" style="width:120px;padding-left:15px">
                                    <a href="#_" style="border:0">
                                        <img src="{{asset('img/upload/category')}}{{ '/'.$booking->category->image }}" width="120"
                                             height="120" width="120" style="display:block;border:0px">
                                    </a>
                                </td>
                                <td align="left" valign="top">
                                    <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>

                                        <tr>
                                            <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px">
                                                <b>Tên Khách Sạn</b>
                                            </td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                <a href="#" style="color:#115fff;text-decoration:none" target="_blank">
                                                    Supportel
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px">
                                                <b>Phòng đã đặt</b>
                                            </td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                <a href="#" style="color:#115fff;text-decoration:none" target="_blank">
                                                    {{$booking->Category->name }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px">
                                                <b>Ngày nhận phòng</b>
                                            </td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                <a href="#" style="color:#115fff;text-decoration:none" target="_blank">
                                                    {{$booking->date_from }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px">
                                                <b>Ngày trả phòng</b>
                                            </td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                <a href="#" style="color:#115fff;text-decoration:none" target="_blank">
                                                    {{$booking->date_to }}
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px">
                                                <b>Tổng thanh toán</b>
                                            </td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                {{ number_format($booking->count) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" valign="top" style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px">
                                                <b>Người đặt phòng</b>
                                            </td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">:</td>
                                            <td align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                <b>{{ $booking->name }}</b> - {{ $booking->phone }}
                                                <br>
                                                {{ $booking->address }}
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        <tr>
                            <td colspan="2" align="center" valign="top" style="padding-top:20px;padding-bottom:20px;border-bottom:1px solid #ebebeb">
                                <a href="#" style="border:0px" target="_blank">
                                    <img src="https://i.imgur.com/f92hL68.jpg" height="29" width="191" alt="Chi tiết đặt phòng" style="border:0px">
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="middle" style="background:#ffffff;padding-top:20px">
                    <table style="width:500px" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                        <tr>
                            <td align="center" valign="middle" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">
                                Đây là thư tự động từ hệ thống. Vui lòng không trả lời email này.
                                <br> Nếu có bất kỳ thắc mắc hay cần giúp đỡ, Bạn vui lòng gọi điện hotline : 0702158015<br>
                                <b style="font-family:Arial,Helvetica,sans-serif;font-size:13px;text-decoration:none;font-weight:bold">Trung tâm trợ giúp</b> của chúng tôi tại địa chỉ:
                                <a href="mailto:ducthach0608@gmail.com" style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#0066cc;text-decoration:none;font-weight:bold" target="_blank">
                                   ducthach0608@gmail.com
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
