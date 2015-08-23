<?php if (
			!empty($trainerDetails['user_id']) //&&
			//!empty($_SESSION['trainer_id']) &&
			//$trainerDetails['user_id'] == $_SESSION['trainer_id']
		)
{?>
<article id="Details" class="Section" style="background: #F4F4F4; margin-top:60px; padding: 50px 0 50px 0;">
			<div class="container">
			<div class="row">
			<div class="title small wow fadeInDown" data-wow-delay="0" ><strong>Contact Details</strong> <br> <div class="separator"></div></div>
			
			<div class="col-sm-5">					
				<div class="product-rating level-6" style="width: 201px;"><span> Fitness Index</span> <br> <?php echo $trainerDetails['user_fitness_index'];?> <br> <span> Out of 10</span></div>
				<div class="col-sm-12 col-xs-12">				
				<h4 class="text" style="text-align:center; line-height: 35px"> Total views of profile</h4>
				<div class="title wow fadeInDown animated" data-wow-delay="0" style="visibility: visible; -webkit-animation: fadeInDown 0ms;">21435453 <br> <div class="separator"></div></div>
				<p class="text-center" style="font-size: 13px">Data mined from <a target="_blank" href="http://gympp.com/fal" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Learn more about how various rating are generated at FAL.">Fitness Analytics Lab <i class="fa fa-external-link"></i></a></p>
				</div>
			</div>
			
			
			<div class="col-sm-7" style="font-size:17px;">
				<h4 class="text">
					<ul class="fa-big-ul">
					    <li><i class="fa-big-li fa fa-envelope fa-prod-details-bullet"></i> <?php echo $trainerDetails['user_email'];?> <a href="mailto:<?php echo $trainerDetails['user_email'];?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Your Email Id, Which we use of our communications.">#Mail</a></li>
						<li><i class="fa-big-li fa fa-location-arrow fa-prod-details-bullet"></i> <span style="font-size:14px">Localities Searved:</span> <br> 
							<?php if(!empty($trainerExperience)) { foreach($trainerExperience as $experience) {?>
						<a href="mailto:<?php echo $trainerDetails['user_email'];?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Click to find other fitness trainers in <?php echo $experience['address1'].', '.$experience['city'].', '.$experience['state'];?>, India">
							<?php echo $experience['address1'].', '.$experience['city'].', '.$experience['state'];?>, India </a><br> 
						<?php }}?>
						</li>	
						<li><i class="fa-big-li fa fa-phone fa-prod-details-bullet"></i><span style="font-size: 23px"><?php echo $trainerDetails['user_mobile_number'];?></span></li>
						<li><i class="fa-big-li fa fa-birthday-cake fa-prod-details-bullet"></i>Birthday: <?php echo date('d M, Y',strtotime($trainerDetails['dob']));?> :)</li>
						<li><i class="fa-big-li fa fa-globe fa-prod-details-bullet"></i>Timezone/Currency: UTC+5:30/INR </li>
						<?php $datetime1 = new datetime(date('d-m-y',strtotime($trainerDetails['user_created_date'])));
								$datetime2 = new datetime(date('d-m-y'));
								
								$interval = date_diff($datetime1, $datetime2);
								?>
						<li><i class="fa-big-li fa fa-flag-o fa-prod-details-bullet"></i>Started using Gympp <?php echo $interval->format('%m months');?> Months back </li>
						
					</ul>
				</h4>					
			</div>					
			</div></div>				
			</article>

			<article id="Aminities" style="background: #CA0418; color: #FFF;">
				<div class="container">
			<!-- Top Navigation -->
				<form id="theForm" class="simform" autocomplete="off">
					<div class="simform-inner">
						<ol class="questions">
							<li>
								<span><label for="q1">Wana meet me up, your good Name?</label></span>
								<input id="q1" name="q1" type="text"/>
							</li>
							<li>
								<span><label for="q2">What's your Phone number?</label></span>
								<input id="q2" name="q2" type="text"/>
							</li>
							<li>
								<span><label for="q3">Your Email, Please?</label></span>
								<input id="q3" name="q3" type="text"/>
							</li>
							<li>
								<span><label for="q4">Why you want to get in touch with <?php echo $trainerDetails['user_first_name'];?>?</label></span>
								<input id="q4" name="q4" type="text"/>
							</li>
							
						</ol><!-- /questions -->
						<button class="submit" type="submit">Send answers</button>
						<div class="controls">
							<button class="next"></button>
							<div class="progress"></div>
							<span class="number">
								<span class="number-current"></span>
								<span class="number-total"></span>
							</span>
							<span class="error-message"></span>
						</div><!-- / controls -->
					</div><!-- /simform-inner -->
					<span class="final-message"></span>
				</form><!-- /simform -->			
		</div><!-- /container -->		
	</article>
			
			<?php }?>