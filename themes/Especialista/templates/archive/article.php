<article class="article <?php echo is_sticky() == 1 ? "sticky" : "normal"; ?>" style="cursor: pointer;" onclick="window.location='<?php the_permalink() ?>';">
    <figure>
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
            } ?>
        </a>
    </figure>
    <div class="content">
        <h2 id="title" class="color-203 bolder font-16 mb-1"><?php the_title(); ?></h2>
        <div id="excerpt" class="excerpt"><?php the_excerpt(); ?></div>
        <div class="meta">
            <span class="pill"><?php the_category(' '); ?>
            </span>
            <?php if (do_shortcode('[likebtn_likes]') > 0) { ?>
                <span class="align-span text-end color-74 mb-0 font-12 bolder">
                    <img id="img-heart" src="<?php bloginfo('template_url') ?>/assets/img/heart.svg" alt="">
                    <?php
                    // Likes counter
                    echo do_shortcode('[likebtn_likes]');
                    ?>
                </span>
            <?php } ?>
        </div>
    </div>
</article>