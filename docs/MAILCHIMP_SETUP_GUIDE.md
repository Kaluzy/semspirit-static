# Mailchimp Setup Guide - Verified Trade Portal

**Model:** Verified Trade / Pre-Verification CRM
**Last Updated:** 2026-01-15
**Purpose:** Track inquiries, manage verification workflow, nurture leads

---

## Critical Context

⚠️ **Mailchimp is NOT a waitlist tool for this project.**

Mailchimp serves as:
- Pre-verification CRM
- Inquiry management system
- Verification status tracker
- Communication layer for account onboarding

---

## Step-by-Step Setup

### Step 1: Create Mailchimp Account

1. Go to https://mailchimp.com
2. Sign up for account (Free tier supports up to 500 contacts)
3. Verify email address
4. Complete onboarding wizard

**Recommended Plan:**
- Start with **Free Plan** (500 contacts, 1,000 emails/month)
- Upgrade to **Essentials** ($13/month) when you hit 200+ contacts

---

### Step 2: Create Primary Audience

**Navigation:** Audience → Manage Audience → Create Audience

**Audience Settings:**
- **Audience Name:** `SEM Spirits — Trade & Verification`
- **Default From Name:** `SEM Spirits Distribution`
- **Default From Email:** Your business email (e.g., `Jhon@semspirits.com`)
- **Reminder:** "You're receiving this because you inquired about SEM Spirits trade partnership"
- **Company/Organization:** SEM Spirits Distribution
- **Website:** https://semspirits.com
- **Permission Reminder:** ✅ Enabled
- **Double Opt-In:** ❌ DISABLED (this is B2B, not marketing)

---

### Step 3: Configure Custom Fields

**Navigation:** Audience → Settings → Audience fields and *|MERGE|* tags

**Required Fields:**

| Field Name | Type | Merge Tag | Required | Default |
|------------|------|-----------|----------|---------|
| Email Address | Email | EMAIL | Yes | (built-in) |
| First Name | Text | FNAME | Yes | (built-in) |
| Last Name | Text | LNAME | Yes | (built-in) |
| Business Name | Text | BIZNAME | Yes | - |
| Business Type | Dropdown | BIZTYPE | Yes | - |
| State | Text | STATE | Yes | - |
| Phone | Phone | PHONE | No | - |
| Inquiry Message | Text (long) | MESSAGE | No | - |
| Verification Status | Dropdown | VSTATUS | Yes | New |

**Business Type Dropdown Options:**
1. Wholesaler
2. Retailer
3. Restaurant/Bar
4. Distributor
5. Event Venue
6. Individual/Other

**Verification Status Dropdown Options:**
1. New (default)
2. Pending Review
3. Approved
4. Rejected

**How to Add:**
1. Click "Create Field"
2. Select field type
3. Enter field name
4. For dropdowns, add options one per line
5. Set "Required" checkbox if needed
6. Save

---

### Step 4: Create Tags

**Navigation:** Audience → Manage Contacts → Tags → Create Tag

**Business Type Tags** (Auto-applied via form integration):
- `wholesaler`
- `retailer`
- `restaurant`
- `distributor`
- `event-venue`
- `individual`

**Product Interest Tags:**
- `tarik-areke-interest`
- `notify-online-sales`

**Verification Workflow Tags:**
- `verification-pending` (admin reviewing)
- `verification-approved` (cleared for account)
- `verification-rejected` (did not qualify)

**Engagement Tags** (Future use):
- `account-created` (WordPress user account exists)
- `first-order-placed`
- `repeat-customer`
- `high-value-account`

**Tag Naming Convention:**
- Lowercase
- Hyphens (not underscores)
- Descriptive (no abbreviations)

---

### Step 5: Create Email Templates

#### Template 1: Inquiry Confirmation

**Template Name:** `Inquiry Confirmation - Trade Portal`

**Subject Line:** `Thank you for your interest in SEM Spirits`

**Preview Text:** `We've received your inquiry and will review it shortly`

