      <?php if ( get_option( 'site_width' ) == 'Custom Width' ) {
        fishing_general_body_widths( 'footer_width', 'footer', '<div style="width: ' . get_option( 'footer_custom_width' ) . get_option( 'footer_custom_width_miters' ) . ';">', '<div class="container">' );
      } ?>
       <footer class="py-5 bg-dark">
         <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
       </footer>
      <?php if ( get_option( 'site_width' ) == 'Custom Width' ) {
        print '</div>';
      } ?>
  <?php if ( esc_attr( get_option( 'site_width' ) ) == 'Boxed' && esc_attr( get_option( 'fishing_background' ) ) ==  'Background Image' ) : ?> 
  </div> <!-- overlay Container -->
  <?php endif; ?>  
   </div> <!-- container -->
     <?php wp_footer(); ?>
   </body>
</html>
