<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\user_login.css">
</head>

<body style="
background-image: linear-gradient(70deg, rgb(237, 42, 255), rgb(94, 97, 255));
padding-right:10px;
font-family:vazir;">
    @include('errors\visualize_error')
    @if (session()->has('entered_alert'))
        <div id="message_div" class="alert alert-success m-2 ">
            {{ session('entered_alert') }}
        </div>
    @endif
    @if (session()->has('success_change_alert'))
        <div id="message_div" class="alert alert-success m-2 ">
            {{ session('success_change_alert') }}
        </div>
    @endif
    <div class="bd_mn flex-row center">
        <div class="form_1 flex-column center">
            <div>
                <h1 style="margin-bottom:60px ">
                    ورود
                </h1>
            </div>
            <div class="panel_around_form flex-column center">
                <div>
                    <form id="form" action="../user-login" method="post" style="padding: 10px;">
                        @csrf
                        <input name="email" type="email" placeholder=" آدرس ایمیل " value="{{ old('email') }}"
                            class="form-control mb-3">
                        <input name="password" type="password" placeholder=" رمز عبور " value="{{ old('password') }}"
                            class="form-control mb-3"><br>
                        <div class=" flex-row center">
                            <button type="submit" class="btn btn-success">
                                ورود
                            </button>
                        </div><br>
                        <div class="flex-column center">
                            <a href="../user-signup" style="font-size:18px;">
                                هنوز ثبت نام نکرده ام
                            </a>
                            <a href="../forgotten-password-controller-page" style="font-size:18px;">
                                فراموشی رمز عبور
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js\jquery.js"></script>
    <script src="js\message_cleaner.js"></script>

    <body>

</html>