**Email Body:**
```html
<p>Hi *|FNAME|*,</p>

<p>Thank you for reaching out to SEM Spirits.</p>

<p>We've received your inquiry and will review it shortly. Our team verifies all business accounts to ensure compliance with alcohol distribution regulations.</p>

<p>You should hear from us within <strong>2-3 business days</strong>.</p>

<p>If you have questions in the meantime, feel free to reply to this email.</p>

<p>Best regards,<br>
SEM Spirits Distribution Team</p>

<hr>
<p style="font-size:12px; color:#666;">
This is an automated confirmation. You submitted an inquiry at semspirits.com.
</p>
```

**Design Notes:**
- Keep plain and professional
- No images or heavy branding (deliverability)
- Mobile-responsive
- CAN-SPAM compliant footer (Mailchimp adds automatically)

---

#### Template 2: Verification Approved

**Template Name:** `Verification Approved - Account Pending`

**Subject Line:** `Your SEM Spirits trade account has been approved`

**Preview Text:** `We'll be sending your login credentials shortly`

**Email Body:**
```html
<p>Hi *|FNAME|*,</p>

<p>Great news! Your business has been verified and approved for a SEM Spirits trade account.</p>

<p>We'll be creating your login credentials and sending them to you separately within the next 24 hours.</p>

<p><strong>Once you receive your login, you'll be able to:</strong></p>
<ul>
  <li>View trade pricing</li>
  <li>Place orders online</li>
  <li>Track order history</li>
  <li>Download invoices</li>
</ul>

<p>If you have any questions, please contact your account manager or reply to this email.</p>

<p>Welcome to the SEM Spirits trade network.</p>

<p>Best regards,<br>
SEM Spirits Distribution Team</p>
```

---

#### Template 3: Verification Rejected (Polite)

**Template Name:** `Inquiry Update - Unable to Approve`

**Subject Line:** `Update on your SEM Spirits inquiry`

**Preview Text:** `Thank you for your interest`

**Email Body:**
```html
<p>Hi *|FNAME|*,</p>

<p>Thank you for your interest in partnering with SEM Spirits.</p>

<p>After reviewing your inquiry, we're unable to approve your account at this time.</p>

<p>We appreciate your interest and encourage you to reach out again if your situation changes.</p>

<p>If you'd like to stay updated on SEM Spirits news and future product availability, please visit our website.</p>

<p>Best regards,<br>
SEM Spirits Distribution Team</p>
```

**Notes:**
- Do NOT include specific rejection reason in automated email
- Admin should follow up manually for sensitive rejections
- Keep tone polite and professional

---

### Step 6: Create Automations

**Navigation:** Automations → Create → Classic Automation → Build Your Own

---

#### Automation 1: Inquiry Confirmation

**Automation Name:** `Inquiry Confirmation - All Leads`

**Trigger:**
- Type: When someone subscribes
- Audience: SEM Spirits — Trade & Verification
- Trigger settings: Immediately

**Workflow:**
1. Trigger: Subscriber joins audience
2. Delay: None (immediate)
3. Action: Send Email
   - Template: `Inquiry Confirmation - Trade Portal`
   - From Name: SEM Spirits Distribution
   - From Email: info@semspirits.com
   - Subject: Thank you for your interest in SEM Spirits

**Settings:**
- Send Time: Immediately
- Tracking: ✅ Opens, ✅ Clicks
- Auto-Tweet: ❌ Disabled

**Status:** ✅ Activate after testing

---

#### Automation 2: Verification Approved

**Automation Name:** `Verification Approved - Account Welcome`

**Trigger:**
- Type: When a tag is added
- Tag: `verification-approved`
- Trigger settings: Immediately

**Workflow:**
1. Trigger: Tag `verification-approved` added to contact
2. Delay: None (immediate)
3. Action: Send Email
   - Template: `Verification Approved - Account Pending`
4. Action: Update Field
   - Field: Verification Status
   - Value: Approved

**Settings:**
- Can trigger multiple times: ❌ No (once per contact)
- Send Time: Immediately

**Status:** ✅ Activate after testing

**Admin Action Required After This Email:**
- Manually create WordPress user account
- Send login credentials email (separate from Mailchimp)

