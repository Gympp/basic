<?php 
	$userName = '';
	$userLocation = 'India';
	if (!empty($userDetails['user_first_name'])) $userName = $userDetails['user_first_name'];
	if (!empty($userDetails['user_last_name'])) $userName .= ' ' . $userDetails['user_last_name'];
	if(!empty($userDetails['sub_location_name'])){
       $userLocation = $userDetails['sub_location_name'] . ', ' . $userDetails['main_location_name'];
    }
?>


<article id="user-page-header" class="profile-id-page">
	<div class="top-image-wrapper">
	<div class="top-image"></div>
	</div>
	
	<div class="container">
	<div class="row content-row">
		<div class="col-sm-12">
			<div class="user-full-name"><?php echo $userName;?></div>
			<div class="image-wrapper">
				<div class="user-image">
					<div><img src="/web/img/profile/<?php echo $userDetails['user_cover_image'];?>" width="200" height="200" alt="Sanda" title="" id="">
					</div>
				</div>
			</div>
			<div class="user-current-location">Lives in <?php echo $userLocation;?></div>
			<div class="user-join-date">Joined Gympp in <?php echo date('M Y', strtotime($userDetails['user_created_date']));?></div>
			<!--div class="contact-button btn btn-default">Contact Me</div-->
			<div class="next items-separator">
				<div class="text">Journey</div>
			</div>
		</div>
	</div>        
	</div>		
</article>