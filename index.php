<?php get_header(); ?>
<?php
  if ( get_option( 'site_width' ) == 'Custom Width' ) {
    fishing_general_body_widths( 'content_width', 'content', '<div id="fshing_main_body" class="d-flex" style="width: ' . get_option( 'content_custom_width' ) . get_option( 'content_custom_width_miters' ) . ';">', '<div id="fshing_main_body" class="d-flex container">', [ 'fshing_main_body', 'fshing_main_body', 'flex' => 'd-flex ' ] );
  }
?>
  <div class="d-flex" style="justify-content: space-between; width: inherit;">
    <main class="body_content">
      
      <featuredSlide><?php featuredSlide() ?></featuredSlide>
   
      <?php if ( have_posts() ): 
        ?> <div class="fishing_resent_posts"> <?php
        while ( have_posts() ) : the_post();

          ?> <article class="entry-articale"> 
              <div class="img-container">
                <a href="<?php echo get_the_permalink() ?>">
                  <?php the_post_thumbnail() ?>
                </a>
              </div>
              <div class="content-container"> 
                  <h2 class="entry-title"><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h2>
              <?php 
                echo '<div class="entry-content">';
                  the_excerpt();
                echo '</div>';
          ?>  </div> 
            </article> <?php
        endwhile; ?>
            <nav class="blog-page-pagination">
              <div class="prev-pagination">
                <?php previous_posts_link( '< Previous Page' ) ?>
              </div>
              <div class="nav_panel">
                <?php 
                for ($i=1; $i < get_option( 'posts_per_page' ) ; $i++): ?> 
                  <span><a href="/page/<?php echo $i ?>" ><?php echo $i ?></a></span>
                <?php endfor ?>
              </div>
              <div class="prev-pagination">
                <?php next_posts_link( 'Next Page >' ) ?>
              </div>
            </nav>
          </div>
        <?php
      endif; ?>

    </main>
    <?php get_sidebar() ?>
  </div>
<?php if ( get_option( 'site_width' ) == 'Custom Width' ) {
  print '</div>';

} ?>
<?php get_footer(); ?>
