<!DOCTYPE html>
<html lang="ko-KR">
<head>
	<meta charset="utf-8">
	<title>오답노트</title>
	<meta name="description" content="오답노트">
	<meta name="author" content="agileup">
	<meta name="keywords" content="오답,오답노트,odab,ohdab,odabnote">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="http://www.odab.net/static/favicon.ico" type="image/x-icon" />
	<link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<style>
		body { padding-top: 60px; }
	</style>
	<link href="/static/vendor/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="/static/vendor/jquery/jquery-ui.css" rel="stylesheet">
	<link href="/static/vendor/fancybox/source/jquery.fancybox.css" rel="stylesheet">
	<link href="/static/vendor/qtip/jquery.qtip.min.css" rel="stylesheet">
	<link href="/static/vendor/pnotify/jquery.pnotify.default.css" rel="stylesheet">
	<link href="/static/css/common.css" rel="stylesheet">
	<link href="/static/css/common-responsive.css" rel="stylesheet">
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="/static/css/ie.css" rel="stylesheet">
	<![endif]-->
	<!--[if IE 9]>
		<link id="ie9style" href="/static/css/ie9.css" rel="stylesheet">
	<![endif]-->
	<script src="/static/vendor/jquery/jquery-1.10.1.min.js"></script>
	<script src="/static/vendor/jquery/jquery-migrate-1.2.1.min.js"></script>
</head>
<body>
	<!-- s: header -->
	<?php echo $partial_header; ?>
	<!-- e: header -->
	<div class="row-fluid">
		<!-- s: main menu -->
		<?php echo $partial_tabmenu; ?>
		<!-- e: main menu -->
		<noscript>
			<div class="alert alert-block span11">
				<h4 class="alert-heading">주의!</h4>
				<p>오답노트 서비스를 이용하시려면 <a href="http://ko.wikipedia.org/wiki/자바스크립트" target="_blank">자바스크립트</a>를 활성화 해야합니다.</p>
			</div>
		</noscript>
		<!-- s: content -->
		<?php echo $partial_content; ?>
		<!-- e: content -->
		<div class="clearfix"></div>
	</div>
	<!-- s: footer -->
	<?php echo $partial_footer; ?>
	<!-- e: footer -->
	<!-- s: javascript -->
	<script src="/static/vendor/jquery/jquery-ui.min.js"></script>
	<script src="/static/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/static/vendor/underscore.min.js"></script>
	<script src="/static/vendor/fancybox/source/jquery.fancybox.pack.js"></script>
	<script src="/static/vendor/tinymce/tinymce.min.js"></script>
	<script src="/static/vendor/imagesloaded.pkgd.min.js"></script>
	<script src="/static/vendor/masonry.pkgd.min.js"></script>
	<script src="/static/vendor/bootbox.min.js"></script>
	<script src="/static/vendor/qtip/jquery.qtip.min.js"></script>
	<script src="/static/vendor/pnotify/jquery.pnotify.min.js"></script>
	<script src="/static/vendor/jquery.placeholder.shim.js"></script>
	<script src="/static/js/common.js"></script>
	<!-- e: javascript -->
<!--
	<script src="/public/js/modernizr.js"></script>
	<script src="/public/js/jquery.cookie.js"></script>
	<script src='/public/js/jquery.dataTables.min.js'></script>
	<script src="/public/js/excanvas.js"></script>
	<script src="/public/js/gauge.min.js"></script>
	<script src="/public/js/jquery.chosen.min.js"></script>
	<script src="/public/js/jquery.uniform.min.js"></script>
	<script src="/public/js/jquery.cleditor.min.js"></script>
	<script src="/public/js/jquery.noty.js"></script>
	<script src="/public/js/jquery.elfinder.min.js"></script>
	<script src="/public/js/jquery.raty.min.js"></script>
	<script src="/public/js/jquery.iphone.toggle.js"></script>
	<script src="/public/js/jquery.uploadify-3.1.min.js"></script>
	<script src="/public/js/jquery.gritter.min.js"></script>
	<script src="/public/js/jquery.knob.modified.js"></script>
	<script src="/public/js/jquery.sparkline.min.js"></script>
	<script src="/public/js/counter.js"></script>	
	<script src="/public/js/raphael.2.1.0.min.js"></script>
	<script src="/public/js/justgage.1.0.1.min.js"></script>
	<script src="/public/js/retina.js"></script>
-->
</body>
</html>
