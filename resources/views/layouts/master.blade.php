<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>">
<link rel="stylesheet" href="<?php echo asset('css/bootstrap-select.css')?>">
<link href="<?php echo asset('css/style.css')?>" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo asset('css/flexslider.css')?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo asset('css/font-awesome.min.css')?>" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="@yield('keyword')" />
<meta name="description" content="@yield('description')" />
<script type="application/x-javascript">
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<!-- //for-mobile-apps -->

<!-- js -->
<script type="text/javascript" src="<?php echo asset('js/jquery.min.js')?>"></script>
<!-- js -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo asset('js/bootstrap.min.js')?>"></script>
<script src="<?php echo asset('js/bootstrap-select.js')?>"></script>
<script>
  $(document).ready(function () {
    var mySelect = $('#first-disabled2');

    $('#special').on('click', function () {
      mySelect.find('option:selected').prop('disabled', true);
      mySelect.selectpicker('refresh');
    });

    $('#special2').on('click', function () {
      mySelect.find('option:disabled').prop('disabled', false);
      mySelect.selectpicker('refresh');
    });

    $('#basic2').selectpicker({
      liveSearch: true,
      maxOptions: 1
    });
  });
</script>
<script type="text/javascript" src="<?php echo asset('js/jquery.leanModal.min.js')?>"></script>
<link href="<?php echo asset('css/jquery.uls.css')?>" rel="stylesheet"/>
<link href="<?php echo asset('css/jquery.uls.grid.css')?>" rel="stylesheet"/>
<link href="<?php echo asset('css/jquery.uls.lcd.css')?>" rel="stylesheet"/>
<!-- Source -->
<script src="<?php echo asset('js/jquery.uls.data.js')?>"></script>
<script src="<?php echo asset('js/jquery.uls.data.utils.js')?>"></script>
<script src="<?php echo asset('js/jquery.uls.lcd.js')?>"></script>
<script src="<?php echo asset('js/jquery.uls.languagefilter.js')?>"></script>
<script src="<?php echo asset('js/jquery.uls.regionfilter.js')?>"></script>
<script src="<?php echo asset('js/jquery.uls.core.js')?>"></script>
<script>
			$( document ).ready( function() {
				$( '.uls-trigger' ).uls( {
					onSelect : function( language ) {
						var languageName = $.uls.data.getAutonym( language );
						$( '.uls-trigger' ).text( languageName );
					},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );
			} );
		</script>
</head>
<body>
	@section('header')
	
	@show
	@section('homeBanner')
	
	@show
	@yield('content')
	@section('footer')
	
	@show
</body>
</html>