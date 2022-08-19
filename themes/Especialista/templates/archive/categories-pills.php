<section class="bg-white box-sh-1 fixed-top mt-51" style="margin-left: 0; margin-right: 0;">
    <div class="container wrap-categories">
        <div class="row py-2">
            <div class="col-12">
                <div id="category-pills" class="pills-row" style="overflow-x: auto;">
                    <ul class="nav nav-pills nav-pills-c nav-fill">
                        <?php
                        $categories = get_categories();
                        $current_cat = get_queried_object_id();
                        foreach ($categories as $category) {
                            if ($current_cat == $category->term_id) {
                                $class = "active";
                            } else {
                                $class = "";
                            }
                            printf(
                                '<li><a href="%1$s" class="nav-link %3$s font-12 bolder">%2$s</a></li>',
                                esc_url(get_category_link($category->term_id)),
                                esc_html($category->name),
                                esc_html($class)
                            );
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>