# WordPress Form + Hostinger Email Integration (Simple Setup)

**Goal:** Connect inquiry form to `hello@semspirits.com` with auto-responder
**Cost:** Free (using WPForms Lite or Contact Form 7)
**Time:** 30-45 minutes

---

## Prerequisites

✅ WordPress installed on Hostinger
✅ `hello@semspirits.com` email created in Hostinger
✅ `john@semspirits.com` alias configured

---

## Step 1: Set Up Hostinger Email (5 min)

### 1.1 Create Primary Email

1. Log in to **Hostinger hPanel**
2. Go to **Email** → **Email Accounts**
3. Click **Create Email Account**
4. Enter: `hello@semspirits.com`
5. Set strong password
6. Save

### 1.2 Create Alias for John

1. Go to **Email Forwarders** (in same Email section)
2. Click **Create Forwarder**
3. Forward: `john@semspirits.com` → `hello@semspirits.com`
4. Save

**Result:** Both emails deliver to same inbox, but john@ can be used for personal replies.

---

## Step 2: Install WordPress Form Plugin (10 min)

### **Option A: WPForms Lite (Recommended - Easier)**

1. WordPress Admin → **Plugins** → **Add New**
2. Search "WPForms"
3. Install **WPForms Lite** (by WPForms)
4. Activate

### **Option B: Contact Form 7 (More Flexible)**

1. WordPress Admin → **Plugins** → **Add New**
2. Search "Contact Form 7"
3. Install **Contact Form 7** (by Takayuki Miyoshi)
4. Activate

---

## Step 3: Recreate Inquiry Form (15 min)

### Using WPForms Lite

#### 3.1 Create Form

1. Go to **WPForms** → **Add New**
2. Form Name: "Trade Partner Inquiry"
3. Select **Blank Form** template
4. Click **Use Template**

#### 3.2 Add Fields (Drag from left sidebar)

Add these fields in order:

1. **Name** → Settings:
   - Label: "First Name"
   - Format: "First"
   - Required: Yes

2. **Name** (add another) → Settings:
   - Label: "Last Name"
   - Format: "Last"
   - Required: Yes

3. **Single Line Text** → Settings:
   - Label: "Business Name"
   - Required: Yes

4. **Email** → Settings:
   - Label: "Email Address"
   - Required: Yes

5. **Phone** → Settings:
   - Label: "Phone (optional)"
   - Required: No

6. **Dropdown** → Settings:
   - Label: "Business Type"
   - Choices:
     ```
     Wholesaler
     Retailer
     Restaurant/Bar
     Distributor
     Event Venue
     Individual/Other
     ```
   - Required: Yes

7. **Dropdown** (add another) → Settings:
   - Label: "State"
   - Choices: (copy from current inquiry.html lines 162-212)
   - Required: Yes

8. **Paragraph Text** → Settings:
   - Label: "Inquiry Details"
   - Required: Yes

9. **Checkbox** → Settings:
   - Label: "I'm specifically interested in Tarik Areke"
   - Required: No

10. **Checkbox** (add another) → Settings:
    - Label: "Notify me when online ordering is available"
    - Required: No

#### 3.3 Configure Email Notifications

1. Click **Settings** (left sidebar)
2. Go to **Notifications** tab

**Admin Notification (to you):**
- Send To: `hello@semspirits.com`
- From Name: `{field_id="1"}` (First Name field)
- From Email: `{field_id="4"}` (Email field)
- Reply-To: `{field_id="4"}`
- Subject: `New Trade Inquiry from {field_id="3"}`
- Message: (Keep default or customize)

**User Notification (auto-responder):**
1. Click **Add New Notification**
2. Notification Name: "Auto-Responder"
3. Send To: `{field_id="4"}` (Email field)
4. From Name: `SEM Spirits Distribution`
5. From Email: `hello@semspirits.com`
6. Reply-To: `john@semspirits.com`
7. Subject: `Thank you for your interest in SEM Spirits Distribution`
8. Message: (Paste from AUTO_RESPONDER_EMAIL.md)

#### 3.4 Save Form

