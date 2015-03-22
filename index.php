<?php
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);

	header('Content-type: text/html; charset=utf-8; X-UA-Compatible: IE=edge,chrome=1');
	
	$pageURL = "//".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	
	$directoryURL = "//".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
	$currentDir = dirname($_SERVER['PHP_SELF']);
	
	if ($currentDir != "/") {
		$directoryURL .= "/";
	}
	
	$pagename = "home";
	$pageLink = "v3/assets/php/pages/".$pagename;

	if (!empty($_GET['pagename'])) {
		$pagename = $_GET['pagename'];
		$pageLink = "v3/assets/php/pages/".$pagename;
	}
	
	if (!empty($_GET['subpagename'])) {
		$pagename = $_GET['subpagename'];
		$pageLink = "v3/assets/php/pages/subpages/".$pagename;
	}
	
	if (file_exists("assets/php/pages") && $handle = opendir("assets/php/pages")) {
		$menulist = "<ul id='menu'>";
		$i = 0;
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != ".." && !is_dir("v3/assets/php/pages/".$file)) {
				$fileName = $file;
				
				if ($file == "home") {
					$file = "/";
				}
				
				
				$menulist .= '<li><a href="'.$file.'">'.$fileName.'</a></li>';
				$i++;
			}
		}
		closedir($handle);
		$menulist .= "</ul>";
	}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Synco - Skeleton</title>

		<base href="<?php echo $pageURL; ?>">
		
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,500,400'>
		<link rel="stylesheet" href="assets/css/main-backoffice.css" media="all">
		
		<!-- Open Graph data -->
		<meta property="og:url"         content="http:<?php echo $pageURL; ?>">
		<meta property="og:site_name"   content="Synco.io/skeleton">
		<meta property="og:title"       content="Synco Skeleton"> 
		<meta property="og:type"        content="website">
		<meta property="og:locale"      content="en_US">
		<meta property="og:description" content="A prototype framework">
		<meta property="og:image"       content="http:<?php echo $directoryURL; ?>assets/img/og-image.png">
	</head>
	<body class="page-<?php echo $pagename; ?>">
		
		<div id="sk-table">
			<div class="sk-table row-top">
				<div class="sk-table-cell">
					<h1>Logo</h1>
				</div>
			</div>
			<div class="sk-table row-mid">
				<div class="sk-table-cell">
				</div>
			</div>
			<div class="sk-table row-bot">
				<div class="sk-table-cell">
				</div>
			</div>
		</div>
		<script src="//murtada.nl/experiments/dollarsign/dollarsign.js"></script>
		<script src="assets/js/main.js"></script>
		
	</body>
</html>