# SEM Spirits - Quick Start Guide

**Last Updated:** 2026-01-15
**Current Status:** Phase 2 Starting - Verified Trade Portal Model

---

## 📋 Read This First

**Business Model:** Verified Trade Portal (B2B Gated Access)
- ❌ NO public pricing
- ❌ NO public checkout
- ❌ NO self-service signup
- ✅ Manual business verification
- ✅ Admin-created accounts only
- ✅ Role-based pricing and access

---

## 📁 Document Map (What to Read When)

### Start Here
1. **QUICK_START.md** ← You are here
   - Overview of all documents
   - Reading order
   - Quick reference

### Core Documents (Read in Order)

2. **UPDATE_SUMMARY_2026-01-15.md** (15 min read)
   - What changed from original plan
   - Why the Verified Trade Portal model
   - Impact on development

3. **BUSINESS_MODEL.md** (20 min read)
   - Complete 5-step workflow
   - Who can/cannot get accounts
   - Why pricing is hidden
   - Mailchimp strategy

4. **MAILCHIMP_SETUP_GUIDE.md** (30 min read)
   - Step-by-step Mailchimp configuration
   - Fields, tags, automations
   - Email templates
   - API integration

### Supporting Documents

5. **PROJECT_ROADMAP.md** (skim - 15 min)
   - High-level strategy
   - Phase breakdown
   - Budget and timeline

6. **PROGRESS_TRACKER.md** (reference as needed)
   - Task-level tracking
   - Sprint burn-down
   - Blocker management

7. **EXECUTIVE_SUMMARY.md** (quick reference - 10 min)
   - What we have now
   - What's missing
   - Next steps

### Technical Documents

8. **README.md** (reference)
   - Age gate implementation
   - Already complete - don't modify

9. **functions.php, header.php, style.css** (reference)
   - Existing theme code
   - Age gate is DONE - don't touch

---

## ⚡ Quick Reference

### Current Phase
**Phase 2 - Sprint 1: CRM Foundation**
- Duration: 2 weeks (Jan 15-29, 2026)
- Goal: Mailchimp integration + inquiry form enhancement

### Immediate Priority Tasks
1. Configure Mailchimp (see MAILCHIMP_SETUP_GUIDE.md)
2. Update inquiry form with new fields
3. Integrate Mailchimp API
4. Test end-to-end workflow

---

## 🔑 Key Concepts

### Verified Trade Portal Workflow

```
Visitor → Inquiry Form → Mailchimp
                            ↓
                    Admin Verifies Business
                            ↓
                   Approved or Rejected?
                      ↙            ↘
                Approved          Rejected
                    ↓                ↓
          Create WP Account    Polite Email
                    ↓                ↓
          User Logs In      Tag for B2C Future
                    ↓
          Sees Role-Based Pricing
                    ↓
            Places Order
```

---

## 📊 Mailchimp Quick Reference

### Required Fields
- Email (built-in)
- First Name (built-in)
- Last Name (built-in)
- **Business Name** (custom)
- **Business Type** (custom dropdown)
- **State** (custom)
- **Phone** (custom, optional)
- **Inquiry Message** (custom, optional)
- **Verification Status** (custom dropdown)

### Business Type Options
1. Wholesaler
2. Retailer
3. Restaurant/Bar
4. Distributor
5. Event Venue
6. Individual/Other

### Verification Status Options
1. New (default)
2. Pending Review
3. Approved
4. Rejected

### Core Tags
- Business types: `wholesaler`, `retailer`, `restaurant`, `distributor`, `event-venue`, `individual`
- Verification: `verification-pending`, `verification-approved`, `verification-rejected`
- Interest: `tarik-areke-interest`, `notify-online-sales`

### Automations
1. **Inquiry Confirmation** (trigger: new subscriber)
2. **Verification Approved** (trigger: tag added)
3. **Verification Rejected** (trigger: tag added, optional)

---

## 🚫 What NOT to Build

- ❌ Public checkout
- ❌ Public pricing display
- ❌ Auto-approval workflows
- ❌ Self-service account registration
- ❌ Waitlist language in copy
- ❌ "Shop Now" CTAs for public visitors

