<article id="reviews" class="Section">
    <div class="container review-container width-80">
        <div class="row">
		<?php if (!empty($reviews)){?>
            <div class="title small wow fadeInDown animated review-title wow-review" data-wow-delay="0">
                <?php
                if (!empty($reviews))
                {
                    if ($coverImageType == 'user'){?>
                         <strong>Reviews given by <?php
                             echo $reviews[0]['user_first_name'];?> </strong><br>
                    <?php } else { ?>
                        <strong>
                            Reviews About
                            <?php
                            echo $reviews[0]['product_name'];?></strong><br>
                    <?php }
                }
                ?>
                <div class="separator"></div>
			</div>
			<?php } ?>
            <?php 
                if ($coverImageType != 'user') $this->load->view(TEMPLATE . DIRECTORY_SEPARATOR . 'components/review_form');
            ?>
			<div id="reviewList" class="main">
                <ul class="cbp_tmtimeline">
                    <?php echo $this->load->view(TEMPLATE . DIRECTORY_SEPARATOR . 'components/review_details');?>
                </ul>
            </div>
        </div>
    </div>
</article>