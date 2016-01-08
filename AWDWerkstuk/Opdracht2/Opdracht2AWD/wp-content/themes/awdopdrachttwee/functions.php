<?php 

    function themeLoader() {
        
        //wp_enqueue_style(naam, worpress start path + toegevoegd deel, dependencies css, versie nummer, op welke apparaten laden (resolutie ...));
        //wp_enqueue_script(naam, worpress start path + toegevoegd deel, dependencies css, versie nummer, in footer laden of niet);
        
        //css
        wp_enqueue_style('foundationstyle', get_template_directory_uri() . "/css/foundation.min.css", array(), "1.0", 'all');
        wp_enqueue_style('customstyle', get_template_directory_uri() . "/css/app.css", array(), "1.0", 'all');
        
        //js
        wp_enqueue_script('jqueryjs', get_template_directory_uri() . "/js/vendor/jquery.min.js", array(), "1.0", "true");
        wp_enqueue_script('inputjs', get_template_directory_uri() . "/js/vendor/what-input.min.js", array(), "1.0", "true");
        wp_enqueue_script('foundationjs', get_template_directory_uri() . "/js/foundation.min.js", array(), "1.0", "true");
        wp_enqueue_script('customjs', get_template_directory_uri() . "/js/app.js", array(), "1.0", "true");
    }
    
    //add_action(scripts laden in browser, functies die moeten aangeroepen worden);
    add_action("wp_enqueue_scripts", 'themeLoader');

    //menus
    function register_my_menu() {
      register_nav_menu('header-menu',__( 'Header Menu' ));
    }
    add_action( 'init', 'register_my_menu' );
?>