---

#### Automation 3: Account Created (Login Credentials)

**Automation Name:** `Account Created - Login Credentials`

**⚠️ DO NOT CREATE YET - This will be manual until WordPress integration is ready**

**Future Trigger:**
- Type: When a tag is added
- Tag: `account-created`

**Workflow:**
1. Trigger: Tag `account-created` added
2. Send Email: Login credentials
   - Username: [from WordPress]
   - Temporary password: [from WordPress]
   - Login link: https://semspirits.com/login

**Status:** ⏸️ Deferred to Phase 2 Sprint 3

---

### Step 7: Configure Form Integration

**This will be implemented in the WordPress inquiry form.**

**Form Field Mapping:**

| WordPress Form Field | Mailchimp Field | Mailchimp Tag (Auto-Applied) |
|----------------------|-----------------|------------------------------|
| Email | EMAIL | - |
| First Name | FNAME | - |
| Last Name | LNAME | - |
| Business Name | BIZNAME | - |
| Business Type | BIZTYPE | `wholesaler`, `retailer`, etc. |
| State | STATE | - |
| Phone | PHONE | - |
| Message | MESSAGE | - |
| Interest in Tarik Areke (checkbox) | - | `tarik-areke-interest` |
| Notify about online ordering (checkbox) | - | `notify-online-sales` |

**Form Submit Logic:**
```php
On form submit:
1. Validate all fields
2. Send to Mailchimp API
3. Auto-apply tags based on business type
4. Set Verification Status = "New"
5. Trigger "Inquiry Confirmation" automation
6. Send admin notification email
```

**Mailchimp API Integration:**
- Use Mailchimp Marketing API v3
- Endpoint: `POST /lists/{list_id}/members`
- Include merge fields in request
- Apply tags in same request

---

### Step 8: Set Up Segments (For Future Campaigns)

**Navigation:** Audience → Manage Audience → Segments → Create Segment

**Suggested Segments:**

**Segment 1: Verified Wholesalers**
- Conditions:
  - Verification Status = Approved
  - Tag contains `wholesaler`
- Use: Wholesale-specific announcements, pricing updates

**Segment 2: Pending Verification**
- Conditions:
  - Verification Status = Pending Review
- Use: Follow-up reminders, request additional docs

**Segment 3: Approved - No Account Yet**
- Conditions:
  - Verification Status = Approved
  - Tag does NOT contain `account-created`
- Use: Prompt to check for login credentials

**Segment 4: Rejected - Individual Consumers**
- Conditions:
  - Verification Status = Rejected
  - Tag contains `individual`
- Use: Future B2C launch announcement

**Segment 5: Tarik Areke Interest**
- Conditions:
  - Tag contains `tarik-areke-interest`
- Use: Product-specific campaigns, tasting events

---

### Step 9: API Key for WordPress Integration

**Navigation:** Account → Extras → API keys

**Steps:**
1. Click "Create A Key"
2. Name: `SEM Spirits Website Form`
3. Copy API key (save securely - shown only once)
4. Copy Audience ID:
   - Go to Audience → Settings → Audience name and defaults
   - Find "Audience ID" (alphanumeric, 10 characters)

**WordPress Configuration:**
```php
// In wp-config.php or theme functions.php
define('MAILCHIMP_API_KEY', 'your-api-key-here');
define('MAILCHIMP_AUDIENCE_ID', 'your-audience-id-here');
```

**Security:**
- Store API key in wp-config.php (not in theme files)
- Never commit API key to git
- Use environment variables if possible

---

### Step 10: Testing Checklist

**Before Going Live:**

- [ ] Test inquiry confirmation automation
  - Submit test inquiry
  - Verify email received within 60 seconds
  - Check formatting (mobile and desktop)
  - Verify unsubscribe link works

- [ ] Test tag application
  - Submit inquiry with different business types
  - Verify correct tags applied in Mailchimp
  - Check business type field populated correctly

- [ ] Test verification approved automation
  - Manually add tag `verification-approved` to test contact
  - Verify approval email sent
  - Check Verification Status field updated to "Approved"

