# SEM Spirits Theme - Age Gate Implementation

## Overview

Production-ready WordPress theme with server-side age verification, optimized for Hostinger with LiteSpeed Cache.

## Files Structure

```
sem-spirits-theme/
├── style.css           # Main stylesheet with age gate styling
├── functions.php       # Age gate logic, cache control, assets
├── header.php          # Site header with age gate modal
├── footer.php          # Site footer
├── assets/
│   └── js/
│       └── agegate.js  # JavaScript enhancement (optional)
└── htaccess-rules.txt  # LiteSpeed cache configuration
```

## Key Fixes Applied

### 1. Cookie Timing Issue
**Problem:** `setcookie()` was called on `template_redirect` hook, which fires after headers may have been sent.

**Solution:** Moved to `init` hook at priority 1, which fires before any output.

### 2. URL Construction
**Problem:** `$GLOBALS['wp']->request` can be empty on homepage or with certain permalinks.

**Solution:** Added fallback to `$_SERVER['REQUEST_URI']` and `home_url('/')`.

### 3. Hostinger/LiteSpeed Caching
**Problem:** Server-level cache ignores WordPress `nocache_headers()`.

**Solution:** 
- Added `DONOTCACHEPAGE` and `LSCACHE_NO_CACHE` constants
- Added `X-LiteSpeed-Cache-Control: no-cache` header
- Added LiteSpeed vary hooks for cookie-based caching

### 4. Scroll Lock
**Problem:** Users could scroll behind the modal.

**Solution:** Added `html.agegate-active` class that sets `overflow: hidden` and `position: fixed`.

### 5. Security Improvements
- CSRF protection via WordPress nonces
- Secure cookie attributes (HttpOnly, SameSite=Lax, Secure on HTTPS)
- Proper input sanitization
- 303 redirect after POST (PRG pattern)

## Installation Steps

### Step 1: Backup Current Theme
Before making changes, backup your existing theme files via Hostinger File Manager or FTP.

### Step 2: Upload Theme Files
1. Connect to your Hostinger account via File Manager or FTP
2. Navigate to `/wp-content/themes/sem-spirits/`
3. Upload all files from this package, replacing existing files

### Step 3: Configure LiteSpeed Cache Plugin (if installed)

1. Go to **WordPress Admin > LiteSpeed Cache > Settings**
2. Navigate to **Cache > Excludes**
3. Add to "Do Not Cache Cookies":
   ```
   sem_age_verified
   ```
4. Navigate to **Cache > Advanced**
5. Enable "Login Cookie" option
6. Save settings and **Purge All** cache

### Step 4: Add .htaccess Rules (Optional but Recommended)

1. Download your current `.htaccess` from site root
2. Add the rules from `htaccess-rules.txt` BEFORE the WordPress rewrite rules
3. Upload the modified `.htaccess`

### Step 5: Clear All Caches

1. **LiteSpeed Cache**: Purge All
2. **Browser**: Hard refresh (Ctrl+Shift+R / Cmd+Shift+R)
3. **CDN** (if using Cloudflare): Purge Everything

### Step 6: Test

1. Open site in Incognito/Private browser window
2. Age gate should appear
3. Click "Yes, I am 21+" 
4. Page should reload without gate
5. Refresh page - gate should NOT reappear
6. Check browser cookies for `sem_age_verified`

## Troubleshooting

### Age gate keeps appearing after clicking "Yes"

**Cause:** Cookie not being set or cache serving old page.

**Fix:**
1. Check browser console for errors
2. Verify cookie exists in browser DevTools > Application > Cookies
3. Clear LiteSpeed Cache completely
4. Disable any other caching plugins temporarily
5. Check `.htaccess` for conflicting rules

### Gate appears briefly then disappears

**Cause:** JavaScript removing gate based on client-side cookie, but server still shows it.

**Fix:** This is expected behavior if server cookie check fails but JS cookie exists. Server-side check should take priority.

### Form submission returns 404 or home page

**Cause:** Redirect URL not capturing current page correctly.

**Fix:** Check permalink settings (Settings > Permalinks) and resave.

### Gate shows on cached pages for verified users

**Cause:** CDN or LiteSpeed not varying cache by cookie.

**Fix:**
1. Add `sem_age_verified` to LiteSpeed "Do Not Cache Cookies"
2. Add .htaccess rules for vary header
3. If using Cloudflare, create a Cache Rule to bypass cache when cookie exists

## Cookie Details

| Attribute | Value |
|-----------|-------|
| Name | `sem_age_verified` |
| Duration | 30 days |
| Path | `/` |
| HttpOnly | Yes |
| Secure | Yes (on HTTPS) |
| SameSite | Lax |

## Performance Notes

- Age gate CSS/JS only loaded for unverified users
- Verified users receive fully cached pages
- No external dependencies (vanilla JS)
- CSS uses efficient selectors and GPU-accelerated animations

## Browser Support

- Chrome 80+
- Firefox 75+
- Safari 13+
- Edge 80+
- iOS Safari 13+
- Android Chrome 80+

## Version History

- **2.0.0** - Production release with Hostinger optimization
- **1.0.0** - Initial implementation (had timing issues)
