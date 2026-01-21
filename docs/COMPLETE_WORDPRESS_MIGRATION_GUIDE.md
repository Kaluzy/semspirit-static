# Complete WordPress Migration Guide
## SEM Spirits Distribution - Static to WordPress Migration

**Status:** Ready to Migrate
**Est. Time:** 3-4 hours for complete migration
**Skill Level:** Intermediate (or hire developer for 1-2 days)

---

## 📋 Pre-Migration Checklist

### ✅ What's Already Done (Static Site)
- [x] Homepage with age gate, hero, product gallery
- [x] Inquiry form (static HTML version)
- [x] Legal pages (Terms, Privacy, Compliance)
- [x] Professional design system (CSS)
- [x] Mobile responsive
- [x] Tarik Areke product showcase with 5-image gallery
- [x] "We Partner With" section (professional card layout)
- [x] All branding and imagery

### ✅ What's Already Set Up (Hostinger)
- [x] WordPress installed at semspirits.com
- [x] `hello@semspirits.com` email configured
- [x] `john@semspirits.com` alias set up
- [x] WPForms Lite installed
- [x] WP Mail SMTP configured

### 📦 What We're Migrating
- Static HTML → WordPress theme/pages
- Custom CSS → WordPress theme stylesheet
- JavaScript → WordPress theme scripts
- Inquiry form → WPForms (already configured)
- Images → WordPress Media Library

---

## 🚀 Migration Steps

---

## **PHASE 1: Backup & Preparation** (15 min)

### Step 1.1: Backup Static Site
```bash
# Create a zip backup of your entire static site
cd "C:\Users\kaluz\OneDrive\Documents\SEM Spirit"
# Right-click semspirit folder → Send to → Compressed folder
# Save as: semspirit-static-backup-2026-01-20.zip
```

### Step 1.2: Backup WordPress Database
1. Log in to **Hostinger hPanel**
2. Go to **Databases** → **phpMyAdmin**
3. Select your WordPress database
4. Click **Export** → **Go**
5. Download SQL file: `semspirits-wp-backup-2026-01-20.sql`

### Step 1.3: Create Migration Folder Structure
On your computer, create:
```
semspirit-wp-migration/
├── theme-files/
│   ├── css/
│   ├── js/
│   ├── images/
│   └── parts/
├── content/
│   ├── pages/
│   └── media/
└── backups/
```

---

## **PHASE 2: WordPress Theme Creation** (90 min)

### Step 2.1: Access WordPress Files

**Option A: Via Hostinger File Manager**
1. Log in to Hostinger hPanel
2. Go to **Files** → **File Manager**
3. Navigate to: `public_html/wp-content/themes/`

**Option B: Via FTP (Recommended)**
1. Download **FileZilla** (free FTP client)
2. Get FTP credentials from Hostinger hPanel → **FTP Accounts**
3. Connect to your site
4. Navigate to: `/public_html/wp-content/themes/`

### Step 2.2: Create Custom Theme Folder

In `/wp-content/themes/`, create new folder:
```
semspirits/
```

### Step 2.3: Upload Core Theme Files

Upload these files to `/wp-content/themes/semspirits/`:

#### **style.css** (Theme Header + All CSS)

Copy your entire `css/style.css` and add WordPress header at the very top:

```css
/*
Theme Name: SEM Spirits Distribution
Theme URI: https://semspirits.com
Author: SEM Spirits Team
Author URI: https://semspirits.com
Description: Custom premium theme for SEM Spirits verified trade portal
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.4
Requires PHP: 7.4
License: Proprietary
Text Domain: sem-spirits
*/

/* [REST OF YOUR CSS FROM css/style.css GOES HERE] */
```

#### **functions.php** (Theme Functions)

Create new file `functions.php`:

