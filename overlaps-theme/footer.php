<footer id="colophon" class="site-footer">
    <div class="container">
        <!-- 간소화된 푸터 컨텐츠 -->
        <div class="footer-content">
            <!-- 링크 및 소셜 미디어 아이콘 영역 -->
            <div class="footer-links-row">
                <!-- 빠른 링크 - 텍스트 대신 아이콘 사용 -->
                <?php if (has_nav_menu('footer')) : ?>
                <div class="footer-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-menu-items',
                        'container' => false,
                        'depth' => 1,
                    ));
                    ?>
                </div>
                <?php endif; ?>
                
                <!-- 소셜 미디어 아이콘 -->
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <!-- 회사 정보 -->
            <div class="company-info">
                <p>주식회사 오버랩스 | 사업자번호: 705-81-01141 | 대표: 전양근 | 통신판매업: 제2018-서울금천-1346호</p>
                <p>서울특별시 금천구 가산디지털2로 136, 801-21호 | tel. 1877-7935 | overlaps0928@naver.com</p>
                <p class="copyright">&copy; <?php echo date('Y'); ?> Overlaps - 마케팅을 겹치다. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>