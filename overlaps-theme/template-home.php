<?php
/**
 * Template Name: 홈페이지
 */
get_header();
?>

<main id="main" class="site-main">
    <!-- 히어로 섹션 -->
    <section class="hero-section">
        <div class="container">
            <h1 class="hero-title">디지털 마케팅의 새로운 기준</h1>
            <p class="hero-text">오버랩스는 혁신적인 마케팅 솔루션을 통해 비즈니스 성장을 돕습니다. 데이터 기반의 전략과 창의적인 접근으로 차별화된 결과를 제공합니다.</p>
            <a href="/services" class="btn">서비스 살펴보기</a>
        </div>
    </section>

    <!-- 서비스 섹션 -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title">우리의 서비스</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/digital-marketing.svg" alt="디지털 마케팅">
                    </div>
                    <h3>디지털 마케팅</h3>
                    <p>SEO, SEM, 소셜 미디어 등 통합 디지털 마케팅 전략으로 온라인 가시성을 높이고 고객 유입을 증가시킵니다.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/content-creation.svg" alt="콘텐츠 제작">
                    </div>
                    <h3>콘텐츠 제작</h3>
                    <p>브랜드 가치를 높이는 고품질 콘텐츠 제작. 글, 영상, 그래픽 등 다양한 형태의 콘텐츠로 고객과 소통합니다.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/data-analytics.svg" alt="데이터 분석">
                    </div>
                    <h3>데이터 분석</h3>
                    <p>정확한 데이터 분석을 통해 인사이트를 도출하고, 효과적인 마케팅 전략 수립에 기여합니다.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 성공 사례 섹션 -->
    <section class="case-studies-section">
        <div class="container">
            <h2 class="section-title">성공 사례</h2>
            <div class="case-studies-slider">
                <?php
                $args = array(
                    'post_type'      => 'case_study',
                    'posts_per_page' => 3,
                );
                $query = new WP_Query($args);
                
                if ($query->have_posts()) :
                    while ($query->have_posts()) :
                        $query->the_post();
                        ?>
                        <div class="case-study-item">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="case-study-image">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="case-study-content">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn">자세히 보기</a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p>등록된 성공 사례가 없습니다.</p>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- 고객 후기 섹션 -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="section-title">고객 후기</h2>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"오버랩스와 함께한 후 저희 비즈니스는 새로운 차원으로 발전했습니다. 전문적인 마케팅 서비스와 데이터 중심의 접근 방식이 정말 인상적이었습니다."</p>
                    </div>
                    <div class="testimonial-author">
                        <strong>김철수</strong> - ABC 주식회사 대표
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-content">
                        <p>"다양한 마케팅 에이전시를 경험해 봤지만, 오버랩스는 진정한 파트너로서 우리 비즈니스의 성장에 기여했습니다. 결과에 매우 만족합니다."</p>
                    </div>
                    <div class="testimonial-author">
                        <strong>이영희</strong> - XYZ 기업 마케팅 이사
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA 섹션 -->
    <section class="cta-section">
        <div class="container">
            <h2>지금 바로 시작하세요</h2>
            <p>오버랩스와 함께 비즈니스 성장을 위한 여정을 시작하세요.</p>
            <a href="/contact" class="btn">무료 상담 신청</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>