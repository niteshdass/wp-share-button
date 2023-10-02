<?php 
namespace WPShareButton\Classes;


class InlineButton {
    public function handelShortCode() {
    
        return '<div id="WPWVT">
        <h1>Share this page:</h1>

        <!-- Facebook Share Button -->
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://yourwebsite.com" target="_blank">
            <img src="facebook-icon.png" alt="Share on Facebook" width="50" height="50">
        </a>
    
        <!-- Twitter Share Button -->
        <a href="https://twitter.com/intent/tweet?url=https://yourwebsite.com&text=Check%20out%20this%20awesome%20website!" target="_blank">
            <img src="twitter-icon.png" alt="Share on Twitter" width="50" height="50">
        </a>
    
        <!-- LinkedIn Share Button -->
        <a href="https://www.linkedin.com/sharing/share-offsite/?url=https://yourwebsite.com" target="_blank">
            <img src="linkedin-icon.png" alt="Share on LinkedIn" width="50" height="50">
        </a>
        
        </div>';
    }
}