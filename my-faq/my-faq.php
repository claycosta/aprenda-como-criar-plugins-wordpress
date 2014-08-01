<?php
/**
 * Plugin Name: My Faq
 * Plugin URI: https://github.com/claudiosmweb/aprenda-como-criar-plugins-wordpress
 * Description: Exemplo de plugin, demonstrando como criar uma FAQ com shortcodes
 * Version: 1.0.0
 * Author: Claudio Sanches
 * Author URI: http://claudiosmweb.com
 * License: GPL2
 * Text Domain: my-faq
 * Domain Path: languages/
 */

// Previne acesso direto
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Carrega arquivos de traduções.
 *
 * @return void
 */
function my_faq_load_textdomain() {
	load_plugin_textdomain( 'my-faq', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'my_faq_load_textdomain' );

/**
 * Shortcode FAQ.
 * Exemplo de uso:
 * [my_faq question="Pergunta aqui?"]Resposta aqui![my_faq]
 *
 * @param  array $attrs
 * @param  string $content
 *
 * @return string
 */
function my_faq_shortcode( $attrs, $content = null ) {

	extract( shortcode_atts( array(
		'question' => __( 'Hello?', 'my-faq' )
	), $attrs ) );

	return '<div class="my-faq-section"><h3 class="my-faq-title"><a href="#" class="toggle" title="' . __( 'Click to see the answer!', 'my-faq' ) . '">' . $question . '</a></h3><div class="my-faq-content">' . $content . '</div></div>';
}

add_shortcode( 'my_faq', 'my_faq_shortcode' );

/**
 * Registra arquivos CSS e JS.
 *
 * @return void
 */
function my_faq_scripts() {
	wp_enqueue_style( 'my-faq-style', plugins_url( 'assets/css/faq.css', __FILE__ ), array(), '1.0.0' );

	wp_enqueue_script( 'my-faq-script', plugins_url( 'assets/js/faq.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'my_faq_scripts', 999 );
