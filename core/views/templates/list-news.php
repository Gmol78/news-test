<section class="list-news-section">
    <div class="list-news-section__container section-container">
        <header class="list-news-section__header header-base">
            Новости
        </header>
        <ul class="list-news-section__list list-news">
			<?php foreach ( $data['news'] as $item ): ?>
                <li class="list-news__item">
                    <div class="list-news__item-header">
                        <div class="list-news__date">
							<?= date( 'd.m.Y', $item['idate'] ) ?>
                        </div>
                        <a href="view.php?id=<?= $item['id'] ?>" class="list-news__title">
							<?= $item['title'] ?>
                        </a>
                    </div>
                    <div class="list-news__announce">
						<?= $item['announce'] ?>
                    </div>
                </li>
			<?php endforeach; ?>
        </ul>
        <div class="list-news-section__pagination pagination">
            <div class="pagination__title">
                Страницы:
            </div>
            <div class="pagination__pages-list">
				<?php for ( $page = 1; $page <= $data['pages']['num-pages']; $page ++ ): ?>
                    <a href="news.php?page=<?= $page ?>"
                       class="pagination__page-link <?= ( $page == $data['pages']['active-page'] ) ? 'pagination__page-link_active' : '' ?>">
						<?= $page ?>
                    </a>
				<?php endfor; ?>
            </div>
        </div>
    </div>
</section>

