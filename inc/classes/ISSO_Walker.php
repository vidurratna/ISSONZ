<?php

class ISSO_Walker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "\n<ul class='menu-child absolute bg-gray-100 p-2 w-40'>\n";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "</ul >";
    }

    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;
    
        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a class="m-2 xl:m-4 uppercase block font-medium tracking-wide text-secondaray font-quicksand hover:text-primary duration-300 transition ease-out" href="' . $permalink . '">';
        } else {
            $output .= '<span class="m-2 xl:m-4 uppercase block font-medium tracking-wide text-secondaray font-quicksand hover:text-primary duration-300 transition ease-out">';
        }
         
        $output .= $title;
  
        if( $description != '' && $depth == 0 ) {
            $output .= '<small class="description">' . $description . '</small>';
        }
  
        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }
}