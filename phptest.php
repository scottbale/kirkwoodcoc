<html>
<body>
php test: 
<?php echo 'HTTP Host: '; ?>
<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo 'REQUEST URI: '; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
<?
echo strpos($_SERVER['REQUEST_URI'], '/wptest');
if (strpos($_SERVER['REQUEST_URI'], '/wptest') >= 0)  {
	echo 'yes!' ;
} else {
    echo 'no....' ;
}

?>
</body>
</html>
