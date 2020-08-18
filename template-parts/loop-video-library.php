                    <?php
                    $postid = get_the_ID();
                    $vimeo_url = get_field('vimeo_url', $postid);
                    ?>
                    <article class="video-grid-item" itemscope="" itemtype="http://schema.org/Article">
                        <figure class="video-preview-image trigger-video" data-vimeo="<?php echo esc_js($vimeo_url); ?>" data-vidtitle="<?php echo esc_js(get_field('video_title', $postid)); ?>">
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
                        <h3 itemprop="headline"><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>                                                
                    </article>