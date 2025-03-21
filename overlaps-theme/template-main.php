<?php
/**
 * Template Name: 메인페이지
 * Description: 오버랩스 메인 페이지 템플릿
 */

get_header(); 
?>

<div class="overlaps-hero overlaps-section">
    <div class="overlaps-container">
        <div class="overlaps-hero-content">
            <h1 class="overlaps-hero-title"><span>오버랩스</span> – 마케팅을 겹치다</h1>
            <p class="overlaps-hero-subtitle">최신 AI 기술과 디지털 마케팅 전략을 결합하여 <strong>최적의 마케팅 솔루션</strong>을 제공합니다. 데이터 기반 접근 방식과 맞춤형 마케팅 전략으로 <strong>비즈니스의 성장을 가속화</strong>하세요.</p>
            <a href="https://forms.gle/T3GrUwodKyFG9gLP6" target="_blank" class="overlaps-btn orange">무료 견적 신청</a>
        </div>
    </div>
</div>

<div class="overlaps-services overlaps-section">
    <div class="overlaps-container">
        <h2 class="overlaps-title">Our Services</h2>
        <p class="overlaps-subtitle">오버랩스는 AI와 디지털 기술을 활용한 다양한 마케팅 서비스를 제공합니다.</p>
        
        <div class="overlaps-services-grid">
            <!-- AI 마케팅 섹션 -->
            <a href="<?php echo esc_url(home_url('/ai마케팅')); ?>" class="overlaps-service-box ai-marketing">
                <div class="service-icon">
                    <i class="service-icon-ai"></i>
                </div>
                <h3>AI 마케팅</h3>
                <p>AI를 활용한 데이터 분석과 자동화 기술로 마케팅의 효율성과 정밀도를 극대화합니다.</p>
            </a>
            
            <!-- 디지털 마케팅 섹션 -->
            <a href="<?php echo esc_url(home_url('/디지털마케팅')); ?>" class="overlaps-service-box digital-marketing">
                <div class="service-icon">
                    <i class="service-icon-digital"></i>
                </div>
                <h3>디지털 마케팅 (POE 전략)</h3>
                <p>Paid, Owned, Earned 미디어를 활용한 효율적인 디지털 마케팅 솔루션</p>
            </a>
            
            <!-- 전문 마케팅 섹션 -->
            <a href="<?php echo esc_url(home_url('/전문마케팅')); ?>" class="overlaps-service-box vertical-marketing">
                <div class="service-icon">
                    <i class="service-icon-vertical"></i>
                </div>
                <h3>전문(버티컬) 마케팅</h3>
                <p>특정 업종에 최적화된 맞춤형 마케팅 전략으로 업계 경쟁력을 강화합니다.</p>
            </a>
            
            <!-- 블로그 섹션 -->
            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="overlaps-service-box blog">
                <div class="service-icon">
                    <i class="service-icon-blog"></i>
                </div>
                <h3>Blog</h3>
                <p>마케팅 트렌드와 실제 성공 사례를 분석하여 인사이트를 제공합니다.</p>
            </a>
        </div>
    </div>
</div>

<!-- 서비스 상세 섹션: AI 마케팅 -->
<div class="overlaps-service-detail overlaps-section ai-section">
    <div class="overlaps-container">
        <div class="service-detail-wrapper">
            <div class="service-detail-content">
                <h2 class="service-detail-title">AI 마케팅</h2>
                <p class="service-detail-desc">AI를 활용한 데이터 분석과 자동화 기술로 마케팅의 효율성과 정밀도를 극대화합니다.</p>
                <ul class="service-detail-list linkable">
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">AI 키워드 & 트렌드 분석: 검색 트렌드 및 소비자 관심사 분석</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">AI 광고 데이터 분석 & 최적화: 광고 성과 최적화 및 자동 분석</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">AI 시장 & 경쟁사 분석: 경쟁사 비교 및 시장 인사이트 제공</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">AI 블로그: AI 자동 콘텐츠 생성 및 SEO 최적화</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">AI 숏폼: AI 기반 영상 제작 및 플랫폼 최적화</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">AI 고객관리: AI 챗봇 & CRM 자동화</a></li>
                </ul>
                <a href="<?php echo esc_url(home_url('/ai마케팅')); ?>" class="overlaps-btn">자세히 보기</a>
            </div>
            <div class="service-detail-image ai-img"></div>
        </div>
    </div>
</div>

