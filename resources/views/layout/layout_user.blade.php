<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{csrf_token()}}" />
    <base href="{{asset('')}}" />
    <link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/brands.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src='ckeditor/ckeditor.js'></script>
    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/brands.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/solid.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



    <!--CSS include Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>@yield('title')</title>
</head>

<body>
    <div class="col-12 position-fixed bg-dark text-right text-white mr-2" style="top:0px;height:50px;z-index:10000;">
        <img class="float-right mt-1 mx-1 rounded-circle"
            src="{{strpos(Auth::user()->image,'ttps://') == 1 ? Auth::user()->image : 'image/'.Auth::user()->image}}"
            width="35px" height="35px" style="object-fit:cover;" />
        <p class="float-right py-2">Xin chào, {{Auth::user()->name}}</p>
    </div>
    <!---DASHBOARD-->
    <div id="menu" class="col-lg-3 col-md-5 col-sm-12 bg-dark float-left position-fixed dashboard">
        <img src="image/_logo1.png" class="pl-3" height="60px" style="object-fit:contain;" />
        <a id="close" class="col-12 text-right" href="javascript:void(0)" onclick="closeMenu()"><i
                class="bi bi-x"></i></a>
        <div class="col-12 pt-2 px-0">
            <a class="option col-12 fs-5 text-light" href="user"><i class="bi bi-pencil-square"></i> Cập nhật tài khoản</a>
            <a class="option col-12 fs-5 text-light" href="user/bao-mat"><i class="bi bi-shield-fill"></i> Bảo
                mật</a>
            <a class="option col-12 fs-5 text-light" href="logout"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>
        </div>
    </div>

    <!--DISPLAYS-->

    <div id="display" class="col-lg-9 col-md-7 col-sm-12 float-left display_dashboard">
        @yield('display')
    </div>

    <!--Script Bootstrap --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    @yield('script')
    <script src="js/script.js"></script>
    <script src="js/jquery.js"> </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <!--Script--->
</body>

</html>