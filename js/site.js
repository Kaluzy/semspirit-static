(function() {
    'use strict';

    var COOKIE_NAME = 'sem_age_verified';
    var COOKIE_DAYS = 30;

    function setCookie(name, value, days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = 'expires=' + date.toUTCString();
        var secure = location.protocol === 'https:' ? '; Secure' : '';
        document.cookie = name + '=' + value + ';' + expires + ';path=/;SameSite=Lax' + secure;
    }

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

    function hideAgeGate() {
        var gate = document.getElementById('sem-agegate');
        if (gate) {
            gate.classList.remove('show');
            gate.setAttribute('aria-hidden', 'true');
            document.documentElement.classList.remove('agegate-active');
            setTimeout(function() {
                if (gate.parentNode) {
                    gate.parentNode.removeChild(gate);
                }
            }, 300);
        }
    }

    function initAgeGate() {
        if (getCookie(COOKIE_NAME) === 'true') {
            hideAgeGate();
        } else {
            document.documentElement.classList.add('agegate-active');
        }
    }

    function initInquiryForm() {
        var form = document.getElementById('trade-inquiry-form');
        if (!form) return;

        var statusEl = document.getElementById('form-status');
        var submitBtn = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (!submitBtn) return;

            submitBtn.disabled = true;
            var originalText = submitBtn.textContent;
            submitBtn.textContent = 'Submitting...';

            setTimeout(function() {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
                if (statusEl) {
                    statusEl.hidden = false;
                }
                form.reset();
            }, 900);
        });
    }

    window.confirmAge = function() {
        setCookie(COOKIE_NAME, 'true', COOKIE_DAYS);
        hideAgeGate();
    };

    window.denyAge = function() {
        // Simply dismiss the modal - no redirect
        hideAgeGate();
    };

    // Product Gallery
    var currentSlide = 0;
    var totalSlides = 0;

    function initGallery() {
        var galleryImages = document.getElementById('galleryImages');
        if (!galleryImages) return;

        var images = galleryImages.querySelectorAll('.gallery-image');
        totalSlides = images.length;
    }

    window.moveGallery = function(direction) {
        var galleryImages = document.getElementById('galleryImages');
        var indicators = document.querySelectorAll('.gallery-indicator');

        if (!galleryImages || totalSlides === 0) return;

        currentSlide += direction;

        if (currentSlide >= totalSlides) {
            currentSlide = 0;
        } else if (currentSlide < 0) {
            currentSlide = totalSlides - 1;
        }

        galleryImages.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';

        indicators.forEach(function(indicator, index) {
            if (index === currentSlide) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    };

    window.goToSlide = function(index) {
        var galleryImages = document.getElementById('galleryImages');
        var indicators = document.querySelectorAll('.gallery-indicator');

        if (!galleryImages || index < 0 || index >= totalSlides) return;

        currentSlide = index;
        galleryImages.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';

        indicators.forEach(function(indicator, i) {
            if (i === currentSlide) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    };

    document.addEventListener('DOMContentLoaded', function() {
        initAgeGate();
        initInquiryForm();
        initGallery();
    });
})();