```php
<?php
/**
 * SEM Spirits Theme Functions
 */

// Enqueue styles and scripts
function semspirits_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style('semspirits-style', get_stylesheet_uri(), array(), '1.0.0');

    // Main JavaScript
    wp_enqueue_script('semspirits-script', get_template_directory_uri() . '/js/site.js', array(), '1.0.0', true);

    // Age gate script
    wp_enqueue_script('semspirits-agegate', get_template_directory_uri() . '/js/agegate.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'semspirits_enqueue_assets');

// Register navigation menus
function semspirits_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'sem-spirits'),
        'footer' => __('Footer Menu', 'sem-spirits')
    ));
}
add_action('after_setup_theme', 'semspirits_register_menus');

// Theme support
function semspirits_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'semspirits_theme_support');

// Remove WordPress emoji scripts (performance)
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Age verification check
function semspirits_age_verified() {
    return isset($_COOKIE['sem_age_verified']) && $_COOKIE['sem_age_verified'] === 'true';
}
?>
```

#### **index.php** (Main Template)

Convert your `index.html` to PHP:

```php
<?php
/**
 * Main Template File
 * Template Name: Homepage
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Age Verification Gate -->
<?php get_template_part('parts/age-gate'); ?>

<!-- Background layers -->
<div class="bg-img" aria-hidden="true"></div>
<div class="noise" aria-hidden="true"></div>

<!-- Main content wrapper -->
<div class="wrap">
    <?php get_header(); ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1 class="hero-title">
            Premium Ethiopian Spirits<br>
            <span class="hero-subtitle">for Licensed Trade Partners</span>
        </h1>
        <p class="hero-description">
            Verified B2B distribution platform connecting licensed wholesalers, retailers,
            and establishments with authentic Tarik Areke spirits.
        </p>
        <div class="hero-cta">
            <a href="<?php echo home_url('/inquiry'); ?>" class="btn primary">Get Started</a>
            <a href="#products" class="btn secondary">View Products</a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <?php get_template_part('parts/products-section'); ?>

    <!-- Trade Partners Section -->
    <?php get_template_part('parts/trade-section'); ?>

    <!-- About Section -->
    <?php get_template_part('parts/about-section'); ?>

    <?php get_footer(); ?>
</div>

<?php wp_footer(); ?>
</body>
</html>
```

#### **header.php** (Site Header)

Extract header from `index.html`:

```php
<header>
    <a href="<?php echo home_url(); ?>" class="brand">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.PNG" alt="SEM Spirits Logo" class="brand-logo">
        <div>
            <h1>SEM Spirits</h1>
            <small>Premium Distribution</small>
        </div>
    </a>

    <nav aria-label="Primary navigation">
        <a class="pill" href="<?php echo home_url('/#about'); ?>">About</a>
        <a class="pill" href="<?php echo home_url('/#products'); ?>">Products</a>
        <a class="pill" href="<?php echo home_url('/#trade'); ?>">Trade Partners</a>
        <a class="pill" href="<?php echo home_url('/inquiry'); ?>">Get Started</a>
    </nav>
</header>
```

#### **footer.php** (Site Footer)

Extract footer from `index.html`:

```php
<footer>
    <div class="footer-content">
        <div class="footer-brand">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.PNG" alt="SEM Spirits Logo" class="footer-logo">
            <div>
                <strong>SEM Spirits</strong>
                <p>Premium Distribution</p>
            </div>
        </div>

        <div class="footer-links">
            <div class="footer-column">
                <h4>Company</h4>
                <ul>
                    <li><a href="<?php echo home_url('/#about'); ?>">About Us</a></li>
                    <li><a href="<?php echo home_url('/#products'); ?>">Products</a></li>
                    <li><a href="<?php echo home_url('/inquiry'); ?>">Get Started</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Legal</h4>
                <ul>
                    <li><a href="<?php echo home_url('/legal#terms'); ?>">Terms of Service</a></li>
                    <li><a href="<?php echo home_url('/legal#privacy'); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo home_url('/legal#compliance'); ?>">Compliance</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Contact</h4>
                <ul>
                    <li><a href="mailto:hello@semspirits.com">hello@semspirits.com</a></li>
                    <li><a href="tel:+15551234521">(555) 123-4521</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> SEM Spirits Distribution. All rights reserved.</p>
        <p class="legal-notice">Must be 21+ to access. Licensed distributors only.</p>
    </div>
</footer>
```

### Step 2.4: Create Template Parts Folder

Create folder: `/wp-content/themes/semspirits/parts/`

