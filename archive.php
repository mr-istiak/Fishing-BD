<?php get_header(); ?>
<?php
  if ( get_option( 'site_width' ) == 'Custom Width' ) {
    fishing_general_body_widths( 'content_width', 'content', '<div id="fshing_main_body" class="d-flex" style="width: ' . get_option( 'content_custom_width' ) . get_option( 'content_custom_width_miters' ) . ';">', '<div id="fshing_main_body" class="d-flex container">', [ 'fshing_main_body', 'fshing_main_body', 'flex' => 'd-flex ' ] );
  }
?>
  <div class="d-flex" style="justify-content: space-between; width: inherit;">
    <main class="body_content">

      <?php if ( have_posts() ): 
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
        endwhile; 
      endif; ?>

    </main>
    <?php get_sidebar() ?>
  </div>
<?php if ( get_option( 'site_width' ) == 'Custom Width' ) {
  print '</div>';

} ?>
<?php get_footer(); ?>
