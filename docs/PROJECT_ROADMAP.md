# SEM Spirits Distribution - Enterprise Project Roadmap

**Project Status:** Phase 1 - Foundation Complete, Moving to Phase 2
**Last Updated:** 2026-01-15
**Domain:** semspirits.com
**Platform:** WordPress + LiteSpeed (Hostinger)

---

## Executive Summary

SEM Spirits Distribution is building a **Verified Trade Portal** - a premium, gated B2B alcohol distribution platform focused on Tarik Areke as the flagship product. This is NOT a public e-commerce site.

**Business Model:** Verified Trade / Approved Buyer Portal
- Manual business verification workflow
- Role-based access control
- Hidden pricing (login-required)
- Licensed trade partners only

**Current State:** Age-gated foundation with premium design ✅
**Next Phase:** CRM integration, verification workflow, and role-based access
**Vision:** Secure B2B portal with compliance-first architecture

⚠️ **CRITICAL:** No public pricing, no public checkout, no self-service signup. See BUSINESS_MODEL.md for complete workflow.

---

## Phase Completion Status

### ✅ Phase 1: Foundation (COMPLETE)
- [x] Domain & Hostinger hosting configured
- [x] Custom WordPress theme (`sem-spirits`) deployed
- [x] Production-grade age verification system
- [x] LiteSpeed cache optimization
- [x] Premium design system with dark palette
- [x] Responsive mobile-first layout
- [x] Accessibility compliance (WCAG 2.1)
- [x] Security hardening (CSRF, secure cookies, nonce protection)

### 🔄 Phase 2: Verification Workflow & CRM (IN PROGRESS - 0%)
- [ ] Mailchimp integration (Verified Trade Portal model)
- [ ] Enhanced inquiry form with business license fields
- [ ] Manual verification workflow documentation
- [ ] WordPress user roles (approved_wholesaler, approved_retailer, etc.)
- [ ] Tarik Areke product storytelling section (NO PRICING publicly)
- [ ] Legal compliance footer
- [ ] Admin notification system with verification checklist
- [ ] Lead tagging & verification status tracking

### ⏸️ Phase 3: Gated E-Commerce (PLANNED)
- [ ] WooCommerce integration with role-based pricing
- [ ] Hide pricing for non-logged-in users
- [ ] Role-based access control (approved users only)
- [ ] State-based shipping restrictions
- [ ] Payment gateway (Stripe/Square) with manual approval workflow
- [ ] Order caps and territory restrictions
- [ ] Inventory management system
- [ ] Order fulfillment workflow (manual approval option)
- [ ] Multi-location compliance engine

### 🚀 Phase 4: Scale & Optimization (FUTURE)
- [ ] Multi-product catalog expansion
- [ ] Advanced analytics & reporting
- [ ] CRM automation workflows
- [ ] SEO optimization
- [ ] Performance monitoring
- [ ] A/B testing framework

---

## Gap Analysis: Current vs. Whiskey Library Benchmark

### What We Have ✅
- Premium design aesthetic
- Age verification (enterprise-grade)
- Mobile-responsive layout
- Fast performance foundation
- Security hardening

### What We're Missing (Priority Order)

#### 🔴 CRITICAL - Phase 2 Priorities
1. **Product Catalog System**
   - No product pages or detail views
   - Missing product photography/imagery
   - No variant/SKU management
   - No product descriptions or storytelling

2. **E-Commerce Infrastructure**
   - No shopping cart
   - No payment processing
   - No checkout flow
   - No order management

3. **CRM & Lead Management**
   - No Mailchimp integration
   - No lead segmentation
   - No automated follow-ups
   - Basic inquiry form needs enhancement

4. **Content & Storytelling**
   - No Tarik Areke brand story page
   - Missing "About Us" section
   - No origin/craft narrative
   - No use case education

#### 🟡 IMPORTANT - Phase 3 Priorities
5. **Customer Engagement**
   - No review system (Judge.me or similar)
   - No testimonials
   - No social proof
   - No customer Q&A

6. **Advanced Features**
   - No search functionality
   - No product filtering
   - No subscription options
   - No bundle/gift options

7. **Marketing Integration**
   - No analytics setup (GA4, GTM)
   - No email marketing automation
   - No loyalty program
   - No referral system

