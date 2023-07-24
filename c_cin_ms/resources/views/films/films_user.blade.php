<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/films_user.css">
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
        <div class="ch_2">
            @if (session()->has('reg_al'))
                <div class="alert alert-success m-2 ">
                    {{ session('reg_al') }}
                </div>
            @endif
        </div>
        <div class="ch_3">
            <h2 style="align-self:flex-start;padding-right:40px;padding-top:20px;color:white">
                فیلم های برگزیده: </h2>
            <span class="slider" style="border-radius: 30px;">
                <span class="image">
                    <img class="pa_img" src='storage/best_images/{{ $b_i[2] }}' style="border-radius: 30px;"
                        width="auto" height="auto">
                </span>
                <span class="image">
                    <img class="pa_img" src='storage/best_images/{{ $b_i[3] }}' style="border-radius: 30px;">
                </span>
                <span class="image">
                    <img class="pa_img" src='storage/best_images/{{ $b_i[4] }}' style="border-radius: 30px;">
                </span>
                <span class="image">
                    <img class="pa_img" src='storage/best_images/{{ $b_i[5] }}' style="border-radius: 30px;">
                </span>
            </span>
            <div>
                <div class="alert alert-primary" style="margin-top: 15px;
                width:1000px">
                    در این قسمت یک فیلم را انتخاب نمایید و برای جزئیات بیشتر روی آن کلیک نمایید.
                </div>
            </div>
        </div>
        <div class="ch_4">
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
                <ul class="films_row" type="none">
                    @while ($counter > 0)
                        <li class="crd"
                         onclick="window.location.href='buybill/{{ $data[$index]['id'] }}<?php session($data[$index]['id'],'film_id')?>'"
                         style="border-radius: 10px;"
                         >
                            @include('ui/cards')
                        </li>
                        <?php $counter = $counter - 1;
                        $index = $index - 1; ?>
                    @endwhile
                </ul>
                <?php $rows = $rows - 1; ?>
            @endwhile
        </div>
        <div class="ch_5">
            @include('ui/footer')
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>

</html>
