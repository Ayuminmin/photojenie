<?php get_header(); ?>
<main class="l-main">
	<div class="p-breadcrumb c-breadcrumb">
		<ul class="p-breadcrumb__inner c-breadcrumb__inner l-inner u-clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
			<li class="p-breadcrumb__item c-breadcrumb__item p-breadcrumb__item--home c-breadcrumb__item--home" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				<a href="http://tcdwp.info/tcd053/" itemscope="" itemtype="http://schema.org/Thing" itemprop="item"><span itemprop="name">HOME</span></a>
				<meta itemprop="position" content="1">
			</li>
			<li class="p-breadcrumb__item c-breadcrumb__item">
				<span itemprop="name">検索結果</span>
				<meta itemprop="position" content="2">
			</li>
		</ul>
	</div>
	<header class="p-page-header" style="background-image: url(https://cele-baby.net/assets/top-pc-1-276c705bc8eb447efc025360ff1d5ae166e1a40a9da75f818369e68e6f26c649.png);">
		<div class="p-page-header__inner l-inner" style="text-shadow: 0px 0px 0px #999999">
            <h1 class="p-page-header__title" style="color: #ffffff; font-size: 30px;">
                「<?php echo esc_html($s); ?>」<br />の検索結果
            </h1>
			<p class="p-page-header__desc" style="color: #ffffff; font-size: 14px;">大好きなものに囲まれる生活、その時の気分で少しずつ変わっていく大切なことや、楽しんでいることを書き残しています。</p>
		</div>
	</header>
	<div class="l-inner l-2colmuns u-clearfix">
		<div class="l-primary">
			<div class="p-blog-list u-clearfix">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="p-blog-list__item">
					<a class="p-hover-effect--type1" href="<?php echo get_permalink(); ?>">
						<div class="p-blog-list__item-thumbnail p-hover-effect__image">
							<div class="p-blog-list__item-thumbnail_inner">
								<?php if (has_post_thumbnail()) : ?>
									<?php echo get_the_post_thumbnail(); ?>
								<?php else: ?>
									<?php //NoIMAGE?>
								<?php endif; ?>
								<!-- <img width="300" height="300" src="./WordPressテーマ「Bloom (tcd053)」 – 女性読者を魅了するブログ・キュレーションサイト構築用ワードプレステーマ「ブルーム」デモサイト_files/25-300x300.jpg" class="attachment-size1 size-size1 wp-post-image" alt="">  -->
								<div class="p-float-category">
									<span class="p-category-item--3" data-url="http://tcdwp.info/tcd053/category/cosme/">
										<?php foreach (get_the_category() as $category): // $category is instance of WP_Term(カテゴリー).?>
											<small><?php echo esc_html($category->name); ?></small>
										<?php endforeach; ?>
									</span>
								</div>
							</div>
						</div>
						<div class="p-blog-list__item-info">
							<p class="p-blog-list__item-meta p-article__meta u-clearfix u-hidden-xs">
								<time class="p-article__date" datetime="2017-01-16"><?php echo get_the_date('Y.m.d'); ?></time>
								<span class="p-article__category">
									<?php foreach (get_the_category() as $category): // $category is instance of WP_Term(カテゴリー).?>
										<small><?php echo esc_html($category->name); ?></small>
									<?php endforeach; ?>
								</span>
								<span class="p-article__authors">
									<span class="p-article__author" data-url="http://tcdwp.info/tcd053/author/designplus209/">
										<span class="p-article__author-thumbnail">
											<img alt="BLOOM" src="./WordPressテーマ「Bloom (tcd053)」 – 女性読者を魅了するブログ・キュレーションサイト構築用ワードプレステーマ「ブルーム」デモサイト_files/designplus209_avatar_1511246122-32x32.jpg" class="avatar avatar-32 photo" height="32" width="32">
										</span><?php the_author(); ?>
									</span>
								</span>
							</p>
							<h2 class="p-blog-list__item-title p-article__title"><?php the_title(); ?></h2>
							<p class="p-blog-list__item-excerpt u-hidden-xs"><?php the_excerpt(); ?></p>
							<p class="p-blog-list__meta02 p-article__meta u-visible-xs"><time class="p-article__date" datetime="2017-01-16"><?php echo get_the_date('Y/m/d'); ?></time><span class="p-article__category"><span data-url="http://tcdwp.info/tcd053/category/cosme/">COSME</span>, <span data-url="http://tcdwp.info/tcd053/category/fashion/">FASHION</span>, <span data-url="http://tcdwp.info/tcd053/category/fashion/outer/">OUTER</span></span></p>
							<p class="p-blog-list__meta02 p-article__meta u-clearfix u-visible-xs">
								<span class="p-article__views"><i class="fas fa-eye"></i><?php echo getPostViews() ?></span>
								<span class="p-article__authors">
									<span class="p-article__author" data-url="http://tcdwp.info/tcd053/author/designplus209/">
										<span class="p-article__author-thumbnail">
											<img alt="BLOOM" src="./WordPressテーマ「Bloom (tcd053)」 – 女性読者を魅了するブログ・キュレーションサイト構築用ワードプレステーマ「ブルーム」デモサイト_files/designplus209_avatar_1511246122-32x32.jpg" class="avatar avatar-32 photo" height="32" width="32">
										</span>BOOM
									</span>
								</span>
							</p>
						</div>
					</a>
				</article>
                <?php endwhile; else : ?>
                <p class="no-search">お探しの記事はありませんでした…</p>
                <?php endif; ?>
			</div>
			<?php joints_page_navi(); ?>
			<!-- <ul class="p-pager">
				<li class="p-pager__item"><span aria-current="page" class="page-numbers current">1</span></li>
				<li class="p-pager__item"><a class="page-numbers" href="http://tcdwp.info/tcd053/category/cosme/page/2/">2</a></li>
				<li class="p-pager__item"><a class="next page-numbers" href="http://tcdwp.info/tcd053/category/cosme/page/2/"><i class="fal fa-chevron-right"></i></a></li>
			</ul> -->
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer(); ?>