#### 🟢 NICE-TO-HAVE - Phase 4
8. **Enhanced UX**
   - Quick-add to cart
   - Wishlist functionality
   - Product comparison
   - Live chat support

---

## Detailed Phase 2 Action Plan

### Sprint 1: CRM Foundation (Week 1-2)

#### Task 1.1: Mailchimp Setup ⏳
**Owner:** Development Team
**Dependencies:** None
**Deliverables:**
- [ ] Create Mailchimp account (or connect existing)
- [ ] Set up primary audience: "SEM Spirits Trade Partners"
- [ ] Configure tags:
  - `wholesale-inquiry`
  - `retail-inquiry`
  - `restaurant-bar`
  - `distributor`
  - `individual-consumer`
  - `tarik-areke-interest`
  - `notify-ecommerce-launch`
- [ ] Design welcome email template
- [ ] Create automated admin notification email
- [ ] Test double opt-in workflow (disabled for B2B)

**Resources Needed from ChatGPT:**
- Email copywriting for welcome sequence
- Admin notification email template
- Mailchimp best practices for B2B lead management

#### Task 1.2: Enhanced Inquiry Form 🎯
**Owner:** Development Team
**Dependencies:** Mailchimp API keys
**Deliverables:**
- [ ] Add business type dropdown with options:
  - Wholesaler
  - Retailer
  - Restaurant/Bar
  - Distributor
  - Event Venue
  - Individual Consumer
- [ ] Add required fields:
  - Full Name (required)
  - Email (required)
  - Phone (optional)
  - Business Name (conditional: required if not individual)
  - State/Location (required for compliance)
  - Message/Intent (required)
- [ ] Add optional checkbox: "Notify me when online ordering is available"
- [ ] Implement conditional logic (hide business fields for individuals)
- [ ] Add form validation (client + server-side)
- [ ] Connect to Mailchimp API
- [ ] Implement lead tagging based on business type
- [ ] Add Google reCAPTCHA v3 for spam prevention

**Technical Specifications:**
```php
// Form handler should:
1. Sanitize all inputs
2. Validate email format
3. Check state/location for compliance tracking
4. Tag in Mailchimp based on business_type
5. Send admin notification email
6. Display success message
7. Optional: redirect to thank-you page
```

**Resources Needed from ChatGPT:**
- Form copy and field labels
- Validation error messages (professional tone)
- Success message copy
- Privacy policy updates for data collection

#### Task 1.3: Admin Notification System 📧
**Owner:** Development Team
**Dependencies:** Inquiry form completion
**Deliverables:**
- [ ] Design HTML email template for admin notifications
- [ ] Include all form data in structured format
- [ ] Add business type badge/label for quick scanning
- [ ] Include timestamp and IP for tracking
- [ ] Add direct-reply functionality
- [ ] Configure SMTP or SendGrid for reliable delivery
- [ ] Test notification delivery to multiple admin emails

**Email Template Structure:**
```
Subject: 🥃 New [Business Type] Inquiry - [Name]

[Business Type Badge]

Contact Information:
- Name: [Full Name]
- Email: [Email]
- Phone: [Phone]
- Business: [Business Name]
- Type: [Business Type]
- Location: [State]

Message:
[Message content]

Additional:
- Wants eCommerce updates: [Yes/No]
- Submitted: [Timestamp]
- IP: [IP Address]

[CTA: Reply to Lead] [CTA: View in CRM]
```

---

### Sprint 2: Content Development (Week 3-4)

#### Task 2.1: Tarik Areke Product Section 📄
**Owner:** Content Team + Development
**Dependencies:** Product photography, brand guidelines
**Deliverables:**
- [ ] Create dedicated Tarik Areke landing section/page
- [ ] Write brand story (origin, craft, cultural significance)
- [ ] Add product specifications:
  - ABV/Proof
  - Volume/Sizes available
  - Flavor profile
  - Serving suggestions
- [ ] Include high-quality photography:
  - Bottle shots (front, back, detail)
  - Lifestyle imagery
  - Production/craft photography
- [ ] Add "Request Wholesale Pricing" CTA
- [ ] Create "Download Product Sheet" (PDF)
- [ ] Implement schema markup for SEO

