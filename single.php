<?php get_header(); ?>

<?php
// 記事のビュー数を更新(ログイン中・ロボットによる閲覧時は除く)
    if (!is_user_logged_in() && !is_robots()) {
        setPostViews(get_the_ID());
    }
?>

<main class="l-main">
	<div class="p-breadcrumb c-breadcrumb">
		<ul class="p-breadcrumb__inner c-breadcrumb__inner l-inner u-clearfix" itemscope="" itemtype="http://schema.org/BreadcrumbList">
			<li class="p-breadcrumb__item c-breadcrumb__item p-breadcrumb__item--home c-breadcrumb__item--home" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemscope="" itemtype="http://schema.org/Thing" itemprop="item">
				<i class="fas fa-home"></i>
					<span itemprop="name">HOME</span>
				</a>
				<!-- <meta itemprop="position" content="1"> -->
			</li>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				<!-- <a href="http://tcdwp.info/tcd053" itemscope="" itemtype="http://schema.org/Thing" itemprop="item">
					<span itemprop="name">ブログ</span>
				</a>
				<meta itemprop="position" content="2"> -->
				<span itemprop="name">ブログ</span>
			</li>
			<li class="p-breadcrumb__item c-breadcrumb__item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
				<!-- <a href="http://tcdwp.info/tcd053/category/cosme/" itemscope="" itemtype="http://schema.org/Thing" itemprop="item">
					<span itemprop="name">COSME</span>
				</a>
, 				<a href="http://tcdwp.info/tcd053/category/fashion/" itemscope="" itemtype="http://schema.org/Thing" itemprop="item">
					<span itemprop="name">FASHION</span>
				</a>
