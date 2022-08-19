<div style="cursor: pointer;" onclick="window.location='<?php the_permalink() ?>';">
                            <div class="articles px-4 py-3">
                                <div class="row">
                                    <div class="col-3 col-md-2 mt-2 my-md-auto text-center px-0 px-md-2">
                                        <a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) {
                                                                                the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
                                                                            } ?></a>
                                    </div>
                                    <div class="col-9 col-md-10">
                                        <p class="color-203 bolder font-16 mb-1"><?php the_title(); ?></p>
                                        <p class="color-74 font-16 mb-2 lh-22"><?php the_excerpt(); ?></p>
                                        <div class="row">
                                            <div class="col-8 col-md-6">
                                                <span class="span-articles">
                                                    <p class="color-74 bolder font-11 mb-0 text-upper"><?php the_category(', '); ?></p>
                                                </span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8 col-md-6"></div>
                                                <div class="col-4 col-md-6 text-end">
                                                    <div class="d-inline-block">
                                                        <span class="d-inline-block">
                                                            <img src="<?php bloginfo('template_url') ?>/img/heart.svg" alt="">
                                                        </span>
                                                        <span class="d-inline-block">
                                                            <p class="color-74 mb-0 font-12 ps-1 bolder"><?php 
                                                            // TODO: Likes counter
                                                            //echo wp_ulike_get_post_likes(get_the_ID());
                                                            ?></p>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>