**parts/age-gate.php:**
```php
<div id="sem-agegate" class="agegate-overlay" role="dialog" aria-modal="true" aria-labelledby="agegate-title">
    <div class="agegate-card">
        <div class="agegate-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.PNG" alt="SEM Spirits">
        </div>
        <h2 id="agegate-title">Age Verification Required</h2>
        <p>You must be 21 years or older to access this site.</p>
        <p class="agegate-subtitle">This is a business-to-business platform for licensed trade partners only.</p>

        <div class="agegate-actions">
            <button onclick="confirmAge()" class="btn primary" aria-label="Confirm you are 21 or older">
                I am 21+
            </button>
            <button onclick="denyAge()" class="btn secondary" aria-label="Exit if under 21">
                Close
            </button>
        </div>

        <p class="agegate-disclaimer">
            By entering, you confirm you are of legal drinking age and agree to our
            <a href="<?php echo home_url('/legal#terms'); ?>">Terms of Service</a>.
        </p>
    </div>
</div>
```

**parts/products-section.php:**
Copy product showcase HTML from your `index.html` (lines 100-180)

**parts/trade-section.php:**
Copy trade partners section from your `index.html` (lines 181-220)

**parts/about-section.php:**
Copy about section from your `index.html` (lines 221-260)

### Step 2.5: Upload JavaScript Files

Upload to `/wp-content/themes/semspirits/js/`:
- `site.js` (from your static site)
- `agegate.js` (from your static site)

### Step 2.6: Upload Images

Upload to `/wp-content/themes/semspirits/images/`:
- `logo.PNG`
- `tarik-areke-bottle.jpg`
- `tarik-areke-coffee.jpg`
- `tarik-areke-cinnamon.jpg`
- `tarik-areke-lifestyle-1.jpg`
- `tarik-areke-lifestyle-2.jpg`

---

## **PHASE 3: WordPress Configuration** (30 min)

### Step 3.1: Activate Theme

1. WordPress Admin → **Appearance** → **Themes**
2. Find "SEM Spirits Distribution"
3. Click **Activate**

### Step 3.2: Create Pages

#### **Homepage**
1. **Pages** → **Add New**
2. Title: "Home"
3. Template: "Homepage" (from dropdown)
4. Publish
5. **Settings** → **Reading** → Set "Home" as **Homepage**

#### **Inquiry Page (Get Started)**
1. **Pages** → **Add New**
2. Title: "Get Started"
3. Slug: `inquiry`
4. Add your WPForms shortcode: `[wpforms id="XXX"]`
5. Publish

#### **Legal Page**
1. **Pages** → **Add New**
2. Title: "Legal"
3. Slug: `legal`
4. Paste content from `legal.html`
5. Publish

### Step 3.3: Configure Navigation Menu

1. **Appearance** → **Menus** → **Create new menu**
2. Name: "Primary Menu"
3. Add pages:
   - Home (custom link: `#about`)
   - Products (custom link: `#products`)
   - Trade Partners (custom link: `#trade`)
   - Get Started (page: Inquiry)
4. Assign to **Primary Menu** location
5. Save

### Step 3.4: WordPress Settings

**General Settings:**
- Site Title: "SEM Spirits Distribution"
- Tagline: "Premium Ethiopian Spirits for Licensed Trade Partners"
- Email: `hello@semspirits.com`

**Reading Settings:**
- Homepage: "Home" (static page)
- Posts page: None

**Permalinks:**
- Structure: **Post name** (e.g., `/inquiry/`)

---

## **PHASE 4: Form Integration** (30 min)

### Step 4.1: Configure WPForms

Already done! Your inquiry form is set up with:
- Trade partner fields
- Email notifications to `hello@semspirits.com`
- Auto-responder via Hostinger

### Step 4.2: Test Form Submission

1. Visit `semspirits.com/inquiry`
2. Fill out form with test data
3. Submit
4. Verify:
   - ✅ Success message displays
   - ✅ Email arrives at hello@
   - ✅ Auto-responder sent

---

## **PHASE 5: Testing & Launch** (45 min)

### Step 5.1: Full Site Testing

**Desktop Testing:**
- [ ] Homepage loads with age gate
- [ ] Age gate "I am 21+" sets cookie
- [ ] Age gate "Close" dismisses modal
- [ ] Product gallery slides work (left/right arrows)
- [ ] "We Partner With" cards display correctly
- [ ] All internal links work
- [ ] Footer links work
- [ ] Logo displays in header/footer

