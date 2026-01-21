# Auto-Responder Email Template for SEM Spirits

## Email Configuration

**From:** hello@semspirits.com
**Reply-To:** john@semspirits.com
**Subject:** Thank you for your interest in SEM Spirits Distribution

---

## Email Template (Copy-Paste Ready)

```
Subject: Thank you for your interest in SEM Spirits Distribution

Hello [First Name],

Thank you for reaching out to SEM Spirits Distribution!

We've received your inquiry and will review it within 2-3 business days. For trade partner applications, our team will verify your business credentials and licensing before creating your account.

In the meantime, you can learn more about our premium Ethiopian spirits and distribution model at semspirits.com.

For urgent inquiries, please reply directly to this email.

Best regards,
SEM Spirits Distribution Team

---
📧 hello@semspirits.com
🌐 www.semspirits.com

Must be 21+ to access our products. SEM Spirits promotes responsible drinking.
```

---

## Personalization Variables

If using Hostinger Email or WordPress form plugin, replace these placeholders:

- `[First Name]` → Contact's first name
- `[Business Name]` → Contact's business name (optional)

**Example:**
```
Hello Jordan,

We've received your inquiry for SEM Spirits Retail Partners...
```

---

## Where to Set This Up

### Option 1: Hostinger Webmail Auto-Responder
1. Log in to Hostinger hPanel
2. Go to **Email** → **Email Accounts** → Select `hello@semspirits.com`
3. Click **Auto-Responder**
4. Enable auto-responder
5. Paste template above
6. Set reply-to: `john@semspirits.com`

### Option 2: WordPress Contact Form 7
1. Install **Contact Form 7**
2. In form settings → **Mail (2)** tab
3. Enable "Use mail (2)" checkbox
4. Paste template in message body
5. Set "To:" to `[your-email]` (sends to submitter)

### Option 3: WordPress WPForms
1. Install **WPForms**
2. Edit your inquiry form
3. Go to **Settings** → **Notifications**
4. Add new notification → **User Notification**
5. Paste template in message field
6. Enable "Send to Email Address" → Use `{field_id="email"}` tag

---

## Testing Checklist

- [ ] Submit test inquiry form
- [ ] Verify auto-responder arrives at submitter's email
- [ ] Verify copy arrives at hello@semspirits.com
- [ ] Check reply-to is john@semspirits.com
- [ ] Verify personalization works ([First Name] populated)
- [ ] Test spam folder (ensure not filtered)

---

**Last Updated:** 2026-01-16
**Status:** Ready for Production
