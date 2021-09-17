<?php

function featuredSlide()
{
  echo '<div class="crasole-controlar"><div class="left"> < </div><div class="right"> > </div></div>';
  
  $featured = new WP_Query( [
    'type' => 'post',
    'posts_per_page' => 6
  ] );

  echo '<div class="full-featured1-container">';
  if ( $featured->have_posts() ) {
    $counter = 1;
    while( $featured->have_posts() ) { $featured->the_post();
      if ( get_the_post_thumbnail_url() ) { 
        echo '<div class="fishing_featured_image1_container imageNo'.$counter.'" style="background-image: url('. get_the_post_thumbnail_url() .')"><div class="overlay"><div><h2 class="featured-title"><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h2><div class="catagorys">'. get_the_category_list( '<span>, </span>' ) .'</div>';

        if ( get_the_tag_list( '', '<span>|</span> ', '' ) ) {
          echo get_the_tag_list( '', '<span>|</span> ', '' );
        }

        echo '<span><a href="'. get_the_author_meta('url') .'">'. get_the_author() .'</a></span>';

        echo '</div></div></div>';
        
        $counter++;
      }
    }
    echo '<span class="d-none featured1-data-el" data-counter="'.($counter-1).'" ></span>';
  }
  echo '</div>';

  echo '<div class="featured_dooted_redios">';
  for ($i=1; $i <= ($counter-1); $i++) { 
    echo '<input type="radio" name="featured_image1_sweater_redio" data-imageNo-featured1="'.$i.'" value="1" '.($i === 1 ? 'checked': '').'/>';
  }
  echo '</div>';
}