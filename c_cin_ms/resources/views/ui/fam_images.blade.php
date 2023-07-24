<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/ui.css">
    <link rel="stylesheet" href="../css/fam_images.css">
    <link rel="stylesheet" href="css/panel_right.css">
    <script src="js/jquery.js"></script>
</head>

<body class="bd_mn" style="direction: rtl;">
    <div class="div_mn">
        @include('ui/panel_right');
        <div class="panel-right">
            <div class='parent'>
                <div class="ch_1">
                    <div class="ch_1_1">
                    </div>
                </div>
                <div class="ch_3">
                    تصاویر فیلم های برگزیده
                </div>
                <div class="mt-2">
                    @include('errors/visualize_error')
                </div>
                <div class="ch_4">
                    <div id="message_div" class="mt-2">
                        @include('errors/visualize_error')
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
                        <div class="add_a_film_panel">
                            <div id="fr_lf">
                                <form action="famimages" method="POST" enctype='multipart/form-data'
                                    class="form-control" accept=".jpg, .jpeg, .png">
                                    @csrf
                                    <label for="file1">تصویر اول:</label><br>
                                    <input type="file" value="{{ old('file1') }}" style="color:black;"
                                        placeholder=":تصویر اول" name="file1" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <label for="file2">تصویر دوم:</label><br>
                                    <input type="file" value="{{ old('file2') }}" style="color:black;"
                                        placeholder="تصویر دوم" name="file2" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <label for="file3">تصویر سوم:</label><br>
                                    <input type="file" value="{{ old('file3') }}" style="color:black;"
                                        placeholder="تصویر سوم" name="file3" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <label for="file4">تصویر چهارم:</label><br>
                                    <input type="file" value="{{ old('file4') }}"style="color:black;"
                                        placeholder="تصویر چهارم" name="file4" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <label for="file5">تصویر پنجم:</label><br>
                                    <input type="file" value="{{ old('file5') }}" ّstyle="color:black;"
                                        placeholder="تصویر پنجم" name="file5" class="form-control"
                                        accept=".jpg, .jpeg, .png"><br>
                                    <button type="submit" class="btn btn-success">ثبت</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <script src="js/message_cleaner.js"></script>
</body>

</html>
