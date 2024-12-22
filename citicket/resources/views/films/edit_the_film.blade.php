<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\ui.css">
    <link rel="stylesheet" href="..\css\common_styles.css">
    <link rel="stylesheet" href="..\css\admin_styles.css">
    <link rel="stylesheet" href="..\css\panel_right.css">
    <link rel="stylesheet" href="..\css\edit_the_film.css">
</head>

<body class="flex-column center">
    <div class="div_mn flex-row">
        @include('ui\panel_right')
        <div class="panel-left flex-column'">
            <div class='parent'>
                <div class="ch_1 flex-column">
                    <div class="ch_1_1">
                    </div>
                </div>
                <div class="ch_2 flex-column center">
                    ویرایش یک فیلم
                </div>
                <div id="message_div" class="mt-2">
                    @include('errors\visualize_error')
                </div>
                <div class="ch_3 flex-column">
                    <div>
                        <div class="edit_the_film_panel flex-row center">
                            <div id="panel_right">
                                <form id="submit_form" action="../update-the-film-information/{{$row->id}}"
                                    method="POST" class="form-control" enctype="multipart/form-data">
                                    @csrf
                                    <label for="name">نام فیلم:</label><br>
                                    <input type="text" placeholder="نام فیلم" name="name" value='{{ $row->film_name }}'
                                        class="form-control"><br>
                                    <label for="duration">مدت زمان:</label><br>
                                    <input type="text" placeholder="مدت زمان" name="duration"
                                        value='{{ $row->running_time }}' class="form-control"><br>
                                    <label for="director">نام کارگردان:</label><br>
                                    <input type="text" placeholder="نام کارگردان" name="director"
                                        value='{{ $row->director_name }}' class="form-control"><br>
                                    <label for="ex_producer">نام تهیه کننده:</label><br>
                                    <input type="text" name="ex_producer" value='{{ $row->ex_producer }}'
                                        class="form-control"><br>
                                    <label for="about">لینک اطلاعات بیشتر:</label><br>
                                    <textarea style="text-align=left;" maxlength="150" name="about" id="" cols="20"
                                        rows="5" placeholder="..."
                                        class="form-control">{{ $row->more_about }}</textarea><br>
                            </div>
                            <div class='form-control' id="panel_left">
                                <label for="cny">کشور سازنده:</label><br>
                                <input type="text" placeholder="کشور سازنده" value='{{ $row->country }}' name="cny"
                                    class="form-control"><br>
                                <label for="language">زبان فیلم:</label><br>
                                <input type="text" placeholder="زبان فیلم" value='{{ $row->language }}' name="language"
                                    class="form-control"><br>
                                <!-- <label for="price">قیمت:</label><br>
<input type="text" placeholder="قیمت" value='{{ $row->price_of_film }}' 
                                name="price" class="form-control"><br>-->
                                <label for="film_poster">تصویر فیلم:</label><br>
                                <input type="file" placeholder="تصویر فیلم" name="film_poster" class="form-control"
                                    accept=".jpg,.jpeg,.png"><br>
                                <label for="film_teaser">
                                    تیزر فیلم:
                                </label>
                                <input type="file" name="film_teaser" class="form-control" accept=".mp4"><br>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="alert alert-primary" style="margin-top: 15px; text-align:center;">
                            در این قسمت سینما مورد نظر برای فیلم را ویرایش کنید.
                        </div>
                    </div>
                    <div>
                        <div style="margin: 10px;
border:1px solid rgb(68, 68, 68);
width:98%;
padding:15px;">
                            جدول سینما برای فیلم:
                        </div>
                        <div class='bootstrap-table-1'>
                            <table class='table table-dark table-striped table-hover'>
                                <tr>
                                    <th>
                                        انتخاب
                                    </th>
                                    <th>
                                        نام سینما
                                    </th>
                                    <th>
                                        استان سینما
                                    </th>
                                    <th>
                                        شهر سینما
                                    </th>
                                    <th>
                                        آدرس
                                    </th>
                                    <th>
                                        نام یا شماره سالن (اختیاری)
                                    </th>
                                    <th>
                                        روز اکران
                                    </th>
                                    <th>
                                        زمان اکران
                                    </th>
                                </tr>
                                @foreach ($cinemas as $cinema)
                                    <tr class="row_1">
                                        <td>
                                            <input type="checkbox" name="check[{{ $cinema->id }}]" value="{{ $cinema->id }}"
                                                class="form-check" style="width:20px; height:20px;">
                                        </td>
                                        <td>
                                            {{ $cinema->cinema_name }}
                                        </td>
                                        <td>
                                            {{ $cinema->province->province_name }}
                                        </td>
                                        <td>
                                            {{ $cinema->city->city_name }}
                                            <input name="cinema_id[{{ $cinema->id }}]" value="{{ $cinema->id }}"
                                                style="background:transparent; width:auto; border:none; color:white;"
                                                hidden>
                                        </td>
                                        <td>
                                            {{ $cinema->address }}
                                        </td>
                                        <td>
                                            <input  multiple type="text"  placeholder="نام سالن یا شماره سالن"
                                                name="salon[{{ $cinema->id }}]" 
                                                class="form-control"
                                                style='margin-bottom:20px; background-color:rgba(193, 235, 255);'><br>
                                        </td>
                                        <td>
                                            <select name="day[{{ $cinema->id }}]" class="form-select" style='margin-bottom:20px;
                                                                    background-color:rgba(193, 235, 255);'>
                                                <option value="شنبه">شنبه</option>
                                                <option value="یکشنبه">یکشنبه</option>
                                                <option value="دوشنبه">دوشنبه</option>
                                                <option value="سه شنبه">سه شنبه</option>
                                                <option value="چهارشنبه">چهارشنبه</option>
                                                <option value="پنجشنبه">پنجشنبه</option>
                                                <option value="جمعه">جمعه</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input multiple type='text' placeholder='زمان اکران'
                                                name='time[{{ $cinema->id }}]' value="{{$cinema->time}}" class='form-control' style='margin-bottom:20px; 
                                                                    background-color:rgba(193, 235, 255);
                                                                    width:130px;height:40px;'><br>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <button style="width: 200px;" type="submit" class="btn btn-success">بروزرسانی
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="..\js\jquery.js"></script>
    <script src="..\js\message_cleaner.js"></script>
</body>

</html>