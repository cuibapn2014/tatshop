<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
@yield('seo')
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<meta name="csrf_token" content="{{csrf_token()}}"/>
	<base href="{{asset('')}}"/>
	<link rel="stylesheet" href="css/index.css">
	<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css"/>
	<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/brands.css"/>
	<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/solid.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
	<script defer src="fontawesome-free-5.13.0-web/js/all.js"></script>
	<script defer src="fontawesome-free-5.13.0-web/js/brands.js"></script>
	<script defer src="fontawesome-free-5.13.0-web/js/solid.js"></script>
	<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172858112-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-172858112-1');
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-103082263-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-103082263-1');
        </script>

        <script data-ad-client="ca-pub-8738110691939932" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

        
	@yield('script')
	<!--CSS include Bootstrap 4-->
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!--Effect for Navbar-->
	
<title>@yield('title')</title>
</head>

<body>
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
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="109835434081505"
        theme_color="#20cef5"
        logged_in_greeting="Xin chào! Bạn cần chúng tôi hỗ trợ gì ?"
        logged_out_greeting="Xin chào! Bạn cần chúng tôi hỗ trợ gì ?">
      </div>
	
	<!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<!---->
</body>
</html>