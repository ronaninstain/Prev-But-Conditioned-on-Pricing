<?php

if (!defined('VIBE_URL'))
    define('VIBE_URL', get_template_directory_uri());

// include_once 'sakib/sa-rva.php';
// include_once 'sakib/sa_extras.php';
// include_once 'sakib/sa-mb.php';



/**
 * @snippet       How To Hide Woocommerce Settings For Specific User
 * @Tutorial      http://wpadmin.in/tutorials/plugins/woocommerce/how-to-hide-woocommerce-settings-for-specific-user/
 * @Author        Wpadmin
 * @Compatible    WooCommerce All Version
 */

/*
add_action( 'admin_menu', 'wooninja_remove_items', 99, 0 );
function wooninja_remove_items() {
  
// menu names to remove
$remove = array( 'wc-settings','wc-status','wc-addons');
  
foreach ( $remove as $slug ) {
if ( ! current_user_can( 'update_core' ) ) {
remove_submenu_page( 'woocommerce', $slug );
}
}
}
*/

/**
 * @snippet       How To Hide Woocommerce Settings For Specific User 
 */
/*
Under the all PHP code added by Numan
*/
// Added cacche removal 

function health_custom_js_css()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    // wp_enqueue_style("devuteAlpha", get_stylesheet_uri(), null, VERSION);
    //wp_enqueue_script("customJs", get_theme_file_uri("/assets/js/main.js"), array("jquery"), VERSION, true);
    wp_enqueue_style('single', get_theme_file_uri('/assets/css/single-course.css'), false, time(), 'all');
    wp_enqueue_style('course-css', get_theme_file_uri("/css/course.css"), null, 1.3);
}
add_action("wp_enqueue_scripts", "health_custom_js_css");



/**
 * Added by Sakib
 */
add_action('woocommerce_thankyou', 'custom_woocommerce_auto_complete_order');
function custom_woocommerce_auto_complete_order($order_id)
{
    if (!$order_id) {
        return;
    }
    $order = wc_get_order($order_id);
    $order->update_status('completed');
}






function wc_remove_checkout_fields($fields){
    // Billing fields
    //unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_company']);
    //unset( $fields['billing']['billing_email'] );
    //unset( $fields['billing']['billing_phone'] );
    unset($fields['billing']['billing_state']);
    //unset( $fields['billing']['billing_first_name'] );
    //unset( $fields['billing']['billing_last_name'] );
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);

    // Shipping fields
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_phone']);
    unset($fields['shipping']['shipping_state']);
    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);

    // Order fields
    //unset( $fields['order']['order_comments'] );
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'wc_remove_checkout_fields');













/**
 * course directory course loop section modift by filter hook,
 * because its not a template so not possible to override course loop section without filter hook,
 * its wplms theme official instruction wplms theme support forum
 */
add_filter('bp_course_single_item_view', function ($x) {
    global $post;

    $product_id = get_post_meta($course_id, 'vibe_product', true);
    $course_id = get_the_ID();


    $course_post_id = $post->ID;
    $course_author = $post->post_author;
    $course_classes = apply_filters('bp_course_single_item', 'course_single_item course_id_' . $post->ID . ' course_status_' . $post->post_status . ' course_author_' . $post->post_author, get_the_ID());
    ?>

    <li class="<?php echo $course_classes; ?>">

        <div class="row">
            <div class="col-md-4">
                <div class="item-avatar" data-id="<?php echo get_the_ID(); ?>">
                    <?php bp_course_avatar(); ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="item">
                    <div class="item-title"><?php bp_course_title();
                                            if (get_post_status() != 'publish') {
                                                echo '<i> ( ' . get_post_status() . ' ) </i>';
                                            } ?></div>
                    <div class="item-meta"><?php bp_course_meta(); ?></div>
                    <div class="item-action"><?php bp_course_action() ?></div>
                    <br>
                    <p>
                        <?php
                        $the_excerpt = get_the_excerpt(get_the_ID());
                        //var_dump( $the_excerpt);
                        echo substr_replace($the_excerpt, "...", 180);
                        ?>
                    </p>

                    <?php
                    $terms = get_the_terms(get_the_ID(), 'popularity');
                    if (!empty($terms) && !is_wp_error($terms)) :
                        $n = 1;
                        //$return .='<div class="selling-tag tag-single-page">';
                        foreach ($terms as $term) {
                            if ($term->name === 'Best Seller') {
                                $return .= '<span class="tag1 single-tag">' . $ct_term_name = $term->name . '</span>';
                            } elseif ($term->name === 'Highly Rated') {
                                $return .= '<span class="tag2 single-tag">' . $ct_term_name = $term->name . '</span>';
                            } elseif ($term->name === 'Trending Now') {
                                $return .= '<span class="tag3 single-tag">' . $ct_term_name = $term->name . '</span>';
                            } elseif ($term->name === 'Great Service') {
                                $return .= '<span class="tag4 single-tag">' . $ct_term_name = $term->name . '</span>';
                            } elseif ($term->name === ' Popular') {
                                $return .= '<span class="tag5 single-tag">' . $ct_term_name = $term->name . '</span>';
                            }
                            /* else {
						$return .='<span class=" tag6 single-tag">'.$ct_term_name = $term->name.'</span>';
					}     */
                        }
                        //$return .='</div>';
                        echo  $return;
                    endif;
                    ?>


                    <?php do_action('bp_directory_course_item'); ?>
                </div>
            </div>

            <div class="col-md-2">
                <!-- <div class="directory-course-price">
            <?php
            if (bp_is_my_profile()) {
                the_course_button($course_post_id);
            } else {
                bp_course_credits();
            }
            ?>
          </div> -->
                <!-- direct add product on cart from course directory/all course page -->
                <div class="directory-add-cart">
                    <?php

                    $product_id = get_post_meta($course_post_id, 'vibe_product', true);

                    $currency_symble =  get_woocommerce_currency_symbol();
                    $price = get_post_meta($product_id, '_regular_price', true);
                    $sale = get_post_meta($product_id, '_sale_price', true);

                    if (!bp_is_my_profile()) {
                        bp_course_credits();
                    ?>
                        <!-- <a class="sa-add-to-cart" href="<?php echo get_site_url();  ?>/cart/?add-to-cart=<?php echo $product_id; ?>">Add to Cart</a> -->
                        <div class="cs_btn_sec">
                            <a class="sa-add-to-cart" href="<?php echo get_the_permalink($course_post_id);  ?>">More Info</a>
                            <br>
                            <a style="" href="?add-to-cart=<?php echo $product_id; ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart add-cart-ctm sa_ctm_btn start sa-more-info" data-product_id="<?php echo $product_id; ?>" data-product_sku="" aria-label="Add" rel="nofollow">Add to Cart</a>
                        </div>

                    <?php

                    } else {
                        the_course_button($course_post_id);
                    }

                    ?>

                </div>
            </div>

        </div>

    </li>

<?php
    return 1;
});
