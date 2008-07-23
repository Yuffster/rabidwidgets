<? // Released under LGPL 2.1 <http://creativecommons.org/licenses/LGPL/2.1/> ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<?php require_once("ratings.php"); $rr = new RabidRatings(); ?>
		<title>Rate Things!</title>
		<!-- Make sure you change these to point to your actual files. -->
		<script type="text/javascript" src="mootools-1.2b1.js"></script>
		<script type="text/javascript" src="ratings.js"></script>
		<link rel="stylesheet" href="ratings.css" />
	</head>
	<body>

	<?php
		for ($i = 1; $i < 5; $i++) {
			$rr->showStars("myArticle$i");
		}
	?> 

	</body>
</html>
