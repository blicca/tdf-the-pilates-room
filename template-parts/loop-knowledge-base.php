<?php
                    $postid = get_the_ID();
                    ?>
                    <?php
                    $vimeo_url = esc_js(get_field('vimeo_url', $postid));
                    if ( !empty($vimeo_url)) {
                    ?>
                    <article class="video-grid-item" itemscope="" itemtype="http://schema.org/Article">
                        <figure class="video-preview-image trigger-video" data-vimeo="<?php echo esc_js($vimeo_url); ?>" data-vidtitle="<?php echo esc_js(the_title()); ?>">
                            <?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
                            <div class="single-play-icon"> 
                                <img src="<?php echo get_parent_theme_file_uri() . '/assets/img/video-play-ico.svg'; ?>" alt="play">
                            </div>
                        </figure>
                        <h3 itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>  
                        <time class="event-time" datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        <?php the_excerpt(); ?>                                               
                    </article>
                    <?php 
                    }
                    else { ?>
                    <article class="video-grid-item" itemscope="" itemtype="http://schema.org/Article">
                        <figure class="video-preview-image">
                            <?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
                        </figure>
                        <h3 itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>  
                        <time class="event-time" datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        <?php the_excerpt(); ?>                                               
                    </article>
                        <?php
                    }