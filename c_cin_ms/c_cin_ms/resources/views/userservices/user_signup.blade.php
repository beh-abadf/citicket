<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css">
    <link href="bootstrap/css/ui.css" rel="stylesheet">
    <link rel="stylesheet" href="css/user_signup.css">
    <link rel="stylesheet" href="css/repetitive.css">
</head>

<body
    style="direction: rtl;
background-image: linear-gradient(70deg, rgb(237, 42, 255), rgb(94, 97, 255));
padding-right:10px;
font-family:vazir;">
    @include('errors/visualize_error')
    <div class="bd_mn center">
        <div class="form_1 center">
            <div>
                <h1 style="margin-bottom:40px ">
                    ثبت نام
                </h1>
            </div>
            <div class="panel_around_form">
                <div>
                    <form action='usersignup' method="post">
                        @csrf
                        <input type="text" placeholder="نام کامل" name="name" value="{{ old('name') }}"
                            class="form-control"><br>
                        <input type="email" placeholder="آدرس ایمیل" name="email" value="{{ old('email') }}"
                            class="form-control"><br>
                        <input type="password" placeholder="رمز عبور" name="pwd" value="{{ old('pwd') }}"
                            class="form-control"><br>
                        <input type="password" placeholder="تکرار رمز عبور" name="pwda" value="{{ old('pwda') }}"
                            class="form-control"><br>
                        <button class="btn btn-danger" onclick="window.location.href='/'">لغو</button>
                        <button type="submit" class="btn btn-success">ثبت</button>ّ
                    </form>
                </div>
            </div>
        </div>
    </div>

    <body>

</html>
