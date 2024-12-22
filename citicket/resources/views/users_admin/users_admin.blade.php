<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\admin_styles.css">
    <link rel="stylesheet" href="css\panel_right.css">
    <link rel="stylesheet" href="css\users_admin.css">
</head>

<body class="flex-column center">
    <div class="div_mn flex-row">
        @include('ui\panel_right')
        <div class="panel-left">
            <div class='parent'>
                <div class="ch_1 flex-column">
                    <div class="ch_1_1">

                    </div>
                </div>
                <div class="ch_2 flex-column center">
                    جدول کاربران
                </div>
                <div class="ch_3 flex-column">
                    <div class='bootstrap-table-1'>
                        <table class='table table-dark table-striped table-hover'>
                            <tr>
                                <th>

                                </th>
                                <th>
                                    نام
                                </th>
                                <th>
                                    آدرس ایمیل
                                </th>
                                <th>
                                    تاریخ ثبت نام
                                </th>
                                <th>
                                    روز ثبت نام
                                </th>
                                <th>
                                    زمان ثبت نام
                                </th>
                                <th>
                                    تاریخ آخرین ورود
                                </th>
                                <th>
                                    روز آخرین ورود
                                </th>
                                <th>
                                    زمان آخرین ورود
                                </th>
                                <th>
                                    شماره شناسایی
                                </th>
                            </tr>
                            @foreach ($users as $item)
                                <tr class="row_1">
                                    <td>
                                        <button class="btn btn-danger "
                                            onclick="window.location.href='../delete-a-user/{{ $item['id'] }}'">
                                            <img src="icons\person-dash.svg" alt="بیرون کردن حذف اطلاعات کاربر">
                                        </button>
                                    </td>
                                    <td>
                                        {{ $item['name'] }}
                                    </td>
                                    <td>
                                        {{ $item['email'] }}
                                    </td>
                                    <td>
                                        {{ $item['date_registered'] }}
                                    </td>
                                    <td>
                                        {{ $item['day_registered'] }}
                                    </td>
                                    <td>
                                        {{ $item['time_registered'] }}
                                    </td>
                                    <td>
                                        {{ $item['date_entered'] }}
                                    </td>
                                    <td>
                                        {{ $item['day_entered'] }}
                                    </td>
                                    <td>
                                        {{ $item['time_entered'] }}
                                    </td>
                                    <td>
                                        {{ $item['id'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>