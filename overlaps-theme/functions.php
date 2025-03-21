<?php
/**
 * Overlaps Theme functions and definitions
 */

if ( ! defined( 'OVERLAPS_VERSION' ) ) {
	// Replace the version number as needed
	define( 'OVERLAPS_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function overlaps_setup() {
	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );
	
	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );
	
	// Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );

    // 블로그용 추가 이미지 사이즈
    add_image_size('blog-thumbnail', 640, 360, true); // 블로그 썸네일 크기
    add_image_size('sidebar-thumbnail', 140, 140, true); // 사이드바 최근 글 썸네일
	
	// Switch default core markup to valid HTML5
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	
	// Add theme support for selective refresh for widgets
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	// Add support for custom logo
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	
	// Register menus
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'overlaps' ),
			'footer' => esc_html__( 'Footer Menu', 'overlaps' ),
		)
	);
}
add_action( 'after_setup_theme', 'overlaps_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function overlaps_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'overlaps_content_width', 1200 );
}
add_action( 'after_setup_theme', 'overlaps_content_width', 0 );

/**
 * Register widget area.
 */
function overlaps_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'overlaps' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'overlaps' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

    // 블로그 사이드바 위젯 등록
    register_sidebar(
        array(
            'name' => '블로그 사이드바',
            'id' => 'blog-sidebar',
            'description' => '블로그 페이지의 사이드바 위젯',
            'before_widget' => '<div class="sidebar-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'overlaps_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function overlaps_scripts() {
	// 메인 스타일시트 로드
	wp_enqueue_style( 'overlaps-style', get_stylesheet_uri(), array(), OVERLAPS_VERSION );
	
	// 오버랩스 메인 CSS 파일 추가
	wp_enqueue_style( 'overlaps-main-style', get_template_directory_uri() . '/overlaps-main.css', array(), OVERLAPS_VERSION );
	
	// 템플릿별 CSS 파일 로드
	// AI 마케팅 페이지
	if (is_page_template('template-ai-marketing.php')) {
		wp_enqueue_style( 'ai-marketing-style', get_template_directory_uri() . '/ai-marketing.css', array(), OVERLAPS_VERSION );
	}
	
	// 디지털 마케팅 페이지
	if (is_page_template('template-digital-marketing.php')) {
		wp_enqueue_style( 'digital-marketing-style', get_template_directory_uri() . '/digital-marketing.css', array(), OVERLAPS_VERSION );
	}
	
    // 버티컬 마케팅 페이지
    if (is_page_template('template-vertical-marketing.php')) {
        wp_enqueue_style( 'vertical-marketing-style', get_template_directory_uri() . '/vertical-marketing.css', array(), OVERLAPS_VERSION );
    }

	// 블로그 관련 페이지
	if (is_page_template('template-blog.php') || is_home() || is_archive() || is_single()) {
		wp_enqueue_style( 'blog-custom-style', get_template_directory_uri() . '/assets/css/blog.css', array(), OVERLAPS_VERSION );
	}
	
	// 에디터 스타일 (관리자 영역에서만 로드)
	if (is_admin()) {
		wp_enqueue_style( 'editor-style', get_template_directory_uri() . '/editor-style.css', array(), OVERLAPS_VERSION );
	}
	
	// Google Fonts - Noto Sans KR
	wp_enqueue_style( 'overlaps-google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;600;700&display=swap', array(), null );
	
	// Font Awesome
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', array(), '5.15.4' );
	
	// jQuery (WordPress ships with jQuery)
	wp_enqueue_script( 'jquery' );
	
	// Theme main JS
	wp_enqueue_script( 'overlaps-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), OVERLAPS_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'overlaps_scripts' );

/**
 * 템플릿별 CSS 파일을 관리자 에디터에 추가
 */
function overlaps_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'overlaps_add_editor_styles' );

/**
 * Custom template tags for this theme.
 * 주석 처리되었습니다 - inc 폴더가 없는 경우 오류 방지
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 * 주석 처리되었습니다 - inc 폴더가 없는 경우 오류 방지
 */
// require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 * 주석 처리되었습니다 - inc 폴더가 없는 경우 오류 방지
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Implement custom WordPress features
 */

// Add custom image sizes
// add_image_size( 'overlaps-featured', 1200, 600, true );

// Disable Gutenberg editor on certain post types
function overlaps_disable_gutenberg( $current_status, $post_type ) {
    // Add post types where you want to disable Gutenberg
    // $disabled_post_types = array( 'page' );
    // if ( in_array( $post_type, $disabled_post_types ) ) {
    //     return false;
    // }
    return $current_status;
}
add_filter( 'use_block_editor_for_post_type', 'overlaps_disable_gutenberg', 10, 2 );

// Load custom post types
// require get_template_directory() . '/inc/custom-post-types.php';

// Load custom taxonomies
// require get_template_directory() . '/inc/custom-taxonomies.php';

/**
 * Add custom body classes
 */
function overlaps_body_classes( $classes ) {
	// Add a class for single post view
	if ( is_single() ) {
		$classes[] = 'single-post-view';
	}
	
	// Add a class for pages
	if ( is_page() ) {
		$classes[] = 'page-view';
		
		// Add page slug to body class
		global $post;
		if ( isset( $post ) ) {
			$classes[] = 'page-' . $post->post_name;
		}
	}
	
	// Add a class for the home page
	if ( is_front_page() ) {
		$classes[] = 'home-page';
	}
	
	return $classes;
}
add_filter( 'body_class', 'overlaps_body_classes' );

/**
 * Add a custom excerpt length
 */
function overlaps_custom_excerpt_length( $length ) {
	return 25; // Number of words
}
add_filter( 'excerpt_length', 'overlaps_custom_excerpt_length', 999 );

/**
 * Modify the excerpt more link
 */
function overlaps_excerpt_more( $more ) {
	return '... <a class="read-more" href="' . esc_url( get_permalink() ) . '">' . __( 'Read More', 'overlaps' ) . '</a>';
}
add_filter( 'excerpt_more', 'overlaps_excerpt_more' );

/**
 * Remove WordPress version from head
 */
function overlaps_remove_version() {
	return '';
}
add_filter( 'the_generator', 'overlaps_remove_version' );

/**
 * Remove comments from admin menu if not needed
 */
// function overlaps_remove_comments_menu() {
//     remove_menu_page( 'edit-comments.php' );
// }
// add_action( 'admin_menu', 'overlaps_remove_comments_menu' );

/**
 * Count posts in a category
 */
function count_cat_posts($cat_id) {
    $cat = get_category($cat_id);
    return $cat->count;
}

/**
 * 블로그 영역 개선을 위한 추가 기능
 */

// 게시물 그리드에서 사용할 사용자 정의 발췌문 함수
function custom_trim_excerpt($text, $length = 25) {
    if (has_excerpt()) {
        $text = get_the_excerpt();
        return wp_trim_words($text, $length, '...');
    }
    
    $text = get_the_content('');
    $text = strip_shortcodes($text);
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
    $text = strip_tags($text);
    $excerpt_length = apply_filters('excerpt_length', $length);
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    
    if (count($words) > $excerpt_length) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . '...';
    } else {
        $text = implode(' ', $words);
    }
    
    return $text;
}

// 인기 태그 위젯
function popular_tags_widget() {
    $args = array(
        'orderby' => 'count',
        'order' => 'DESC',
        'number' => 10,
    );
    
    $tags = get_tags($args);
    
    if ($tags) {
        echo '<div class="tag-cloud">';
        foreach ($tags as $tag) {
            echo '<a href="' . get_tag_link($tag->term_id) . '" class="tag-link">' . $tag->name . '</a>';
        }
        echo '</div>';
    }
}

// 최근 게시물 사이드바 위젯
function recent_posts_sidebar_widget($number = 5) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $number,
        'order' => 'DESC',
        'orderby' => 'date',
    );
    
    $recent_posts = new WP_Query($args);
    
    if ($recent_posts->have_posts()) {
        echo '<div class="recent-posts">';
        
        while ($recent_posts->have_posts()) {
            $recent_posts->the_post();
            
            echo '<div class="recent-post-item">';
            
            if (has_post_thumbnail()) {
                echo '<div class="recent-post-thumbnail">';
                echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'sidebar-thumbnail') . '</a>';
                echo '</div>';
            } else {
                echo '<div class="recent-post-thumbnail no-thumbnail"></div>';
            }
            
            echo '<div class="recent-post-content">';
            echo '<h4 class="recent-post-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';
            echo '<div class="recent-post-date">' . get_the_date('Y년 m월 d일') . '</div>';
            echo '</div>';
            
            echo '</div>';
        }
        
        echo '</div>';
    }
    
    wp_reset_postdata();
}

