<?php 
/* 
Plugin Name: AWD Taak Plugin
Plugin URI: http://example.com/wordpress-plugins/my-plugin
Description: Dit is een plugin die social media icons zal voorzien in een website.
Version: 1.0 
Author: Glen Van Haver 
Author URI:
*/


//Menu met submenu

function awd_menu_pages(){
    add_menu_page('Awd Menu Page Title', 'AWD Menu Title', 'manage_options', 'awd-menu', 'awd_menu_output' );
    add_submenu_page('awd-menu', 'Submenu Title 1', 'Submenu1', 'manage_options', 'awd-menu' );
    add_submenu_page('awd-menu', 'Submenu Title 2', 'Submenu2', 'manage_options', 'awd_menu' );
}

//Menu pagina content

function awd_menu_output() {
    echo "Dit is een menu item";
}

add_action('admin_menu', 'awd_menu_pages');







//Metabox toevoegen aan post page

add_action('admin_init','awd_custom_meta_box');

function awd_custom_meta_box() {
    add_meta_box('awd-meta',__('Auteur van de post','awd-plugin'), 'awd_meta_callback','post','side','default');
    add_action('save_post','awd_save_meta_box');
}

//Content voor de meta box

function awd_meta_callback( $post ) {
    $awd_posted = get_post_meta($post->ID,'_awd_posted',true);

    echo '<p>' .__('Geschreven door ','awd-plugin'). ': <input type="text" name="awd_posted" value="'.esc_attr($awd_posted).'" size="5" /></p>';
}

//Content van de meta box saven

function awd_save_meta_box($post_id,$post) {

    if($post->post_type == 'revision') { 
        return; 
    }

    if(isset($_POST['awd_posted'])) {
        update_post_meta($post_id,'_awd_posted', esc_attr($_POST['awd_posted']));
    }
    
}






//Social media plugin settings


//setting submenu aanmaken

add_action('admin_menu', 'social_media_create_menu');
function social_media_create_menu() {
    
    add_menu_page('Social Media Plugin Settings', 'Social Media', 'administrator' , __FILE__, 'social_media_settings_page');
    
    
    add_action( 'admin_init', 'social_media_register_settings' );
}


//opslaan van de settings

function social_media_register_settings() { 
    //register our settings 
    register_setting( 'social_media-settings-group', 'social_media_option_aanspreking' );
    register_setting( 'social_media-settings-group', 'social_media_option_icon_vorm' );
    register_setting( 'social_media-settings-group', 'social_media_option_facebookURL' );
    register_setting( 'social_media-settings-group', 'social_media_option_twitterURL' );
    register_setting( 'social_media-settings-group', 'social_media_option_googleplusURL' );
    register_setting( 'social_media-settings-group', 'social_media_option_linkedinURL' );
}

//conent voor setting pagina

function social_media_settings_page() { 
?>
    <div class="wrap">
        <h2><?php _e('Social Media Plugin Options', 'social-media-plugin') ?></h2>
        <form method="post" action="options.php">
            <?php settings_fields( 'social_media-settings-group' ); ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">
                            <?php _e('Aanspreking', 'social-media-plugin') ?>
                        </th>
                        <td>
                            <input type="text" name="social_media_option_aanspreking" value="<?php echo get_option('social_media_option_aanspreking'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <?php _e('Icon vorm', 'social-media-plugin') ?>
                        </th>
                        <td>
                            <select name=social_media_option_icon_vorm>
                                <option value="Polygon" <?php echo (strcmp( "Polygon", get_option( 'social_media_option_icon_vorm'))==0 ? " selected" : ""); ?>>Polygon</option>
                                <option value="Rectangular" <?php echo (strcmp( "Rectangular", get_option( 'social_media_option_icon_vorm'))==0 ? " selected" : ""); ?>>Rectangular</option>
                                <option value="Rounded" <?php echo (strcmp( "Rounded", get_option( 'social_media_option_icon_vorm'))==0 ? " selected" : ""); ?>>Rounded</option>
                                <option value="RoundedCorners" <?php echo (strcmp( "RoundedCorners", get_option( 'social_media_option_icon_vorm'))==0 ? " selected" : ""); ?>>Rounded Corners</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <?php _e('Facebook URL', 'social-media-plugin') ?>
                        </th>
                        <td>
                            <input type="text" name="social_media_option_facebookURL" value="<?php echo get_option('social_media_option_facebookURL'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <?php _e('Twitter URL', 'social-media-plugin') ?>
                        </th>
                        <td>
                            <input type="text" name="social_media_option_twitterURL" value="<?php echo get_option('social_media_option_twitterURL'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <?php _e('Google Plus URL', 'social-media-plugin') ?>
                        </th>
                        <td>
                            <input type="text" name="social_media_option_googleplusURL" value="<?php echo get_option('social_media_option_googleplusURL'); ?>" />
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">
                            <?php _e('Linkedin URL', 'social-media-plugin') ?>
                        </th>
                        <td>
                            <input type="text" name="social_media_option_linkedinURL" value="<?php echo get_option('social_media_option_linkedinURL'); ?>" />
                        </td>
                    </tr>
                </table>
                <p class="submit">
                    <input type="submit" class="button-primary" value="<?php _e('Instellingen Wijzigen', 'social-media-plugin') ?>" />
                </p>
        </form>
    </div>
    <?php 
}

//settings aan html toevoegen, html aan footer hooken.

function add_social_media() {
    ?>
    
        <div>
            <p>Find us on</p>
            <a href="#"><img src="<?php echo plugin_url('icons/'.get_option('social_media_option_icon_vorm').'/facebook.png', __FILE__); ?>" alt="facebook"></a>
            <a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/img/twitter.png" alt="twitter"></a>
        </div>

    <?php
}

add_action('wp_footer', 'add_social_media');





//images plugins_url('icons/demap/facebook.png', __FILE__);



?>