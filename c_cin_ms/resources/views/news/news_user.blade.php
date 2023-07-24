<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/news_user.css">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/repetitive.css">
</head>

<body class="mn" style="direction: rtl;">
    <div class='parent'>
        <div class="ch_1">
            <div class="ch_1_1">
                @include('ui/head_page_names')
            </div>
        </div>
        <div>
            @if (session()->has('reg_al'))
                <div class="alert alert-success m-2 ">
                    {{ session('reg_al') }}
                </div>
            @endif
        </div>
        <div class="ch_4">
            <?php
            $index = $data_index - 1;
            ?>
            @while ($rows >= 0)
                <?php
                if ($rows != 0) {
                    $counter = 3;
                } else {
                    $counter = $box_numbers;
                }
                ?>
                <ul class="films_row" type="none">
                    @while ($counter > 0)
                        <li class="crd">
                            <div class="d1">
                                <img src="storage/news_images/{{ $data[$index]['news_images'] }}">
                            </div>
                            <div class="d2">
                                <div class="d2_1">
                                    <p>
                                        {{ $data[$index]['news'] }}
                                    </p>
                                </div>
                                <div
                                    style="color: black; 
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
                        <?php $counter = $counter - 1;
                        $index = $index - 1;
                        ?>
                    @endwhile
                </ul>
                <?php $rows = $rows - 1; ?>
                <br><br>
            @endwhile
        </div>
        <div class="ch_5">
            @include('ui/footer')
        </div>
    </div>
    <script src="js/comment.js"></script>
</body>

</html>
