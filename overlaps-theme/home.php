<?php get_header(); ?>

<main id="main" class="site-main blog-main">
    <div class="container">
        <div class="row">
            <!-- 메인 콘텐츠 (먼저 배치) -->
            <div class="col-md-9">
                <header class="page-header">
                    <h1 class="page-title">블로그</h1>
                    <div class="page-description">
                        <p>마케팅과 관련된 다양한 인사이트와 정보를 공유합니다.</p>
                    </div>
                </header>

                <?php if (have_posts()) : ?>
                    <div class="blog-posts-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <article class="post-card">
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
            
            <!-- 오른쪽 사이드바 (나중에 배치) -->
            <div class="col-md-3">
                <aside class="blog-sidebar">
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
                    
                    <!-- 최근 댓글 위젯 -->
                    <div class="sidebar-widget">
                        <h3 class="widget-title">최근 댓글</h3>
                        <ul class="recent-comments">
                            <?php
                            $comments = get_comments(array('number' => 5, 'status' => 'approve'));
                            if ($comments) :
                                foreach ($comments as $comment) :
                            ?>
                                <li>
                                    <div class="comment-author">
                                        <?php echo get_avatar($comment->comment_author_email, 30); ?>
                                        <span><?php echo $comment->comment_author; ?></span>
                                    </div>
                                    <a href="<?php echo get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID; ?>">
                                        <?php echo wp_trim_words($comment->comment_content, 10); ?>
                                    </a>
                                </li>
                            <?php
                                endforeach;
                            else :
                            ?>
                                <li>댓글이 없습니다.</li>
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