, 				<a href="http://tcdwp.info/tcd053/category/fashion/outer/" itemscope="" itemtype="http://schema.org/Thing" itemprop="item">
					<span itemprop="name">OUTER</span>
				</a>
				<meta itemprop="position" content="3"> -->
				<span itemprop="name"><?php the_archive_title(); ?> </span>
			</li>
			<li class="p-breadcrumb__item c-breadcrumb__item">
				<!-- <span itemprop="name">用途に応じてレスポンシブ対応をオフにすることも可能</span>
				<meta itemprop="position" content="4"> -->
				<span itemprop="name"><?php the_title(); ?></span>
			</li>
		</ul>
	</div>
	<div class="l-inner l-2colmuns u-clearfix">
		<article class="p-entry l-primary">

            <?php while (have_posts()) : the_post(); ?>

			<div class="p-entry__inner">

            <h1 class="p-entry__title"><?php the_title(); ?></h1>
                <!-- <h1 class="p-entry__title" style="text-align: center;">用途に応じて<br>レスポンシブ対応をオフにすることも可能</h1> -->
                
                <p class="p-entry__date" style="text-align: center;"><time><?php the_time('Y-m-d H:i:s'); ?></time></p>
                
				<div class="p-entry__thumbnail">
					<?php if (has_post_thumbnail()) : ?>
						<?php echo get_the_post_thumbnail(); ?>
					<?php else: ?>
						<?php //NoIMAGE?>
					<?php endif; ?>
					<!-- <img width="1000" height="690" src="./用途に応じてレスポンシブ対応をオフにすることも可能 – WordPressテーマ「Bloom (tcd053)」_files/25.jpg" class="attachment-full size-full wp-post-image" alt=""> -->
                    <div class="p-float-category">
						<span class="p-category-item--3">
							<?php foreach (get_the_category() as $category): // $category is instance of WP_Term(カテゴリー).?>
								<?php echo esc_html($category->name); ?>
							<?php endforeach; ?>
						</span>
					</div>
				</div>
				<div class="p-entry__body">
                    <?php the_content(); ?>
                </div>
                
				<!-- <?php the_author(); // The display name(ブログ上の表示名).?> -->
				
                <!-- <?php foreach (get_the_category() as $category): // $category is instance of WP_Term(カテゴリー).?>
                    <?php echo esc_html($category->name); ?>
                <?php endforeach; ?> -->

                <!-- <?php if ($tags = get_the_tags()): // Return either array or false.?>
                    <?php foreach ($tags as $tag): // $tag is instance of WP_Term(タグ).?>
                        <?php echo esc_html($tag->name); ?>
                    <?php endforeach; ?>
                <?php endif; ?> -->

                <!-- <?php if ($terms = get_the_terms(get_the_ID(), 'CUSTOM_TAXONOMY_NAME')): // Return either array or false when custom taxonomy exist.?>
                    <?php foreach ($terms as $term): // $term is instance of WP_Term(タグ).?>
                        <?php echo esc_html($term->name); ?>
                    <?php endforeach; ?>
                <?php endif; ?> -->
                <?php endwhile; ?>


				<!-- <div class="p-author__box u-clearfix">
					<div class="p-author__thumbnail">
						<a class="p-author__thumbnail__link p-hover-effect--type1" href="http://tcdwp.info/tcd053/author/designplus209/">
							<div class="p-hover-effect__image"><img alt="BLOOM" src="./用途に応じてレスポンシブ対応をオフにすることも可能 – WordPressテーマ「Bloom (tcd053)」_files/designplus209_avatar_1511246122-260x260.jpg" class="avatar avatar-260 photo" height="260" width="260"></div>
						</a>
					</div>
					<div class="p-author__info">
						<h3 class="p-author__title">BLOOM</h3><span class="p-author__views">2,640,003 views</span>						<p class="p-author__desc">大好きなものに囲まれる生活、その時の気分や少しずつ変わっていく大切なことや、楽しんでいることを書き綴っています。オシャレも暮らしも“心地よさ”を軸に。その時...</p>
						<ul class="p-social-nav"><li class="p-social-nav__item p-social-nav__item--url"><a href="http://design-plus1.com/tcd-w/" target="_blank"></a></li><li class="p-social-nav__item p-social-nav__item--facebook"><a href="http://twitter.com/designplus1" target="_blank"></a></li><li class="p-social-nav__item p-social-nav__item--twitter"><a href="http://twitter.com/designplus1" target="_blank"></a></li><li class="p-social-nav__item p-social-nav__item--instagram"><a href="https://www.instagram.com/" target="_blank"></a></li><li class="p-social-nav__item p-social-nav__item--pinterest"><a href="https://jp.pinterest.com/" target="_blank"></a></li></ul>
						<a class="p-author__link" href="http://tcdwp.info/tcd053/author/designplus209/">プロフィール</a>
					</div>
				</div> -->

				
				<?php
  				$share_url   = get_permalink();
 				$share_title = get_the_title();
				?>
				<ul class="p-entry__share c-share u-clearfix c-share--sm c-share--mono">
					<li class="c-share__btn c-share__btn--twitter">
					<a href="//twitter.com/share?text=<?=$share_title?>&url=<?=$share_url?>" title="Twitterでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=600');return false;">
							<i class="c-share__icn c-share__icn--twitter fab fa-twitter"></i>
							<span class="c-share__title">Tweet</span>
						</a>
					</li>
					<li class="c-share__btn c-share__btn--facebook">
					<a href="//www.facebook.com/sharer.php?src=bm&u=<?=$share_url?>&t=<?=$share_title?>" title="Facebookでシェア" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=800,width=600');return false;">
							<i class="c-share__icn c-share__icn--facebook fab fa-facebook-f"></i>
							<span class="c-share__title">Share</span>
						</a>
					</li>
					<li class="c-share__btn c-share__btn--google-plus">
					<a href="//plus.google.com/share?url=<?=$share_url?>" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=500');return false;" title="Google+で共有">
							<i class="c-share__icn c-share__icn--google-plus fab fa-google-plus-g"></i>
							<span class="c-share__title">+1</span>
						</a>
					</li>
					<!-- <li class="c-share__btn c-share__btn--hatebu">
						<a href="http://b.hatena.ne.jp/add?mode=confirm&amp;url=http%3A%2F%2Ftcdwp.info%2Ftcd053%2F2017%2F01%2F16%2Ffacebook-ogp%2F" onclick="javascript:window.open(this.href, &#39;&#39;, &#39;menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=510&#39;);return false;">
							<i class="c-share__icn c-share__icn--hatebu"></i>
							<span class="c-share__title">Hatena</span>
						</a>
					</li> -->
					<li class="c-share__btn c-share__btn--pocket">
					<a href="//getpocket.com/edit?url=<?=$share_url?>&title=<?=$share_title?>" target="_blank" title="Pocketに保存する">
							<i class="c-share__icn c-share__icn--pocket fab fa-get-pocket"></i>
							<span class="c-share__title">Pocket</span>
						</a>
					</li>
					<li class="c-share__btn c-share__btn--rss">
					<a href="//line.me/R/msg/text/?<?=$share_title.'%0A'.$share_url?>" target="_blank" title="LINEに送る">
							<i class="fab fa-line"></i>
							<span class="c-share__title">LINE</span>
						</a>
					</li>
					<!-- <li class="c-share__btn c-share__btn--feedly">
						<a href="http://feedly.com/index.html#subscription%2Ffeed%2Fhttp://tcdwp.info/tcd053/feed/" target="_blank">
							<i class="c-share__icn c-share__icn--feedly"></i>
							<span class="c-share__title">feedly</span>
						</a>
					</li> -->
					<!-- <li class="c-share__btn c-share__btn--pinterest">
						<a href="https://www.pinterest.com/pin/create/button/?url=http%3A%2F%2Ftcdwp.info%2Ftcd053%2F2017%2F01%2F16%2Ffacebook-ogp%2F&amp;media=http://tcdwp.info/tcd053/wp-content/uploads/2017/11/25.jpg&amp;description=%E7%94%A8%E9%80%94%E3%81%AB%E5%BF%9C%E3%81%98%E3%81%A6%3Cbr%3E%E3%83%AC%E3%82%B9%E3%83%9D%E3%83%B3%E3%82%B7%E3%83%96%E5%AF%BE%E5%BF%9C%E3%82%92%E3%82%AA%E3%83%95%E3%81%AB%E3%81%99%E3%82%8B%E3%81%93%E3%81%A8%E3%82%82%E5%8F%AF%E8%83%BD" rel="nofollow" target="_blank">
							<i class="c-share__icn c-share__icn--pinterest"></i>
							<span class="c-share__title">Pin it</span>
						</a>
					</li> -->
				</ul>

				
				<!-- <ul class="p-entry__meta c-meta-box u-clearfix"> -->
					<!-- <li class="c-meta-box__item c-meta-box__item--category">
						<a href="http://tcdwp.info/tcd053/category/cosme/" rel="category tag">COSME</a>, 
						<a href="http://tcdwp.info/tcd053/category/fashion/" rel="category tag">FASHION</a>, 
						<a href="http://tcdwp.info/tcd053/category/fashion/outer/" rel="category tag">OUTER</a>
					</li>					<li class="c-meta-box__item c-meta-box__item--tag"><a href="http://tcdwp.info/tcd053/tag/tag4/" rel="tag">テーマオプション</a></li>					<li class="c-meta-box__item c-meta-box__item--comment">コメント: <a href="http://tcdwp.info/tcd053/2017/01/16/facebook-ogp/#comment_headline">0</a></li>				</ul> -->
				<ul class="p-entry__nav c-entry-nav">
					<li class="c-entry-nav__item c-entry-nav__item--prev">
						<?php if ($older_post = get_previous_post()): // Return the instance of Post older than current if exist.?>
                    		<a href="<?php the_permalink($older_post); ?>"><?php echo esc_html(get_the_title($older_post)); ?></a>
						<?php endif; ?>
						<!-- <i class="far fa-angle-left"></i> -->
						<!-- <a href="http://tcdwp.info/tcd053/2017/01/15/eyecatchpost/" data-prev="前の記事">
							<span class="u-hidden-sm">記事ページ下部のアイキャッチ付き関連記事一覧</span>
						</a> -->
					</li>
					<li class="c-entry-nav__item c-entry-nav__item--next">
						<?php if ($newer_post = get_next_post()): // Return the instance of Post newer post than current if exist.?>
                    		<a href="<?php the_permalink($newer_post); ?>"><?php echo esc_html(get_the_title($newer_post)); ?></a>
						<?php endif; ?>
						<!-- <i class="fal fa-angle-right"></i> -->
						<!-- <a href="http://tcdwp.info/tcd053/2017/01/16/retina-2/" data-next="次の記事">
							<span class="u-hidden-sm">ロゴ画像を自動的にRetinaディスプレイに対応する機能を追加しました</span>
						</a> -->
					</li>
				</ul>

