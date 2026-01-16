# SEM Spirits - Verified Trade Portal Business Model

**Model Type:** Verified Trade Portal (B2B Gated Access)
**Last Updated:** 2026-01-15 (CRITICAL UPDATE)
**Status:** Source of Truth - Supersedes All Prior Assumptions

---

## ⚠️ CRITICAL CONTEXT

**SEM Spirits is NOT a public e-commerce site.**

This is a **Verified Trade / Approved Buyer Portal**, which is:
- Standard in alcohol distribution
- Legally required in many states
- Designed for business verification workflow

**NO public pricing. NO public checkout. NO self-service signup.**

---

## Business Workflow (5-Step Process)

### STEP 1: Public Inquiry (No Pricing, No Accounts)

**Who:** Any website visitor
**What:** Submit business inquiry via form
**Access:** Public (no login required)

**Inquiry Form Collects:**
- Full Name
- Email Address
- Business Name
- Business Type (dropdown):
  - Wholesaler
  - Retailer
  - Restaurant/Bar
  - Distributor
  - Event Venue
  - Individual/Other
- State/Location
- Message/Intent
- Optional: Interest in Tarik Areke
- Optional: Notify when online ordering launches

**What Visitors CANNOT Do:**
- ❌ See pricing
- ❌ Add to cart
- ❌ Create account
- ❌ Place orders
- ❌ View checkout

**What Visitors CAN Do:**
- ✅ View brand content (Tarik Areke story)
- ✅ See product exists (name, image, basic info)
- ✅ Submit inquiry
- ✅ Learn about SEM Spirits

---

### STEP 2: Manual Verification (Offline, Admin-Controlled)

**Who:** SEM Spirits admin team
**What:** Verify business legitimacy and licensing
**Process:** Manual review (by design at this stage)

**Verification Checklist:**
1. **Business License** - Valid and active
2. **Alcohol Permit** - State-specific (varies by location)
3. **Resale Certificate** - If applicable for tax exemption
4. **On-Premise vs Off-Premise Status** - Determines product access
5. **Territory Check** - Ensure buyer is in serviceable area
6. **Credit Check** - Optional for wholesale accounts

**Verification Sources:**
- State ABC (Alcohol Beverage Control) databases
- Secretary of State business registries
- Direct phone/email verification
- Reference checks

**Verification Status Options:**
- **New** - Just submitted, not yet reviewed
- **Pending Review** - Under investigation
- **Approved** - Verified and cleared for account creation
- **Rejected** - Does not meet requirements

**Rejection Reasons:**
- Invalid/expired licenses
- Out-of-territory
- Poor credit history
- Non-compliance history
- Individual consumers (if B2B-only policy)

---

### STEP 3: Approved Account Creation (Admin-Initiated)

**Who:** SEM Spirits admin
**What:** Manually create WordPress user account
**Trigger:** After successful verification

**Account Creation Process:**
1. Admin creates user in WordPress
2. Username format: `FirstName` + `LastInitial` (e.g., `TarikA`)
3. Auto-generate secure password
4. Assign role based on business type
5. Send welcome email with login credentials

**User Roles (WordPress Custom Roles):**
- `approved_wholesaler`
- `approved_retailer`
- `approved_restaurant`
- `approved_distributor`
- `approved_event_venue`

**Role Capabilities Differ:**
- Wholesalers: Volume pricing, bulk orders, higher caps
- Retailers: Standard pricing, moderate caps
- Restaurants: On-premise pricing, lower caps
- Distributors: Negotiated pricing, special terms

**Account Metadata (Custom Fields):**
- Business Name
- License Number
- State
- Territory
- Credit Limit
- Order Cap (monthly)
- Discount Tier
- Account Manager (SEM Spirits contact)

---

### STEP 4: Gated Access (Login Required)

**Public Users (Not Logged In):**
- ✅ See product pages with basic info
- ✅ See "Login to View Pricing" message
- ✅ See "Request Trade Account" CTA
- ❌ Cannot see pricing
- ❌ Cannot add to cart
- ❌ Cannot access checkout

