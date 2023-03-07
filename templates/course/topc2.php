<?php
if (!defined('ABSPATH')) exit;
?>
<section class="BB-course-header">
	<?php do_action('wplms_before_title'); ?>
	<div class="course_header">
		<div class="bb-for-adjusting-width">
			<div class="<?php echo vibe_get_container(); ?>">
				<div class="row">
					<div id="item-header" role="complementary">
						<?php locate_template(array('course/single/course-header2.php'), true); ?>
					</div><!-- #item-header -->
				</div>
			</div>
		</div>
	</div>
</section>

<section class="feautures_C">
	<div class="container">
		<div class="for-flexing-feaC">
			<div class="the-fea-div">
				<?php $course_id = get_the_ID(); ?>
				<ul>
					<li>
						<img src="<?php echo get_theme_file_uri() . '/assets/img/Level.png'; ?>" alt="img" />
						<h4><span>Level</span><br /><?php
													$course_level = get_post_meta($course_id, 'vibe_level', true);

													if (!empty($course_level)) {
														switch ($course_level) {
															case 1:
																echo 'Beginner';
																break;
															case 2:
																echo 'Intermediate';
																break;
															case 3:
																echo 'Advanced';
																break;
															default:
																echo 'Not specified';
																break;
														}
													} else {
														echo 'Level not specified';
													}
													?></h4>
					</li>
					<li>
						<img src="<?php echo get_theme_file_uri() . '/assets/img/Modules.png'; ?>" alt="img" />
						<h4><span>Modules</span><br /><?php
														$modules = vibe_sanitize(get_post_meta($course_id, 'vibe_course_curriculum', false));

														if (!empty($modules)) {
															echo count($modules) . ' Modules';
														} else {
															echo 'No modules found';
														}
														?></h4>
					</li>
					<li>
						<img src="<?php echo get_theme_file_uri() . '/assets/img/Weeks.png'; ?>" alt="img" />
						<h4><span>Duration</span><br /><?php
														$duration = get_post_meta($course_id, 'vibe_duration', true);

														if (!empty($duration)) {
															echo $duration . ' Weeks';
														} else {
															echo 'Duration not specified';
														}
														?></h4>
					</li>
					<li>
						<img src="<?php echo get_theme_file_uri() . '/assets/img/Quiz.png'; ?>" alt="img" />
						<h4><span>Tests</span><br /><?php
													$quizzes = bp_course_get_curriculum_units($course_id, 'quiz');
													$total_quizzes = count($quizzes);

													// Display the total number of quizzes
													echo $total_quizzes . ' Quizes';

													?>

						</h4>
					</li>
				</ul>
			</div>
			<div class="the-d-and-share-div">
				<ul>
					<li><img src="<?php echo get_theme_file_uri() . '/assets/img/Downloads.png'; ?>" alt="img" />
						<br />
						<h4><a href="#" id="btn-print-this" class="for-on-D">Download Syllabus</a>
						</h4>
					</li>
					<li><img src="<?php echo get_theme_file_uri() . '/assets/img/share.png'; ?>" alt="img" />
						<br />
						<h4>
							<div class="eb-share-button" data-toggle="modal" data-target="#exampleModal">
								<a>Share This Course</a>
							</div>
							<!-- Modal -->
							<div class="modal fade eb_modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header eb_modal_header">
											<div class="col-md-6">
												<h2 class="modal-title" id="exampleModalLabel">Share Course</h2>
											</div>
											<div class="col-md-6 eb_btn">
												<button type="button" class="btn btn-default" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
											</div>
										</div>
										<div class="modal-body">
											<p>Page Link</p>
											<input type="text" value="<?php the_permalink(); ?>">
										</div>
										<div class="modal-footer">
											<h4 class="text-center">Share On Social Media</h4>
											<div class="a2a_kit a2a_kit_size_32 a2a_default_style eb_social_button">
												<div class="for-social-flexing">
													<a class="a2a_button_facebook"></a><br>
													<a class="a2a_button_twitter"></a><br>
													<a class="a2a_button_linkedin"></a>
												</div>
											</div>
											<script async="" src="https://static.addtoany.com/menu/page.js"></script><br>
										</div>
									</div>
								</div>
							</div>
						</h4>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<script src="<?php echo get_theme_file_uri() . '/assets/js/printThis.js'; ?>"></script>
	<script>
		jQuery(document).ready(function() {
			jQuery('#btn-print-this').click(function() {
				jQuery('#menu1').printThis();
			});
		});
	</script>
</section>

<section>
	<div id="item-nav">
		<div class="<?php echo vibe_get_container(); ?>">
			<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
				<ul>
					<?php
					if (is_user_logged_in()) {
						$user = wp_get_current_user();
						$allowed_roles  = array('administrator', 'developer');
						// if ( array_intersect($allowed_roles, $user->roles) ) {
						// 	bp_get_options_nav();
						// }
						if (array_intersect($allowed_roles, $user->roles)) {
					?>
							<!-- Admin nav start -->
							<?php bp_get_options_nav(); ?>
							<?php

							if (function_exists('bp_course_nav_menu'))
								bp_course_nav_menu();


							?>
							<?php do_action('bp_course_options_nav'); ?>
							<!-- Admin nav end -->
					<?php }
					} ?>

				</ul>
			</div>
		</div><!-- #item-nav -->
	</div>
</section>
<section class="BB-content">
	<div id="buddypress">
		<div class="<?php echo vibe_get_container(); ?>">
			<?php do_action('bp_before_course_home_content'); ?>
			<div class="row for-order-change">
				<div class="col-md-8 col-sm-8 content-col">