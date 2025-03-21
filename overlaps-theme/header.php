<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="container">
            <div class="main-navigation">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) :
                        the_custom_logo();
                    else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/overlaps-logo.png" 
                                 srcset="<?php echo get_template_directory_uri(); ?>/assets/images/overlaps-logo.png 1x, 
                                        <?php echo get_template_directory_uri(); ?>/assets/images/overlaps-logo@2x.png 2x" 
                                 alt="<?php bloginfo('name'); ?>" class="site-logo">
                        </a>
                    <?php endif; ?>
                </div>

                <nav id="site-navigation" class="main-menu">
                    <div class="menu-toggle mobile-menu-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="menu-container">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_class' => 'primary-menu',
                                'container' => false,
                                'fallback_cb' => false,
                            ));
                        } else {
                            // 메뉴가 설정되지 않은 경우 하드코딩된 메뉴 표시
                            ?>
                            <ul class="primary-menu">
                                <li><a href="/About">About</a></li>
                                <li class="menu-item-has-children">
                                    <a href="/디지털마케팅">디지털마케팅</a>
                                    <ul class="sub-menu">
                                        <li><a href="/퍼포먼스마케팅">퍼포먼스마케팅</a></li>
                                        <li><a href="/콘텐츠마케팅">콘텐츠마케팅</a></li>
                                        <li><a href="/바이럴마케팅">바이럴마케팅</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/전문마케팅">전문마케팅</a>
                                    <ul class="sub-menu">
                                        <li><a href="/플레이스마케팅">플레이스마케팅</a></li>
                                        <li><a href="/이커머스마케팅">이커머스마케팅</a></li>
                                        <li><a href="/병원마케팅">병원마케팅</a></li>
                                        <li><a href="/부동산마케팅">부동산마케팅</a></li>
                                        <li><a href="/DB마케팅">DB마케팅</a></li>
                                    </ul>
                                </li>
                                <li><a href="/AI마케팅">AI마케팅</a></li>
                                <li><a href="/Blog">Blog</a></li>
                                <li><a href="/Contact" class="contact-btn">문의하기</a></li>
                            </ul>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>