<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *
 */

get_header();
?>
<?php
while ( have_posts() ) : the_post();
?>
<div class="single-blog">
    <div class="single-blog-caption">
        <div class="single-blog-row">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<div id="breadcrumbs" class="thepilatesroom-breadcrumbs">','</div>' );
        }
        ?>
        <div class="caption-title">
        <h1 itemprop="headline"><?php the_title(); ?></h1>                                           
        </div>
        </div>
    </div>

    <div class="single-blog-content">
        <div class="single-blog-row">
            <div class="single-gutenberg">
                <div class="contact-col-1">
                    <?php the_field("footer_column_1", "option"); ?>
                </div>
                <div class="contact-col-2">
                    <?php the_field("footer_column_2", "option"); ?>
                </div>
                <div class="contact-col-3">
                    <?php the_field("footer_column_3", "option"); ?>
                    <h4><?php echo esc_html__("Get Social", "thepilatesroom"); ?></h4>
                        <div class="contact-icons-social">
                            <div class="contact-us-link-edin">
                                <a href="<?php the_field("linkedin_url", "option"); ?>" target="_blank"><img src="<?php echo get_parent_theme_file_uri() . '/assets/img/hero-icon-linkedin.svg'; ?>" alt="linkedin"></a>
                            </div>
                            <div class="contact-us-we-chat open-wechat">
                                <img src="<?php echo get_parent_theme_file_uri() . '/assets/img/hero-icon-weixin.svg'; ?>" alt="chat">
                            </div>
                        </div>
                </div>
                <div class="clearfix"></div>
                
                <?php the_content(); ?>  

                <div class="contact-google-maps">
                    <div class="au-map<?php if(ICL_LANGUAGE_CODE=='zh-hans') { echo esc_html(' hide-this-map'); } ?>">
                        <?php echo do_shortcode('[google_map_easy id="1"]'); ?>
                    </div>
                    <div class="ch-map<?php if(ICL_LANGUAGE_CODE!='zh-hans') { echo esc_html(' hide-this-map'); } ?>">
                        <?php echo do_shortcode('[google_map_easy id="2"]'); ?>
                    </div>
                    <div class="au-ch-map">
                        <div class="au-button<?php if(ICL_LANGUAGE_CODE!='zh-hans') { echo esc_html(' active'); } ?>">
                            AU
                        </div>
                        <div class="ch-button<?php if(ICL_LANGUAGE_CODE=='zh-hans') { echo esc_html(' active'); } ?>">
                            CN
                        </div>
                    </div>
                </div>                        
                
            </div> 
        </div>           
    </div>
    
</div>

<?php endwhile; // end of the loop. ?>
<?php
get_footer();