**Mobile Testing:**
- [ ] Age gate displays correctly
- [ ] Product gallery responsive (no overflow)
- [ ] Partner cards stack vertically
- [ ] Navigation accessible
- [ ] Forms usable on mobile

**Form Testing:**
- [ ] All fields required work
- [ ] Email validation works
- [ ] State dropdown populates
- [ ] Textarea spans full width
- [ ] Submit button functional

### Step 5.2: Performance Optimization

**Install Plugins:**
1. **WP Rocket** (premium) or **W3 Total Cache** (free)
   - Enable page caching
   - Minify CSS/JS
   - Enable lazy loading

2. **Smush** (image optimization)
   - Compress all images
   - Convert to WebP

### Step 5.3: Security Hardening

1. **Install Wordfence Security** (free)
   - Enable firewall
   - Enable malware scanning

2. **Update WordPress**
   - Core, plugins, themes to latest versions

3. **Strong Passwords**
   - Admin account: 20+ characters
   - Database: 24+ characters

### Step 5.4: Final Checks

- [ ] SSL certificate active (https://)
- [ ] Google Search Console verified
- [ ] Google Analytics 4 installed (optional)
- [ ] Favicon uploaded (Site Icon in Customizer)
- [ ] All emails working (test submissions)
- [ ] Backup plugin installed (UpdraftPlus)

---

## **PHASE 6: Post-Launch** (Optional)

### Future Enhancements

**Phase 2 (Weeks 2-4):**
- Mailchimp API integration
- Automated email workflows
- CRM tagging system

**Phase 3 (Months 2-3):**
- User registration system
- Role-based access (verified buyers)
- Login/dashboard for approved partners

**Phase 4 (Months 3-6):**
- WooCommerce integration
- Role-based pricing visibility
- Online ordering for verified partners
- Order management system

---

## 🛠️ Troubleshooting

### Theme not showing?
- Check folder name: `/wp-content/themes/semspirits/`
- Verify `style.css` has WordPress header
- Check file permissions (755 for folders, 644 for files)

### CSS not loading?
- Hard refresh browser (Ctrl+F5)
- Check `functions.php` enqueue
- Clear WordPress cache (if using caching plugin)

### Age gate not working?
- Check `js/site.js` uploaded correctly
- Check browser console for JS errors
- Verify `wp_footer()` in template

### Images not loading?
- Upload to `/wp-content/themes/semspirits/images/`
- Use `get_template_directory_uri()` in PHP
- Check file paths are correct

### Form not submitting?
- Verify WPForms plugin active
- Check shortcode matches form ID
- Test SMTP settings with WP Mail SMTP

---

## 📞 Support Resources

**WordPress Documentation:**
- https://wordpress.org/documentation/
- https://developer.wordpress.org/themes/

**Hostinger Support:**
- Live chat 24/7
- https://support.hostinger.com

**WPForms Documentation:**
- https://wpforms.com/docs/

---

## 💾 Backup Strategy (Critical!)

**Automated Backups:**
1. Install **UpdraftPlus** (free)
2. Schedule daily backups
3. Store in Google Drive or Dropbox
4. Keep 7-day retention

**Manual Backups Before:**
- Theme updates
- Plugin installations
- Major content changes
- Code modifications

---

## ✅ Migration Complete Checklist

- [ ] All static files backed up
- [ ] WordPress database backed up
- [ ] Theme folder created and uploaded
- [ ] All images uploaded
- [ ] JavaScript files uploaded
- [ ] Theme activated successfully
- [ ] Pages created (Home, Inquiry, Legal)
- [ ] Navigation menu configured
- [ ] Form tested and working
- [ ] Email notifications working
- [ ] Age gate functional
- [ ] Mobile responsive verified
- [ ] SSL certificate active
- [ ] Performance optimized
- [ ] Security plugins installed
- [ ] Automated backups configured

---

**Migration Prepared By:** Claude Code
**Date:** January 20, 2026
**Version:** 1.0.0
**Status:** Ready for Implementation

---

**Need Help?** Contact a WordPress developer on:
- Upwork (WordPress migration specialists)
- Fiverr (budget-friendly options)
- Codeable (vetted WP experts)

**Est. Cost:** $300-$800 for professional migration (3-6 hours)
