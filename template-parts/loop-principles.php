<?php
                    $postid = get_the_ID();
                    $vimeo_url = get_field('vimeo_url', $postid);
                    ?>
                    <article class="video-grid-item" itemscope="" itemtype="http://schema.org/Article">
                        <figure class="video-preview-image trigger-video" data-vimeo="<?php echo esc_js($vimeo_url); ?>" data-vidtitle="<?php echo esc_js(get_field('vimeo_title', $postid)); ?>">
                            <?php 
                                if ( has_post_thumbnail($postid) ) { 
                                    echo get_the_post_thumbnail($postid, 'full', array('itemprop'=>'image')); 
                                } else { 
                                    echo '<img src="'.getIdFromVimeoURL(esc_attr($vimeo_url)).'">';
                                }
                            ?>
                            <div class="single-play-icon"> 
                                <img src="<?php echo get_parent_theme_file_uri() . '/assets/img/video-play-ico.svg'; ?>" alt="play">
                            </div>
                        </figure>
                        <h3 itemprop="headline"><?php the_title(); ?></h3>                                                
                    </article>