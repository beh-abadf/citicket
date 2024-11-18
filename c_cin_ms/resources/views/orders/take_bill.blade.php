<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\ui.css">
    <link rel="stylesheet" href="..\css\common_styles.css">
    <link rel="stylesheet" href="..\css\user_styles.css">
    <link rel="stylesheet" href="..\css\take_bill.css">
</head>

<body>
    <div class="parent flex-column center">
        <div class="flex-column center">
            <div id="bill_panel" class="flex-column center">
                <h4>
                    بلیت ورود به سینما
                </h4>
                <div class="pdf_c flex-row center">
                    <p>شماره شناسایی: </p>
                    <p>
                        {{ $order[0]->who_ordered_id }}
                    </p>
                </div>
                <div class="pdf_c flex-row center">
                    <p>نام مشتری: </p>
                    <p>
                        {{ $order[0]->who_ordered_name }}
                    </p>
                </div>
                <div class="pdf_c flex-row center">
                    <p>نام فیلم: </p>
                    <p>
                        {{ $order[0]->order_name }}
                    </p>
                </div>
                <div class="pdf_c flex-row  center">
                    <p>نام مکان: </p>
                    <p>
                        {{ $place[0]->place_name }}
                    </p>
                </div>
                <div class="pdf_c flex-row  center">
                    <p>آدرس: </p>
                    <p>
                        {{ $place[0]->_province->province_name }},
                        {{ $place[0]->_city->city_name }},
                        {{ $place[0]->address }}
                    </p>
                </div>
                <div class="pdf_c flex-row  center">
                    <p>سالن: </p>
                    <p>
                        {{ $salon }}
                    </p>
                </div>
                <div class="pdf_c flex-row  center">
                    <p>روز اکران: </p>
                    <p>
                        {{ $day }}
                    </p>
                </div>
                <div class="pdf_c flex-row  center">
                    <p>زمان اکران: </p>
                    <p>
                        {{ $time }}
                    </p>
                </div>
                <div class="pdf_c flex-row  center">
                    <p>تاریخ ثبت سفارش: </p>
                    <p>
                        {{ $order[0]->date_created }}
                    </p>
                </div>
                <div class="pdf_c flex-row  center">
                    <P>روز ثبت سفارش: </P>
                    <p>
                        {{ $order[0]->day_created }}
                    </p>
                </div>
                <div class="pdf_c flex-row  center">
                    <p>زمان ثبت سفارش: </p>
                    <p>
                        {{ $order[0]->time_created }}
                    </p>
                </div>
                <!-- <div id="pdf_butt" class="flex-row center">
                    <button class="btn btn-primary" onclick="window.location.href='../generate-pdf'">
                        چاپ pdf
                    </button>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>