**Content Sections:**
1. **Hero:** Striking bottle imagery + tagline
2. **Story:** Heritage and craft narrative
3. **Product Details:** Specs and tasting notes
4. **Trade Information:** Wholesale inquiries CTA
5. **Press/Awards:** (if applicable)

**Resources Needed from ChatGPT:**
- Brand storytelling copy (given Tarik Areke background)
- Product description writing
- SEO-optimized meta descriptions
- Tasting notes language
- PDF product sheet design template

#### Task 2.2: Homepage Content Enhancement 🏠
**Owner:** Content Team + Development
**Dependencies:** None
**Deliverables:**
- [ ] Write hero headline and subheadline
- [ ] Create value proposition section
- [ ] Add "Featured Product" section (Tarik Areke spotlight)
- [ ] Include "For Trade Partners" section with benefits
- [ ] Add trust indicators:
  - "Official Distributor" badge
  - Compliance certifications
  - Partnership logos (if applicable)
- [ ] Implement call-to-action hierarchy:
  - Primary: Wholesale Inquiry
  - Secondary: Learn About Tarik Areke
  - Tertiary: Join Waitlist for Online Ordering

**Resources Needed from ChatGPT:**
- Homepage headline options (A/B test variations)
- Value proposition copywriting
- Trust indicator copy
- CTA button microcopy

#### Task 2.3: Legal & Compliance Pages 📋
**Owner:** Legal + Development
**Dependencies:** Legal review
**Deliverables:**
- [ ] Create comprehensive footer with links:
  - Terms of Service
  - Privacy Policy
  - Shipping Policy (future)
  - Return/Refund Policy (future)
  - Responsible Drinking Resources
  - Contact Information
- [ ] Add compliance disclaimers:
  - "Must be 21+ to purchase"
  - State-specific restrictions notice
  - Responsible consumption messaging
- [ ] Include required business information:
  - Business license numbers
  - Registered business address
  - Contact email/phone
- [ ] Link to responsibility.org or similar resources

**Resources Needed from ChatGPT:**
- Terms of Service template (alcohol distribution specific)
- Privacy Policy compliant with GDPR/CCPA
- Compliance disclaimer copywriting

---

### Sprint 3: Technical Enhancement (Week 5-6)

#### Task 3.1: Performance Optimization 🚀
**Owner:** Development Team
**Dependencies:** None
**Deliverables:**
- [ ] Implement lazy loading for images
- [ ] Optimize CSS delivery (critical CSS inline)
- [ ] Minify JavaScript and CSS
- [ ] Enable WebP image format with fallbacks
- [ ] Configure LiteSpeed cache rules:
  - Browser cache: 1 year for static assets
  - Page cache: 1 hour for verified users
  - No cache for inquiry forms
- [ ] Add CDN for static assets (Cloudflare)
- [ ] Implement resource hints (preconnect, prefetch)
- [ ] Test and achieve:
  - Google PageSpeed Score: 90+ mobile, 95+ desktop
  - LCP < 2.5s
  - FID < 100ms
  - CLS < 0.1

#### Task 3.2: Analytics & Tracking 📊
**Owner:** Development + Marketing
**Dependencies:** Google account setup
**Deliverables:**
- [ ] Install Google Analytics 4 (GA4)
- [ ] Configure Google Tag Manager (GTM)
- [ ] Set up event tracking:
  - Age verification (confirm/deny)
  - Form submissions (inquiry type)
  - CTA clicks (wholesale, waitlist)
  - Page scrolling depth
  - Product interest (Tarik Areke views)
- [ ] Create custom audiences for remarketing
- [ ] Set up conversion goals:
  - Primary: Inquiry form submission
  - Secondary: Email sign-up
  - Tertiary: Product page engagement
- [ ] Configure Google Search Console
- [ ] Add Bing Webmaster Tools

**Resources Needed from ChatGPT:**
- Analytics naming conventions
- Event taxonomy structure
- Custom dimension recommendations

