<?php get_header(); ?>

<main id="main" class="site-main blog-archive">
    <div class="container blog-container">
        <div class="blog-main-content">
            <header class="archive-header">
                <h1 class="archive-title">
                    <?php
                    if (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif (is_author()) {
                        echo '작성자: ' . get_the_author();
                    } elseif (is_date()) {
                        if (is_day()) {
                            echo get_the_date() . ' 아카이브';
                        } elseif (is_month()) {
                            echo get_the_date('F Y') . ' 아카이브';
                        } elseif (is_year()) {
                            echo get_the_date('Y') . ' 아카이브';
                        }
                    }
                    ?>
                </h1>
                
                <?php
                // 카테고리 설명 표시
                if (is_category() && category_description()) {
                    echo '<div class="archive-description">' . category_description() . '</div>';
                }
                ?>
            </header>

            <?php if (have_posts()) : ?>
                <div class="blog-posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium_large'); ?>
                                </a>
                            </div>
                            <?php else : ?>
                            <div class="post-thumbnail no-thumbnail"></div>
                            <?php endif; ?>
                            
                            <div class="entry-content">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="entry-meta">
                                        <div class="author">
                                            <?php echo get_avatar(get_the_author_meta('ID'), 30); ?>
                                            <span class="author-name"><?php the_author(); ?></span>
                                        </div>
                                        <span class="date"><?php echo get_the_date(); ?></span>
                                    </div>
                                </header>
                                
                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <footer class="entry-footer">
                                    <div class="categories">
                                        <?php
                                        $categories = get_the_category();
                                        if ($categories) {
                                            foreach ($categories as $category) {
                                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-link">' . esc_html($category->name) . '</a>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="read-more">더 읽기</a>
                                </footer>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
                <div class="pagination">
                    <?php
                    echo paginate_links(array(
                        'prev_text' => '&laquo; 이전',
                        'next_text' => '다음 &raquo;',
                    ));
                    ?>
                </div>
            <?php else : ?>
                <div class="no-posts-found">
                    <h3>게시물이 없습니다</h3>
                    <p>검색 조건에 맞는 게시물을 찾을 수 없습니다.</p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="blog-sidebar">
            <!-- 카테고리 위젯 -->
            <div class="sidebar-widget">
                <h3 class="widget-title">카테고리</h3>
                <ul class="category-list">
                    <?php 
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'hide_empty' => true
                    ));
                    
                    foreach($categories as $category) {
                        $active_class = '';
                        if (is_category() && get_queried_object_id() === $category->term_id) {
                            $active_class = ' class="active"';
                        }
                        
                        printf(
                            '<li%4$s><a href="%1$s">%2$s <span class="count">(%3$s)</span></a></li>',
                            esc_url(get_category_link($category->term_id)),
                            esc_html($category->name),
                            $category->count,
                            $active_class
                        );
                    }
                    ?>
                </ul>
            </div>
            
            <!-- 검색 위젯 -->
            <div class="sidebar-widget">
                <h3 class="widget-title">검색</h3>
                <?php get_search_form(); ?>
            </div>
            
            <!-- 최근 글 위젯 -->
            <div class="sidebar-widget">
                <h3 class="widget-title">최근 글</h3>
                <ul class="recent-posts">
                    <?php
                    $recent_posts = wp_get_recent_posts(array('numberposts' => 5, 'post_status' => 'publish'));
                    foreach($recent_posts as $post) :
                    ?>
                        <li>
                            <a href="<?php echo get_permalink($post['ID']); ?>">
                                <span class="post-title"><?php echo $post['post_title']; ?></span>
                                <span class="post-date"><?php echo get_the_date('', $post['ID']); ?></span>
                            </a>
                        </li>
                    <?php endforeach; wp_reset_postdata(); ?>
                </ul>
            </div>
            
            <!-- 태그 클라우드 위젯 -->
            <div class="sidebar-widget">
                <h3 class="widget-title">태그 클라우드</h3>
                <div class="tag-cloud">
                    <?php
                    $tags = get_tags();
                    if ($tags) :
                        foreach ($tags as $tag) :
                    ?>
                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag-link">
                            <?php echo $tag->name; ?>
                        </a>
                    <?php
                        endforeach;
                    else :
                    ?>
                        <p>태그가 없습니다.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>