<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\reset_password.css">
</head>

<body>

    <div class="bd_mn flex-column">
        @include('errors/visualize_error')
        <div class="reset-new-password-panel flex-column center">
            <div>
                <h5 style="margin-bottom:80px ">
                    لطفا کد ارسالی را وارد کنید.
                </h5>
            </div>
            <div class="panel_around">
                <div>
                    <form action="reset-password" method="post">
                        @csrf
                        <input type="text" name='sent_code' placeholder=" کد ارسال شده به آدرس ایمیل "
                            value="{{old('sent_code')}}" class="form-control"
                            style="width:300px;background-color:rgba(146, 207, 235, 0.37);"><br>
                        <input type="password" name="new_password" placeholder=" رمز عبور جدید "
                            value="{{old('new_password')}}" class="form-control"
                            style="width:300px;background-color:rgba(146, 207, 235, 0.37);"><br>
                        <input type="password" name="confirmed_password" placeholder=" تکرار رمز عبور جدید "
                            value="{{old('confirmed_password')}}" class="form-control" style="width:300px;
background-color:rgba(146, 207, 235, 0.37);"><br>
                        <button type="submit" class="btn btn-success">
                            بروزرسانی
                        </button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src='js/add_a_item_validation.js'></script>
    <script src="js/jquery.js"></script>

    <body>

</html>