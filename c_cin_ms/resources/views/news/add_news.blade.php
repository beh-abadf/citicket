<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\admin_styles.css">
    <link rel="stylesheet" href="css\panel_right.css">
    <link rel="stylesheet" href="css\add_news.css">
</head>

<body>
    <div class="div_mn flex-row">
        @include('ui\panel_right')
        <div class="panel-left">
            <div class='parent flex-column'>
                <div class="ch_1 flex-column">
                </div>
                <div class="ch_2 flex-column center">
                    خبر جدید
                </div>
                <div class="mt-2">
                    @include('errors\visualize_error')
                </div>
                <div class="ch_3 flex-row center">
                    <div class="ch_3_1 flex-column center">
                        <div class="add_news_panel flex-row center">
                            <div id="fr_lf">
                                <form action="add-news" method="POST" class="form-control" enctype="multipart/form-data">
                                    @csrf
                                    <label for="news_file">
                                        برای خبر یک عکس برگزیده انتخاب کنید:
                                    </label><br>
                                    <input type="file" name="file_" class="form-control"><br>
                                    <label for="news">
                                        خبر را اینجا بنویسید:
                                    </label>
                                    <div id="advanced_textarea">
                                        <div id="txt_ar_options" class="flex-row">
                                            <select name="" id="font_family_selector" class="form-control">
                                                <option disabled selected>
                                                    نوع فونت
                                                </option>
                                                <option value="Vazir">
                                                    Vazir
                                                </option>
                                                <option value="Shabnam">
                                                    Shabnam
                                                </option>
                                                <option value="IranianSans">
                                                    Iranian Sans
                                                </option>
                                            </select>
                                            <select name="" id="font_size_selector" class="form-control">
                                                <option disabled selected>
                                                    اندازه فونت
                                                </option>
                                                <option value="12px">
                                                    12px
                                                </option>
                                                <option value="14px">
                                                    14px
                                                </option>
                                                <option value="16px">
                                                    16px
                                                </option>
                                                <option value="18px">
                                                    18px
                                                </option>
                                                <option value="20px">
                                                    20px
                                                </option>
                                                <option value="22px">
                                                    22px
                                                </option>
                                                <option value="24px">
                                                    24px
                                                </option>
                                                <option value="26px">
                                                    26px
                                                </option>
                                                <option value="28px">
                                                    28px
                                                </option>
                                                <option value="30px">
                                                    30px
                                                </option>
                                                <option value="32px">
                                                    32px
                                                </option>
                                            </select>
                                        </div>
                                        <div id="txt_ar_main">
                                            <textarea name="news" id="textarea_1" placeholder=" متن خبر ..." cols="30"
                                                rows="10" autofocus class="form-control">{{ old('news') }}</textarea>
                                        </div><br>
                                        <button style="width: 200px;" type="submit" class="btn btn-success">
                                            ثبت
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js\jquery.js"></script>
    <script src="js\txt_edt_opt.js"></script>
</body>

</html>