<!-- <div class="p-entry__ad">
<div class="p-entry__ad-item"><a href="http://design-plus1.com/tcd-w/"><img src="./用途に応じてレスポンシブ対応をオフにすることも可能 – WordPressテーマ「Bloom (tcd053)」_files/blog_ad_01.jpg" alt=""></a></div><div class="p-entry__ad-item"><a href="http://design-plus1.com/tcd-w/tcd045"><img src="./用途に応じてレスポンシブ対応をオフにすることも可能 – WordPressテーマ「Bloom (tcd053)」_files/blog_ad_02.jpg" alt=""></a></div></div>
			</div> -->


			<!-- <section class="p-entry__pickup">
				<div class="p-entry__pickup__inner">
					<h2 class="p-headline">ピックアップ記事</h2>
					<div class="p-entry__pickup-items">
						<article class="p-entry__pickup-item">
							<a class="p-hover-effect--type1" href="http://tcdwp.info/tcd053/2017/10/07/post2/">
								<div class="p-entry__pickup__thumbnail">
									<img width="500" height="348" src="./用途に応じてレスポンシブ対応をオフにすることも可能 – WordPressテーマ「Bloom (tcd053)」_files/18-500x348.jpg" class="attachment-size2 size-size2 wp-post-image" alt="">
									<div class="p-entry__pickup__category p-float-category u-visible-xs"><span class="p-category-item--1" data-url="http://tcdwp.info/tcd053/category/life/">LIFE</span></div>
								</div>
								<h3 class="p-entry__pickup__title p-article__title">ブログ収益化に重要なネイティブアド（インフィード広告）の表示...</h3>
								<p class="p-entry__pickup__meta p-article__meta u-visible-xs"><time class="p-entry__pickup__date" datetime="2017-10-07">2017.10.07</time><span class="p-entry__pickup__category"><span data-url="http://tcdwp.info/tcd053/category/life/">LIFE</span>, <span data-url="http://tcdwp.info/tcd053/category/fashion/hoodie/">HOODIE</span>, <span data-url="http://tcdwp.info/tcd053/category/fashion/">FASHION</span></span></p>
							</a>
						</article>
						<article class="p-entry__pickup-item">
							<a class="p-native-ad__link p-hover-effect--type1" href="http://design-plus1.com/tcd-w/tcd053" target="_blank">
								<div class="p-entry__pickup__thumbnail">
									<img src="./用途に応じてレスポンシブ対応をオフにすることも可能 – WordPressテーマ「Bloom (tcd053)」_files/ad-500x348.jpg" alt="">
									<div class="p-float-native-ad-label">PR</div>
								</div>
								<h3 class="p-entry__pickup__title p-article__title">おしゃれな進化系ブログテンプレート 「Bloom」</h3>
							</a>
						</article>
						<article class="p-entry__pickup-item">
							<a class="p-hover-effect--type1" href="http://tcdwp.info/tcd053/2017/10/08/shortcode/">
								<div class="p-entry__pickup__thumbnail">
									<img width="500" height="348" src="./用途に応じてレスポンシブ対応をオフにすることも可能 – WordPressテーマ「Bloom (tcd053)」_files/30-500x348.jpg" class="attachment-size2 size-size2 wp-post-image" alt="">
									<div class="p-entry__pickup__category p-float-category u-visible-xs"><span class="p-category-item--3" data-url="http://tcdwp.info/tcd053/category/cosme/">COSME</span></div>
								</div>
								<h3 class="p-entry__pickup__title p-article__title">高度な広告管理機能を搭載。広告のランダム表示やショートコード...</h3>
								<p class="p-entry__pickup__meta p-article__meta u-visible-xs"><time class="p-entry__pickup__date" datetime="2017-10-08">2017.10.08</time><span class="p-entry__pickup__category"><span data-url="http://tcdwp.info/tcd053/category/cosme/">COSME</span>, <span data-url="http://tcdwp.info/tcd053/category/fashion/shirt/">SHIRT</span>, <span data-url="http://tcdwp.info/tcd053/category/fashion/">FASHION</span></span></p>
							</a>
						</article>
					</div>
				</div>
			</section> -->

			<section class="p-entry__related">
				<div class="p-entry__related__inner">
					<!-- <h2 class="p-headline"><?php the_category('') ?>の関連記事</h2> -->
					<h2 class="p-headline">関連記事</h2>
					<?php
					foreach((get_the_category()) as $cat) {
					$catid = $cat->cat_ID ;
					break ;
					}
					$get_posts_parm = "'numberposts=10&category=" . $catid . "'";
					?>
					<div class="p-entry__related-items">
						<?php $posts = get_posts($get_posts_parm); ?>
						<?php foreach($posts as $post): ?>
						<article class="p-entry__related-item">
							<a class="p-hover-effect--type1" href="<?php echo get_permalink(); ?>">
								<div class="p-entry__related__thumbnail p-hover-effect--type1">
									<?php if (has_post_thumbnail()) : ?>
           	 							<?php echo get_the_post_thumbnail(); ?>
									<?php else: ?>
										<?php //NoIMAGE?>
									<?php endif; ?>
									<!-- <div class="p-entry__related__category p-float-category u-visible-xs">
										<span class="p-category-item--3" data-url="http://tcdwp.info/tcd053/category/cosme/">COSME</span>
									</div> -->
								</div>
								<h3 class="p-entry__related__title p-article__title"><?php the_title(); ?></h3>
								<p class="p-entry__related__meta p-article__meta u-visible-xs">
									<time class="p-entry__related__date" datetime="<?php the_time(); ?>"><?php the_time(); ?></time>
								</p>
							</a>
						</article>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
			
