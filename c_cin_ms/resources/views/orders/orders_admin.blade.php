<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\admin_styles.css">
    <link rel="stylesheet" href="css\panel_right.css">
    <link rel="stylesheet" href="css\orders_admin.css">
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
                    سفارشات
                </div>
                <div class="ch_3 flex-column">
                    <div class='bootstrap-table-1'>
                        <table class='table table-dark table-striped table-hover'>
                            <tr>
                                <th>

                                </th>
                                <th>
                                    نام مشتری
                                </th>
                                <th>
                                    کد مشتری
                                </th>
                                <th>
                                    نام فیلم
                                </th>
                                <th>
                                    کد فیلم
                                </th>
                                <th>
                                    تاریخ خرید
                                </th>
                                <th>
                                    روز خرید
                                </th>
                                <th>
                                    زمان خرید
                                </th>
                                <th>
                                    کد سفارش
                                </th>
                            </tr>
                            @foreach ($orders as $item)
                                <tr class="row_1">
                                    <td>
                                        <button class="btn btn-danger "
                                            onclick="window.location.href='./delete-the-order/{{ $item->id }}'">
                                            <img src="icons\trash.svg">
                                        </button>
                                    </td>
                                    <td>
                                        {{ $item['who_ordered_name'] }}
                                    </td>
                                    <td>
                                        {{ $item['who_ordered_id'] }}
                                    </td>

                                    <td>
                                        {{ $item['order_name'] }}
                                    </td>
                                    <td>
                                        {{ $item['film_id'] }}
                                    </td>
                                    <td>
                                        {{ $item['date_created'] }}
                                    </td>
                                    <td>
                                        {{ $item['day_created'] }}
                                    </td>
                                    <td>
                                        {{ $item['time_created'] }}
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