// 카테고리 사이드바 위젯
function categories_sidebar_widget() {
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC',
        'show_count' => true,
        'hide_empty' => false,
        'title_li' => '',
    );
    
    echo '<ul class="category-list">';
    wp_list_categories($args);
    echo '</ul>';
}

// 블로그 게시물 리스트 단축코드
function blog_posts_grid_shortcode($atts) {
    $atts = shortcode_atts(array(
        'posts_per_page' => 6,
        'category' => '',
        'order' => 'DESC',
        'orderby' => 'date',
    ), $atts);
    
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $atts['posts_per_page'],
        'order' => $atts['order'],
        'orderby' => $atts['orderby'],
    );
    
    if (!empty($atts['category'])) {
        $args['category_name'] = $atts['category'];
    }
    
    $query = new WP_Query($args);
    $output = '';
    
    if ($query->have_posts()) {
        $output .= '<div class="blog-posts-grid">';
        
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<article class="post-card">';
            
            if (has_post_thumbnail()) {
                $output .= '<div class="post-card-thumbnail">';
                $output .= '<a href="' . get_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'blog-thumbnail') . '</a>';
                $output .= '</div>';
            } else {
                $output .= '<div class="post-card-thumbnail no-thumbnail"></div>';
            }
            
            $output .= '<div class="post-card-content">';
            $output .= '<header class="post-card-header">';
            $output .= '<h2 class="post-card-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            
            $output .= '<div class="post-card-meta">';
            $output .= '<div class="post-card-author">';
            $output .= '<div class="post-card-author-avatar">' . get_avatar(get_the_author_meta('ID'), 30) . '</div>';
            $output .= '<span class="post-card-author-name">' . get_the_author() . '</span>';
            $output .= '</div>';
            $output .= '<span class="post-card-date">' . get_the_date() . '</span>';
            $output .= '</div>'; // .post-card-meta
            $output .= '</header>';
            
            $output .= '<div class="post-card-excerpt">' . custom_trim_excerpt(get_the_content(), 20) . '</div>';
            
            $output .= '<footer class="post-card-footer">';
            
            $categories = get_the_category();
            if ($categories) {
                $output .= '<div class="post-card-categories">';
                foreach ($categories as $category) {
                    $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="post-card-category">' . esc_html($category->name) . '</a>';
                }
                $output .= '</div>';
            }
            
            $output .= '<a href="' . get_permalink() . '" class="read-more-link">더 읽기</a>';
            $output .= '</footer>';
            $output .= '</div>'; // .post-card-content
            $output .= '</article>';
        }
        
        $output .= '</div>';
    } else {
        $output = '<p>게시물이 없습니다.</p>';
    }
    
    wp_reset_postdata();
    return $output;
}
add_shortcode('blog_grid', 'blog_posts_grid_shortcode');

/**
 * 조회수 기반 인기 게시물 기능
 */
function set_post_views($post_id) {
    $count_key = 'post_views_count';
    $count = get_post_meta($post_id, $count_key, true);
    
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}

// 싱글 포스트 조회시 조회수 증가
function track_post_views($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');

// 게시물 목록에 조회수 컬럼 추가
function add_posts_column($columns) {
    $columns['post_views'] = '조회수';
    return $columns;
}
add_filter('manage_posts_columns', 'add_posts_column');

// 조회수 컬럼 데이터 표시
function posts_custom_column($column, $post_id) {
    if ($column === 'post_views') {
        $count = get_post_meta($post_id, 'post_views_count', true);
        echo ($count == '') ? '0' : $count;
    }
}
add_action('manage_posts_custom_column', 'posts_custom_column', 10, 2);

// 블로그 관련 스크립트 추가
function blog_scripts() {
    if (is_home() || is_archive() || is_single() || is_search()) {
        wp_enqueue_script('blog-scripts', get_template_directory_uri() . '/assets/js/blog.js', array('jquery'), OVERLAPS_VERSION, true);
    }
}
add_action('wp_enqueue_scripts', 'blog_scripts');