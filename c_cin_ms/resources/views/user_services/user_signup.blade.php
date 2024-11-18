<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\user_signup.css">
</head>

<body style="
background-image: linear-gradient(70deg, rgb(237, 42, 255), rgb(94, 97, 255));
padding-right:10px;
font-family:vazir;">
    @include('errors\visualize_error')
    <div class="bd_mn flex-row center">
        <div class="form_1 flex-column center">
            <div>
                <h1 style="margin-bottom:40px ">
                    ثبت نام
                </h1>
            </div>
            <div class="panel_around_form flex-column center">
                <div>
                    <form action='../user-signup' method="post" class=" center">
                        @csrf
                        <input type="text" name="name" placeholder=" نام کامل " value="{{ old('name') }}"
                            class="form-control"><br>
                        <input type="email" name="email" placeholder=" آدرس ایمیل " value="{{ old('email') }}"
                            class="form-control"><br>
                        <input type="password" name="password" placeholder=" رمز عبور " value="{{ old('password') }}"
                            class="form-control"><br>
                        <input type="password" name="confirmed_password" placeholder=" تکرار رمز عبور "
                            value="{{ old('confirmed_password') }}" class="form-control"><br>
                        <div class="flex-row center">
                            <button type="submit" class="btn btn-success">
                                ثبت
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <body>

</html>