#### Task 3.3: SEO Foundation 🔍
**Owner:** Development + Marketing
**Dependencies:** Content completion
**Deliverables:**
- [ ] Install Yoast SEO or RankMath plugin
- [ ] Optimize meta titles and descriptions
- [ ] Create XML sitemap
- [ ] Configure robots.txt
- [ ] Implement structured data (Schema.org):
  - Organization
  - Product
  - LocalBusiness
  - BreadcrumbList
- [ ] Optimize heading hierarchy (H1-H6)
- [ ] Add image alt text (all images)
- [ ] Create keyword strategy:
  - Primary: "Tarik Areke distributor"
  - Secondary: "Ethiopian spirits wholesale"
  - Long-tail: "where to buy Tarik Areke [state]"
- [ ] Submit to Google Business Profile (if applicable)

**Resources Needed from ChatGPT:**
- Keyword research strategy
- Meta description templates
- Schema markup examples for alcohol products

---

### Sprint 4: Testing & Launch Preparation (Week 7)

#### Task 4.1: Quality Assurance 🧪
**Owner:** QA Team
**Deliverables:**
- [ ] Cross-browser testing:
  - Chrome (Windows, Mac, Android)
  - Safari (Mac, iOS)
  - Firefox
  - Edge
- [ ] Mobile responsiveness testing:
  - iPhone (various sizes)
  - Android (various sizes)
  - iPad/tablets
- [ ] Form testing:
  - All field validations
  - Error message displays
  - Success state
  - Email delivery (admin + user)
  - Mailchimp tagging verification
- [ ] Age gate testing:
  - Cookie persistence
  - Incognito mode behavior
  - Cache behavior (verified vs unverified)
- [ ] Performance testing:
  - Load time under traffic
  - Form submission under load
  - Cache effectiveness
- [ ] Security testing:
  - XSS vulnerability scan
  - SQL injection testing
  - CSRF token verification
  - SSL certificate validation
  - Security headers check

#### Task 4.2: Stakeholder Review & Feedback 👥
**Owner:** Project Manager
**Deliverables:**
- [ ] Internal team walkthrough
- [ ] Stakeholder demo presentation
- [ ] Collect feedback on:
  - Design/branding alignment
  - Content accuracy
  - User experience flow
  - Technical performance
- [ ] Create feedback prioritization matrix
- [ ] Implement critical changes
- [ ] Re-test after changes

#### Task 4.3: Go-Live Checklist ✅
**Owner:** Project Manager
**Deliverables:**
- [ ] Final content proofread
- [ ] All links tested (no 404s)
- [ ] Contact form email delivery confirmed
- [ ] Analytics tracking verified
- [ ] Backup created (database + files)
- [ ] SSL certificate valid
- [ ] DNS records verified
- [ ] 301 redirects configured (if applicable)
- [ ] Google Analytics goals active
- [ ] Mailchimp integration live
- [ ] Admin notification emails working
- [ ] Legal pages reviewed and approved
- [ ] Performance benchmarks met
- [ ] Mobile usability confirmed
- [ ] Age gate compliance verified
- [ ] Launch announcement prepared (email, social)

---

## Phase 3 Preview: E-Commerce Roadmap

### Sprint 5-8: E-Commerce Foundation (8-12 weeks)

#### WooCommerce Integration
- [ ] Install and configure WooCommerce
- [ ] Set up product catalog structure
- [ ] Configure tax settings (per state)
- [ ] Implement shipping restrictions by state
- [ ] Create shipping zones and rates
- [ ] Set up payment gateways:
  - Stripe (credit/debit cards)
  - PayPal (backup)
  - Option: Affirm for B2B financing

#### Compliance Layer
- [ ] Age verification at checkout (separate from site gate)
- [ ] State-specific product availability rules
- [ ] Shipping restriction engine:
  - Dry counties/zip codes
  - State-by-state licensing
  - Residential vs commercial delivery
- [ ] Purchase limits (if required by license)
- [ ] Adult signature requirement at delivery

#### Product Management
- [ ] Tarik Areke product variants:
  - 750ml bottle
  - Case (12x 750ml)
  - Mixed case options (future)
- [ ] Product photography workflow
- [ ] Inventory sync system
- [ ] Low-stock alerts
- [ ] Backorder management

#### Order Management
- [ ] Order processing workflow
- [ ] Email notifications:
  - Order confirmation
  - Shipping notification
  - Delivery confirmation
