<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\forgotten_password_controller_page.css">
</head>

<body>ّ
    <div class="bd_mn flex-column">
        @include('errors\visualize_error')
        <div class="email_sender_panel flex-column center">
            <div>
                <h5 style="margin-bottom:80px ">
                    لطفا آدرس ایمیل خود را وارد کنید.
                </h5>
            </div>
            <div class="panel_around">
                <div>
                    <form action="../forgotten-password-controller-page" class="flex-column center" method="post">
                        @csrf
                        <input type="email" placeholder=" آدرس ایمیل " name="email" class="form-control"
                            style="width:300px;background-color:rgba(146, 207, 235, 0.37);"><br>
                        <button type="submit" class="btn btn-success">
                            فرستادن پیام
                        </button><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js\jquery.js"></script>
    <script src='js\add_item_validation.js'></script>
</body>

</html>