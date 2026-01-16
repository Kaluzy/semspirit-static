/**
 * SEM Spirits Age Gate Enhancement
 * 
 * Provides:
 * - Loading states during form submission
 * - Cookie fallback if server-side fails
 * - Accessibility improvements
 * - Analytics hooks
 * 
 * @version 2.0.0
 */
(function() {
    'use strict';

    var COOKIE_NAME = 'sem_age_verified';
    var COOKIE_DAYS = 30;

    /**
     * Set a cookie (fallback if server-side cookie fails)
     */
    function setCookie(name, value, days) {
        var expires = '';
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toUTCString();
        }
        var secure = location.protocol === 'https:' ? '; Secure' : '';
        document.cookie = name + '=' + (value || '') + expires + '; path=/' + secure + '; SameSite=Lax';
    }

    /**
     * Check if cookie exists
     */
    function getCookie(name) {
        var nameEQ = name + '=';
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var c = cookies[i].trim();
            if (c.indexOf(nameEQ) === 0) {
                return c.substring(nameEQ.length);
            }
        }
        return null;
    }

    /**
     * Hide the age gate
     */
    function hideGate() {
        var gate = document.getElementById('sem-agegate');
        if (gate) {
            gate.classList.remove('show');
            gate.setAttribute('aria-hidden', 'true');
            document.documentElement.classList.remove('agegate-active');
            
            // Remove from DOM after animation
            setTimeout(function() {
                if (gate.parentNode) {
                    gate.parentNode.removeChild(gate);
                }
            }, 300);
        }
    }

    /**
     * Show loading state on button
     */
    function setLoading(button, isLoading) {
        if (isLoading) {
            button.disabled = true;
            button.dataset.originalText = button.textContent;
            button.textContent = 'Verifying...';
            button.style.opacity = '0.7';
        } else {
            button.disabled = false;
            button.textContent = button.dataset.originalText || button.textContent;
            button.style.opacity = '';
        }
    }

    /**
     * Initialize age gate functionality
     */
    function init() {
        // If cookie already exists (edge case), hide gate immediately
        if (getCookie(COOKIE_NAME)) {
            hideGate();
            return;
        }

        var form = document.getElementById('sem-agegate-form');
        var confirmBtn = document.getElementById('agegate-confirm');
        var denyBtn = document.getElementById('agegate-deny');

        if (!form) return;

        // Handle form submission with enhanced UX
        form.addEventListener('submit', function(e) {
            var clickedButton = document.activeElement;
            
            // Determine which button was clicked
            if (clickedButton === confirmBtn || 
                (e.submitter && e.submitter.value === 'confirm')) {
                
                setLoading(confirmBtn, true);
                
                // Set cookie client-side as backup
                setCookie(COOKIE_NAME, 'verified', COOKIE_DAYS);
                
                // Track event if analytics available
                if (typeof gtag === 'function') {
                    gtag('event', 'age_verified', {
                        'event_category': 'engagement',
                        'event_label': 'age_gate'
                    });
                }
                
                // Allow form to submit normally
                // Server will set httpOnly cookie and redirect
                
            } else if (clickedButton === denyBtn || 
                       (e.submitter && e.submitter.value === 'deny')) {
                
                setLoading(denyBtn, true);
                
                // Track event if analytics available
                if (typeof gtag === 'function') {
                    gtag('event', 'age_denied', {
                        'event_category': 'engagement',
                        'event_label': 'age_gate'
                    });
                }
            }
        });

        // Prevent closing with background click (must make a choice)
        var gate = document.getElementById('sem-agegate');
        if (gate) {
            gate.addEventListener('click', function(e) {
                if (e.target === gate) {
                    // Clicked backdrop - do nothing, focus confirm button
                    confirmBtn.focus();
                }
            });
        }
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