- [ ] Admin dashboard for order management
- [ ] Integration with shipping carriers (USPS, FedEx, UPS)
- [ ] Returns/refunds process (if permitted)

**Estimated Timeline:** 8-12 weeks
**Budget Consideration:** $5,000-$15,000 (development + integrations)

---

## Technical Architecture

### Current Stack
- **Platform:** WordPress 6.4+
- **Server:** Hostinger with LiteSpeed
- **Theme:** Custom (`sem-spirits`) - proprietary
- **Cache:** LiteSpeed Cache Plugin
- **PHP:** 7.4+ (8.1+ recommended)
- **Database:** MySQL 5.7+
- **SSL:** Let's Encrypt (Hostinger managed)

### Planned Integrations

#### Phase 2
- **Mailchimp:** Email marketing + CRM
- **Google Analytics 4:** Web analytics
- **Google Tag Manager:** Tag management
- **reCAPTCHA v3:** Form spam protection
- **SendGrid/SMTP:** Transactional emails

#### Phase 3
- **WooCommerce:** E-commerce engine
- **Stripe:** Payment processing
- **ShipStation:** Shipping management (optional)
- **TaxJar:** Automated sales tax (optional)
- **Judge.me:** Product reviews
- **Klaviyo:** Advanced email automation (Mailchimp alternative)

#### Phase 4
- **Hotjar:** User behavior analytics
- **Optimizely:** A/B testing
- **HubSpot:** Enterprise CRM (if scaling B2B)
- **Salesforce:** Alternative enterprise CRM

---

## Design System

