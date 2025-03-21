<?php get_header(); ?>

<main id="main" class="site-main blog-single">
    <div class="container">
        <div class="row">
            <!-- 메인 콘텐츠 -->
            <div class="col-md-8">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                            
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <i class="fas fa-calendar"></i> <?php echo get_the_date(); ?>
                                </span>
                                <span class="post-category">
                                    <i class="fas fa-folder"></i> <?php the_category(', '); ?>
                                </span>
                                <?php if (has_tag()) : ?>
                                <span class="post-tags">
                                    <i class="fas fa-tags"></i> <?php the_tags('', ', ', ''); ?>
                                </span>
                                <?php endif; ?>
                            </div>
                        </header>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <footer class="entry-footer">
                            <!-- 작성자 정보 -->
                            <div class="author-bio">
                                <div class="author-avatar">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                                </div>
                                <div class="author-info">
                                    <h4 class="author-name"><?php the_author(); ?></h4>
                                    <?php if (get_the_author_meta('description')) : ?>
                                        <p class="author-description"><?php the_author_meta('description'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- 글 공유 버튼 -->
                            <div class="post-share">
                                <h4>이 글 공유하기</h4>
                                <div class="share-buttons">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="share-btn facebook">
                                        <i class="fab fa-facebook-f"></i> Facebook
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="share-btn twitter">
                                        <i class="fab fa-twitter"></i> Twitter
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>" target="_blank" class="share-btn linkedin">
                                        <i class="fab fa-linkedin-in"></i> LinkedIn
                                    </a>
                                </div>
                            </div>
                        </footer>
                    </article>

                    <div class="post-navigation">
                        <div class="nav-links">
                            <div class="nav-previous">
                                <?php previous_post_link('<span class="nav-subtitle">이전 글</span><span class="nav-title">%link</span>'); ?>
                            </div>
                            <div class="nav-next">
                                <?php next_post_link('<span class="nav-subtitle">다음 글</span><span class="nav-title">%link</span>'); ?>
                            </div>
                        </div>
                    </div>

                    <?php
                    // 관련 글
                    $categories = get_the_category();
                    if ($categories) {
                        $category_ids = array();
                        foreach ($categories as $category) {
                            $category_ids[] = $category->term_id;
                        }
                        
                        $args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array(get_the_ID()),
                            'posts_per_page' => 3,
                            'orderby' => 'rand'
                        );
                        
                        $related_query = new WP_Query($args);
                        
                        if ($related_query->have_posts()) :
                    ?>
                        <div class="related-posts">
                            <h3 class="related-title">관련 글</h3>
                            <div class="related-posts-grid">
                                <?php 
                                while ($related_query->have_posts()) : 
                                    $related_query->the_post(); 
                                ?>
                                    <div class="related-post">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>" class="related-thumbnail">
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                            </a>
                                        <?php endif; ?>
                                        <h4 class="related-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        <div class="related-meta">
                                            <span class="related-date"><?php echo get_the_date(); ?></span>
                                        </div>
                                    </div>
                                <?php 
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    <?php 
                        endif;
                    }
                    ?>

                    <?php
                    // 댓글 표시
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                
                <?php endwhile; ?>
            </div>
            
            <!-- 오른쪽 사이드바 -->
            <div class="col-md-4">
                <aside class="blog-sidebar">
                    <!-- 카테고리 위젯 -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">카테고리</h3>
                        <ul class="category-list">
                            <?php 
                            $categories = get_categories();
                            foreach($categories as $category) {
                                printf(
                                    '<li><a href="%1$s">%2$s <span class="count">(%3$s)</span></a></li>',
                                    esc_url(get_category_link($category->term_id)),
                                    esc_html($category->name),
                                    $category->count
                                );
                            }
                            ?>
                        </ul>
                    </div>
                    
                    <!-- 인기 글 위젯 -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">인기 글</h3>
                        <ul class="popular-posts">
                            <?php
                            $popular_posts = new WP_Query(array(
                                'posts_per_page' => 5,
                                'meta_key' => 'post_views_count',
                                'orderby' => 'meta_value_num',
                                'order' => 'DESC'
                            ));
                            
                            if ($popular_posts->have_posts()) :
                                while ($popular_posts->have_posts()) : $popular_posts->the_post();
                            ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>">
                                        <span class="post-title"><?php the_title(); ?></span>
                                        <span class="post-date"><?php echo get_the_date(); ?></span>
                                    </a>
                                </li>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                            ?>
                                <li>인기 글이 없습니다.</li>
                            <?php endif; ?>
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
                </aside>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>