<?php 
	$trainerName = '';
	$trainerLocation = 'India';
	if (!empty($trainerDetails['user_first_name'])) $trainerName = $trainerDetails['user_first_name'];
	if (!empty($trainerDetails['user_last_name'])) 
		$trainerName .= ' ' . $trainerDetails['user_last_name'];
	if(!empty($trainerDetails['sub_location_name']))
	{
     $trainerLocation = $trainerDetails['sub_location_name'] . ', ' . $trainerDetails['main_location_name'];
    }
?>

	<section class="profile-intro" style="background-image: url('../../web/img/blurback.jpg')">		
		<div class="profile-intro-wrap">
			<div class="profile-img">
                <img class="size230" src="../../web/img/<?php echo $trainerDetails['user_profile_image'];?>" alt="Markus Herrmann">				
			</div>
			<div class="profile-info">
				<h2><?php echo $trainerName ?><i class="fa fa-verified-main fa-check-circle"></i></h2>				
				<p> Howdy! I live in <?php echo $trainerLocation;?>. It been 
					<?php  $now = time();
 				    		$your_date = strtotime($trainerDetails['user_created_date']);
 				    		$datediff = $now - $your_date;
  				    		echo floor($datediff/(60*60*24));?>
				 days using Gympp. 			
				I would love to help you with your fitness endevers, find me on <a href="<?php echo $trainerDetails['user_fb_profile_link'];?>">facebook</a>.
				</p>
				<h5><?php echo $trainerDetails['age'];?> years old, Male, with 
					<?php echo $trainerDetails['certification'];?> Certifications and 
					<?php echo $trainerDetails['association'];?> Associations, Over 
					<?php echo $trainerDetails['experience'];?> years of experience in serving fitness </h5>
			</div>
			<div class="clear"></div>
			<div class="profile-stats">
				<ul>
					<li><a href="javascript:toggleTab('followers');"><span>
						<?php echo sizeof($trainerReview);?></span> Reviews</a></li>
					<li><a href="javascript:toggleTab('following');"><span><?php echo $trainerDetails['average_rating'];?></span> Rating</a></li>
					<li><a href="javascript:toggleTab('timeline');"><span>
						<?php echo $trainerDetails['experience'];?>+</span> Years</a></li>
				</ul>
				<div class="clear"></div>
			</div>
        </div>
	</section>

	<article id="ProfessionalInfo" class="Section" style="background: #F4F4F4; padding: 50px 0 50px 0;">
			<div class="container" style="width:85%">
			<div class="row">
			<?php if(!empty($trainerService)) {?>
			<div class="col-sm-9">
				<div class="title_left small text-left"> <strong> Can Help you with <strong><br> <div class="separator"></div></div>
					<ul class="service-links">
						<?php foreach($trainerService as $service) { ?>
						<li><a href="#"> <?php echo $service['name'];?></a></li>
						
                    </ul>
			</div>
			<?php } }?>
			<div class="col-sm-6">
				<?php if(!empty($trainerExperience)) {?>
				<div class="title_left small text-left"> <strong> Experience + Associations <strong><br> <div class="separator"></div></div>
				<h4 class="text">
					<ul class="fa-trainer-ul">
					    <?php foreach($trainerExperience as $experience) {?>
						<li> <i class="fa-trainer-li fa fa-building fa-prod-details-bullet"></i> 
							<a href="mailto:<?php echo $trainerDetails['user_email'];?>" data-toggle="tooltip" data-placement="bottom" title="Click to find other fitness trainers in <?php echo $experience['address1'],', ',$experience['city'];?>, India"><?php echo $experience['product_name'],', ',$experience['area_name'],' (',$experience['city'],', IN)';?></a>
							<br>
							<span><?php echo $experience['description'];?></span>
						</li>
						<?php }} ?>
									
					</ul>
				</h4>
			</div>			
			
			<div class="col-sm-6" >
				<?php if(!empty($trainerEducation)) {?>
				<div class="title_left small"><strong>Education + Certification</strong> <br> <div class="separator"></div></div>
				<h4 class="text">
					<ul class="fa-trainer-ul">
					    <?php foreach($trainerDetails['trainerEducation'] as $education) { ?>
						<li> <i class="fa-trainer-li fa fa-graduation-cap fa-prod-details-bullet"></i> 
							<a href="mailto:<?php echo $trainerDetails['user_email'];?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Click to find other fitness trainers in <?php echo $experience['address1'],', ',$experience['city'];?>, India"><?php echo $education['institution_name'];?></a>
							<br>
							<span><?php echo $education['description'];?></span>
						</li>
						<?php } }?>			
					</ul>
				</h4>					
			</div>
			
			</div>
			</div>				
			</article>

