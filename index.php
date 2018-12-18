<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Banner Generator</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />
        <?php
        include 'config.php';
        include 'functions.php';
        include 'classlib.php';
        
        ?>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/humanity/jquery-ui.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>

<body>
    <div id="container">
         <?php
         include 'header.php';
         include 'main.php';
         include 'footer.php';
         ?>
    </div>

     <script src="js/scripts.js" type="text/javascript"></script>
</body>
</html>