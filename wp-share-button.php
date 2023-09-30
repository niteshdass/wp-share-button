<?php

/**
 * Plugin Name: Wp Share button
 * Plugin URI: http://WPSBiners.com/
 * Description: A sample WordPress plugin to share your content in social or others media
 * Author: Nitesh das
 * Author URI: http://niteshdas.me/
 * Version: 1.0.6
 */
define('WPSB_URL', plugin_dir_url(__FILE__));
define('WPSB_DIR', plugin_dir_path(__FILE__));

define('WPSB_VERSION', '1.0.5');

// This will automatically update, when you run dev or production
define('WPSB_DEVELOPMENT', 'yes');

class WPShareButton {
    public function boot()
    {
        $this->loadClasses();
        $this->registerShortCodes();
        $this->ActivatePlugin();
        $this->renderMenu();
        $this->disableUpdateNag();
    }

    public function loadClasses()
    {
        require WPSB_DIR . 'includes/autoload.php';
    }

    public function renderMenu()
    {
        add_action('admin_menu', function () {
            if (!current_user_can('manage_options')) {
                return;
            }
            global $submenu;
            add_menu_page(
                'WPPluginVueTailwind',
                'WP Share Button',
                'manage_options',
                'wp-share-button.php',
                array($this, 'renderAdminPage'),
                'dashicons-editor-code',
                25
            );
            $submenu['wp-share-button.php']['dashboard'] = array(
                'Dashboard',
                'manage_options',
                'admin.php?page=wp-share-button.php#/',
            );
            $submenu['wp-share-button.php']['contact'] = array(
                'Contact',
                'manage_options',
                'admin.php?page=wp-share-button.php#/contact',
            );
        });
    }

    public function renderAdminPage()
    {
        $loadAssets = new \WPShareButton\Classes\LoadAssets();
        $loadAssets->admin();

        $WPWVT = apply_filters('WPWVT/admin_app_vars', array(
            'assets_url' => WPSB_URL . 'assets/',
            'ajaxurl' => admin_url('admin-ajax.php')
        ));

        wp_localize_script('WPWVT-script-boot', 'WPWVTAdmin', $WPWVT);

        echo '<div class="WPWVT-admin-page" id="WPWVT_app">
            <div class="main-menu text-white-200 bg-wheat-600 p-4">
                <router-link to="/">
                    Home
                </router-link> |
                <router-link to="/contact" >
                    Contacts
                </router-link>
            </div>
            <hr/>
            <router-view></router-view>
        </div>';
    }

    public function registerShortCodes()
    {
        // your shortcode here
    }

    // disable update nag on admin dashboard
    public function disableUpdateNag()
    {
        add_action('admin_init', function () {
            $disablePages = [
                'wp-share-button.php',
            ];

            if (isset($_GET['page']) && in_array($_GET['page'], $disablePages)) {
                remove_all_actions('admin_notices');
            }
        }, 20);
    }

    public function ActivatePlugin()
    {
        //activation deactivation hook
        register_activation_hook(__FILE__, function ($newWorkWide) {
            require_once(WPSB_DIR . 'includes/Classes/Activator.php');
            $activator = new \WPShareButton\Classes\Activator();
            $activator->migrateDatabases($newWorkWide);
        });
    }
}

(new WPShareButton())->boot();



