
<?php
if(Session::get('userId') == '' )
{
    echo 'Your Session is expire Please Login Again' .'<br>';
    echo '<a href="'.URL('/').'">Quick Stop</a>';
    die;
}

?>
 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width" name="viewport">
<meta content="initial-scale=1" name="viewport">
<meta name="viewport" content="user-scalable=no, width=device-width">
<meta content="width=device-width, initial-scale=1" name="viewport">
<!--<link rel="icon" href="../..favicon.ico"> -->
 <link href="<?php echo asset('public/css/bootstrap.min.css')?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo asset('public/css/bootsrap.css')?>" type="text/css">
<link rel="stylesheet" href="<?php echo asset('public/css/font-awesome.css')?>" type="text/css">
<link rel="stylesheet" href="<?php echo asset('public/css/font-awesome.min.css')?>" type="text/css">
 
<link rel="stylesheet" href="<?php echo asset('public/css/editor.css')?>" type="text/css">
 <link rel="stylesheet" href="<?php echo asset('public/css/jquery-ui.css')?>" type="text/css">
 <link rel="stylesheet" href="<?php echo asset('public/css/style1.css')?>" type="text/css">
 <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>


    <!--<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>-->

<!-- by raman -->

<!------->

<title><?php echo $title; ?></title>
<script>
	var site_url = '<?php echo URL('/');?>';
</script>
</head>
<body>
    <div id="loader"></div>
     <?php echo view('commonview.mainSidebar');?>