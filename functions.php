<?php

function theme_enqueue_styles() {
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );
  wp_enqueue_script( 'ajax-script', get_stylesheet_directory_uri() . '/js/custom_js.js?t'.time(), array('jquery') );

  wp_enqueue_script( 'select-script', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js', array('jquery') );

    wp_enqueue_script( 'jsmaps-libs', get_stylesheet_directory_uri().'/js/jsmaps/jsmaps-libs.js');

  wp_enqueue_script( 'jsmaps-panzoom', get_stylesheet_directory_uri().'/js/jsmaps/jsmaps-panzoom');

  wp_enqueue_script( 'jsmaps-min', get_stylesheet_directory_uri().'/js/jsmaps/jsmaps.min');

    wp_enqueue_style( 'jsmaps-css', get_stylesheet_directory_uri() . '/js/jsmaps/jsmaps.css' );
   wp_localize_script( 'ajax-script', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



     //wp_enqueue_style('bootstrap-min-css', get_stylesheet_directory_uri() .'/css/bootstrap.min.css');
     
    // wp_enqueue_script('bootstrap-min-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js');
     
function avada_lang_setup() {
    $lang = get_stylesheet_directory() . '/languages';
    load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

add_action( 'init', 'widgets_init' );
function widgets_init() {
    register_sidebar( array(
        'name' => __( 'Header Sidebar', 'text' ),
        'id' => 'header-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'text' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
     register_sidebar( array(
        'name' => __( 'Header Sidebar 2', 'page' ),
        'id' => 'header-sidebar-2',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'text' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'Header Sidebar 3', 'text1' ),
        'id' => 'header-sidebar-3',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'text1' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
     register_sidebar( array(
        'name' => __( 'Header Sidebar 4 ', 'page' ),
        'id' => 'header-sidebar-4',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'text' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
          register_sidebar( array(
        'name' => __( 'copyright', 'page' ),
        'id' => 'cpy_right',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'text' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );

       register_sidebar( array(
        'name' => __( 'Footer sidebar', 'page' ),
        'id' => 'footer-sidebar',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'text' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
                  register_sidebar( array(
        'name' => __( 'Footer sidebar-2', 'page' ),
        'id' => 'footer-sidebar-2',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'text' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
                  register_sidebar( array(
        'name' => __( 'Footer sidebar', 'page' ),
        'id' => 'footer-sidebar-3',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'text' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
    ) );
}
    function services_shortcode() {
        $args   =   array(
                    'post_type'         =>  'services_resources',
                    'post_status'       =>  'publish',
                    'order' => 'ASC',
                    'posts_per_page' => 10,
                    );
                    
        $postslist = new WP_Query( $args );
        global $post;
        if ( $postslist->have_posts() ) :
            
                $events  .= '<div class="slider services-lists">';
        
            while ( $postslist->have_posts() ) : $postslist->the_post();         
                $events    .= '<div class="services">';
                $events    .=  '<div class="services-image">' . get_the_post_thumbnail() . '</div>';
                $events    .= '<a class="services_title" href="'. get_permalink() .'">'. get_the_title() .'</a>';
                $events    .= '<div class="services-desc">' . get_the_excerpt() . '</div>';
                $events    .= '<a class="slider_more" href="' . get_permalink() . '">Explore More</a>';
            
                $events    .= '</div>';    
            endwhile;

            wp_reset_postdata();
            $events  .= '</div>';
            
            
        endif;    
        return $events;
    }
    add_shortcode( 'services', 'services_shortcode' ); 
    
     function events_shortcode() {
        $args   =   array(
                    'post_type'         =>  'event',
                    'post_status'       =>  'publish',
                    'order' => 'ASC',
                    'posts_per_page' => 10,
                    );
                    
        $postslist = new WP_Query( $args );
        global $post;
        if ( $postslist->have_posts() ) :
            
                $events  .= '<ul class="event_list">';
                 while ( $postslist->have_posts() ) : $postslist->the_post(); 
                 $events  .= '<li class="events-item">';   
                $events    .= '<div class="row aligner-sm">';
                $events    .=  '<div class="col-sm-3 logo-area">' . get_the_post_thumbnail() . '</div>';
                
                 $events   .= '<div class="col-sm-6 content-area">';
                $events    .=  '<p class="host-event official">' . get_field('academy_title') . '</p>';
                $events    .=  '<a href="'. get_permalink() .'"><h3 class="event-name" href=""><span>'. get_the_title() .'</span></h3></a>';
                $events   .= '<p class="event-venue">' . get_field('academy_place') . '</p>';
                $events   .= '<p class="event-date">' . get_field('event_date') . '</p>';
                $events   .= '<p class="event-sport sport">' .get_field('sport_name') . '</p>';
                $events   .= '</div>';
                $events   .= '<div class="col-sm-3 cta-area">';
               $events   .= ' <div class="text-center">';
               $events    .= '<a class="btn btn-primary btn-mobile-p btn btn-primary btn-mobile-primary load-more orange_btn" href="' . get_permalink() . '">Learn More</a>';
                $events   .= '</div>';
                 $events   .= '</div>';
            
                $events    .= '</div>';    
            endwhile;
             $events  .= '</li>';
             $events  .= '</ul>';
            wp_reset_postdata();
            
            
        endif;    
        return $events;
    }
    add_shortcode( 'events', 'events_shortcode' ); 
    
    
     function leagues_shortcode() {
        
        $args   =   array(
                    'post_type'         =>  'isa_leagues',
                    'post_status'       =>  'publish',
                    'order' => 'ASC',
                    'posts_per_page' => 10,
                    );
                    
        $postslist = new WP_Query( $args );
        global $post;
        if ( $postslist->have_posts() ) :
            
                $events  .= '<ul class="event_list">';
                while ( $postslist->have_posts() ) : $postslist->the_post(); 
                 $events  .= '<li class="events-item">';    
                $events    .= '<div class="row aligner-sm">';
                $events    .=  '<div class="col-sm-3 logo-area">' . get_the_post_thumbnail() . '</div>';
                
                 $events   .= '<div class="col-sm-6 content-area">';
                $events    .=  '<a href="'. get_permalink() .'"><h3 class="event-name" href=""><span>'. get_the_title() .'</span></h3></a>';
                $events   .= '<p class="event-venue">' . get_field('leagues_date') . '</p>';
        
                $events   .= '</div>';
                $events   .= '<div class="col-sm-3 notes-area">';
               $events   .= ' <div class="address_event">';
              $events   .= '<p>' . get_field('leagues_city') . '</p>';
               $events   .=   '<p>' . get_field('fields') . '</p>';
               $events    .=   '<p>' . get_field('age-groups') . '</p>';
               $events    .= '<a class="btn-primary btn-mobile-p btn-primary btn-mobile-primary load-more orange_btn" href="' . get_permalink() . '">Learn More</a>';
                $events   .= '</div>';
                 $events   .= '</div>';
            
                $events    .= '</div>';    
            endwhile;

            wp_reset_postdata();
            $events  .= '</li>';
             $events  .= '</ul>';
            
        endif;    
        return $events;
    }
    add_shortcode( 'leagues', 'leagues_shortcode' );
    

    // Taxonomy category shortcode
function cat_func($atts) {
    extract(shortcode_atts(array(
            'class_name'    => 'cat-post row',
            'totalposts'    => '-1',
            'category'      => '',
            'thumbnail'     => 'false',
            'excerpt'       => 'true',
            'orderby'       => 'post_date'
            ), $atts));

    $output = '<div class="'.$class_name.'">';
    global $post;
    $args = array(
        'posts_per_page' => $totalposts, 
        'orderby' => $orderby,
        'post_type' => 'camps_and_clinics',
        'tax_query' => array(
            array(
                'taxonomy' => 'camps',
                'field' => 'slug',
                'terms' => array( $category)
            )
        ));
    $myposts = NEW WP_Query($args);
        $events  .= '<ul class="event_list">';
    while($myposts->have_posts()) {
        $myposts->the_post();
                      $events  .= '<li class="events-item">';    
                 $events    .= '<div class="row aligner-sm">';
                $events    .=  '<div class="col-sm-3 logo-area">' . get_the_post_thumbnail() . '</div>';
                
                 $events   .= '<div class="col-sm-6 content-area">';
                $events    .=  '<p class="host-event official">' . get_field('academy_title') . '</p>';
                $events    .=  '<a href="'. get_permalink() .'"><h3 class="event-name" href=""><span>'. get_the_title() .'</span></h3></a>';
                $events   .= '<p class="event-venue">' . get_field('cclinics_title') . '</p>';
                $events   .= '<p class="event-date">' . get_field('clinics_place') . '</p>';
                $events   .= '<p class="event-sport sport">' .get_field('clinics_event_date') . '</p>';
                $events   .= '</div>';
                $events   .= '<div class="col-sm-3 cta-area">';
               $events   .= ' <div class="text-center">';
               $events    .= '<a class="btn-primary btn-mobile-p btn-primary btn-mobile-primary load-more orange_btn" href="' . get_permalink() . '">Learn More</a>';
                $events   .= '</div>';
                 $events   .= '</div>';
                $events    .= '</div>';   
    };
       wp_reset_query();
    $events  .= '</li>';
     $events  .= '</ul>';
 
    return $events;
}
add_shortcode('camps_clinic_category', 'cat_func');
    
    function eventcat_shortcode() {
        
        $terms = get_terms( 'category',array( 'post_type' => array('event') ));
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    $output = '<select name="event_cat" id="event_select">';
                    foreach ( $terms as $term ) {
                         $output.= '<option value="'. esc_attr( $term->term_id ) .'">
                    '. esc_html( $term->name ) .'</option>';
                    }
                     $output.='</select>';
                }
        return $output;
    }
    add_shortcode( 'event_category', 'eventcat_shortcode' );
    
    function leaguescat_shortcode() {
        
        $terms = get_terms( 'category',array( 'post_type' => array('isa_leagues') ));
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    $output = '<select name="leagues_cat" id="leagues_select">';
                    foreach ( $terms as $term ) {
                         $output.= '<option value="'. esc_attr( $term->term_id ) .'">
                    '. esc_html( $term->name ) .'</option>';
                    }
                     $output.='</select>';
                }
        return $output;
    }
    add_shortcode( 'leagues_category', 'leaguescat_shortcode' );
    
    function leagues_loc_shortcode() {
        
        $terms = get_terms( 'location',array( 'post_type' => array('isa_leagues') ));

                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    $output = '<select name="location" id="location_select">';
                    $output .='<option value="all">Select Location</option>';
                    foreach ( $terms as $term ) {
                         $output.= '<option value="'. esc_attr( $term->term_id ) .'">
                    '. esc_html( $term->name ) .'</option>';
                    }
                     $output.='</select>';
                }
        return $output;
    }
    add_shortcode( 'leagues_location', 'leagues_loc_shortcode' );

    function event_loc_shortcode() {
        
        $terms = get_terms( 'event_locations',array( 'post_type' => array('event') ));
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    $output = '<select name="event_locations" id="event_location_select">';
                    $output .='<option value="all">Select Location</option>';
                    foreach ( $terms as $term ) {
                         $output.= '<option value="'. esc_attr( $term->term_id ) .'">
                    '. esc_html( $term->name ) .'</option>';
                    }
                     $output.='</select>';
                }
        return $output;
    }
    add_shortcode( 'events_location', 'event_loc_shortcode' );

    function camps_clinics_loc_shortcode() {
        
        $terms = get_terms( 'camps',array( 'post_type' => array('camps_and_clinics') ));
                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                    $output = '<select name="camps" id="camps_clinics_select">';
                    foreach ( $terms as $term ) {
                         $output.= '<option value="'. esc_attr( $term->term_id ) .'">
                    '. esc_html( $term->name ) .'</option>';
                    }
                     $output.='</select>';
                }
        return $output;
    }
    add_shortcode( 'camps_clinics', 'camps_clinics_loc_shortcode' );
    
    
add_action( 'wp_ajax_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' );

add_action( 'wp_ajax_nopriv_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' ); 

function cvf_demo_pagination_load_posts() {

    global $wpdb;
    // Set default variables
    $events = '';

    if(isset($_POST['page'])){
        // Sanitize the received page   
        $page = sanitize_text_field($_POST['page']);
        $category = $_POST['category'];
        $loc_cat = $_POST['loc_cat'];
        $post_type = $_POST['post_type'];
         $publish_date = $_POST['publish_date'];
         $event_locations = $_POST['event_locations'];
         $camps_clinics_location=$_POST['camps_clinics_location'];
        $cur_page = $page;
        $page -= 1;
        // Set the number of results to display
        $per_page = 10;
        $previous_btn = true;
        $next_btn = true;
        $first_btn = true;
        $last_btn = true;
        $start = $page * $per_page;
    
            
            $args =  array(
                'post_type'         => $post_type,
                'post_status '      => 'publish',
                'orderby'           => 'post_date',
                'order'             => 'DESC',
                'posts_per_page'    => $per_page,
                'offset'            => $start,
            );
    if(isset($publish_date) && !empty($publish_date)){
                /*$args['date_query'] =  array(
                        'year' => date( 'Y',strtotime($publish_date) ),
                        'month' => date( 'm',strtotime($publish_date) ),
                        'day' => date( 'd', strtotime($publish_date) )
                    );
*/
 $args['meta_query'][] = array (
                                   'key' => 'event_date',
                                   'value' => date('Ymd',strtotime($publish_date)),
                                   'compare' => '='
                        );

            }

        
        if(isset($category) && !empty($category)){
                $args['tax_query'][] = array (
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $category,
                        );
            }
         
if(isset($loc_cat) && !empty($loc_cat)){
                $args['tax_query'][] = array (
                            'taxonomy' => 'location',
                            'field' => 'term_id',
                            'terms' => $loc_cat,
                        );
            }   
        if(isset($event_locations) && !empty($event_locations)){
                $args['tax_query'][] = array (
                            'taxonomy' => 'event_locations',
                            'field' => 'term_id',
                            'terms' => $event_locations,
                        );
            }   
   if(isset($camps_clinics_location) && !empty($camps_clinics_location)){
                $args['tax_query'][] = array (
                            'taxonomy' => 'camps',
                            'field' => 'term_id',
                            'terms' => $camps_clinics_location,
                        );
            } 
       $the_query = new WP_Query($args);
    
    if($the_query->have_posts()):

   $events  .= '<ul class="event_list">';
                 while ( $the_query->have_posts() ) : $the_query->the_post(); 
                 $events  .= '<li class="events-item">';   
                     if( get_post_type() == 'isa_leagues' ) {
                        $events    .= '<div class="row aligner-sm">';
                $events    .=  '<div class="col-sm-3 logo-area">' . get_the_post_thumbnail() . '</div>';
                
                 $events   .= '<div class="col-sm-6 content-area">';
                $events    .=  '<a href="'. get_permalink() .'"><h3 class="event-name" href=""><span>'. get_the_title() .'</span></h3></a>';
                $events   .= '<p class="event-venue">' . get_field('leagues_date') . '</p>';
        
                $events   .= '</div>';
                $events   .= '<div class="col-sm-3 notes-area">';
               $events   .= ' <div class="address_event">';
               $events   .= '<p>' . get_field('leagues_city') . '</p>';
               $events   .=   '<p>' . get_field('fields') . '</p>';
               $events    .=   '<p>' . get_field('age-groups') . '</p>';
               $events    .= '<a class="btn-primary btn-mobile-p btn-primary btn-mobile-primary load-more orange_btn" href="' . get_permalink() . '">Learn More</a>';
                $events   .= '</div>';
                 $events   .= '</div>';
            
                $events    .= '</div>'; 

                  } 

            if( get_post_type() =='camps_and_clinics' ) { 

               $events    .= '<div class="row aligner-sm">';
                $events    .=  '<div class="col-sm-3 logo-area">' . get_the_post_thumbnail() . '</div>';
                
                 $events   .= '<div class="col-sm-6 content-area">';
                $events    .=  '<p class="host-event official">' . get_field('academy_title') . '</p>';
                $events    .=  '<a href="'. get_permalink() .'"><h3 class="event-name" href=""><span>'. get_the_title() .'</span></h3></a>';
                $events   .= '<p class="event-venue">' . get_field('cclinics_title') . '</p>';
                $events   .= '<p class="event-date">' . get_field('clinics_place') . '</p>';
                $events   .= '<p class="event-sport sport">' .get_field('clinics_event_date') . '</p>';
                $events   .= '</div>';
                $events   .= '<div class="col-sm-3 cta-area">';
               $events   .= ' <div class="text-center">';
               $events    .= '<a class="btn-primary btn-mobile-p btn-primary btn-mobile-primary load-more orange_btn" href="' . get_permalink() . '">Learn More</a>';
                $events   .= '</div>';
                 $events   .= '</div>';
                $events    .= '</div>'; 
                  } 
                  
                 if( get_post_type() =='event' ){
                $events    .= '<div class="row aligner-sm">';
                $events    .=  '<div class="col-sm-3 logo-area">' . get_the_post_thumbnail() . '</div>';
                
                 $events   .= '<div class="col-sm-6 content-area">';
                $events    .=  '<p class="host-event official">' . get_field('academy_title') . '</p>';
                $events    .=  '<a href="'. get_permalink() .'"><h3 class="event-name" href=""><span>'. get_the_title() .'</span></h3></a>';
                $events   .= '<p class="event-venue">' . get_field('academy_place') . '</p>';
                $events   .= '<p class="event-date">' . get_field('event_date') . '</p>';
                $events   .= '<p class="event-sport sport">' .get_field('sport_name') . '</p>';
                $events   .= '</div>';
                $events   .= '<div class="col-sm-3 cta-area">';
               $events   .= ' <div class="text-center">';
               $events    .= '<a class="btn-primary btn-mobile-p btn-primary btn-mobile-primary orange_btn" href="' . get_permalink() . '">Learn More</a>';
                $events   .= '</div>';
                 $events   .= '</div>';
                $events    .= '</div>'; 
                  }
            endwhile;
             $events  .= '</li>';
             $events  .= '</ul>';
             
            wp_reset_postdata();

else:
   $events .= "No Event Found. Try again later";
endif;

      echo $events; 
wp_reset_postdata();

    }
    // Always exit to avoid further execution
    exit();}
    
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

 function coache_shortcode() {
        $args   =   array(
                    'post_type'         =>  'baseball_coaches',
                    'post_status'       =>  'publish',
                    'order' => 'ASC',
                    'posts_per_page' => 10,
                    );
                    
        $postslist = new WP_Query( $args );
        global $post;
        if ( $postslist->have_posts() ) :
            
                $events  .= '<div class="slider coaches-lists">';
        
            while ( $postslist->have_posts() ) : $postslist->the_post();   
            
            $customfield = get_field( "private_lesson" );
                 $events    .= '<div class="item-holder show">';
                $events    .=  '<p class="top_desigation">' .get_field( "hometown" ). '</p>';
                $events    .= '<div class="show_hide coaches">';
                $events    .=  '<div class="coaches-image">' . get_the_post_thumbnail() . '</div>';
                 $events    .= '<div class="content_box_out">';
                $events    .= '<a class="coaches_title">'. get_the_title() .'</a>';
                $events    .=  '<div class="desigation">' .get_field( "designation" ). '</div>';
                $events    .= '</div>';  
                $events    .= '</div>'; 
                 $events    .= '<div class="slidingDiv coache-content">';
                $events    .=  '<div class="coache-image">' . get_the_post_thumbnail() . '</div>';
                $events    .= '<div class="coach_cont_inner">';
                $events    .= '<a class="coache_title">'. get_the_title() .'</a>';
                $events    .= '<ul class="description-list">' ;
                $events    .=  '<li class="desigation">' .get_field( "designation" ). '</li>';
                $events    .=  '<li class="desigation">Hometown : ' .get_field( "hometown" ). '</li>';
                $events    .=  '<li class="langugae">Languages Spoken : ' .get_field( "languages_spoken" ). '</li>';
                $events    .= '</ul>' ;
                $events    .= '<div class="coache-desc">' . get_the_excerpt() . '</div>';
                $events    .= '<a class="coaches_more" href="' . get_permalink() . '">View full bio</a>';
                //$events    .= '<a class="book_lesson " href="#">Book Lesson</a>';
                //$events    .= ' <button type="button" class="btn btn-lg btn-primary orange_btn" data-custom="'.$customfield.'">Book Lesson</button>';
                $events    .= '<a href="'.get_field( "book_lesson" ).'"class="orange_btn">Book Lesson</a>';
                 $events    .= '</div>';  
                 $events    .= '</div>';
                $events    .= '</div>';
          

                
            endwhile;

            wp_reset_postdata();
            $events  .= '</div>';
            
            
        endif;    
        return $events;
    }
    add_shortcode( 'coaches', 'coache_shortcode' ); 
    
    
    function position_training_shortcode() {
        $args   =   array(
                    'post_type'         =>  'position_training',
                    'post_status'       =>  'publish',
                    'order' => 'ASC',
                    'posts_per_page' => 10,
                    );
                    
        $postslist = new WP_Query( $args );
        global $post;
        if ( $postslist->have_posts() ) :
            
                $events  .= '<div class="row content bottom-margin--none">';
        
            while ( $postslist->have_posts() ) : $postslist->the_post();         
                $events    .= '<div class="col-xs-12 col-sm-4 copy position bottom-margin--light">';
                $events    .=  '<div class="number-holder">';
                $events    .=  '<div class="number">';
                $events    .= ' <p>&nbsp;</p>';
                $events    .= '</div>';
                $events    .= '</div>';
                $events    .=  '<div class="position-description">';
                $events    .= '<h4>'. get_the_title() .'</h4>';
                $events    .= '<p>' . get_the_excerpt() . '</p>';
                $events    .= '</div>';
              //  $events    .= ' <div class="position-photo">';  
            //  $events    .= ' <div class="position-photo-holder">';
            //  $events    .=  '<div class="services-image">' . get_the_post_thumbnail() . '</div>';
             //   $events    .= '</div>';
            //  $events    .= '</div>';
               $events    .= '</div>';
         
            endwhile;

            wp_reset_postdata();
            $events  .= '</div>';
            
            
        endif;    
        return $events;
    
    }
    add_shortcode( 'position_training', 'position_training_shortcode' ); 
    

    
    function mytheme_custom_excerpt_length( $length ) {
    return 60;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

function my_wpcf7_form_elements($html) {
    function ov3rfly_replace_include_blank($name, $text, &$html) {
        $matches = false;
        preg_match('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $html, $matches);
        if ($matches) {
            $select = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $matches[0]);
            $html = preg_replace('/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU', $select, $html);
        }
    }
  
        ov3rfly_replace_include_blank('menu-864', 'Gender', $html);
      ov3rfly_replace_include_blank('menu-862,menu-861', 'Age Division', $html);
        ov3rfly_replace_include_blank('menu-550,menu-526,menu-283', 'country', $html);
    ov3rfly_replace_include_blank('menu-93', 'Sport signing up for', $html);
      ov3rfly_replace_include_blank('menu-863', 'Interested in', $html);
    return $html;
}
add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');


/* Enable Shortcode in Gravity Forms */

add_filter( 'gform_get_form_filter', 'shortcode_unautop', 11 );
add_filter( 'gform_get_form_filter', 'do_shortcode', 11 );

add_shortcode( 'cr_custom_registration', 'custom_registration_shortcode' );
 
// The callback function that will replace [book]
function custom_registration_shortcode() {
   echo' <div class="fusion-builder-row fusion-row">
        <h2 class="coach_hd">Coach form</h2>
        <div class="coach_fm">
   <form  method="post" id="regi-form" class="post-form" enctype="multipart/form-data">
            <div class="row row_coach">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                <label>Team Name</label>
                  <input type="text" class="rguname" name="name" value="" placeholder="Team Name">
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                <label>Attach Logo</label>
            <input type="file" class="rglogo" name="rglogo" id="myFile" />
            </div>
            </div>
            <div class="row row_coach">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                <label>Country</label>
                <select name="countrydrop" class="rgcountry"></select>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                <label>City</label>
                   <input type="text" class="rgteamhome" name="hometown" value="" placeholder="City" required/>
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                <label>State or Province</label>
                    <input type="text" class="rgorganization" name="organization" value="" placeholder="State or Province"  required/>
            </div>
            </div>
            <div class="row row_coach">
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 coach_radio">
                <label>ISA Partner</label>
                <input type="radio" name="radioBtnClass" value="yes"> Yes
                <input type="radio" name="radioBtnClass" value="no"> No
            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                <a class="ster_coach" href="javascript:void(0)" onclick="playerappend()">Add Roster</a>
            </div>
                     <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                      <div class="formcoach_list">
                         <a class="add-coache" href="#">Add Coaches</a>
                     </div>
               
            </div>
            </div>
            <div class="desktop-div">
            <div class="coach2_form playeraddes" data-count="0">
                <div class="row desktop-label">
                        <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                            <label>First Name</label>
                        </div>
                        <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                            <label>Last Name</label>
                        </div>
                        <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                            <label>Birth Date</label>
                        </div>
                        <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                            <label>Attach Birth Certificate</label>
                 
                        </div>
                        <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                            <label>Attach Player Photo</label>
                 
                        </div>
                        <div class="col-12 col-sm-2 col-md-2 col-lg-2">
                        </div>
                </div>       
                  
          
            <div class="rowhtml"></div>

                  </div>
                   </div>
           
         <div class="coahes-boxes">
             <div class="coachlist_formbox coach2_form">
                <div class="row row_coach">
                   <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                         <label>First Name</label>
                        <input type="text" class="form-control coafirstname" name="coafirstname" placeholder="First Name">
                    </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                        <label>Last Name</label>
                        <input type="text" class="form-control coalastname"  name="coalastname" placeholder="Team Name">
                    </div>
                     </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                        <label>Coaches</label>
                        <select class="coatype" name="coatype">
                            <option>Select</option>
                            <option vlaue="head-coach">Head Coach (Manager)</option>
                            <option value="coach-assistant">Coach Assistant</option>
                        </select>
                    </div>
                   </div>
                        <div class="col-12 col-sm-3 col-md-3 col-lg-3"><label>Coach Image</label><input type="file" id="myFile3" name="coach-img"></div>
                </div>
                </div>
                <div class="coachlist_formbox coach2_form">
                <div class="row row_coach">
                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                         <label>First Name</label>
                        <input type="text" class="form-control coafirstname2" name="coafirstname2" placeholder="First Name">
                    </div>
                     </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                        <label>Last Name</label>
                        <input type="text" class="form-control coalastname2" name="coalastname2" placeholder="Team Name">
                    </div>
                     </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                        <label>Coaches</label>
                        <select class="coatype2" name="coatype2">
                            <option>Select</option>
                            <option vlaue="head-coach">Head Coach (Manager)</option>
                            <option value="coach-assistant">Coach Assistant</option>
                        </select>
                    </div>
                     </div>
                            <div class="col-12 col-sm-3 col-md-3 col-lg-3"><label>Coach Image</label><input type="file" id="myFile3" name="coach-img-2"></div>
            
                </div>
                </div>
                 <div class="coachlist_formbox coach2_form">
                <div class="row row_coach">
                  <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                         <label>First Name</label>
                        <input type="text" class="form-control coafirstname3"  name="coafirstname3" placeholder="First Name">
                    </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                        <label>Last Name</label>
                        <input type="text" class="form-control coalastname3" name="coalastname3" placeholder="Team Name">
                    </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                        <label>Coaches</label>
                        <select class="coatype3" name="coatype3">
                            <option>Select</option>
                            <option vlaue="head-coach">Head Coach (Manager)</option>
                            <option value="coach-assistant">Coach Assistant</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3"><label>Coach Image</label><input type="file" id="myFile3" name="coach-img-3"></div>
                </div>
            </div>
                <div class="coachlist_formbox coach2_form">
                <div class="row row_coach">
                <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                         <label>First Name</label>
                        <input type="text" class="form-control coafirstname4" name="coafirstname4" placeholder="First Name">
                    </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                        <label>Last Name</label>
                        <input type="text" class="form-control coalastname4" name="coalastname4" placeholder="Team Name">
                    </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="coach_list_box">
                        <label>Coaches</label>
                        <select class="coatype4" name="coatype4">
                            <option>Select</option>
                            <option vlaue="head-coach">Head Coach (Manager)</option>
                            <option value="coach-assistant">Coach Assistant</option>
                        </select>
                    </div>
                  </div>
                   <div class="col-12 col-sm-3 col-md-3 col-lg-3"><label>Coach Image</label><input type="file" id="myFile3" name="coach-img-4"></div>
    
                       
            </div>
               </div>
               <input type="hidden" name="action" value="set_form" />
    <input type="submit" class="submit team_submit" name="submit" value="Register"/>
        </form>
        <span class="success" style="display:none"> Form Submitted Success</span>

    </div>';
 
}

 

// THE AJAX ADD ACTIONS
add_action( 'wp_ajax_set_form', 'set_form' );    //execute when wp logged in
add_action( 'wp_ajax_nopriv_set_form', 'set_form'); //execute when logged out
function set_form(){

    $name = $_POST['name'];
    $rglogo= $_FILES['rglogo'];
    $rgcountry=$_POST['countrydrop'];
    $rginrank=$_POST['rginrank'];
    $hometown=$_POST['hometown'];
    $organization=$_POST['organization'];
    $radioBtnClass=$_POST['radioBtnClass'];
    $coafirstname=$_POST['coafirstname']; 
    $coalastname =$_POST['coalastname']; 
    $coatype =$_POST['coatype'];
    $coafirstname2=$_POST['coafirstname2']; 
    $coalastname2 =$_POST['coalastname2']; 
    $coatype2 =$_POST['coatype2'];
    $coafirstname3=$_POST['coafirstname3']; 
    $coalastname3 =$_POST['coalastname3']; 
    $coatype3 =$_POST['coatype3'];
    $coafirstname4=$_POST['coafirstname4']; 
    $coalastname4 =$_POST['coalastname4']; 
    $coatype4 =$_POST['coatype4'];
     $filescoach = $_FILES["coach-img"]; 
     $filescoach2 = $_FILES["coach-img-2"]; 
     $filescoach3 = $_FILES["coach-img-3"]; 
     $filescoach4 = $_FILES["coach-img-4"]; 
    
 $slug=strtolower($name);

 $slug = preg_replace("/[^a-zA-Z]+/", "_", $slug);
$teamlogoID = upload_user_file('rglogo');  //Call function 

 
if($_POST['first_name']){

$files1 = $_FILES["file1"]; 
$files2 = $_FILES["file2"]; 



$cid = wp_insert_term( $name, 'coache_team', array( 'slug' => $slug ) );

if ( ! is_wp_error( $cid ) )
{

$image_attributes = wp_get_attachment_image_src( $teamlogoID );
 $postid = $cid['term_id'] ;
// update_term_meta($postid,'field_6013f0d0b384a',$image_attributes[0]);
 //update_field("field_6013f0d0b384a", 'coache_team_'.$cid, $teamlogoID);
update_option('_category_image'.$postid,$image_attributes[0] );
update_term_meta($postid,'field_6013f0d0b384a',$teamlogoID);
update_term_meta($postid,'team_title',$name);
update_term_meta($postid,'team_country',$rgcountry);
update_term_meta($postid,'international_rank',$rginrank);
update_term_meta($postid,'team_member_home_town',$hometown);
update_term_meta($postid,'organization',$organization);
update_term_meta($postid,'isa_partner',$radioBtnClass);
update_term_meta($postid,'coache_first_name',$coafirstname);
update_term_meta($postid,'coache_last_name',$coalastname);
update_term_meta($postid,'coach_type',$coatype);
update_term_meta($postid,'coach_first_name_2',$coafirstname2);
update_term_meta($postid,'coache_last_name_2',$coalastname2);
update_term_meta($postid,'coach_type_2',$coatype2);
update_term_meta($postid,'coach_first_name_3',$coafirstname3);
update_term_meta($postid,'coache_last_name_3',$coalastname3);
update_term_meta($postid,'coach_type_3',$coatype3);
update_term_meta($postid,'coach_first_name_4',$coafirstname4);
update_term_meta($postid,'coache_last_name_4',$coalastname4);
update_term_meta($postid,'coach_type_4',$coatype4);
//update_field("field_6013f0d0b384a", $teamlogoID, $postid );


  $files = array( 
                            'name' => $filescoach['name'],
                            'type' => $filescoach['type'], 
                            'tmp_name' => $filescoach['tmp_name'], 
                            'error' => $filescoach['error'],
                            'size' => $filescoach['size']
                        );

    $attach_id3 = upload_user_file('coach-img',$postid); 
update_term_meta( $postid, 'coach_image', $attach_id3);

  $files = array( 
                            'name' => $filescoach2['name'],
                            'type' => $filescoach2['type'], 
                            'tmp_name' => $filescoach2['tmp_name'], 
                            'error' => $filescoach2['error'],
                            'size' => $filescoach2['size']
                        );

    $attach_id4 = upload_user_file('coach-img-2',$postid); 
update_term_meta( $postid, 'coach_image_2', $attach_id4);

 $files = array( 
                            'name' => $filescoach3['name'],
                            'type' => $filescoach3['type'], 
                            'tmp_name' => $filescoach3['tmp_name'], 
                            'error' => $filescoach3['error'],
                            'size' => $filescoach3['size']
                        );

    $attach_id5 = upload_user_file('coach-img-3',$postid); 
update_term_meta( $postid, 'coach_image_3', $attach_id5);

 $files = array( 
                            'name' => $filescoach4['name'],
                            'type' => $filescoach4['type'], 
                            'tmp_name' => $filescoach4['tmp_name'], 
                            'error' => $filescoach4['error'],
                            'size' => $filescoach4['size']
                        );

    $attach_id6 = upload_user_file('coach-img-4',$postid); 
update_term_meta( $postid, 'coach_image_4', $attach_id6);


foreach ($files1['name'] as $key => $value) {  

         if ($files1['name'][$key]) { 

        $fname=$_POST['first_name'][$key];
        $lname=$_POST['last_name'][$key];
        $rbirth=$_POST['birth'][$key];
        
        $my_post = array(
        'post_title'    => $fname,
        'post_type' => 'teams',
        'post_status'   => 'publish',
        'post_author'   => $user_id
        ); 

       
        $user_id = get_current_user_id();
        $postID=wp_insert_post( $my_post );
        $term_taxonomy_ids = wp_set_object_terms($postID, $postid, 'coache_team', true );


        // save file 1
                 $files = array( 
                            'name' => $files1['name'][$key],
                            'type' => $files1['type'][$key], 
                            'tmp_name' => $files1['tmp_name'][$key], 
                            'error' => $files1['error'][$key],
                            'size' => $files1['size'][$key]
                        );


                $_FILES = array ("file1" => $files);

                foreach ($_FILES as $files => $array) {  

                     $attach_id1 = upload_user_file($files,$postID); 
                }

        // save file 2 
        
                  $files = array( 
                            'name' => $files2['name'][$key],
                            'type' => $files2['type'][$key], 
                            'tmp_name' => $files2['tmp_name'][$key], 
                            'error' => $files2['error'][$key],
                            'size' => $files2['size'][$key]
                        ); 
                $_FILES = array ("file2" => $files);
                foreach ($_FILES as $files => $array) {  

                      $attach_id2 = upload_user_file($files,$postID); 
                }        



        update_field('roster_last_name',$lname, $postID);
        update_field('roster_birth_date',$rbirth, $postID);
 
        if($attach_id1) {    
       
      update_field("field_602a15c89eb76", $attach_id1, $postID );
        }

        
        if( $attach_id2) {    
        
       // update_post_meta($postID, '_thumbnail_id', $attach_id2);
                set_post_thumbnail($postID, $attach_id2 );
        }
}

    }
}
}

else
{
     
     echo $cid->get_error_message();
}
echo $slug;

    die();

}
add_action( 'wp_ajax_pp_update_form', 'pp_update_form' );    //execute when wp logged in
add_action( 'wp_ajax_nopriv_pp_update_form', 'pp_update_form'); //execute when logged out
function pp_update_form(){ 

  $postsids = $_POST['postsids'];
    $pname = $_POST['player_first_name'];
   $plastname = $_POST['player_last_name'];
    $pbirthdate = $_POST['player_birth'];
    $pbirthcerti = $_FILES['player_attach_birth']; 
    $playerimg = $_FILES['player_feats'];

    //echo $postsids;
$my_posts = array(
    'ID'           => $postsids,
    'post_title'   => $pname, 
     'post_type' => 'teams',
     'post_status' => 'publish', 
);

// Update the post into the database
wp_update_post( $my_posts );


 update_field('roster_last_name',$plastname,$postsids);
update_field('roster_birth_date',$pbirthdate,$postsids);

  $files = array( 
                            'name' => $pbirthcerti['name'],
                            'type' => $pbirthcerti['type'], 
                            'tmp_name' => $pbirthcerti['tmp_name'],
                            'error' => $pbirthcerti['error'],
                            'size' => $pbirthcerti['size']
                        ); 
    $attach_id6 = upload_user_file('player_attach_birth',$postsids); 
update_field('attach_birth_certificate',$attach_id6,$postsids);
 $files = array( 
                            'name' => $playerimg ['name'],
                            'type' => $playerimg ['type'], 
                            'tmp_name' => $playerimg ['tmp_name'], 
                            'error' => $playerimg ['error'],
                            'size' => $playerimg ['size'],
                        ); 
  $attach_id7 = upload_user_file('player_feats',$postsids); 
  set_post_thumbnail($postsids, $attach_id7);

 //update_field('roster_last_name',$plastname, $playerpostID);
}

/****************************************************/
/***********upload file in server *******************/
/****************************************************/

 function upload_user_file($name,$post_id=null) { 
 
      // check to make sure its a successful upload
    // changes start
    if ($_FILES[$name]['error'] !== UPLOAD_ERR_OK) {
        return __return_false();
    }
    // changes end
   
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

     $attach_id = media_handle_upload( $name,$post_id );
     
  
     return $attach_id;

    if ( is_wp_error( $attach_id ) ) {
       echo 'error';
    } else {
       echo $slug;
    }
 }

