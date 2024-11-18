<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\admin_styles.css">
    <link rel="stylesheet" href="css\panel_right.css">
    <link rel="stylesheet" href="css\places_admin.css">
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
                    جدول مکان ها
                </div>
                <div class="ch_3 flex-column">
                    <div class='bootstrap-table-1'>
                        <table class='table table-dark table-striped table-hover'>
                            <tr>
                                <th>
                                </th>
                                <th>
                                </th>
                                <th>
                                    نام مکان
                                </th>
                                <th>
                                    استان مکان
                                </th>
                                <th>
                                    شهرستان مکان
                                </th>
                                <th>
                                    تصویر مکان
                                </th>
                                <th>
                                    ظرفیت باقی مانده
                                </th>
                                <th>
                                    آدرس گوگل مپ
                                </th>
                                <th>
                                    آدرس
                                </th>
                                <th>
                                    شناسه مکان
                                </th>
                            </tr>
                            @foreach ($places as $item)
                                <tr class="row_1">
                                    <td>
                                        <div class="btn btn-danger"
                                            onclick="window.location.href='./delete-a-cinema/{{ $item['id'] }}'" >
                                            <img src="icons\trash.svg">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn  btn-warning"
                                            onclick="window.location.href='./init-values-of-the-cinema-edition/{{ $item['id'] }}'">
                                            <img src="icons\pencil-square.svg">
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item['place_name'] }}
                                    </td>
                                    <td>
                                        {{ $item->_province['province_name'] }}
                                    </td>
                                    <td>
                                        {{ $item->_city['city_name'] }}
                                    </td>
                                    <td>
                                        <img src="storage\places_images\{{ $item['place_image_name'] }}" alt="تصویر ندارد."
                                            width="100" height="100">
                                    </td>
                                    <td>
                                        {{ $item['capacity'] . ' نفر' }}
                                    </td>
                                    <td>
                                        <a href="{{ $item['google_map_iframe'] }}">
                                            <div class="btn btn-primary">
                                                ...
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <textarea style="outline:none;
                                            border-radius:5px;
                                            border:none;
                                            resize:none;
                                            color:white;
                                            background-color:rgba(240, 248, 255, 0)" readonly cols="20" rows="3">
                                                {{ $item['address'] }}
                                            </textarea>
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