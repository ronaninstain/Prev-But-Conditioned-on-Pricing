<?php
/**
 * The template for displaying Course Header
 *
 * Override this template by copying it to yourtheme/course/single/header.php
 *
 * @author 		VibeThemes
 * @package 	vibe-course-module/templates
 * @version     2.0
 */
if ( !defined( 'ABSPATH' ) ) exit;
do_action( 'bp_before_course_header' );

?>


<div class="row">
	<div class="col-md-8 col-sm-12">
		<div id="item-header-content">
			<h1><?php bp_course_name(); ?></h1> <!-- Course name -->

			<?php
			$terms = get_the_terms( get_the_ID(), 'popularity' );
			if(!empty($terms) && ! is_wp_error( $terms ) ) : 
				$n = 1; 
				//$return .='<div class="selling-tag tag-single-page">';
				foreach($terms as $term) { 
					if ($term->name === 'Best Seller') {
						$return .='<span class="tag1 single-tag">'.$ct_term_name = $term->name.'</span>';
					}elseif ($term->name === 'Highly Rated') {
						$return .='<span class="tag2 single-tag">'.$ct_term_name = $term->name.'</span>';
					}elseif ($term->name === 'Trending Now') {
						$return .='<span class="tag3 single-tag">'.$ct_term_name = $term->name.'</span>';
					}elseif ($term->name === 'Great Service') {
						$return .='<span class="tag4 single-tag">'.$ct_term_name = $term->name.'</span>';
					}elseif ($term->name === ' Popular') {
						$return .='<span class="tag5 single-tag">'.$ct_term_name = $term->name.'</span>';
					} 
					/* else {
						$return .='<span class=" tag6 single-tag">'.$ct_term_name = $term->name.'</span>';
					}     */       
					
				} 
				//$return .='</div>';
				echo  $return ;
			endif;
			?>

			<div class="health-course-excerpt course_excerpt"> 
			<?php the_excerpt(); ?> <!-- Course excerpt -->
			</div>

			<!--custom section -->
			<div id="item-meta">
				<?php bp_course_meta(); ?>
				<?php do_action( 'bp_course_header_actions' ); ?>

				<?php do_action( 'bp_course_header_meta' ); ?>
			</div> <!-- End custom section -->

			<?php do_action( 'bp_before_course_header_meta' ); ?>

<!--
			<div id="item-meta">
				<?php bp_course_meta(); ?>
				<?php do_action( 'bp_course_header_actions' ); ?>

				<?php do_action( 'bp_course_header_meta' ); ?>
			</div>  -->


		
		</div><!-- #item-header-content -->
	</div>
 
	<div class="col-md-4 col-sm-12 health-single-course-price">
		<div class="course_header5_sideblock">
			<div id="item-header-avatar">
					<?php bp_course_avatar(); ?>
			</div><!-- #item-header-avatar -->
			<div class="course5-pricing health-course-pricing" id="course-pricing">
				<?php bp_course_credits(); ?>
				<!-- <h5 class="kk-offer" >⏰ 4 Hours left at this price</h5> -->
				<div id="om-dyly0xk89yq3zfjksngx-holder"></div>
				<?php
					echo do_shortcode('[elementor-template id="35517"]');
				?>
				<?php 
					if(function_exists('sa_membeship_button')) {
						$course_id = get_the_ID();
						sa_membeship_button($course_id); 
					} else {
						the_course_button();
					}

					//the_course_button();
				?>
				<p class="money-back">14-Day Money-Back Guarantee</p>

				<?php
				add_filter('wplms_course_details_widget',function($args){unset($args['price']); return $args;})
				?>
			</div>
			<div class="course-pricing">
				<?php the_course_details(); ?>
			</div>
			<?php
				$sidebar = apply_filters('wplms_sidebar','coursesidebar',get_the_ID());
				if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
			<?php endif; ?>

			<?php
				echo do_shortcode('[elementor-template id="45248"]');
			?>
		</div>

		

		

	</div>
</div>
<?php
do_action( 'bp_after_course_header' );
?>