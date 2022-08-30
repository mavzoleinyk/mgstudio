<?php
// Add custom Theme Functions here
// 
function get_telephone() {
    /* здесь наша бизнес-логика */
    $return = ' +38 096 975 82 37';
    return $return;
}
function register_custom_yoast_variables() {
    wpseo_register_var_replacement('%%telephone%%', 'get_telephone', 'advanced', 'Телефон');
}
add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables');

function november_auto_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'november-auto' ),
		'id'            => 'footer-menu-1',
		'description'   => esc_html__( 'Add widgets here.', 'november-auto' ),
		'before_widget' => '<nav id="%1$s" class="widget footer-nav %2$s">',
		'after_widget'  => '</nav>',
		'before_title'  => '<div class="widget-title footer-nav--title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'november_auto_widgets_init' );

// Трах-ба-бах и переносим ЖИквери в подвал
add_action('wp_enqueue_scripts', 'true_peremeshhaem_jquery_v_futer');  
 
function true_peremeshhaem_jquery_v_futer() {  
 	// снимаем стандартную регистрацию jQuery
        wp_deregister_script('jquery');  
 
        // регистрируем для подключения в футере, описание параметров - в документации функции (ссылка чуть выше)
        wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, null, true);  
 
	// подключаем
        wp_enqueue_script('jquery');  
 
}

// Рубим еще немного мусора
add_action( 'wp_print_styles', 'rubim_stili_wp_block_library', 100 );

function rubim_stili_wp_block_library() {
	wp_deregister_style( 'wp-block-library' );
}

// Рубим мусор ВЦшный
add_action( 'wp_print_styles', 'rubim_stili_wc_block_style', 100 );

function rubim_stili_wc_block_style() {
	wp_deregister_style( 'wc-block-style' );
}

// Рубим стили контактной формы
add_action( 'wp_print_styles', 'rubim_stili_contact_form_7', 100 );

function rubim_stili_contact_form_7() {
	wp_deregister_style( 'contact-form-7' );
}

// Узнаем что рубим
function wpschool_show_script_style_ids() {
    global $wp_scripts, $wp_styles;
    echo "\n" .'<!--'. "\n\n";
    echo 'SCRIPT IDs:'. "\n";
    foreach( $wp_scripts->queue as $handle ) echo $handle . "\n";
    echo "\n" .'STYLE IDs:'. "\n";
    foreach( $wp_styles->queue as $handle ) echo $handle . "\n";
    echo "\n" .'-->'. "\n\n";
}
add_action( 'wp_print_scripts', 'wpschool_show_script_style_ids' );


// Рубим стили WC
add_action( 'wp_print_styles', 'rubim_stili_woocommerce_inline', 100 );

function rubim_stili_woocommerce_inline() {
	wp_deregister_style( 'woocommerce-inline' );
}

// Рубим базовые стили
// add_action( 'wp_print_styles', 'rubim_stili_flatsome_style', 100 );

// function rubim_stili_flatsome_style() {
// 	wp_deregister_style( 'flatsome-style' );
// }


// Рубиш шрифты гугла
add_action( 'wp_print_styles', 'rubim_stili_flatsome_googlefonts', 100 );

function rubim_stili_flatsome_googlefonts() {
	wp_deregister_style( 'flatsome-googlefonts' );
}

// Рубим WP дурню
function rubim_stili_embed() {
	wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_footer', 'rubim_stili_embed' );


