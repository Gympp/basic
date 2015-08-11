<?php
function format_phone_number($numb)
{
	if (!is_numeric(substr($numb, 0, 1))  && !is_numeric(substr($numb, 1, 1))) { return $numb; }

	$chars = array(' ', '(', ')', '-', '.');
	$numb = str_replace($chars, "", $numb);

	if (strlen($numb) > 10) {
	// a 10 digit number, format as 1-800-555-5555
	    $numb = substr($numb, 0, 1) . '-' . substr($numb, 1, 3) . '-' . substr($numb, 4, 3) . '-' . substr($numb, 7, 4);
	}
	else {
	    $numb = substr($numb, 0, 3) . '-' . substr($numb, 3, 3) . '-' . substr($numb, 5, 4);
	}

	return $numb;
}

function getDaysDifference($date)
{
    $datetime1 = new DateTime($date);
	$datetime2 = new DateTime();
	$interval = $datetime1->diff($datetime2);
	return $interval->format('%a days');
}

function uploadProfilePic($picUrl)
{
	$filename_from_url = parse_url($picUrl);
    $ext               = pathinfo($filename_from_url['path'], PATHINFO_EXTENSION);
	$ch                = curl_init($picUrl);
	$profilePicName    = time() . '_' . rand();
	$fullpath          = FCPATH . '/web/img/profile/' . $profilePicName . '.' . $ext;
    
	curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    
	$binary_img        = curl_exec($ch);
	curl_close ($ch);
	$fp                = fopen($fullpath, 'x');
	fwrite($fp, $binary_img);
	fclose($fp);

	return $profilePicName . '.' . $ext;
}

function getFloatingMenu($index)
{
	$floatingMenuData['home'] = array(
		'home' => 'Home',
		'About' => 'About',
		'grid-Gallery' => 'Cities',
		'parallax-1' => 'Fitness Analytics Lab',
		'testomnials' => 'Reviews',
		'sub-footer' => 'Learn More'
	);
	
	$floatingMenuData['fal'] = array(
		'home' => 'Home',
		'About' => 'How we do this',
		'Lifestyle' => 'Lifestyle Rating Algorithm',
		'Locality' => 'Locality Rating Algorithm',
		'Crowd' => 'Crowd Rating Algorithm',
		'Service' => 'Service Rating Algorithm',
		'Happiness' => 'Happiness Index',
		'ProductAnalysis' => 'Product Analysis',
		'FitnessTrend' => 'Fitness Trend Analysis',
		'ImprovementInterest' => 'Update - Improvement Matrix',
		'sub-footer' => 'Learn More'
	);
	
	$floatingMenuData['business'] = array(
		'home' => 'Home',
		'portfolio' => 'Introduction',
		'HowGymppp' => 'How we\'ll help you',
		'listing_process' => 'Easy Listing Process',
		'contact' => 'Join Us',
		'countdown' => 'Numbers',
		'sub-footer' => 'Learn More'
	);
	
	$floatingMenuData['product'] = array(
		'home' => 'Home',
		'Details' => 'Details',
		'Aminities' => 'Aminities',
		'countdown' => 'Numbers',
		'Review' => 'Reviews',
		'contact' => 'Contact',
		'GymMap' => 'Map'
	);
	
	if (array_key_exists($index, $floatingMenuData))
	{
		return $floatingMenuData[$index];
	}
	else
	{
		return array();
	}
}

function getProductFlags($product_data)
{
	$productFlags = array();
	foreach($product_data as $product_key => $product_value)
    {
        if (strpos($product_key, 'flag_') !== false && !is_null($product_value))
        {
            $flag_class = str_replace('_', '-', substr($product_key, 5));
            $flag_name  = ucwords(str_replace('-', ' ', $flag_class));
            $productFlags[$product_key] = array(
            	'flag_class' => $flag_class,
            	'flag_name'  => $flag_name,
            	'flag_value' => $product_value
            );
        }
    }

    return $productFlags;
}

function getAminitiesHtml($product_flag_types, $productFlags)
{
	$amitiesHtml = '';
    foreach ($product_flag_types as $key) {
        if (array_key_exists($key, $productFlags)){
            $class = '';
            if ($productFlags[$key]['flag_value'] != 1) { $class = ' disable '; }
            $amitiesHtml .= '<li><a class="' . $class . '" href="#"> <i class="fa flag-icon fa-' . $productFlags[$key]['flag_class'] . '"></i>' . $productFlags[$key]['flag_name'] .'</a></li>';      
        }
    }
    return $amitiesHtml;
}

function lastCommaToAnd($subject)
{
	$search  = ',';
	$replace = ' and';
	$subject = rtrim($subject, ', ');
    $pos     = strrpos($subject, $search);
    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, 1);
    }

    return $subject;
}