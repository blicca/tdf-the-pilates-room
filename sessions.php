<?php
/**
 * Template Name: Sessions
 * 
 * The Sessions Template File
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package thepilatesroom
 */

get_header();
?>
<div class="main-sessions">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type'=> array( 'sessions' ),
    'posts_per_page' => 1,
    'paged' => $paged,
);
$r = new WP_Query( $args );
$total_pages = $r->max_num_pages;
?>
    <div class="sessions-row theme-row">

        <div class="sessions-post" data-videomaxpage="<?php echo esc_attr($total_pages); ?>">
            <?php if ( $r->have_posts() ) : while ( $r->have_posts() ) : $r->the_post(); ?>
            <div class="single-sessions">            
                <?php 
                $current_date = get_the_date();
                ?>
                <div class="single-sessions-date">
                    <div class="single-sessions-main-date"><?php
                    echo date("d M", strtotime('monday this week', strtotime($current_date))), " - ";   
                    echo date("d M", strtotime('sunday this week', strtotime($current_date)));
                    ?></div>
                    <div class="single-sessions-note-date"><?php
                    echo esc_html__("Monday - Sunday"); 
                    ?></div>
                </div>
                <div class="sessions-arrows">
                <?php
                $icon = '<img src="' . get_parent_theme_file_uri() . '/assets/img/arrow-right.svg" alt="play">';

                ?>
                    <div class="sessions-arrow sessions-left">
                        <?php
                            if( get_previous_posts_link() ) {
                            previous_posts_link( $icon, $total_pages);
                            }
                            else {
                                echo $icon; 
                            }
                        ?>
                    </div>
                    <div class="sessions-arrow sessions-right">
                        <?php
                            if( get_next_posts_link( 'next_page', $total_pages) ) {
                            next_posts_link( $icon, $total_pages );
                            }
                            else {
                                echo $icon;
                            }
                        ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="sessions-content">
                    <?php the_content(); ?>
                </div>
                
                <div class="sessions-bottom">
                    <span class="question-icon"><img width="24" height="24" src="<?php echo get_parent_theme_file_uri(); ?>/assets/img/question.svg" alt="play"></span>
                    <span class="sessions-question">Questions?
                    <?php 
                    $link = get_field('support_button','option');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="support-text" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?></span>      
                </div>

                <div class="comment-form">
                    <div id="disqus_thread"></div>
                        <?php
                        $page_url = get_permalink();
                        ?>
                        <script>
                            var disqus_config = function () {
                                this.page.url = '<?php the_permalink(); ?>';  // Replace PAGE_URL with your page's canonical URL variable
                                this.page.identifier = '<?php echo get_the_ID(); ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            (function () { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://thepilatesroom.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                </div>                
                       
            <?php endwhile; ?>
        </div>    
            
            
        <?php
        endif; 
        wp_reset_postdata();
        ?>
    </div>  
</div>

<?php
get_footer();