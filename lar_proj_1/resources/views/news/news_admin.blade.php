<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\admin_styles.css">
    <link rel="stylesheet" href="css\panel_right.css">
    <link rel="stylesheet" href="css\news_admin.css">

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
                    جدول اخبار
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
                                    متن خبر
                                </th>
                                <th>
                                    تصویر
                                </th>
                                <th>
                                    تاریخ ثبت
                                </th>
                                <th>
                                    روز ثبت
                                </th>
                                <th>
                                    زمان ثبت
                                </th>
                                <th>
                                    تاریخ ویرایش
                                </th>
                                <th>
                                    روز ویرایش
                                </th>
                                <th>
                                    زمان ویرایش
                                </th>
                            </tr>
                            @foreach ($news as $item)
                                <tr class="row_1">
                                    <td>
                                        <div class="btn btn-danger"
                                            onclick="window.location.href='/delete-news/{{ $item['id'] }}'">
                                            <img src="icons\trash.svg">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn  btn-warning"
                                            onclick="window.location.href='../edit-news/{{ $item['id'] }}'">
                                            <img src="icons\pencil-square.svg">
                                        </div>
                                    </td>
                                    <td>
                                        <textarea style="outline:none;                                    
                                                    background:transparent;
                                                    color:white;
                                                    border:none;
                                                    text-align: right;
                                                    resize:none;       " readonly cols="40"
                                            rows="3">{{ $item['news'] }}</textarea>
                                    </td>
                                    <td>
                                        <img src="storage\news_images\{{ $item['news_image_name'] }}" alt="تصویر ندارد."
                                            width="100" height="100">
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
                                        {{ $item['date_updated'] }}
                                    </td>
                                    <td>
                                        {{ $item['day_updated'] }}
                                    </td>
                                    <td>
                                        {{ $item['time_updated'] }}
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