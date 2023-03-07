<?php

/**
 * The template for displaying Course font
 *
 * Override this template by copying it to yourtheme/course/single/front.php
 *
 * @author 		VibeThemes
 * @package 	vibe-course-module/templates
 * @version     2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;
global $post;
$id= get_the_ID();

do_action('wplms_course_before_front_main');

do_action('wplms_before_course_description');
?>

<div class="course_description" id="course-home">
	<?php 
		if( !has_term('regulated', 'course-cat') ){
				echo do_shortcode('[elementor-template id="40980"]');
		}
	?>
	<div class="small_desc">
	<?php 
		$more_flag = 1;
		$content=get_the_content(); 
		$middle=strpos( $post->post_content, '<!--more-->' );
		if($middle){
			echo apply_filters('the_content',substr($content, 0, $middle));
		}else{
			$more_flag=0;
			echo apply_filters('the_content',$content);
		}
	?>
	<?php 
		if($more_flag){
			echo '<a href="#" id="more_desc" class="link" data-middle="'.$middle.'">'.__('READ MORE','vibe').'</a>';
		}
	?>
	</div>
	<?php 
		if($more_flag){ 
	?>
		<div class="full_desc">
		<?php 
			echo apply_filters('the_content',substr($content, $middle,-1));
		?>
		<?php 
			echo '<a href="#" id="less_desc" class="link">'.__('LESS','vibe').'</a>';
		?>
		</div>
	<?php
		}
	?>	
</div>
<?php
do_action('wplms_after_course_description');
?>

<div class="course_reviews" id="course-reviews">

<div class="single-review-area-custom-header">
	<span class="myreview">Review</span>
	<h3><span>COURSE </span>REVIEWS</h3>
</div>
<?php
	 comments_template('/course-review.php',true);

	 
?>

 <div class="my-full-width-element">
     <div class="container my-content-">
	     <?php echo do_shortcode( '[elementor-template id="687"]' ); ?>
	 </div>
 </div>


</div>

 