jQuery(document).ready(function($) {
    'use strict';

    // 모바일 메뉴 토글
    $('.mobile-menu-toggle').on('click', function() {
        $('.menu-container').toggleClass('active');
        $('body').toggleClass('menu-open');
    });

    // 스크롤 시 헤더 스타일 변경
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

    // 스무스 스크롤
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 70
                }, 1000);
                return false;
            }
        }
    });

    // FAQ 아코디언
    $('.faq-question').on('click', function() {
        $(this).parent('.faq-item').toggleClass('active');
        $(this).parent('.faq-item').siblings().removeClass('active');
    });

    // 모바일에서 서브메뉴 토글 - 수정된 코드
    function setupMobileMenus() {
        if ($(window).width() < 992) {
            // 기존 이벤트 핸들러 제거
            $('.menu-item-has-children > a').off('click');
            $('.submenu-toggle').remove();
            
            // 서브메뉴가 있는 항목에 토글 버튼 추가
            $('.menu-item-has-children > a').append('<span class="submenu-toggle">+</span>');
            
            // 토글 버튼만 클릭 이벤트 처리
            $(document).on('click', '.submenu-toggle', function(e) {
                e.preventDefault();
                e.stopPropagation(); // 이벤트 버블링 방지
                $(this).parent().parent().toggleClass('active');
                $(this).parent().siblings('.sub-menu').slideToggle(300);
                
                // + 와 - 아이콘 전환
                $(this).text($(this).text() === '+' ? '-' : '+');
            });
        } else {
            // 데스크톱 설정으로 되돌리기
            $('.submenu-toggle').remove();
            $(document).off('click', '.submenu-toggle');
        }
    }

    // 데스크톱에서 서브메뉴 hover 시 자동 표시
    function setupDesktopMenus() {
        if ($(window).width() >= 992) {
            $('.menu-item-has-children').off('mouseenter mouseleave');
            $('.menu-item-has-children').hover(
                function() { $(this).children('.sub-menu').stop().fadeIn(200); },
                function() { $(this).children('.sub-menu').stop().fadeOut(200); }
            );
        }
    }
    
    // 초기 실행 및 창 크기 변경 시 메뉴 설정
    setupMobileMenus();
    setupDesktopMenus();
    
    $(window).on('resize', function() {
        setupMobileMenus();
        setupDesktopMenus();
    });

    // 애니메이션 요소 체크
    function checkVisibility() {
        $('.service-card, .testimonial-box, .step, .content-box').each(function() {
            if ($(this).length) {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom - 100) {
                    $(this).addClass('visible');
                }
            }
        });
    }

    // 초기 애니메이션 체크
    setTimeout(function() {
        checkVisibility();
    }, 100);

    // 스크롤 시 애니메이션 체크
    $(window).on('scroll resize', checkVisibility);
    
    // 접근성 개선
    $('.sub-menu').attr('aria-hidden', 'true');
    $('.menu-item-has-children > a').each(function() {
        // submenu-toggle 버튼이 없는 경우에만 추가
        if ($(this).find('.screen-reader-text').length === 0) {
            $(this).append('<span class="screen-reader-text"> 하위 메뉴 열기</span>');
        }
    });
    
    // 메뉴 닫기 (모바일)
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.main-menu').length) {
            if ($('.menu-container').hasClass('active')) {
                $('.menu-container').removeClass('active');
                $('body').removeClass('menu-open');
            }
        }
    });
});