<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title">찾으시는 내용이 없습니다</h1>
    </header>

    <div class="page-content">
        <?php if (is_search()) : ?>
            <p>검색어와 일치하는 결과가 없습니다. 다른 키워드로 다시 검색해보세요.</p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p>원하시는 내용을 찾을 수 없습니다. 검색을 이용해보세요.</p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>