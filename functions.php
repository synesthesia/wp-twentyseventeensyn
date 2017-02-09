<?php

if (!class_exists('SYN2017X')){
    class SYN2017X{
        public function __construct(){
             add_action('after_setup_theme', array($this, 'init'));
             // register action/filter callbacks here
             add_action( 'wp_enqueue_scripts', array($this,'enqueue_styles' ));
             add_action( 'wp_head', array($this,'add_notes_feed'));


        }

        public function init(){
            // all theme init code here
        }

        //TODO this is site-specific so should go to a plugin
        public function add_notes_feed(){
            $feed = 'http://wikity.synesthesia.co.uk/feed/';
            $title = 'Synesthesia Notes » Feed';
            printf(__('<link rel="%1$s" type="%2$s" title="%4$s" href="%3$s" />'),"alternate","application/rss+xml",$feed, $title);
            
        }

        public function enqueue_styles() {

            $parent_style = 'twentyseventeen-style';
            wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
            wp_enqueue_style( 'child-style',
                get_stylesheet_directory_uri() . '/assets/css/style.css',
                array( $parent_style ),
                wp_get_theme()->get('Version')
            );
        }

    } // end class SYN2017X
} // emd if (!class_exists('SYN2017X')){

if (class_exists('SYN2017X')){
    $synesthesia2017x = new SYN2017X();
}