**Approved Users (Logged In):**
- ✅ See role-based pricing
- ✅ Add products to cart
- ✅ Place orders
- ✅ View order history
- ✅ Download invoices
- ✅ Access account dashboard

**Pricing Display Logic:**
```
IF user is NOT logged in:
  Display: "Login to view pricing"
  CTA: "Request Trade Account"

ELSE IF user is logged in AND role = approved_*:
  Display: Price based on user role
  CTA: "Add to Cart"

ELSE:
  Display: "Your account is pending approval"
  CTA: "Contact us for status"
```

**Product Page Example (Public View):**
```
Tarik Areke - Traditional Ethiopian Spirit
[Image]
[Description]
[Specifications: ABV, Volume]

Pricing: [Login to View Pricing]
[Request Trade Account Button]
```

**Product Page Example (Approved User View):**
```
Tarik Areke - Traditional Ethiopian Spirit
[Image]
[Description]
[Specifications: ABV, Volume]

Your Price: $XX.XX per bottle
Case Price (12): $XXX.XX
[Add to Cart Button]
```

---

### STEP 5: Controlled Ordering (Role-Based Restrictions)

**Order Caps (Example):**
- Wholesaler: $10,000/month cap
- Retailer: $2,500/month cap
- Restaurant: $1,000/month cap

**Product Restrictions (Example):**
- Some products only for wholesalers
- Some products only for on-premise (restaurants)
- Regional exclusives

**Territory Limitations:**
- Wholesaler A: California only
- Distributor B: Pacific Northwest
- Retailer C: In-state only

**Fulfillment Approval Workflow:**
1. User places order
2. Order status: "Pending Approval"
3. Admin reviews order
4. Admin approves or requests modification
5. Payment processed (if approved)
6. Order fulfilled

**Payment Options (Role-Dependent):**
- Credit card (immediate)
- ACH/Wire transfer (net-30 for established accounts)
- Terms (net-30, net-60 for verified wholesalers)

---

## Who This Model Applies To

### ✅ Eligible for Approval (Can Create Account)

**Licensed Wholesalers**
- Must have valid state wholesale license
- Must carry liquor liability insurance
- Must provide resale certificate
- Typically order in cases/pallets

**Licensed Retailers**
- Must have valid retail alcohol license
- Off-premise consumption (liquor stores, shops)
- Resale certificate for tax exemption
- Order quantities: bottles to cases

**Restaurants / Bars**
- Must have valid on-premise license
- Serve alcohol for consumption on-site
- Order quantities: bottles to cases
- May have special pricing (on-premise tier)

**Authorized Distributors**
- Must have distributor license
- May operate across multiple states
- Negotiated pricing and terms
- Typically largest order volumes

**Event Venues** (Optional)
- Licensed for events (weddings, conferences)
- May require per-event verification
- Order quantities vary

---

### ❌ NOT Eligible (Cannot Create Account)

**General Consumers**
- Individuals without business licenses
- Consumers looking for personal use
- **Action:** May submit inquiry, tagged as `individual`
- **Follow-up:** Added to mailing list for future B2C launch
- **Access:** No pricing, no ordering

**Unlicensed Individuals**
- No business entity
- No alcohol permits
- **Action:** Rejected during verification
- **Follow-up:** Polite rejection email with explanation

**Out-of-State Buyers Without Permits**
- Located outside serviceable territory
- No valid cross-state shipping permits
- **Action:** Rejected or waitlisted
- **Follow-up:** Notify when expansion occurs

**Minors**
- Blocked by age gate before even seeing site
- Should never reach inquiry form

---

### What Individuals CAN Still Do

Even if not approved for purchasing:
- ✅ Submit inquiry (tagged as `individual`)
- ✅ Be added to Mailchimp for brand updates
- ✅ Opt-in for "notify when B2C launches"
- ✅ Follow on social media
- ✅ Learn about Tarik Areke and SEM Spirits
- ❌ See pricing or place orders

---

