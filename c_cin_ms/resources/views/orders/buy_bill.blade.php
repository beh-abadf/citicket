<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\ui.css">
    <link rel="stylesheet" href="..\css\common_styles.css">
    <link rel="stylesheet" href="..\css\user_styles.css">
    <link rel="stylesheet" href="..\css\buy_bill.css">
</head>

<body class="flex-column center">
    <div class='parent center'>
        <div class="ch_1 flex-column center">
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
        <div class="ch_3" style="background-image: url('../storage/films_images/{{ $data[0]->image_name }}');
        background-size:contain;
        align-self:center;">
            <div class="d1">
            </div>
            <div class="d2">
                <div class="d2_1">
                </div>
                <div class="d2_2">
                </div>
                <div class="d2_3">
                </div>
            </div>
            <div class="d3">
            </div>
        </div>
        <div class="ch_4 flex-row">
            <div class="ch_4_1 flex-row">
            </div>
            <div class="ch_4_2">
                <ul type='none'>
                    <li>
                        <p style="color: white;">نام فیلم: <span style="color: white;">
                                {{ $data[0]->film_name }}
                            </span>
                        </p>
                    </li>
                    <li>
                        <p style="color: white;">نام کارگردان: <span style="color: white;">
                                {{ $data[0]->director_name }}
                            </span></p>
                    </li>
                    <li>
                        <p style="color: white;">نام تهیه کننده: <span style="color: white;">
                                {{ $data[0]->ex_producer }}
                            </span></p>
                    </li>
                    <li>
                        <p style="color: white;">مدت زمان: <span style="color: white;">
                                {{ $data[0]->running_time }}
                        </p>
                    </li>
                    <li>
                        <p style="color: white;">کشور سازنده: <span style="color: white;">
                                {{ $data[0]->country }}
                        </p>
                    </li>
                    <li>
                        <p style="color: white;">زبان اصلی فیلم: <span style="color: white;">
                                {{ $data[0]->language }}
                        </p>
                    </li>
                    <li>
                        <p style="color: white;">تعداد بلیت فروخته شده: <span style="color: white;"></span></p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ch_5 flex-column center">
            <iframe src={{ url($data[0]->film_iframe) }} allowFullScreen="true" webkitallowfullscreen="true"
                mozallowfullscreen="true" width='1000' height="500"></iframe>
        </div>
        <div class="ch_5,5 flex-column center">
            @foreach ($places as $place)
                <div class="position">
                    <div class="_1 center">
                        <img src="../storage/places_images/{{ $place->place_image_name }}" width="100">
                    </div>
                    <div class="_2">
                        <p>
                            نام سینما:
                            {{ $place->place_name }}
                        </p>
                        <p>
                            آدرس:
                            {{ $place->_province->province_name }},
                            {{ $place->_city->city_name }},
                            {{ $place->address }}
                        </p>
                        <p>
                            ظرفیت باقی ماند:
                            {{ $place->capacity }}
                        </p>
                    </div>
                    <div class="_3">
                        <div style='width: 200px;' class='btn btn-success'
                            onclick="window.location.href = '../register-an-order/{{ $place->id }}'<?php    session()->put('place_id', $place->id); ?>">
                            دریافت بلیط
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ch_6 flex-column center" style="margin-top:60px;">
            <form action='../comment' id="form" method="POST">
                @csrf
                <label style="color-size: 20px" for="">لطفا نظر بدهید:
                </label><br>
                <input required style="background-color:rgb(228, 228, 228)" class="form-control" type="text" name="name"
                    placeholder="نام شما"><br>
                <textarea required="required" style="background-color:rgb(228, 228, 228)" class="form-control"
                    name="comment" cols="100" rows="5" maxlength="300" placeholder=" متن را اینجا بنویسید... "></textarea>
                <button class="btn btn-success mt-2" type="submit">
                    ارسال
                </button>
            </form>
            <div id="comment_box" style="text-align:right;">
                @foreach ($comments_r as $comment)
                    <label style="color:white;" for="comment_c">
                        {{ $comment->user_name }}:
                    </label><br>
                    <textarea wrap="virtual" readonly cols="85" name="comment_c"
                        rows="4">{{ $comment->body }}</textarea><br><br>
                @endforeach
            </div><br>
        </div>
        <div class="ch_7">
            @include('ui/footer')
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/comment.js"></script>
</body>

</html>