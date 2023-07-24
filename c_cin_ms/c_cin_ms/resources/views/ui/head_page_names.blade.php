<html lang="en" class="full-height">

<!--Main Navigation-->
<header>

    <nav class="navbar navbar-expand-lg navbar-dark black">
        <div class="container">
            <a class="navbar-brand" href="../filmsadmin"><strong>عنوان ها
                </strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <button class="button-free" onclick="window.location.href='../filmsadmin'">
                            ادمین
                        </button>
                    </li>
                    <li>
                        <button class="button-free" onclick="window.location.href='{{ route('login') }}'">
                            ورود
                        </button>
                    </li>
                    <li>
                        <button class="button-free" onclick="window.location.href='{{ route('register') }}'">
                            ثبت نام
                        </button>
                    </li>
                    <li>
                        <button class="button-free" onclick="window.location.href='../'">
                            فیلم ها
                        </button>
                    </li>
                    <li>
                        <button class="button-free" onclick="window.location.href='../newsuser'">
                            اخبار
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!--Main Layout-->