### Brand Identity
- **Primary Color:** Gold (#d6b25e)
- **Secondary:** Dark Navy (#0b0f14)
- **Accent:** Teal (#459c8d)
- **Text:** Light Gray (#e9edf3)
- **Muted:** Medium Gray (#b6c2d1)

### Typography
- **Headings:** System UI Sans-serif
- **Body:** System UI Sans-serif
- **Size Scale:** 12px, 13px, 14px, 16px, 20px, 26px

### Spacing System
- **Base unit:** 4px
- **Scale:** 8px, 10px, 12px, 14px, 18px, 20px, 22px, 24px, 28px

### Component Library
- Buttons (primary, secondary, pill)
- Forms (inputs, dropdowns, textareas)
- Modals (age gate pattern)
- Cards (product cards - future)
- Navigation (header, footer)

---

## Compliance & Legal Strategy

### Current Compliance Measures ✅
- Age verification (21+ gate)
- Secure cookies (HttpOnly, SameSite)
- CSRF protection via WordPress nonces
- Accessibility (WCAG 2.1 Level AA)
- SSL encryption (HTTPS enforced)

### Phase 2 Compliance Additions
- [ ] Terms of Service (alcohol-specific)
- [ ] Privacy Policy (GDPR/CCPA compliant)
- [ ] Cookie consent banner (if targeting EU)
- [ ] Data retention policy
- [ ] Responsible drinking disclaimers

### Phase 3 Compliance Requirements
- [ ] Business license verification
- [ ] State-by-state shipping licenses
- [ ] ABC (Alcohol Beverage Control) permits
- [ ] Tax compliance per jurisdiction
- [ ] Adult signature delivery requirements
- [ ] Purchase volume limits (if applicable)
- [ ] Dry county/zip code restrictions

**Legal Resources Needed:**
- Alcohol distribution attorney consultation
- State licensing research
- Compliance audit

---

## Success Metrics & KPIs

### Phase 2 Goals (Next 6-8 Weeks)
1. **Lead Generation:**
   - 50+ wholesale inquiry submissions
   - 20% conversion from visitor to inquiry
   - Average form completion time < 2 minutes

2. **Engagement:**
   - 3+ minute average session duration
   - < 40% bounce rate
   - 70%+ scroll depth on Tarik Areke page

3. **Technical Performance:**
   - 95+ PageSpeed score (desktop)
   - 90+ PageSpeed score (mobile)
   - 100% uptime (excluding maintenance)
   - < 2s page load time

4. **Email Marketing:**
   - 200+ email list subscribers
   - 30%+ email open rate
   - 5%+ click-through rate

### Phase 3 Goals (E-Commerce Launch)
1. **Sales:**
   - 10+ wholesale orders in first month
   - $5,000+ revenue in first month
   - 3+ repeat customers in first quarter

2. **Conversion:**
   - 2-3% visitor-to-purchase rate
   - $150+ average order value
   - < 5% cart abandonment rate

3. **Customer Satisfaction:**
   - 4.5+ star average product rating
   - < 2% return/refund rate
   - 90%+ on-time delivery rate

---

## Risk Management

### Current Risks & Mitigations

| Risk | Impact | Probability | Mitigation |
|------|--------|-------------|------------|
| Age gate failure | Critical | Low | Extensive testing, fallback JS, server-side validation |
| Cache serving wrong content | High | Low | LiteSpeed vary rules, cookie exclusions, no-cache headers |
| Form spam | Medium | High | reCAPTCHA v3, honeypot fields, rate limiting |
| Email deliverability | Medium | Medium | SendGrid/SMTP, SPF/DKIM/DMARC records |
| State compliance violation | Critical | Medium | Legal review, state-by-state research, conservative approach |
| Payment fraud | High | Medium | Stripe Radar, manual review for large orders |
| Data breach | Critical | Low | SSL, secure cookies, regular security audits |

### Phase 3 Additional Risks
- Shipping license delays (mitigate: start applications early)
- Payment processing holds (mitigate: established business history)
- Inventory shortages (mitigate: demand forecasting, safety stock)
- Negative reviews (mitigate: quality control, customer service excellence)

---

## Budget Estimate

### Phase 2 (Current Focus)
- **Mailchimp:** $20-50/month (based on list size)
- **reCAPTCHA:** Free
- **Analytics Tools:** Free (GA4, GTM, Search Console)
- **Development Time:** 120-160 hours @ $75-150/hr = $9,000-24,000
- **Content Creation:** 40-60 hours @ $50-100/hr = $2,000-6,000
- **Photography:** $1,000-3,000 (product shots)
- **Legal Review:** $1,500-3,000
- **Miscellaneous:** $500-1,000

**Phase 2 Total:** $14,000-37,000

### Phase 3 (E-Commerce)
- **WooCommerce Plugins:** $200-500/year
- **Stripe Fees:** 2.9% + $0.30 per transaction
- **Shipping Software:** $50-200/month
- **Development Time:** 200-300 hours @ $75-150/hr = $15,000-45,000
- **State Licenses:** $1,000-5,000 per state
- **Insurance:** $1,000-3,000/year
- **Miscellaneous:** $2,000-5,000

**Phase 3 Total:** $19,000-58,000 (excluding state licenses)

---

## Collaboration with ChatGPT

### Resources Needed from ChatGPT

#### Immediate (Phase 2 - Sprint 1)
1. **Email Marketing Copy:**
   - Welcome email for new leads
   - Wholesale inquiry follow-up sequence
   - Admin notification email template
   - Email signature design

2. **Form Copy & UX:**
   - Field labels and placeholder text
   - Error messages (professional, helpful tone)
   - Success message variations
   - Progressive disclosure copy

3. **Legal Documents (Templates):**
   - Terms of Service (alcohol-specific)
   - Privacy Policy (GDPR/CCPA compliant)
   - Cookie policy
   - Data processing agreement

#### Short-Term (Phase 2 - Sprint 2)
4. **Brand Storytelling:**
   - Tarik Areke origin narrative
   - Heritage and craft storyline
   - Flavor profile descriptions
   - Serving suggestion copy

5. **Homepage Copy:**
   - Hero headline options (5-10 variations)
   - Value proposition statements
   - Trust indicator messaging
   - CTA microcopy optimization

6. **SEO Content:**
   - Meta descriptions (character-optimized)
   - Alt text for images
   - H1/H2/H3 hierarchy recommendations
   - FAQ content for organic search

#### Medium-Term (Phase 2 - Sprint 3)
7. **Analytics Strategy:**
   - Event naming conventions
   - Custom dimension recommendations
   - Audience segment definitions
   - Conversion funnel mapping

8. **Product Descriptions:**
   - Tarik Areke product detail copy
   - Specification formatting
   - Tasting notes language
   - Wholesale value propositions

#### Long-Term (Phase 3)
9. **E-Commerce Content:**
   - Category descriptions
   - Shipping policy copy
   - Return/refund policy
   - Product bundles descriptions

10. **Customer Engagement:**
    - Review request emails
    - Loyalty program copy
    - Referral program messaging
    - Customer service templates

### How to Collaborate Effectively

1. **Provide Context:** Share brand guidelines, tone of voice, target audience
2. **Set Parameters:** Character limits, keyword requirements, compliance constraints
3. **Iterate:** Request multiple variations for A/B testing
4. **Review Together:** Use this roadmap as source of truth for alignment
5. **Update Status:** Keep ChatGPT informed of completed tasks to adjust recommendations

---

## Project Team Structure

### Recommended Roles

#### Current Team (Minimum Viable)
- **Project Owner/Stakeholder:** Decision maker, vision holder
- **Developer (Full-Stack):** WordPress, PHP, JavaScript, integrations
- **Content Writer/Copywriter:** Brand storytelling, web copy, SEO
- **Designer (Optional):** UI/UX refinements, graphics, photography direction

#### Future Team (Phase 3+)
- **E-Commerce Manager:** Product catalog, inventory, orders
- **Marketing Manager:** Email campaigns, SEO, analytics
- **Customer Service:** Inquiry response, order support
- **Legal/Compliance Advisor:** State licensing, regulations

---

## Next Steps (Immediate Actions)

### This Week
1. **Review & approve this roadmap** with stakeholders
2. **Set up Mailchimp account** (or provide existing credentials)
3. **Gather Tarik Areke assets:**
   - Product photography (high-res)
   - Brand story/background information
   - Specifications (ABV, volume, origin)
4. **Initiate legal review** for Terms of Service and Privacy Policy
5. **Create ChatGPT collaboration doc** with brand guidelines

### Next Week
1. **Begin Mailchimp configuration** (audiences, tags, templates)
2. **Start inquiry form enhancement** (design + development)
3. **Draft Tarik Areke content outline** (with ChatGPT assistance)
4. **Set up Google Analytics 4 property**
5. **Schedule stakeholder check-in** (weekly cadence)

### This Month
1. **Complete Sprint 1** (CRM Foundation)
2. **Launch enhanced inquiry form** with Mailchimp integration
3. **Publish Tarik Areke content section**
4. **Implement analytics tracking**
5. **Begin Sprint 2** (Content Development)

---

## Change Log

| Date | Version | Changes | Author |
|------|---------|---------|--------|
| 2026-01-15 | 1.0.0 | Initial roadmap creation based on project audit | Claude Code |

---

## Document Control

**Document Owner:** SEM Spirits Project Team
**Review Frequency:** Weekly during active development
**Next Review Date:** 2026-01-22
**Distribution:** Project team, stakeholders, ChatGPT collaboration

---

## Appendix

### A. Technical Specifications
- See `README.md` for age gate implementation details
- WordPress theme version: 2.0.0
- PHP minimum: 7.4 (8.1+ recommended)
- Browser support: Chrome 80+, Firefox 75+, Safari 13+, Edge 80+

### B. Glossary
- **Age Gate:** Mandatory age verification modal (21+)
- **B2B:** Business-to-business (wholesale, trade)
- **B2C:** Business-to-consumer (retail, individual)
- **CRM:** Customer Relationship Management
- **LiteSpeed:** Web server and cache technology (Hostinger)
- **Mailchimp:** Email marketing and CRM platform
- **WooCommerce:** WordPress e-commerce plugin

### C. Reference Links
- Hostinger Documentation: https://support.hostinger.com
- WordPress Codex: https://codex.wordpress.org
- Mailchimp API: https://mailchimp.com/developer
- WooCommerce Docs: https://woocommerce.com/documentation
- Whiskey Library (Benchmark): https://whiskeylibrary.com

### D. Contact Information
- **Project Repository:** C:\Users\kaluz\OneDrive\Documents\SEM Spirit\semspirit
- **Live Site:** semspirits.com
- **Hosting:** Hostinger (LiteSpeed environment)

---

**END OF ROADMAP**

*This is a living document. Update regularly as project evolves.*