- [ ] Test admin notification (WordPress side)
  - Submit inquiry
  - Verify admin receives notification email
  - Check all form data included
  - Test reply-to functionality

- [ ] Test duplicate handling
  - Submit inquiry with same email twice
  - Verify Mailchimp updates existing contact (not duplicate)
  - Check tags append (not replace)

- [ ] Test spam protection
  - Submit inquiry with obvious spam (test mode)
  - Verify reCAPTCHA blocks submission

- [ ] Test mobile experience
  - Open confirmation email on iPhone, Android
  - Verify formatting correct
  - Check links work

---

## Mailchimp Best Practices

### Email Deliverability
- Use authenticated domain (SPF, DKIM, DMARC)
- Keep emails plain and professional (avoid heavy images)
- No spam trigger words ("free", "guaranteed", etc.)
- Include physical address in footer (Mailchimp adds automatically)

### Data Hygiene
- Remove hard bounces immediately
- Unsubscribe inactive contacts after 12 months
- Segment by engagement (never emailed, low engagement, high engagement)

### GDPR/Privacy Compliance
- Include privacy policy link in all emails
- Honor unsubscribe requests immediately (Mailchimp handles)
- Do NOT email contacts who haven't opted in
- Store only necessary data

### Tag Management
- Use consistent naming conventions
- Archive unused tags
- Document tag meanings (this guide serves as documentation)

---

## Verification Workflow (Manual Process)

**This happens OUTSIDE of Mailchimp, but status is tracked IN Mailchimp.**

### When New Inquiry Arrives:

1. **Admin receives notification email** (WordPress sends)
2. **Admin reviews inquiry in Mailchimp**
   - Check business type
   - Note state/location
   - Read inquiry message

3. **Admin begins verification:**
   - Look up business license (state ABC database)
   - Verify business entity (Secretary of State)
   - Check for alcohol permits
   - Google the business (reputation check)
   - Optional: Call business to confirm

4. **Admin updates Mailchimp:**
   - Change Verification Status field to "Pending Review"
   - Add tag: `verification-pending`

5. **If approved:**
   - Change Verification Status to "Approved"
   - Add tag: `verification-approved`
   - Remove tag: `verification-pending`
   - Mailchimp automation sends approval email

6. **If rejected:**
   - Change Verification Status to "Rejected"
   - Add tag: `verification-rejected`
   - Remove tag: `verification-pending`
   - Optionally send rejection email (manual, not automated)

7. **Admin creates WordPress account** (if approved):
   - Create user manually in WordPress
   - Assign role based on business type
   - Send login credentials via WordPress email (not Mailchimp)
   - Add tag in Mailchimp: `account-created`

---

## Troubleshooting

### Email Not Sending
- Check automation is active (not draft)
- Verify subscriber is in correct audience
- Check spam folder
- Review Mailchimp "Campaigns" → "Reports" for delivery status

### Tags Not Applying
- Verify tag exists (case-sensitive)
- Check API request includes tags array
- Review Mailchimp activity log for contact

### Duplicate Contacts
- Mailchimp uses email as unique identifier
- If submitting with same email, it updates (not duplicates)
- Unless "Update existing contacts" is disabled in API call

### Form Integration Not Working
- Check API key is valid
- Verify Audience ID is correct
- Review PHP error logs for Mailchimp API errors
- Test API call with Postman/Insomnia first

---

## Next Steps

1. ✅ Complete this Mailchimp setup
2. ✅ Test all automations
3. ⏳ Integrate with WordPress inquiry form
4. ⏳ Document verification workflow for admin
5. ⏳ Create WordPress user roles for approved accounts

---

## Resources

- Mailchimp Marketing API Docs: https://mailchimp.com/developer/marketing/
- Mailchimp WordPress Plugin: https://wordpress.org/plugins/mailchimp-for-wp/
- Mailchimp Support: https://mailchimp.com/help/

---

**END OF MAILCHIMP SETUP GUIDE**

*Follow this guide exactly to configure Mailchimp for the Verified Trade Portal model.*
