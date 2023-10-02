<?php
namespace WPShareButton\Classes;

use WPShareButton\Classes\InlineButton;

class Bootstrap {
    public function boot()
    {
        $this->shortCodes();
    }

    public function shortCodes()
    {
        add_shortcode('wpsb-inline-button', function ($atts) {
            $inlineButton = new InlineButton();
            return $inlineButton->handelShortCode($atts);
        });
    }
}