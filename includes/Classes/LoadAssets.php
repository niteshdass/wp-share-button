<?php

namespace WPShareButton\Classes;

class LoadAssets
{
    public function admin()
    {
        Vite::enqueueScript('WPWVT-script-boot', 'admin/start.js', array('jquery'), WPSB_VERSION, true);
    }
  
}