## Why Pricing is Hidden (Non-Negotiable)

### Legal & Business Reasons

**1. Pricing Varies by Multiple Factors:**
- **State regulations** - Different taxes, markups, controls
- **License type** - On-premise vs off-premise pricing
- **Volume** - Case discounts, pallet pricing, tier breaks
- **Relationship** - Established accounts get better terms
- **Territory** - Exclusive distributors may have negotiated rates

**2. Public Pricing Creates Legal Exposure:**
- **Price-fixing concerns** - Public pricing can create anti-competitive issues
- **Contract conflicts** - If existing distributor has different pricing
- **State ABC violations** - Some states prohibit public alcohol pricing online
- **Tax complications** - Pricing must include/exclude state-specific taxes

**3. Payment Processor Risk:**
- **High-risk merchant accounts** - Alcohol is high-risk for processors
- **Age verification required** - Cannot sell publicly without verification
- **Chargeback risk** - Public sales create more disputes
- **Compliance burden** - Easier to manage with gated access

**4. Competitive Intelligence:**
- **Wholesale pricing is confidential** - Competitors should not see margins
- **Distributor agreements** - Often include non-disclosure on pricing
- **Market positioning** - Pricing strategy is proprietary

### Pricing Display Rules (Technical)

**Rule 1: Default State (No User Logged In)**
```
Product Page:
  Price: "Login to view pricing"
  CTA: "Request Trade Account"
```

**Rule 2: Logged-In User (Approved Role)**
```
Product Page:
  Price: $XX.XX (based on user role)
  CTA: "Add to Cart"
```

**Rule 3: Logged-In User (Pending Approval)**
```
Product Page:
  Price: "Your account is under review"
  CTA: "Contact Us"
```

**Rule 4: Logged-In User (Rejected)**
```
Product Page:
  Price: "Account not approved for purchasing"
  CTA: "Learn More"
```

---

## Mailchimp Strategy (RESET)

### What Mailchimp is NOT:
- ❌ Not a waitlist tool
- ❌ Not for public e-commerce announcements
- ❌ Not for self-service signups

### What Mailchimp IS:
- ✅ Pre-verification CRM
- ✅ Inquiry management system
- ✅ Verification status tracker
- ✅ Communication layer for follow-ups
- ✅ Account onboarding preparation

---

## Mailchimp Audience (Final Structure)

**Audience Name:**
`SEM Spirits — Trade & Verification`

**Purpose:**
- Store all inquiry submissions
- Tag by business type
- Track verification status
- Enable targeted follow-ups
- Prepare for account onboarding

**Segmentation Strategy:**
- By business type (wholesaler, retailer, etc.)
- By verification status (new, pending, approved, rejected)
- By geography (state)
- By product interest (Tarik Areke, etc.)

---

## Mailchimp Fields (Required)

| Field Name | Type | Required | Purpose |
|------------|------|----------|---------|
| Email | Email | Yes | Primary identifier |
| First Name | Text | Yes | Personalization |
| Last Name | Text | Yes | Full name for records |
| Business Name | Text | Yes | Legal entity verification |
| Business Type | Dropdown | Yes | Role assignment, pricing tier |
| State | Text | Yes | Territory, compliance, tax |
| Phone | Phone | No | Follow-up contact |
| Inquiry Message | Long Text | No | Context for verification |
| Verification Status | Dropdown | Yes | Workflow tracking |

**Business Type Options:**
- Wholesaler
- Retailer
- Restaurant/Bar
- Distributor
- Event Venue
- Individual/Other

**Verification Status Options:**
- New (default on submission)
- Pending Review (admin reviewing)
- Approved (verified, ready for account)
- Rejected (did not meet requirements)

---

## Mailchimp Tags (Core Strategy)

### Business Type Tags (Auto-Applied on Form Submit)
- `wholesaler`
- `retailer`
- `restaurant`
- `distributor`
- `event-venue`
- `individual`

### Product Interest Tags
- `tarik-areke-interest`
- `notify-online-sales` (opted in for future B2C launch)

