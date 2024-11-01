<?php
/**
 * Plugin Name: YASPFP (Yet Another Security Patch For Pingback)
 * Description: Removes XMLRPC Pingback Ping, avoid DDoS attacks, read https://nitesculucian.github.io/2019/07/01/exploiting-the-xmlrpc-php-on-all-wordpress-versions/
 * Version:     0.1
 * Author:      Francisco Leite <leite>
 */

// remove X-Pingback header
add_filter('wp_headers', function($headers) {
  unset($headers['X-Pingback']);
  return $headers;
}, 20);

// remove XML-RPC methods
add_filter('xmlrpc_methods', function($methods) {
  unset($methods['pingback.ping']);
  unset($methods['pingback.extensions.getPingbacks']);
  return $methods;
}, 20);
