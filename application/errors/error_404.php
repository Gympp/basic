<?php 
	$CI                     =& get_instance();
	$data['coverImageType'] = 'static_page';
	$data['pageName']       = '404';
	$CI->load->model('location', 'Location');
	$data['active_main_locations'] = $CI->Location->getAllLocations();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $CI->load->view(TEMPLATE . DIRECTORY_SEPARATOR . COMMON . DIRECTORY_SEPARATOR . 'meta_tags', $data, true);?> 
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<link rel='stylesheet' type='text/css' href="/web/css/bootstrap.css">
		<link rel='stylesheet' type='text/css' href="/web/css/main-styles.css">
		<link rel='stylesheet' type='text/css' href="/web/css/custom.css">
		<link rel='stylesheet' type='text/css' href="/web/min/?g=css&1990">
	</head>
	<body>
<div id="outdated"></div>
	<div id="page-wrapper">
<?php
    echo $CI->load->view(TEMPLATE . DIRECTORY_SEPARATOR . 'common/floating_bar', $data, true);
    echo $CI->load->view(TEMPLATE . DIRECTORY_SEPARATOR . 'common/cover_image', $data, true);
	echo $CI->load->view(TEMPLATE . DIRECTORY_SEPARATOR . 'static/404', $data, true);
	echo $CI->load->view(TEMPLATE . DIRECTORY_SEPARATOR . COMMON . DIRECTORY_SEPARATOR . 'footer', $data, true);
	exit;
?>