<!-- <div class="c-comment">
	<ul id="js-comment__tab" class="c-comment__tab u-clearfix">
	<li class="c-comment__tab-item is-active"><a href="http://tcdwp.info/tcd053/2017/01/16/facebook-ogp/#js-comment-area">コメント ( 0 )</a></li>
	<li class="c-comment__tab-item"><a href="http://tcdwp.info/tcd053/2017/01/16/facebook-ogp/#js-trackback-area">トラックバック ( 0 )</a></li>
	</ul>
	<div id="js-comment-area">
		<ol id="comments" class="c-comment__list">
			<li class="c-comment__list-item">
				<div class="c-comment__item-body"><p>この記事へのコメントはありません。</p></div>
			</li>
		</ol>
	</div> -->

	<!-- <div id="js-trackback-area" style="display: none;">
		<ol class="c-comment__list">
			<li class="c-comment__list-item">
				<div class="c-comment__item-body"><p>この記事へのトラックバックはありません。</p></div>
			</li>
		</ol>
		<div class="c-comment__input">
			<label class="c-comment__label">
				<span class="c-comment__label-text">トラックバック URL</span><input type="text" class="c-comment__trackback-url" name="trackback_url" value="http://tcdwp.info/tcd053/2017/01/16/facebook-ogp/trackback/" readonly="readonly" onfocus="this.select()">
			</label>
		</div>
	</div> -->

	<!-- <fieldset id="respond" class="c-comment__form-wrapper">
		<div class="c-comment__cancel">
			<a rel="nofollow" id="cancel-comment-reply-link" href="http://tcdwp.info/tcd053/2017/01/16/facebook-ogp/#respond" style="display:none;">返信をキャンセルする。</a>		</div>
		<form action="http://tcdwp.info/tcd053/wp-comments-post.php" class="c-comment__form" method="post">
			<div class="c-comment__input">
				<label><span class="c-comment__label-text">名前 ( 必須 )</span><input type="text" name="author" value="" tabindex="1" aria-required="true"></label>
			</div>
			<div class="c-comment__input">
				<label><span class="c-comment__label-text">E-MAIL ( 必須 ) ※ 公開されません</span><input type="text" name="email" value="" tabindex="2" aria-required="true"></label>
			</div>
			<div class="c-comment__input">
				<label><span class="c-comment__label-text">URL</span><input type="text" name="url" value="" tabindex="3"></label>
			</div>
			<div class="c-comment__input">
				<textarea id="js-comment__textarea" name="comment" tabindex="4"></textarea>
			</div>
<p style="display: none;"><input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="eaa7b306e2"></p><p style="display: none;"></p>			<input type="submit" class="c-comment__form-submit" tabindex="5" value="コメントをする">
			<div class="c-comment__form-hidden">
				<input type="hidden" name="comment_post_ID" value="246" id="comment_post_ID">
<input type="hidden" name="comment_parent" id="comment_parent" value="0">
			</div>
		</form>
	</fieldset> -->

		</article>
        <?php get_sidebar(); ?>
	</div>
</main>

<?php get_footer(); ?>