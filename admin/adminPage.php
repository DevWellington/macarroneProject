<?php

class adminPage{

	private static function getHead($title){

		$html = '  	
	<head>
		<meta charset="utf-8">
		<title>'.$title.'</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Wellington Ribeiro">

		<!-- Le styles -->
		<link href="../bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
		<link href="../bower_components/bootstrap/dist/css/bootstrap-theme.css" rel="stylesheet">

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Le fav and touch icons -->
		<link rel="shortcut icon" href="favicon.ico">
		<script src="//cdn.ckeditor.com/4.4.3/full/ckeditor.js"></script>
 	</head>
		';

		return $html;
	}

	public static function getAdminPage(\PDO $pdo, $page){

		require_once '../lib/generatePage.class.php';

		$contentPage = generatePage::getContentPage($pdo, $page);
		$menu = generatePage::getMenu($pdo);
		$head = self::getHead('Admin');

		$html = '
<!DOCTYPE html>
<html lang="en">

	'.$head.'

	<body>

	    <div class="container">

			<!-- Main hero unit for a primary marketing message or call to action -->
			<div class="hero-unit">
				<form action="./admin/logout.php" method="post">
					<button style="float: right; margin-top: 5px;" class="btn btn-info" id="logout">LogOut</button>
				</form>
				'.$menu.'

			</div>
			<br /><br />
	        <div>
	        	<h3 id="namePage"></h3>

	            <textarea name="descricao" rows="10" cols="80" style="display: none">
	                '.$contentPage.'
	            </textarea>

	            <button style="float: right; margin-top: 5px;" class="btn btn-info" id="save">Salvar</button>
	            <br /><br />
	        </div>

	      <hr>

	    </div> <!-- /container -->

	    <!-- Le javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	    <script type="text/javascript" src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<script src="../js/custom.js"></script>
  </body>
</html>

';

	echo $html;

	}

}
