<article class="<?php echo is_sticky() == 1 ? "sticky" : "normal"; ?>" style="cursor: pointer;" onclick="window.location='<?php the_permalink() ?>';">
    <div class="articles px-4 py-3">
        <div class="row">
            <div class="col-3 col-md-2 mt-2 my-md-auto text-center px-0">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
                    } ?></a>
            </div>
            <div class="col-9 col-md-10">
                <p id="title" class="color-203 bolder font-16 mb-1"><?php the_title(); ?></p>
                <div id="excerpt" class="color-74 font-16 mb-2 lh-22" style="margin-top: -0.2rem;"><?php the_excerpt(); ?></div>
                <div class="row">
                    <div style="display: flex; justify-content: space-between;">
                        <span style="margin-top: -0.55em;">
                            <p class="color-74 bolder font-11 mb-0 text-upper"><?php the_category(' '); ?></p>
                        </span>
                        <?php if (do_shortcode('[likebtn_likes]') > 0) { ?>
                            <span class="align-span text-end color-74 mb-0 font-12 bolder">
                                <img id="img-heart" src="<?php bloginfo('template_url') ?>/img/heart.svg" alt="">
                                <?php
                                // Likes counter
                                echo do_shortcode('[likebtn_likes]');
                                ?>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>