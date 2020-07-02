                    <article class="video-grid-item" itemscope="" itemtype="http://schema.org/Article">
                        <figure class="video-preview-image">
                            <?php the_post_thumbnail('full', array('itemprop'=>'image')); ?>
                        </figure>
                        <time class="event-time" datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        <h3 itemprop="headline"><?php the_title(); ?></h3>                                                
                    </article>