---

## ✅ What TO Build

- ✅ Inquiry form with business verification fields
- ✅ Mailchimp integration with new fields/tags
- ✅ "Login to View Pricing" messaging
- ✅ "Request Trade Account" CTAs
- ✅ Manual verification workflow documentation
- ✅ Admin notification emails (enhanced format)

---

## 📧 Email Templates (Short Version)

### Template 1: Inquiry Confirmation
**Subject:** Thank you for your interest in SEM Spirits
**Message:** "We've received your inquiry and will review it within 2-3 business days."

### Template 2: Verification Approved
**Subject:** Your SEM Spirits trade account has been approved
**Message:** "Approved! Login credentials coming within 24 hours."

### Template 3: Verification Rejected
**Subject:** Update on your SEM Spirits inquiry
**Message:** "Unable to approve at this time. Thank you for your interest."

---

## 🎯 Success Metrics (Phase 2)

| Metric | Target |
|--------|--------|
| Trade Inquiries | 50+ |
| Businesses Verified | 20+ |
| Accounts Created | 10+ |
| Email Open Rate | 80%+ |
| Verification Time | 2-3 days |
| Rejection Rate | <5% |

---

## 📅 Timeline Snapshot

```
TODAY (Jan 15)
├─ Documents created ✅
└─ Awaiting stakeholder approval

THIS WEEK (Jan 15-22)
├─ Mailchimp setup
├─ Inquiry form design
└─ API integration planning

SPRINT 1 (Jan 15-29)
├─ Mailchimp configured
├─ Inquiry form live
└─ Automations tested

SPRINT 2 (Jan 29 - Feb 12)
├─ Content development
├─ Product pages (no public pricing)
└─ Legal pages

PHASE 2 COMPLETE (Mar 1)
└─ Verified Trade Portal operational
```

---

## 🔗 External Resources

- Mailchimp Docs: https://mailchimp.com/developer/marketing/
- WordPress User Roles: https://wordpress.org/documentation/article/roles-and-capabilities/
- WooCommerce Role-Based Pricing: https://woocommerce.com/products/role-based-pricing/

---

## ❓ Common Questions

**Q: Why can't we show pricing publicly?**
A: Legal exposure, contract conflicts, pricing varies by state/license type, payment processor risk. See BUSINESS_MODEL.md for details.

**Q: Can individuals submit inquiries?**
A: Yes, but they won't get purchasing accounts. Tag as `individual` for future B2C launch.

**Q: How long does verification take?**
A: Target 2-3 business days. Manual process (by design).

**Q: What if we want to automate verification later?**
A: Possible in Phase 4+. Start manual to understand the process, then automate.

**Q: Do we need a CRM beyond Mailchimp?**
A: Not for Phase 2. Consider HubSpot/Salesforce in Phase 3+ for advanced features.

---

## 🚀 Immediate Next Steps

### For Stakeholder
1. ✅ Read UPDATE_SUMMARY_2026-01-15.md
2. ✅ Read BUSINESS_MODEL.md
3. ⏳ Approve Verified Trade Portal model
4. ⏳ Provide Mailchimp credentials

### For Developer
1. ✅ Read all documentation
2. ⏳ Configure Mailchimp per guide
3. ⏳ Update inquiry form
4. ⏳ Test workflows

### For ChatGPT
1. ⏳ Generate email template copy
2. ⏳ Write form field labels
3. ⏳ Create "Request Trade Account" CTA copy
4. ⏳ Update homepage (remove waitlist language)

---

## 📞 Contact & Support

- **Project Documentation:** All files in `C:\Users\kaluz\OneDrive\Documents\SEM Spirit\semspirit\`
- **Live Site:** https://semspirits.com
- **Hosting:** Hostinger (LiteSpeed)

---

## ✍️ Document Changelog

| Date | Version | Changes |
|------|---------|---------|
| 2026-01-15 | 1.0.0 | Initial Quick Start created |

---

**🎯 Remember:** This is a **Verified Trade Portal**, not a public e-commerce site. Keep that in mind for all development decisions.

---

**END OF QUICK START GUIDE**
