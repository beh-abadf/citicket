<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\ui.css">
    <link rel="stylesheet" href="css\common_styles.css">
    <link rel="stylesheet" href="css\admin_styles.css">
    <link rel="stylesheet" href="css\panel_right.css">
    <link rel="stylesheet" href="css\fam_images.css">
</head>

<body class="flex-column center">
    <div class="div_mn flex-row">
        @include('ui\panel_right');
        <div class="panel-left">
            <div class='parent'>
                <div class="ch_1 flex-column">
                    <div class="ch_1_1">
                    </div>
                </div>
                <div class="ch_2 flex-column center">
                    انتخاب تصاویر فیلم‌های برگزیده
                </div>
                <div class="ch_3 flex-column">
                    <div id="message_div" class="mt-2">
                        @include('errors\visualize_error')
                    </div>
                    <div id="message_div">
                        @if (Session::has('mess'))
                            <div style="margin-top:10px;" class="alert alert-success"
                                style="text-align: right; font-size:18px;">
                                {{ session('mess') }}
                            </div>
                        @endif
                    </div>
                    <div>
                        <div class="add_images_panel center">
                            <div id="panel_right">
                                <form action="famimages" method="POST" enctype='multipart/form-data'
                                    class="form-control" accept=".jpg, .jpeg, .png">
                                    @csrf
                                    <label for="file1">
                                        تصویر اول:
                                    </label><br>
                                    <input type="file" value="{{ old('file1') }}" style="color:black;" name="file1"
                                        class="form-control" accept=".jpg, .jpeg, .png"><br>
                                    <label for="file2">
                                        تصویر دوم:
                                    </label><br>
                                    <input type="file" value="{{ old('file2') }}" style="color:black;" name="file2"
                                        class="form-control" accept=".jpg,.jpeg,.png"><br>
                                    <label for="file3">
                                        تصویر سوم:
                                    </label><br>
                                    <input type="file" value="{{ old('file3') }}" style="color:black;" name="file3"
                                        class="form-control" accept=".jpg,.jpeg,.png"><br>
                                    <label for="file4">
                                        تصویر چهارم:
                                    </label><br>
                                    <input type="file" value="{{ old('file4') }}" style="color:black;" name="file4"
                                        class="form-control" accept=".jpg,.jpeg,.png"><br>
                                    <label for="file5">
                                        تصویر پنجم:
                                    </label><br>
                                    <input type="file" value="{{ old('file5') }}" style="color:black;" name="file5"
                                        class="form-control" accept=".jpg,.jpeg,.png"><br>
                                    <button type="submit" class="btn btn-success">
                                        ثبت
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="js\message_cleaner.js"></script>
    <script src="js\jquery.js"></script>
</body>

</html>