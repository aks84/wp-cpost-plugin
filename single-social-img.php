<?php
 /*
 Template Name: Social Image Post
*/
get_header(); ?>
<div id="primary">
	<div id="social_image_content" role="main">
	<?php
	$social_img_posts = array( 'post_type' => 'social_img', );
	$loop = new WP_Query( $social_img_posts );
	?>
	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
		<div class="socail_img_outer" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
				<div class="social_img">
					<?php the_post_thumbnail('medium'); ?>
				</div>
				<div class="social_text" >
					<h4 class="social_img_title"><?php the_title(); ?></h4>
				    <p class="social_img_except"><?php the_excerpt(); ?></p>
				    <ul class="links">
				    	<li><a href="#"><span class="dashicons dashicons-facebook"></span></a></li>
				    	<li><a href="#"><span class="dashicons dashicons-twitter"></span></a></li>
				    	<li><a href="#"><span class="dashicons dashicons-linkedin"></span></a></li>
				    </ul>
				</div>
				
		</div>
	<?php endwhile; ?>
	</div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>


<style>
	.links li{ list-style-type: none; padding:5px; }
	.socail_img_outer{display: flex;}
	.social_img .social_text{
		display: inline-flex;
	}
	
	.social_text{
		padding-left: 20px;
	}

</style>