<?php
/**
 * SEM Spirits Theme Functions
 * 
 * Production-grade Age Gate implementation with:
 * - Early hook execution (before headers sent)
 * - Hostinger/LiteSpeed cache compatibility
 * - Secure cookie handling
 * - CSRF protection via nonce
 * 
 * @package SEM_Spirits
 * @version 2.0.0
 */

defined('ABSPATH') || exit;

/**
 * ============================================================================
 * AGE GATE CONFIGURATION
 * ============================================================================
 */
define('SEM_AGE_COOKIE_NAME', 'sem_age_verified');
define('SEM_AGE_COOKIE_DURATION', 30 * DAY_IN_SECONDS); // 30 days
define('SEM_AGE_NONCE_ACTION', 'sem_age_gate_verify');
define('SEM_AGE_NONCE_NAME', 'sem_age_nonce');

/**
 * ============================================================================
 * AGE GATE POST HANDLER
 * 
 * Hooked to 'init' (priority 1) to run BEFORE any output or headers.
 * This is critical for setcookie() to work reliably.
 * ============================================================================
 */
function sem_spirits_agegate_handler() {
    // Only process POST requests with our action
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return;
    }
    
    if (!isset($_POST['sem_age_action'])) {
        return;
    }
    
    // Skip admin and AJAX requests
    if (is_admin() || wp_doing_ajax()) {
        return;
    }
    
    // Verify nonce for security
    if (!isset($_POST[SEM_AGE_NONCE_NAME]) || 
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[SEM_AGE_NONCE_NAME])), SEM_AGE_NONCE_ACTION)) {
        // Invalid nonce - silently fail and show gate again
        return;
    }
    
    $action = sanitize_key($_POST['sem_age_action']);
    
    if ($action === 'confirm') {
        sem_spirits_set_age_cookie();
        sem_spirits_redirect_to_current();
        exit;
    }
    
    if ($action === 'deny') {
        // Redirect underage users away
        wp_redirect('https://www.responsibility.org/', 302);
        exit;
    }
}
add_action('init', 'sem_spirits_agegate_handler', 1);

/**
 * Set the age verification cookie with secure attributes.
 */
function sem_spirits_set_age_cookie() {
    $secure = is_ssl();
    $cookie_value = hash_hmac('sha256', 'verified_' . time(), wp_salt('auth'));
    
    // PHP 7.3+ supports options array (more readable)
    if (PHP_VERSION_ID >= 70300) {
        setcookie(SEM_AGE_COOKIE_NAME, $cookie_value, [
            'expires'  => time() + SEM_AGE_COOKIE_DURATION,
            'path'     => COOKIEPATH ?: '/',
            'domain'   => COOKIE_DOMAIN ?: '',
            'secure'   => $secure,
            'httponly' => true,
            'samesite' => 'Lax',
        ]);
    } else {
        // Fallback for older PHP
        setcookie(
            SEM_AGE_COOKIE_NAME,
            $cookie_value,
            time() + SEM_AGE_COOKIE_DURATION,
            (COOKIEPATH ?: '/') . '; SameSite=Lax',
            COOKIE_DOMAIN ?: '',
            $secure,
            true
        );
    }
    
    // Also set in superglobal for immediate availability
    $_COOKIE[SEM_AGE_COOKIE_NAME] = $cookie_value;
}

/**
 * Redirect to the current page (clears POST data).
 */
function sem_spirits_redirect_to_current() {
    // Build clean URL without query string artifacts
    $redirect_url = home_url($_SERVER['REQUEST_URI'] ?? '/');
    
    // Remove any POST-related query params if present
    $redirect_url = remove_query_arg(['sem_age_action'], $redirect_url);
    
    // Use 303 See Other to ensure GET request after POST
    wp_redirect(esc_url_raw($redirect_url), 303);
}

/**
 * Check if user has verified their age.
 * 
 * @return bool True if age verified, false otherwise.
 */
function sem_spirits_is_age_verified() {
    return !empty($_COOKIE[SEM_AGE_COOKIE_NAME]);
}

