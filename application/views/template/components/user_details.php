<?php if (
			!empty($userDetails['user_id']) &&
			!empty($_SESSION['user_id']) &&
			$userDetails['user_id'] == $_SESSION['user_id']
		)
{?>
<article id="Details" class="Section user-bk">
	<div class="container">
	<div class="row">
	<div class="title small wow fadeInDown" data-wow-delay="0" ><strong>Your Profile Details</strong> <br> 
	<div class="separator"></div></div>
	<p class="paragraph"> Count on us, We'll never share these details with anyone.</p>
	

	<div class="col-sm-5">	
<?php if(!empty($userDetails['user_fitness_index'])){?>	
		<div class="product-rating level-6 width-200"><span> Fitness Index</span> <br> <?php echo $userDetails['user_fitness_index'];?> <br> <span> Out of 10</span></div>
<?php } ?>
		<div class="col-sm-12 col-xs-12">				
		<h4 class="text text-center line-height-35"> Total views of your given Reviews</h4>
		<div class="title wow fadeInDown animated" data-wow-delay="0" ><?php 
						if (!empty($reviews))
						{
							echo count($reviews);
						}
						else
						{
							echo '0';
						}
					?> <br> <div class="separator"></div></div>
		<p class="text-center font-13">Data mined from <a target="_blank" href="/fal" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Learn more about how various rating are generated at FAL.">Fitness Analytics Lab <i class="fa fa-external-link"></i></a></p>
		</div>
	</div>

	<div class="col-sm-7 font-18">
		<h4 class="text">
			<ul class="fa-big-ul">
				<?php if(!empty($userDetails['user_email'])){?>
				<li><i class="fa-big-li fa fa-envelope fa-prod-details-bullet"></i> <?php echo $userDetails['user_email']?> <a href="mailto:<?php echo $userDetails['user_email']?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Your Email Id, Which we use of our communications.">#Mail</a></li>
				<?php } ?>
				
				<?php if(!empty($userDetails['sub_location_name'])){?>
				<li><i class="fa-big-li fa fa-location-arrow fa-prod-details-bullet"></i> You Live at <?php echo $userDetails['sub_location_name'] . ', ' . $userDetails['main_location_name'];?> </li>
                <?php } ?>
                <?php if(!empty($userDetails['user_mobile_number'])){?>				
				<li><i class="fa-big-li fa fa-phone fa-prod-details-bullet"></i><span class="font-23"><?php echo $userDetails['user_mobile_number'];?></span></li>
				<?php } ?>
				<!--li><i class="fa-big-li fa fa-futbol-o fa-prod-details-bullet"></i>New Delhi, India is your Hometown.</li-->
				<!--li><i class="fa-big-li fa fa-birthday-cake fa-prod-details-bullet"></i>17 November, 1990. Your Birthday :)</li-->
				<li><i class="fa-big-li fa fa-globe fa-prod-details-bullet"></i>Timezone: GMT +<?php echo $userDetails['user_timezone']?> Hrs. </li>
				<?php if(!empty($userDetails['user_created_date'])){?>
				<li><i class="fa-big-li fa fa-flag-o fa-prod-details-bullet"></i>
				Started using Gympp 
				<?php echo getDaysDifference($userDetails['user_created_date']); ?>
				&nbsp;back
				</li>
				<?php } ?>
				<!--li><i class="fa-big-li fa fa-edit fa-prod-details-bullet"></i><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Please keep all your informations updated, This helps us serve you better :)">Edit Above Details</a></li-->
			</ul>
		</h4>					
	</div>
	</div></div>				
</article>
<?php } ?>