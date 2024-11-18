<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\ui.css">
    <link rel="stylesheet" href="..\css\common_styles.css">
    <link rel="stylesheet" href="..\css\admin_styles.css">
    <link rel="stylesheet" href="..\css\panel_right.css">
    <link rel="stylesheet" href="..\css\add_a_place.css">
</head>

<body class="flex-column center">
    <div class="div_mn flex-row">
        @include('ui\panel_right')
        <div class="panel-left">
            <div class='parent'>
                <div class="ch_1 flex-column">
                    <div class="ch_1_1">
                    </div>
                </div>
                <div class="ch_2 flex-column center">
                    ویرایش مکان
                </div>
                <div class="mt-2">
                    @include('errors/visualize_error')
                </div>
                <div class="ch_3 flex-row center">
                    <div class="ch_3_1 flex-column center">
                        <div class="add_a_place_panel">
                            <div id="fr_lf">
                                <form action="../update-the-cinema-information/{{$place->id}}" method="POST" class="form-control"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="name">نام مکان:</label>
                                    <input type="text" placeholder="نام مکان" name="name"
                                        value="{{ $place->place_name }}" class="form-control"><br>
                                    <label for="province">استان محل مکان:</label>
                                    <select id="province_selection" name="province" class="form-select"
                                        style='margin-bottom:20px; background-color:rgba(193, 235, 255);'>
                                        @foreach ($provinces as $item)
                                            <option value={{ $item->id }}>{{ $item->province_name }}</option>
                                        @endforeach
                                    </select><br>
                                    <label for="city">شهر محل مکان:</label>
                                    <select id="city_selection" name="city" class="form-select"
                                        style='margin-bottom:20px; background-color:rgba(193, 235, 255);'>
                                    </select><br>
                                    <label for="address">آدرس دقیق:</label>
                                    <textarea style="text-align=left;" name="address" id="" cols="30" rows="6"
                                        placeholder="آدرس" class="form-control">{{ $place->address }}</textarea><br>
                            </div>
                            <div class='form-control' id="fr_rg">
                                <label for="map">iframe گوگل مپ (اختیاری):</label>
                                <a href="https://www.radcom.co/fa/kb/5413/" style="font-family: vazir;">اطلاعات
                                    بیشتر...</a><br>
                                <textarea style="text-align=left;" name="map" cols="30" rows="6"
                                    placeholder="<iframe src=https://www.google.com/map..></iframe>"
                                    class="form-control">{{ $place->google_map_iframe }}</textarea><br>
                                <label for="capacity">حداکثر ظرفیت:</label>
                                <input type="text" placeholder="حداکثر ظرفیت" name="capacity" class="form-control"
                                    value="{{ $place->capacity }}"><br>
                                <label for="image_file">تصویر مکان :</label>
                                <input type="file" placeholder="(اختیاری) تصویر مکان" name="image_file"
                                    class="form-control"><br><br><br>
                                <button style="width: 200px;" type="submit" class="btn btn-success">بروزرسانی
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/fetch_place_records_2.js"></script>
</body>

</html>