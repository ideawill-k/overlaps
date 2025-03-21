<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
    <div class="post-card-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('medium_large'); ?>
        </a>
    </div>
    <?php endif; ?>
    
    <div class="post-card-content">
        <header class="post-card-header">
            <h2 class="post-card-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="post-card-meta">
                <div class="post-card-author">
                    <div class="post-card-author-avatar">
                        <?php echo get_avatar(get_the_author_meta('ID'), 30); ?>
                    </div>
                    <span class="post-card-author-name"><?php the_author(); ?></span>
                </div>
                <span class="post-card-date"><?php echo get_the_date(); ?></span>
            </div>
        </header>
        
        <div class="post-card-excerpt">
            <?php the_excerpt(); ?>
        </div>
        
        <footer class="post-card-footer">
            <div class="post-card-categories">
                <?php
                $categories = get_the_category();
                if ($categories) {
                    $output = '';
                    foreach ($categories as $category) {
                        $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="post-card-category">' . esc_html($category->name) . '</a>';
                    }
                    echo $output;
                }
                ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="read-more-link">더 읽기</a>
        </footer>
    </div>
</article>