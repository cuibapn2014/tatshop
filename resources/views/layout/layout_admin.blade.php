<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf_token" content="{{csrf_token()}}"/>
	<base href="{{asset('')}}"/>
	<link rel="shortcut icon" href="image/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css"/>
	<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/brands.css"/>
	<link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/solid.css"/>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>	
	<script src='ckeditor/ckeditor.js'></script>
	<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
	<script defer src="fontawesome-free-5.13.0-web/js/all.js"></script>
	<script defer src="fontawesome-free-5.13.0-web/js/brands.js"></script>
	<script defer src="fontawesome-free-5.13.0-web/js/solid.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	
	
	<!--CSS include Bootstrap 4-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<title>@yield('title')</title>
</head>
<body>
<!---DASHBOARD-->
<div id="menu" class="col-lg-3 col-md-5 col-sm-12 bg-dark float-left position-fixed dashboard">					
					@yield('dashboard')
		</div>

<!--DISPLAYS-->

<div id="display" class="col-lg-9 col-md-7 col-sm-12 float-left display_dashboard">
		@yield('display')
		</div>

<!-- Optional JavaScript -->
@yield('script')
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!---->
</body>
</html>