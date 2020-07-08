                    <article class="video-grid-item events-loop" itemscope="" itemtype="http://schema.org/Article">
                        <figure class="video-preview-image">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large', array('itemprop'=>'image')); ?></a>
                        </figure>
                        <h3 itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>  
                        <time class="event-time" datetime="<?php echo esc_attr( get_the_date('c') ); ?>" itemprop="datePublished" content="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html(get_the_date()); ?></time>
                        <?php the_excerpt(); ?>                                             
                    </article>