<?php

/**
 * Walker_Nav_Class For Top Menu
 */

 class Fishing_Bd_Walker_Nav_Primary extends Walker_Nav_menu {
   function start_lvl( &$output, $depth = 0, $args = array() ) {
     $indent = str_repeat("\t", $depth);
     $submenu = ($depth > 0) ? '-' . $depth : '';
     $output .= "\n$indent<ul class=\"sub-menu$submenu\" >\n";
   }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ //li a span

 		$indent = ( $depth ) ? str_repeat("\t",$depth) : '';

 		$li_attributes = '';
 		$class_names = $value = '';

 		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

 		$classes[] = ($depth == 0 && $args->walker->has_children) ? 'topmenu-dropdown' : '';
    $classes[] = ($depth > 0 && $args->walker->has_children) ? 'topmenu-dropdown-' . $depth : '';

 		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
 		$class_names = ' class="' . esc_attr($class_names) . '"';

 		$id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
 		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

 		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

 		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
 		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
 		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
 		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';

    $attributes .= ($item->current) ? ' id="active"' : '';
 		$attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle"' : '';

 		$item_output = $args->before;
 		$item_output .= '<a' . $attributes . '>';
 		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
 		$item_output .= ( $depth == 0 && $args->walker->has_children ) ? ' <b class="caret"></b></a>' : '</a>';
 		$item_output .= $args->after;

 		$output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

 	}
}

/**
 * Walker_Nav_Class For Main Menu
 */
class Fishing_Bd_Walker_Nav_Main extends Walker_Nav_Menu {

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $subSubMenuClass = ( $depth > 0 ) ? 'subSubMenu' : '';
    $output .= $indent . '<ul class="mainmenu-dropdown '. $subSubMenuClass .'">';
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
    } else {
        $t = "\t";
        $n = "\n";
    }
    $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

    $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;
    $classes[] = ( $item->current ) ? 'fishing-mainmanu-activ-area' : '';;
    $classes[] = ( $args->walker->has_children ) ? 'has-mainmenu-children-li' : '';
    $classes[] = ( $args->walker->has_children && $depth > 0 ) ? 'subMenu' : '';

    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

    $class_names = implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $class_names . '>';

    $atts           = array();
    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = ! empty( $item->target ) ? $item->target : '';
    if ( '_blank' === $item->target && empty( $item->xfn ) ) {
        $atts['rel'] = 'noopener';
    } else {
        $atts['rel'] = $item->xfn;
    }
    $atts['href']         = ! empty( $item->url ) ? $item->url : '';
    $atts['aria-current'] = $item->current ? 'page' : '';

    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

    $attributes = '';
    foreach ( $atts as $attr => $value ) {
        if ( is_scalar( $value ) && '' !== $value && false !== $value ) {
            $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
            $attributes .= ' ' . $attr . '="' . $value . '"';
        }
    }

    $title = apply_filters( 'the_title', $item->title, $item->ID );

    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

    $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-toggle"' : '';
    $attributes .= ( $item->current ) ? 'id="fishing-mainmenu-active-area-li-a"' : '';

    $item_output  = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . $title . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    
  }
  
}