### Verification Workflow Tags
- `verification-pending` (admin is reviewing)
- `verification-approved` (cleared for account creation)
- `verification-rejected` (did not qualify)

### Engagement Tags (Future)
- `account-created` (WordPress user account exists)
- `first-order-placed`
- `repeat-customer`
- `high-value-account` (based on order volume)

**Tag Logic:**
```
On form submit:
  - Auto-tag based on business_type dropdown
  - Auto-tag if Tarik Areke interest checked
  - Auto-tag if notify-online-sales checked
  - Set verification_status = "New"

On admin review:
  - Update verification_status field
  - Add tag: verification-pending

On approval:
  - Update verification_status = "Approved"
  - Add tag: verification-approved
  - Remove tag: verification-pending
  - Trigger automation: "Account Approval Email"

On rejection:
  - Update verification_status = "Rejected"
  - Add tag: verification-rejected
  - Remove tag: verification-pending
  - Trigger automation: "Rejection Email" (polite)
```

---

## Mailchimp Automations (Minimal & Safe)

### Automation 1: Inquiry Confirmation (All Inquiries)

**Trigger:** New subscriber added to audience
**Sent to:** Everyone who submits inquiry
**Delay:** Immediate

**Email Content:**
```
Subject: Thank you for your interest in SEM Spirits

Hi [First Name],

Thank you for reaching out to SEM Spirits.

We've received your inquiry and will review it shortly. Our team verifies all business accounts to ensure compliance with alcohol distribution regulations.

You should hear from us within 2-3 business days.

If you have questions in the meantime, feel free to reply to this email.

Best regards,
SEM Spirits Distribution Team

---
This is an automated confirmation. Please do not reply to this email.
```

**Tone:** Professional, no promises, no pricing, no sales pressure

---

### Automation 2: Verification Approved (Manual Trigger)

**Trigger:** Tag added → `verification-approved`
**Sent to:** Approved businesses only
**Delay:** Immediate

**Email Content:**
```
Subject: Your SEM Spirits trade account has been approved

Hi [First Name],

Great news! Your business has been verified and approved for a SEM Spirits trade account.

We'll be creating your login credentials and sending them to you separately within the next 24 hours.

Once you receive your login, you'll be able to:
- View trade pricing
- Place orders online
- Track order history
- Download invoices

If you have any questions, please contact your account manager or reply to this email.

Welcome to the SEM Spirits trade network.

Best regards,
SEM Spirits Distribution Team
```

**Action:** Admin manually creates WordPress account after this email is sent

---

### Automation 3: Verification Rejected (Manual Trigger)

**Trigger:** Tag added → `verification-rejected`
**Sent to:** Rejected inquiries only
**Delay:** Immediate

**Email Content:**
```
Subject: Update on your SEM Spirits inquiry

Hi [First Name],

Thank you for your interest in partnering with SEM Spirits.

After reviewing your inquiry, we're unable to approve your account at this time due to [reason - must be manually selected]:

- Territory restrictions
- Licensing requirements not met
- We are not currently accepting individual consumer accounts

We appreciate your interest and encourage you to reach out again if your situation changes.

If you'd like to stay updated on SEM Spirits news and future product availability, please visit our website and join our mailing list.

Best regards,
SEM Spirits Distribution Team
```

**Tone:** Polite, professional, leaves door open for future

---

### Automation 4: Account Created (Future - Manual Trigger)

**Trigger:** Tag added → `account-created`
**Sent to:** Users whose WordPress accounts are ready
**Delay:** Immediate

**Email Content:**
```
Subject: Your SEM Spirits login credentials

Hi [First Name],

Your SEM Spirits trade account is now active!

**Login Details:**
- Website: https://semspirits.com/login
- Username: [username]
- Temporary Password: [generated password]

**Next Steps:**
1. Click the login link above
2. Enter your username and temporary password
3. You'll be prompted to create a new password
4. Start browsing our trade catalog

**Your Account Details:**
- Business: [Business Name]
- Account Type: [Wholesaler/Retailer/Restaurant]
- Territory: [State]
- Account Manager: [Name] ([email])

If you have any issues logging in, please contact us.

Welcome aboard!

Best regards,
SEM Spirits Distribution Team
```

