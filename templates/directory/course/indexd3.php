<?php
if ( ! defined( 'ABSPATH' ) ) exit;
$id= vibe_get_bp_page_id('course');


?>
<!-- Header -->
<section id="title" style="display: none;">
	<?php do_action('wplms_before_title'); ?>
    <div class="<?php echo vibe_get_container(); ?>">
        <div class="row">
             <div class="col-md-9 col-sm-8">
                <div class="pagetitle">
                	<?php 
                		if(is_tax()){
                			echo '<h1>';
                			single_cat_title();
                			echo '</h1>';
                			echo do_shortcode(category_description());
                		}else{
	                		echo '<h1>'.vibe_get_title($id).'</h1>';
	                		the_sub_title($id);
                		} 
                	?>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
            	<?php 
            		do_action('wplms_be_instructor_button');	
				?>
            </div>
        </div>
    </div>
</section> 
<!-- End Header -->






<!--custom header section -->
<section id="content">
		<?php echo do_shortcode('[elementor-template id="552"]'); ?>							
</section>
<!-- end custom header section-->






<section id="health-course">
<section id="content">
	<div id="buddypress">
    <div class="<?php echo vibe_get_container(); ?>">

	<?php do_action( 'bp_before_directory_course_page' ); ?>

		<div class="padder">
		<?php do_action( 'bp_before_directory_course' ); ?>
		<div class="row">
			<div id="health-course-list-view">
				<div class="col-md-9 col-sm-9  col-md-push-3 col-sm-push-3">
					<?php echo do_shortcode('[elementor-template id="40980"]'); ?>


					<form action="" method="post" id="course-directory-form" class="dir-form">

						<?php do_action( 'bp_before_directory_course_content' ); ?>

						<?php do_action( 'template_notices' ); ?>

						<div class="item-list-tabs" id="subnav" role="navigation">
							<ul>
								<?php do_action( 'bp_course_directory_course_types' ); ?>
								<li>
									<div class="dir-search" role="search" style="display: none;">
										<?php bp_directory_course_search_form(); ?>
									</div> <!-- #group-dir-search -->
								</li>
								<li class="switch_view">
									<div class="grid_list_wrapper">
										<a id="list_view" class="active"><i class="icon-list-1"></i></a>
										<a id="grid_view"><i class="icon-grid"></i></a>
									</div>
								</li>
								<li id="course-order-select" class="last filter">

									<label for="course-order-by"><?php _e( 'Order By:', 'vibe' ); ?></label>
									<select id="course-order-by">
										<?php
										?>
										<option value=""><?php _e( 'Select Order', 'vibe' ); ?></option>
										<option value="newest"><?php _e( 'Newly Published', 'vibe' ); ?></option>
										<option value="alphabetical"><?php _e( 'Alphabetical', 'vibe' ); ?></option>
										<option value="popular"><?php _e( 'Most Members', 'vibe' ); ?></option>
										<option value="rated"><?php _e( 'Highest Rated', 'vibe' ); ?></option>
										<option value="start_date"><?php _e( 'Start Date', 'vibe' ); ?></option>
										<?php do_action( 'bp_course_directory_order_options' ); ?>
									</select>
								</li>
							</ul>
						</div>
						<div id="course-dir-list" class="course .health-directory-list dir-list">
							<?php locate_template( array( 'course/course-loop.php' ), true ); ?>

						</div><!-- #courses-dir-list -->

						<?php do_action( 'bp_directory_course_content' ); ?>

						<?php wp_nonce_field( 'directory_course', '_wpnonce-course-filter' ); ?>

						<?php do_action( 'bp_after_directory_course_content' ); ?>

					</form><!-- #course-directory-form -->

				</div>	
				</div>







			<!-- course sidebar --> 
				<div class="col-md-3 col-sm-3  col-md-pull-9 col-sm-pull-9">
					
					
				<!--	<div class="item-list-tabs" role="navigation">
					<h2> Available <br>Courses</h2>
						<ul>
							<li class="selected" id="course-all"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_course_root_slug() ); ?>"><?php printf( __( 'All Courses <span>%s</span>', 'vibe' ), bp_course_get_total_course_count( ) ); ?></a></li>

							<?php if ( is_user_logged_in() ) : ?>

								<li id="course-personal"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_course_slug()  ); ?>"><?php printf( __( 'My Courses <span>%s</span>', 'vibe' ), bp_course_get_total_course_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

								<?php if(is_user_instructor()): ?>
									<li id="course-instructor"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_course_slug()  ); ?>"><?php printf( __( 'Instructing Courses <span>%s</span>', 'vibe' ), bp_course_get_instructor_course_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>
								<?php endif; ?>		

							<?php endif; ?>
							<?php do_action( 'bp_course_directory_filter' ); ?>
						</ul>
					</div> --><!-- .item-list-tabs -->


					<?php
						$sidebar = apply_filters('wplms_sidebar','buddypress',$id);
						if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar($sidebar) ) : ?>
					<?php endif; ?>
	
				</div>



			</div>	
			<?php do_action( 'bp_after_directory_course' ); ?>

		</div><!-- .padder -->
	
	<?php do_action( 'bp_after_directory_course_page' ); ?>
</div><!-- #content -->
</div>
</section>
</section>


<!--custom footer section -->
<!-- <section id="content">
     
		<?php echo do_shortcode('[elementor-template id="2629"]'); ?>
							
</section> -->
<!-- end custom footer section-->