<!-- 서비스 상세 섹션: 디지털 마케팅 -->
<div class="overlaps-service-detail overlaps-section digital-section">
    <div class="overlaps-container">
        <div class="service-detail-wrapper reverse">
            <div class="service-detail-content">
                <h2 class="service-detail-title">디지털 마케팅 (POE 전략)</h2>
                <p class="service-detail-desc">Paid, Owned, Earned 미디어를 활용한 효율적인 디지털 마케팅 솔루션</p>
                <ul class="service-detail-list linkable">
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">퍼포먼스 마케팅: 데이터 기반 광고 최적화</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">콘텐츠 마케팅: 가치 있는 콘텐츠 기획 및 배포</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">바이럴 마케팅: SNS & 커뮤니티 기반 입소문 마케팅</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">고객관리 마케팅: 고객 경험 최적화 및 유지 전략</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">브랜딩: 브랜드 아이덴티티 구축 & 인지도 강화</a></li>
                </ul>
                <a href="<?php echo esc_url(home_url('/디지털마케팅')); ?>" class="overlaps-btn">자세히 보기</a>
            </div>
            <div class="service-detail-image digital-img"></div>
        </div>
    </div>
</div>

<!-- 서비스 상세 섹션: 전문 마케팅 -->
<div class="overlaps-service-detail overlaps-section vertical-section">
    <div class="overlaps-container">
        <div class="service-detail-wrapper">
            <div class="service-detail-content">
                <h2 class="service-detail-title">전문(버티컬) 마케팅</h2>
                <p class="service-detail-desc">특정 업종에 최적화된 맞춤형 마케팅 전략으로 업계 경쟁력을 강화합니다.</p>
                <ul class="service-detail-list linkable">
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">병원 마케팅: 의료기관 특화 마케팅 솔루션</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">플레이스 마케팅: 로컬 비즈니스 대상 오프라인 & 온라인 마케팅</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">이커머스 마케팅: 온라인 쇼핑몰 & D2C 브랜드 성장 전략</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">부동산 마케팅: 부동산 플랫폼 & 중개업소 맞춤 마케팅</a></li>
                    <li><a href="<?php echo esc_url(home_url('/#')); ?>" class="service-link">DB 마케팅: 데이터 기반 고객 확보 및 전환 최적화</a></li>
                </ul>
                <a href="<?php echo esc_url(home_url('/전문마케팅')); ?>" class="overlaps-btn">자세히 보기</a>
            </div>
            <div class="service-detail-image vertical-img"></div>
        </div>
    </div>
</div>

<!-- 서비스 상세 섹션: 블로그 -->
<div class="overlaps-service-detail overlaps-section blog-section">
    <div class="overlaps-container">
        <div class="service-detail-wrapper reverse">
            <div class="service-detail-content">
                <h2 class="service-detail-title">Blog</h2>
                <p class="service-detail-desc">마케팅 트렌드와 실제 성공 사례를 분석하여 인사이트를 제공합니다.</p>
                <ul class="service-detail-list linkable">
                    <li><a href="<?php echo esc_url(home_url('#')); ?>" class="service-link">마케팅 트렌드: 최신 디지털 & AI 마케팅 동향</a></li>
                    <li><a href="<?php echo esc_url(home_url('#')); ?>" class="service-link">성공 사례 & 분석: 효과적인 마케팅 전략 및 사례 연구</a></li>
                    <li><a href="<?php echo esc_url(home_url('#')); ?>" class="service-link">AI 연구: AI 기술이 마케팅에 미치는 영향과 활용법</a></li>
                </ul>
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="overlaps-btn">자세히 보기</a>
            </div>
            <div class="service-detail-image blog-img"></div>
        </div>
    </div>
</div>

<div class="overlaps-cta overlaps-section">
    <div class="overlaps-container">
        <div class="overlaps-cta-content">
            <h2 class="overlaps-cta-title">🚀 지금 바로 오버랩스와 함께하세요!</h2>
            <p class="overlaps-cta-text">AI 기반 마케팅 솔루션으로 비즈니스 성장을 경험해 보세요.</p>
            <a href="https://forms.gle/T3GrUwodKyFG9gLP6" target="_blank" id="free-quote" class="overlaps-btn orange">무료 견적 신청</a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation for service boxes on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.overlaps-service-box, .service-detail-wrapper').forEach(element => {
            observer.observe(element);
        });
    });
</script>

<?php get_footer(); ?>