---

### Automation 5: Future Online Ordering (Deferred - Tag-Based)

**Trigger:** Tag → `notify-online-sales`
**Sent to:** Individuals who opted in for B2C launch
**Delay:** When B2C launches (Phase 4+)

**Email Content:**
```
Subject: SEM Spirits is now available for individual purchase

Hi [First Name],

You asked to be notified when SEM Spirits becomes available for individual purchase — and that day is here!

We're excited to announce that our online store is now open to consumers in [state].

Browse our collection and order online:
[Shop Now Button]

Thank you for your patience and interest.

Cheers,
SEM Spirits Team
```

---

## What Claude Should NOT Build

This model explicitly EXCLUDES the following:

### ❌ Public Checkout
- No WooCommerce checkout for anonymous users
- No guest checkout
- No "quick buy" for unverified users

### ❌ Public Pricing
- No pricing visible without login
- No "view pricing" links that bypass authentication
- No pricing in meta descriptions or structured data

### ❌ Auto-Approval
- No instant account creation
- No email verification = account created
- No self-service signup flows

### ❌ Self-Service Signup (No Login-to-Purchase Without Verification)
- No "Create Account" button on product pages
- No WooCommerce default registration
- No "Register" links

### ❌ Shopify Assumptions
- This is not Shopify
- This is not Squarespace Commerce
- This is WordPress with role-based access control

---

## Tech Roadmap Alignment

### NOW (Phase 2 - Sprint 1-2)
- [x] Inquiry form → Mailchimp
- [ ] Mailchimp audience + fields + tags configured
- [ ] Inquiry confirmation automation
- [ ] Manual verification workflow (Google Sheet or WP admin)
- [ ] Manual account creation process documented

### NEXT (Phase 2 - Sprint 3-4)
- [ ] Role-based WordPress user accounts
- [ ] Custom user roles created (`approved_wholesaler`, etc.)
- [ ] User metadata fields (business name, license, territory)
- [ ] Login page styled (match SEM Spirits theme)
- [ ] Account dashboard (basic: view orders, download invoices)

### LATER (Phase 3 - WooCommerce Integration)
- [ ] WooCommerce installed
- [ ] Products created (Tarik Areke)
- [ ] Role-based pricing plugin (WooCommerce extension)
- [ ] Hide pricing for non-logged-in users
- [ ] Cart and checkout restricted to approved roles
- [ ] Payment gateway (Stripe) with manual approval workflow

### MUCH LATER (Phase 4 - Advanced Features)
- [ ] Order caps (monthly limits by role)
- [ ] Territory restrictions (geolocation-based product access)
- [ ] Credit limits (based on account metadata)
- [ ] Approval workflow for large orders
- [ ] Terms payment (net-30, net-60 for qualified accounts)

---

## Status Checkpoint

### ✅ Complete
- Age gate solved
- Site stable and secure
- Theme and design system ready

### 🔄 In Progress (Immediate Focus)
- Mailchimp being rebuilt with Verified Trade Portal logic
- Inquiry form enhancement for business verification
- Documentation of manual verification workflow

### ⏭️ Next Step After Mailchimp
- Verification workflow implementation
- Account creation process
- Role-based access mapping

---

## Key Takeaways for Development

1. **No public pricing ever** - Pricing is login-gated and role-dependent
2. **Manual verification is intentional** - This is not a bug, it's the business model
3. **Mailchimp is pre-verification CRM** - Not a waitlist, not a newsletter
4. **WordPress user roles are critical** - Pricing and access depend on role
5. **Individuals are not rejected permanently** - Tag and nurture for future B2C

---

**END OF BUSINESS MODEL DOCUMENT**

*This document supersedes all prior assumptions about waitlists, public e-commerce, or self-service signups.*
*All future development must align with the Verified Trade Portal model.*
