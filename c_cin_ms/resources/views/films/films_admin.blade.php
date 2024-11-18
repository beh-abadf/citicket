<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\admin_styles.css">
    <link rel="stylesheet" href="css\panel_right.css">
    <link rel="stylesheet" href="css\films_admin.css">
</head>

<body class="flex-column center">
    <div class="div_mn flex-row">
        @include('ui\panel_right')
        <div class="panel-left">
            @if (session('reg_al'))
                <div alert alert-succes>
                    شما قبلا ورود کرده اید
                </div>
            @endif
            <div class='parent'>
                <div class="ch_1 flex-column">
                    <div class="ch_1_1">
                    </div>
                </div>
                <div class="ch_2 flex-column center">
                    جدول فیلم ها
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
                                    نام فیلم
                                </th>
                                <th>
                                    مدت فیلم
                                </th>
                                <th>
                                    کارگردان
                                </th>
                                <th>
                                    نام تهیه کننده
                                </th>
                                <th>
                                    لینک اطلاعات بیشتر
                                </th>
                                <th>
                                    کشور سازنده
                                </th>
                                <th>
                                    زبان فیلم
                                </th>
                                <th>
                                    قیمت بلیت
                                </th>
                                <th>
                                    کد فیلم
                                </th>
                                <th>
                                    لینک ifram-src فیلم
                                </th>
                                <th>
                                    نام تصویر فیلم
                                </th>
                            </tr>
                            @foreach ($data as $item)
                                <tr class="row_1">
                                    <td>
                                        <div class="btn btn-danger"
                                            onclick="window.location.href='./delete-the-film/{{ $item->id }}'">
                                            <img src="icons/trash.svg">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn btn-warning"
                                            onclick="window.location.href='./init-values-of-the-film-edition/{{ $item->id }}'">
                                            <img src="icons\pencil-square.svg">
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->film_name }}
                                    </td>
                                    <td>
                                        {{ $item->running_time }}
                                    </td>
                                    <td>
                                        {{ $item->director_name }}
                                    </td>
                                    <td>
                                        {{ $item->ex_producer }}
                                    </td>
                                    <td>
                                        <a href="{{ $item->more_about }}" style="color: white">
                                            <div class="btn btn-primary">
                                                ...
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $item->country }}
                                    </td>
                                    <td>
                                        {{ $item->language }}
                                    </td>
                                    <td>
                                        {{ $item->price_of_film }}
                                    </td>
                                    <td>
                                        {{ $item->id }}
                                    </td>
                                    <td>
                                        <a href="{{ $item->film_iframe }}" style="color: white">
                                            <div class="btn btn-primary">
                                                ###
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        {{ $item->image_name }}
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