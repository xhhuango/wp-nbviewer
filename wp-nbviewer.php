<?php

/*
Plugin Name: WP Nbviewer
Plugin URI: https://github.com/xhhuango/wp-nbviewer
Description: A WordPress plugin for nbviewer.
Version: 1.0
Author: Wayne
Author URI: https://waynestalk.com/
License: MIT
*/

function wpnbviewer_getHtmlFromNbviewer($url)
{
    $nbviewerUrl = wpnbviewer_getNbviewerUrl($url);
    $html = file_get_contents($nbviewerUrl);
    $nbHtml = wpnbviewer_getHtmlById('notebook', $html);
    return $nbHtml;
}

function wpnbviewer_getNbviewerUrl($url)
{
    $schemeRemoved = preg_replace('#^https?://#', '', rtrim($url, '/'));
    return 'https://nbviewer.jupyter.org/url/' . $schemeRemoved;
}

function wpnbviewer_getHtmlById($id, $html)
{
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML($html);
    $node = $dom->getElementById($id);
    return $node->ownerDocument->saveHTML($node);
}

function wpnbviewer_Shortcode($attributes)
{
    extract(shortcode_atts(array('url' => ''), $attributes));
    $nbviewerHtml = wpnbviewer_getHtmlFromNbviewer($url);
    return $nbviewerHtml;
}

function wpnbviewer_EnqueueStyle()
{
    wp_enqueue_style('wp-nbviewer', plugins_url( '/css/notebook.css', __FILE__ ));
}

add_action('wp_enqueue_scripts', 'wpnbviewer_EnqueueStyle');
add_shortcode("wpnbviewer", "wpnbviewer_Shortcode");
