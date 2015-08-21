<?php if (!empty( $reviews )) {
	$reviewRatingCard     = array();
	$reviewRatingCard[0]  = 'Worst';
	$reviewRatingCard[1]  = 'Worst';
	$reviewRatingCard[2]  = 'Very poor';
	$reviewRatingCard[3]  = 'Poor';
	$reviewRatingCard[4]  = 'Below Average';
	$reviewRatingCard[5]  = 'Average';
	$reviewRatingCard[6]  = 'Above Average';
	$reviewRatingCard[7]  = 'Moderate';
	$reviewRatingCard[8]  = 'Good';
	$reviewRatingCard[9]  = 'Very Good';
	$reviewRatingCard[10] = 'Excellent';

    foreach ($reviews as $review)
    {
		if ($coverImageType != 'user')
		{
			$userName = ucfirst($review['user_first_name']) . ' ' . ucfirst($review['user_last_name']);
        ?>
        <li>
			<time class='cbp_tmtime' datetime='<?php echo $review['review_created_date']; ?>'>
				<span><i class='fa fa-clock-o'></i>&nbsp;<?php echo date('d-m-Y', strtotime($review['review_created_date'])); ?></span> 
				<span>
					<a href='/review/<?php echo $review['review_id']; ?>' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='<?php echo ucfirst($review['user_first_name']);?> has rated this Gym <?php echo $reviewRatingCard[$review['user_product_rating']];?>'>Rated</a></span>
				<span><?php echo $review['user_product_rating'];?></span>
			</time>

            <?php
            $userProfileUrl = '';
            if ($review['user_username'] == 'fal')
            {
            	$userProfileUrl = '/fal';
            }
            else
            {
            	$userProfileUrl = '/people/' . $review['user_username'];
            }
            	if (!empty($review['user_profile_image']))
                {
            ?>
            	    <a href='<?php echo $userProfileUrl;?>'>
                <?php
				    if (filter_var($review['user_profile_image'], FILTER_VALIDATE_URL))
				    {
				?>
					    <div class='cbp_tmicon' style='background-image: url(<?php echo $review['user_profile_image'];?>);' ></div>
				<?php 
					} 
					else
					{
				?>
					<div class='cbp_tmicon' style='background-image: url(/web/img/profile/<?php echo $review['user_profile_image'];?>);' ></div>
				<?php
					}
				?>
			    </a>
			<?php
				}
			?>
			<div class='cbp_tmlabel review-right-border-<?php echo $review['user_product_rating'];?>'>
				<h2><a href='<?php echo $userProfileUrl;?>'><?php echo $userName;?><br><div class='separator'></div></a></h2>
				<p><?php echo $review['review_content'];?></p>
				<p class="right"><a href='/review/<?php echo $review['review_id']; ?>'>View full review</a></p>
			</div>
		</li>
    <?php
        }
		else
		{
		?>
        <li>
			<time class='cbp_tmtime' datetime='<?php echo $review['review_created_date']; ?>'>
				<span><i class='fa fa-clock-o'></i><?php echo date('d-m-Y', strtotime($review['review_created_date'])); ?></span> 
				<span><a href='/review/<?php echo $review['review_id']; ?>' data-toggle='tooltip' data-placement='bottom' title='' data-original-title='<?php echo ucfirst($review['user_first_name']);?> has rated this Gym <?php echo $reviewRatingCard[$review['user_product_rating']];?>'>Rated</a></span>
				<span><?php echo $review['user_product_rating'];?></span>
				<?php 
				if (
						!empty($userDetails['user_id']) &&
						!empty($_SESSION['user_id']) &&
						$userDetails['user_id'] == $_SESSION['user_id']
					)
				{?>
					<button type='button' class='delete-review btn btn-danger btn-xs margin-t10' 
					data-review_id = '<?php echo $review['review_id'];?>'>Delete Review</button>
				<?php } ?>
			</time>

	        <?php if (!empty($review['product_image'])) { ?>
	        <a href='<?php echo $review['product_seo_title'];?>'>
	        	<?php
			    if(filter_var($review['product_image'], FILTER_VALIDATE_URL)){
			?>
				<div class='cbp_tmicon' style='background-image: url(<?php echo $review['product_image'];?>);' ></div>
			<?php } else {?>
				<div class='cbp_tmicon' style='background-image: url(/web/img/uploads/<?php echo $review['product_image'];?>);' ></div>
			<?php } ?>
		</a>
			<?php } ?>

			<div class='cbp_tmlabel review-right-border-<?php echo $review['user_product_rating'];?>'>
				<h2><a href='<?php echo $review['product_seo_title'];?>'><?php echo $review['product_name'];?><br><div class='separator'></div></a></h2>
				<p><?php echo $review['review_content'];?></p>
			</div>
		</li>
	<?php
	    }
	}
}
else
{
if ($coverImageType == 'user'){ ?>
	<div class='row'>
		<div class='title'></div>
		<div class='col-xs-12 text-center'>
				<img class='margin-b80' src='/web/img/no-reviews.png' >
				<p class='paragraph'> <?php echo $userDetails['user_first_name']; ?> haven't reviewed any gym yet, We guess he doesn't go to Gym :)</p>
		</div>       
    </div>
<?php 
	}
}
?>