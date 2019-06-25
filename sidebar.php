<aside class="p-sidebar l-secondary">
	<div class="p-sidebar__inner">
		<div class="p-widget styled_post_list1_widget" id="styled_post_list1_widget-3">
			<!-- <h2 class="p-widget__title">おすすめ記事</h2>
			<ul class="p-widget-list p-widget-list__type2 u-clearfix">
				<li class="p-widget-list__item">
					<a class="p-hover-effect--type1" href="http://tcdwp.info/tcd053/2017/10/07/post2/">
						<div class="p-widget-list__item-thumbnail p-hover-effect__image">
							<img width="300" height="300" src="./FASHIONに関する記事一覧 – WordPressテーマ「Bloom (tcd053)」_files/18-300x300.jpg" class="attachment-size1 size-size1 wp-post-image" alt="">
							<div class="p-float-category">
								<span class="p-category-item--1" data-url="http://tcdwp.info/tcd053/category/life/">LIFE</span>
							</div>
						</div>
						<h3 class="p-widget-list__item-title p-article__title">ブログ収益化に重要なネイティブアド（インフィード広...</h3>
					</a>
				</li>
				<li class="p-widget-list__item">
					<a class="p-hover-effect--type1" href="http://tcdwp.info/tcd053/2017/07/24/protection-page/">
						<div class="p-widget-list__item-thumbnail p-hover-effect__image">
							<img width="300" height="300" src="./FASHIONに関する記事一覧 – WordPressテーマ「Bloom (tcd053)」_files/44-300x300.jpg" class="attachment-size1 size-size1 wp-post-image" alt="">
							<div class="p-float-category">
								<span class="p-category-item--20" data-url="http://tcdwp.info/tcd053/category/fashion/hoodie/">HOODIE</span>
							</div>
						</div>
						<h3 class="p-widget-list__item-title p-article__title">パスワードを掛けて会員限定コンテンツを配信！デザイ...</h3>
					</a>
				</li>
				<li class="p-widget-list__item">
					<a class="p-hover-effect--type1" href="http://tcdwp.info/tcd053/2017/01/15/eyecatchpost/">
						<div class="p-widget-list__item-thumbnail p-hover-effect__image">
							<img width="300" height="300" src="./FASHIONに関する記事一覧 – WordPressテーマ「Bloom (tcd053)」_files/45-300x300.jpg" class="attachment-size1 size-size1 wp-post-image" alt="">
								<div class="p-float-category">
									<span class="p-category-item--6" data-url="http://tcdwp.info/tcd053/category/fashion/">FASHION</span>
								</div>
							</div>
						<h3 class="p-widget-list__item-title p-article__title">記事ページ下部のアイキャッチ付き関連記事一覧</h3>
					</a>
				</li>
				<li class="p-widget-list__item">
					<a class="p-hover-effect--type1" href="http://tcdwp.info/tcd053/2017/01/13/original-widjet/">
						<div class="p-widget-list__item-thumbnail p-hover-effect__image">
							<img width="300" height="300" src="./FASHIONに関する記事一覧 – WordPressテーマ「Bloom (tcd053)」_files/29-300x300.jpg" class="attachment-size1 size-size1 wp-post-image" alt="">
								<div class="p-float-category">
									<span class="p-category-item--6" data-url="http://tcdwp.info/tcd053/category/fashion/">FASHION</span>
								</div>
							</div>
						<h3 class="p-widget-list__item-title p-article__title">TCDテーマオリジナルウィジェットでサイトの見た目...</h3>
					</a>
				</li>
			</ul>
		</div> -->
	<div class="p-widget ranking_list_widget" id="ranking_list_widget-2">
		<h2 class="p-widget__title">人気記事ランキング</h2>
		<ol class="p-widget-list p-widget-list__ranking">
			<?php
				$args = array(
				'post_type' => 'post',
				'meta_key' => 'post_views_count',
				'orderby' => 'meta_value_num',
				'order'=>'DESC',
				'posts_per_page' => 3,
				);

				$the_query = new WP_Query( $args );
				if($the_query->have_posts()):
				while($the_query->have_posts()): $the_query->the_post();
				?>
			<li class="p-widget-list__item u-clearfix">
				<a class="p-hover-effect--type1" href="<?php echo get_permalink(); ?>">
				<?php echo get_the_post_thumbnail(array(100,100)); ?>
				<h3 class="p-widget-list__item-title p-article__title"><?php the_title(); ?></h3>
				<div class="p-widget-list__item-meta p-article__meta">
					<span class="p-article__views"><i class="fas fa-eye"></i><?php echo getPostViews() ?></span>
				</div>
					</a>
			</li>
			<?php endwhile;
			endif; ?>
			<?php wp_reset_postdata(); ?>
		</ol>

		<!-- <p class="p-widget__ranking-link"><a href="http://tcdwp.info/tcd053/ranking/" target="_blank">ランキング一覧</a></p> -->
	</div>
	<div class="p-widget styled_post_list1_widget" id="styled_post_list1_widget-4">
		<div class="p-widget tcdw_category_list_widget" id="tcdw_category_list_widget-2">
			<h2 class="p-widget__title">カテゴリー</h2>
			<ul class="p-widget-categories">
				<li class="cat-item cat-item-3"><?php wp_list_categories('title_li='); ?>
				</li>
			</ul>
		</div>
		<?php
			$newposts = get_posts( array(
			'post_type' => 'post',
			'posts_per_page' => '3'
			));
			if( $newposts ): ?>
			<h2 class="p-widget__title">最新記事</h2>
			<ul class="p-widget-list p-widget-list__type1">
			<?php foreach($newposts as $post):
			setup_postdata($post); ?>
			<li class="p-widget-list__item u-clearfix">
				<a class="p-hover-effect--type1" href="<?php echo get_permalink(); ?>">
					<div class="p-widget-list__item-thumbnail p-hover-effect__image">
						<?php echo get_the_post_thumbnail(); ?>
					</div>
					<h3 class="p-widget-list__item-title p-article__title"><?php the_title(); ?></h3>
					<p class="p-widget-list__item-meta p-article__meta"><time class="p-widget-list__item-date" datetime="2017-10-08"><?php echo get_the_date('Y.m.d'); ?></time></p>
				</a>
			</li>
			<?php endforeach; ?>
			</ul>
			<?php wp_reset_postdata();
			endif; ?>
		</div>
	<!-- <div class="p-widget tcdw_archive_list_widget" id="tcdw_archive_list_widget-2">
		<div class="p-dropdown">
			<div class="p-dropdown__title">月を選択</div>
			<ul class="p-dropdown__list">
				<li><a href="http://tcdwp.info/tcd053/2017/10/">2017年10月</a></li>
				<li><a href="http://tcdwp.info/tcd053/2017/07/">2017年7月</a></li>
				<li><a href="http://tcdwp.info/tcd053/2017/02/">2017年2月</a></li>
				<li><a href="http://tcdwp.info/tcd053/2017/01/">2017年1月</a></li>
				<li><a href="http://tcdwp.info/tcd053/2016/10/">2016年10月</a></li>
				<li><a href="http://tcdwp.info/tcd053/2016/08/">2016年8月</a></li>
				<li><a href="http://tcdwp.info/tcd053/2016/07/">2016年7月</a></li>
				<li><a href="http://tcdwp.info/tcd053/2016/01/">2016年1月</a></li>
				<li><a href="http://tcdwp.info/tcd053/2015/02/">2015年2月</a></li>
			</ul>
		</div>
	</div> -->
		<div class="p-widget tcdw_ad_widget" id="tcdw_ad_widget-2">
			<a href="https://cele-baby.net/monitor" target="_blank">
				<img src="https://cele-baby.net/media/wp-content/themes/cbmedia/assets/images/monitor1.png" alt="いつでもフォト">
			</a>
		</div>
	</div>         
            <!-- <?php dynamic_sidebar(); ?>  -->
</aside>