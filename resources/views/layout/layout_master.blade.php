<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    @yield('seo')
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{csrf_token()}}" />
    <base href="{{asset('')}}" />
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css" />
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/brands.css" />
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/solid.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display:wght@900&display=swap" rel="stylesheet">
    <script defer src="fontawesome-free-5.13.0-web/js/all.js"></script>
    <script defer src="fontawesome-free-5.13.0-web/js/brands.js"></script>
    <script defer src="fontawesome-free-5.13.0-web/js/solid.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script defer src="js/lazyload.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172858112-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-172858112-1');
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-103082263-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-103082263-1');
    </script>

    <script data-ad-client="ca-pub-8738110691939932" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>


    @yield('script')
    <!--CSS include Bootstrap 4-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--Effect for Navbar-->

    <title>@yield('title')</title>
</head>

<body class="preloading">
    <div class="load text-center">
        <img src="https://i.gifer.com/BAxY.gif" />
    </div>

    <!--Header Navigation-->
    @include('layout.header')

    <!--Container-->
    @yield('content')

    <!--FOOTER---->
    @include('layout.footer')

    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
    <script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v7.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="109835434081505" theme_color="#20cef5"
        logged_in_greeting="Xin chào! Bạn cần chúng tôi hỗ trợ gì ?"
        logged_out_greeting="Xin chào! Bạn cần chúng tôi hỗ trợ gì ?">
    </div>
    
    <!--Script Bootstrap --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <!--script-->
    <script src="js/_script.js"></script>
    <script src="js/__script.js"></script>
    <script type="text/javascript" src="js/countdown.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
</body>

</html>