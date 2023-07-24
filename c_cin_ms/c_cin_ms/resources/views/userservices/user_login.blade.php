<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/ui.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/user_login.css">
    <link rel="stylesheet" href="css/repetitive.css">
</head>

<body  style="direction: rtl;
background-image: linear-gradient(70deg, rgb(237, 42, 255), rgb(94, 97, 255));
padding-right:10px;
font-family:vazir;">
    @include('errors/visualize_error')
    <div class="bd_mn center">
        <div class="form_1 center">
            <div>
                <h1 style="margin-bottom:60px ">
                    ورود
                </h1>
            </div>

            <div class="panel_around_form">
                <div>
                    <form id="form" action="userlogin" method="post" style="padding: 10px;">
                        @csrf
                        <input type="email" placeholder="آدرس ایمیل" name="email" class="form-control mb-3">
                        <input type="password" placeholder="رمز عبور" name="pwd" class="form-control "><br>
                        <button type="reset" class="btn btn-danger" onclick="window.location.href='/'">لغو</button>
                        <button type="submit" class="btn btn-success">ورود</button><br><br>
                        <a href="../usersignup" style="font-size:18px;">هنوز ثبت نام نکرده ام</a><br>
                        <a href="../forgettingpassword" style="font-size:18px;">فراموشی رمز عبور</a><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <body>

</html>
