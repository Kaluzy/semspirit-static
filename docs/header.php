<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <?php if (!sem_spirits_is_age_verified()): ?>
    <style>
        /* Prevent scroll when age gate is active */
        html.agegate-active,
        html.agegate-active body {
            overflow: hidden !important;
            height: 100% !important;
        }
    </style>
    <?php endif; ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php if (!sem_spirits_is_age_verified()): ?>
<!-- 
    AGE VERIFICATION GATE
    - Server-rendered for SEO and no-JS fallback
    - Form posts to current URL
    - JavaScript enhances UX but is not required
-->
<div 
    id="sem-agegate" 
    class="agegate show" 
    role="dialog" 
    aria-modal="true" 
    aria-labelledby="agegate-title"
    aria-describedby="agegate-desc"
    data-agegate="active"
>
    <div class="box" role="document">
        <div class="kicker">
            <span class="dot" aria-hidden="true"></span>
            <span>Age Verification Required</span>
        </div>
        
        <h3 id="agegate-title">You must be 21 or older to enter</h3>
        
        <p id="agegate-desc">
            This website contains information about alcohol products and is intended 
            for audiences of legal drinking age. Please confirm you are at least 
            21 years of age.
        </p>
        
        <form 
            method="post" 
            action="<?php echo sem_spirits_get_form_action(); ?>" 
            class="agegate-form"
            id="sem-agegate-form"
        >
            <?php sem_spirits_nonce_field(); ?>
            
            <div class="actions">
                <button 
                    class="btn primary" 
                    type="submit" 
                    name="sem_age_action" 
                    value="confirm"
                    id="agegate-confirm"
                >
                    Yes, I am 21+
                </button>
                <button 
                    class="btn" 
                    type="submit" 
                    name="sem_age_action" 
                    value="deny"
                    id="agegate-deny"
                >
                    No, Exit Site
                </button>
            </div>
            
            <p class="note">
                By entering, you affirm you are of legal drinking age in your country 
                of residence and agree to our 
                <a href="<?php echo esc_url(home_url('/terms/')); ?>">Terms of Service</a>.
            </p>
        </form>
    </div>
</div>

<script>
(function() {
    // Lock scroll immediately (no FOUC)
    document.documentElement.classList.add('agegate-active');
    
    // Focus trap for accessibility
    var gate = document.getElementById('sem-agegate');
    var confirmBtn = document.getElementById('agegate-confirm');
    
    if (gate && confirmBtn) {
        // Focus the confirm button for keyboard users
        setTimeout(function() { confirmBtn.focus(); }, 100);
        
        // Trap focus within modal
        gate.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                var focusable = gate.querySelectorAll('button, a[href]');
                var first = focusable[0];
                var last = focusable[focusable.length - 1];
                
                if (e.shiftKey && document.activeElement === first) {
                    e.preventDefault();
                    last.focus();
                } else if (!e.shiftKey && document.activeElement === last) {
                    e.preventDefault();
                    first.focus();
                }
            }
            
            // Prevent Escape from closing (must make a choice)
            if (e.key === 'Escape') {
                e.preventDefault();
            }
        });
    }
})();
</script>
<?php endif; ?>

<!-- Background layers -->
<div class="bg-img" aria-hidden="true"></div>
<div class="noise" aria-hidden="true"></div>

<!-- Main content wrapper -->
<div class="wrap">
    <header>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="brand">
            <div class="mark" aria-hidden="true"></div>
            <div>
                <h1><?php bloginfo('name'); ?></h1>
                <small><?php bloginfo('description'); ?></small>
            </div>
        </a>
        
        <nav aria-label="Primary navigation">
            <?php
            // Use WordPress menu if available, fallback to hardcoded
            if (has_nav_menu('primary')) {
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'link_before'    => '<span class="pill">',
                    'link_after'     => '</span>',
                ]);
            } else {
                // Fallback navigation
                ?>
                <a class="pill" href="#about">About</a>
                <a class="pill" href="#products">Products</a>
                <a class="pill" href="#trade">For Trade</a>
                <a class="pill" href="#contact">Contact</a>
                <?php
            }
            ?>
        </nav>
    </header>