1. Click **Save** (top right)
2. Copy shortcode: `[wpforms id="123"]`

---

## Step 4: Add Form to WordPress Page (5 min)

### 4.1 Create Inquiry Page

1. Go to **Pages** → **Add New**
2. Title: "Get Started"
3. URL slug: `inquiry` (for consistency with static HTML)

### 4.2 Add Form

**Block Editor (Gutenberg):**
1. Add **WPForms** block
2. Select "Trade Partner Inquiry" form
3. Publish

**Classic Editor:**
1. Paste shortcode: `[wpforms id="123"]`
2. Publish

### 4.3 Update Navigation

1. Go to **Appearance** → **Menus**
2. Add "Get Started" page to Primary Menu
3. Save Menu

---

## Step 5: Configure Hostinger SMTP (10 min)

**Why?** Ensures emails don't go to spam.

### 5.1 Install SMTP Plugin

1. **Plugins** → **Add New**
2. Search "WP Mail SMTP"
3. Install **WP Mail SMTP** (by WPForms)
4. Activate

### 5.2 Configure SMTP

1. Go to **WP Mail SMTP** → **Settings**
2. **From Email:** `hello@semspirits.com`
3. **From Name:** `SEM Spirits Distribution`
4. **Mailer:** Select "Other SMTP"
5. **SMTP Host:** `smtp.hostinger.com`
6. **SMTP Port:** `587`
7. **Encryption:** `TLS`
8. **Authentication:** ON
9. **SMTP Username:** `hello@semspirits.com`
10. **SMTP Password:** (your email password)
11. Save Settings

### 5.3 Send Test Email

1. Go to **WP Mail SMTP** → **Email Test**
2. Send to your email
3. Verify receipt

---

## Step 6: Test Complete Workflow (5 min)

1. **Visit inquiry page:** `yourdomain.com/inquiry`
2. **Fill out form** with test data
3. **Submit**
4. **Verify:**
   - ✅ Confirmation message appears
   - ✅ Email arrives at `hello@semspirits.com`
   - ✅ Auto-responder sent to submitter
   - ✅ Reply-to works (reply goes to john@)

---

## Manual Mailchimp Entry (Until Phase 2)

For now, manually add contacts to Mailchimp:

1. Check `hello@semspirits.com` inbox
2. For each inquiry, go to Mailchimp
3. Add contact to **Pre-Verification Leads** audience
4. Add tags:
   - Business Type (from form)
   - State (from form)
   - `tarik_areke_interest` (if checked)
   - `notify_online_ordering` (if checked)
   - Verification Status: `inquiry_submitted`

**Later (Phase 2):** Install Mailchimp integration plugin to automate this.

---

## Troubleshooting

### Emails not sending?
- Check SMTP settings (Step 5)
- Verify Hostinger email password
- Check spam folder
- Test with WP Mail SMTP test tool

### Auto-responder not working?
- Verify User Notification is enabled in WPForms
- Check "Send To" field has correct email tag
- Test by submitting form with your email

### Form not displaying?
- Check shortcode is correct
- Try re-saving form
- Clear WordPress cache (if caching plugin installed)

---

## Next Steps (Phase 2 - Optional)

When you're ready to automate Mailchimp:

1. Install **MC4WP: Mailchimp for WordPress** (free)
2. Connect Mailchimp API key
3. Link form to Mailchimp audience
4. Map form fields to Mailchimp tags

**Cost:** Free
**Time:** 15 minutes

---

## File Checklist

When WordPress is live, you can delete these static files:

- ❌ `inquiry.html` → WordPress replaces
- ❌ `js/site.js` (form handling) → WPForms replaces
- ✅ Keep `index.html`, `legal.html` → Convert to WordPress pages

---

**Setup Status:** Ready to Implement
**Recommended Plugin:** WPForms Lite (easier for beginners)
**Alternative:** Contact Form 7 (more flexible)
**Total Time:** 45 minutes
**Total Cost:** $0 (Free plugins)

---

**Last Updated:** 2026-01-16
**Author:** Claude Code
