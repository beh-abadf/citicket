<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\user_styles.css">
    <link rel="stylesheet" href="css\films_user.css">
</head>

<body class="flex-row">
    <div class='parent flex-column'>
        <div class="ch_1 flex-column center">
            <div class="ch_1_1">
                @include('ui\head_page_names')
            </div>
        </div>
        <div class="ch_3 flex-column center">
            <h2 style="align-self:flex-start;padding-right:40px;padding-top:20px;color:white">
                فیلم های برگزیده: </h2>
            <div class="flex-row center" style="border-radius: 30px;">
                <div class="image">
                    <img class="pa_img" src='storage\best_images\{{ $b_i[2] }}' style="border-radius: 20px;"
                        width="auto" height="280px">
                </div>
                <div class="image">
                    <img class="pa_img" src='storage\best_images\{{ $b_i[3] }}' style="border-radius: 20px;"
                    width="auto" height="280px">
                </div>
                <div class="image">
                    <img class="pa_img" src='storage\best_images\{{ $b_i[4] }}' style="border-radius: 20px;"
                    width="auto" height="280px">
                </div>
                <div class="image">
                    <img class="pa_img" src='storage\best_images\{{ $b_i[6] }}' style="border-radius: 20px;"
                    width="auto" height="280px">
                </div>
                <div class="image">
                    <img class="pa_img" src='storage\best_images\{{ $b_i[5] }}' style="border-radius: 20px;"
                    width="auto" height="280px">
                </div>
            </div>
            <div>
                <div class="alert alert-primary" style="margin-top: 15px;
                width:1000px">
                    در این قسمت یک فیلم را انتخاب نمایید و برای جزئیات بیشتر روی آن کلیک نمایید.
                </div>
            </div>
        </div>
        <div class="ch_4 flex-column">
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
                                        <li class="crd flex-column center "
                                            onclick="window.location.href='buy-ticket/{{ $data[$index]['id'] }}<?php        session($data[$index]['id'], 'film_id')?>'"
                                            style="border-radius: 10px;">
                                            @include('ui\cards')
                                        </li>
                                        <?php        $counter = $counter - 1;
                                $index = $index - 1; ?>
                            @endwhile
                        </ul>
                        <?php    $rows = $rows - 1; ?>
            @endwhile
        </div>
        <div class="ch_5 flex-row center">
            @include('ui\footer')
        </div>
    </div>

    <script src="js\jquery.js"></script>
    <script src="js\bootstrap.min.js"></script>


</body>

</html>