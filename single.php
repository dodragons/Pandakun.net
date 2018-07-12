<?php get_header(); ?>
<article>
  <div class="entry-wrap">
    <div class="entry-inner">
      <div class="entry-post">
      
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <figure><?php 
if ( has_post_thumbnail() ) { // 投稿にアイキャッチ画像が割り当てられているかチェック
		the_post_thumbnail( ); 
}
?></figure>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-date"><?php the_time('F j, Y'); ?>（<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . '前'; ?>）</div>
        
         <?php the_content(); ?>
        
         <?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
		  
		  <!-- コメントの表示 -->
		<?php comments_template(); ?>
		  
      </div>
    </div>
  </div>
</article>
<?php get_footer();