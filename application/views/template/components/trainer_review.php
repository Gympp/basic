<article id="Aminities" class="Section">
			<div class="container" style="width:85%">
			<div class="row">
				<?php if(!empty($trainerReview)) {?>
			<div class="title small wow fadeInDown" data-wow-delay="0" ><strong>Reviews and More </strong><br> <div class="separator"></div></div>
		<div class="main">
				<ul class="cbp_tmtimeline">
					<?php foreach($trainerReview as $review) {?>
					<li>
						<time class="cbp_tmtime" datetime="<?php echo date('d/m/y',strtotime($review['review_created_date']));?>">
							<span><i class="fa fa-clock-o"></i> <?php echo date('d/m/y',strtotime($review['review_created_date']));?></span> 
							<span><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="RO has rated this Gym Good">Rated</a></span>
							<span><?php echo $review['review_internal_rating'];?></span>
						</time>
						<div class="cbp_tmicon" style="background-image: url(../../img/<?php echo $review['user_profile_image'];?>);" ></div>
						<div class="cbp_tmlabel review-right-border-4">
							<h2><?php echo $review['user_first_name'].' '.$review['user_last_name'];?><br><div class="separator"></div></h2>
							<p><?php echo $review['review_content']; ?></p>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
			<?php }?>
	</article>

	