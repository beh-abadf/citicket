<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\user_styles.css">
    <link rel="stylesheet" href="css\news_user.css">
</head>

<body class="flex-row">
    <div class='parent flex-column '>
        <div class="ch_1 flex-column center">
            <div class="ch_1_1">
                @include('ui\head_page_names')
            </div>
        </div>
        <div class="ch_2 flex-column center">
            <?php
$index = $data_index - 1;
            ?>
            @while ($rows >= 0)
                        <?php
                if ($rows != 0) {
                    $counter = 4;
                } else {
                    $counter = $box_numbers;
                }
                                        ?>
                        <ul class="films_row flex-row center" type="none">
                            @while ($counter > 0)
                                        <li class="crd flex-column center">
                                            <div class="d1 flex-column">
                                                <img src="storage\news_images\{{ $data[$index]['news_image_name'] }}">
                                            </div>
                                            <div class="d2">
                                                <div class="d2_1">
                                                    <p>
                                                        {{ $data[$index]['news'] }}
                                                    </p>
                                                </div>
                                                <div style="color: black; 
                                                                                back-color:white;
                                                                                font-size:12px;">
                                                    <p>
                                                        تاریخ ثبت:
                                                        {{ $data[$index]['date_created'] }}
                                                        زمان ثبت:
                                                        {{ $data[$index]['time_created'] }}
                                                    </p>
                                                    <p>
                                                        تاریخ بروزرسانی:
                                                        {{ $data[$index]['date_updated'] == null ? '...' : $data[$index]['date_updated'] }}
                                                        زمان بروزرسانی:
                                                        {{ $data[$index]['time_updated'] == null ? '...' : $data[$index]['time_updated'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <?php        $counter = $counter - 1;
                                $index = $index - 1;
                                                                        ?>
                            @endwhile
                        </ul>
                        <?php    $rows = $rows - 1; ?>
                        <br><br>
            @endwhile
        </div>
        <div class="ch_3 flex-row center">
            @include('ui\footer')
        </div>
    </div>
    <script src="js\jquery.js"></script>
</body>

</html>