/**
 * ============================================================================
 * CACHE CONTROL
 * 
 * Prevents caching of the age gate page. Critical for Hostinger/LiteSpeed.
 * ============================================================================
 */
function sem_spirits_cache_control() {
    // Skip admin
    if (is_admin() || wp_doing_ajax()) {
        return;
    }
    
    // If already verified, allow caching
    if (sem_spirits_is_age_verified()) {
        return;
    }
    
    // Prevent all caching for unverified users
    
    // WordPress built-in
    if (!defined('DONOTCACHEPAGE')) {
        define('DONOTCACHEPAGE', true);
    }
    
    // LiteSpeed Cache (Hostinger uses this)
    if (!defined('LSCACHE_NO_CACHE')) {
        define('LSCACHE_NO_CACHE', true);
    }
    
    // WP Super Cache
    if (!defined('DONOTCACHEOBJECT')) {
        define('DONOTCACHEOBJECT', true);
    }
    if (!defined('DONOTCACHEDB')) {
        define('DONOTCACHEDB', true);
    }
}
add_action('init', 'sem_spirits_cache_control', 0);

/**
 * Send no-cache headers for unverified users.
 */
function sem_spirits_send_nocache_headers() {
    if (is_admin() || wp_doing_ajax()) {
        return;
    }
    
    if (sem_spirits_is_age_verified()) {
        return;
    }
    
    // Comprehensive no-cache headers
    nocache_headers();
    
    // Additional headers for aggressive caching systems
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0, private');
    header('Pragma: no-cache');
    header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');
    
    // LiteSpeed specific
    header('X-LiteSpeed-Cache-Control: no-cache');
}
add_action('send_headers', 'sem_spirits_send_nocache_headers', 0);

/**
 * ============================================================================
 * ASSETS
 * ============================================================================
 */
function sem_spirits_enqueue_assets() {
    // Main stylesheet with cache busting
    $style_path = get_stylesheet_directory() . '/style.css';
    $style_version = file_exists($style_path) ? filemtime($style_path) : '1.0.0';
    
    wp_enqueue_style(
        'sem-spirits-style',
        get_stylesheet_uri(),
        [],
        $style_version
    );
    
    // Age gate script (only if not verified)
    if (!sem_spirits_is_age_verified()) {
        wp_enqueue_script(
            'sem-spirits-agegate',
            get_theme_file_uri('/assets/js/agegate.js'),
            [],
            '2.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'sem_spirits_enqueue_assets');

/**
 * ============================================================================
 * TEMPLATE HELPERS
 * ============================================================================
 */

/**
 * Get the age gate form action URL.
 * 
 * @return string The form action URL.
 */
function sem_spirits_get_form_action() {
    global $wp;
    
    // Get current URL, fallback to home if empty
    $current_url = home_url(add_query_arg([], $wp->request ?? ''));
    
    // Ensure we have a valid URL
    if (empty($wp->request)) {
        $current_url = home_url('/');
    }
    
    return esc_url($current_url);
}

/**
 * Output the age gate nonce field.
 */
function sem_spirits_nonce_field() {
    wp_nonce_field(SEM_AGE_NONCE_ACTION, SEM_AGE_NONCE_NAME);
}

/**
 * ============================================================================
 * LITESPEED CACHE INTEGRATION (Hostinger)
 * ============================================================================
 */

/**
 * Tell LiteSpeed to vary cache by our cookie.
 * This ensures verified and unverified users get different cached versions.
 */
function sem_spirits_litespeed_vary($vary) {
    if (is_array($vary)) {
        $vary[] = SEM_AGE_COOKIE_NAME;
    }
    return $vary;
}
add_filter('litespeed_vary', 'sem_spirits_litespeed_vary');

/**
 * Exclude age gate cookie from LSCache purge.
 */
function sem_spirits_litespeed_vary_cookies($cookies) {
    if (is_array($cookies)) {
        $cookies[] = SEM_AGE_COOKIE_NAME;
    }
    return $cookies;
}
add_filter('litespeed_vary_cookies', 'sem_spirits_litespeed_vary_cookies');
