<?php get_header(); ?>
<main>
  <div class="main-wrap">
    <div class="main-description">
      <p>こんにちは。ここはPandakunの個人サイトです。プログラミング言語「Scratch (スクラッチ)」で制作したプロジェクトを紹介しています。過去作から順に紹介ページを作成しています。最近のプロジェクトは<a href="https://scratch.mit.edu/users/pandakun/" target="_blank">Scratchサイト</a>を見てください。Tipやチュートリアル、素材データを公開する予定です。</p>
    </div>
    <div class="article-list">
      <div class="article-inner">
      
       <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
       <article class="article-item"> <a href="<?php the_permalink(); ?>">
        <div class="article-item-image">
       <figure><?php 
if ( has_post_thumbnail() ) { // 投稿にアイキャッチ画像が割り当てられているかチェック
		the_post_thumbnail(); 
} 
?></figure>
</div>
<div class="article-item-text">
      <h2 class="article-item-title"><?php the_title(); ?></h2>
      <p class="article-item-excerpt"><?php the_excerpt(); ?></p>
      <ul class="article-item-meta">
              <li>
                <time class="article-item-date" datetime="<?php the_time('Y-n-j'); ?>T<?php the_time('g:i'); ?>" ><?php the_time('F j, Y'); ?></time>
              </li>
              <li><span class="article-item-cat"><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span></li>
            </ul>
           
          </div>
          </a></article>
      <?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
      
      
      </div>
    </div>
  </div>
</main>
<?php get_footer();