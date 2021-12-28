const $ = jQuery.noConflict();

// Fire All Foundation
$(document).foundation();


// Navigation Menu Toggle
const hamburger = document.querySelector('.hamburger');
const mobileNav = document.querySelector('.mobile-navigation');
const mobileButton = document.querySelector('#hamburgerMenu');

// Toggles mobile navigation open. Toggles mobile button aria-expanded attribute and changes out the button text. 
function toggleNavMenu() {
    if (mobileNav) {
        mobileButton.addEventListener('click', () => {
            mobileNav.classList.toggle('is-open');
            hamburger.classList.toggle('is-active');

            // ADA - Sets aria lable on click.
            if (hamburger.getAttribute('aria-expanded') === 'true') {
                hamburger.setAttribute('aria-expanded', 'false');
            } else {
                hamburger.setAttribute('aria-expanded', 'true');
            }

            // SWAP out menu button text on click. Uncomment below code to add support of changing menu button text on click. 
            // if (mobileTxt.getAttribute("data-text-swap") == mobileTxt.innerHTML) {
            //     mobileTxt.innerHTML = mobileTxt.getAttribute("data-text-original");
            // } else {
            //     mobileTxt.setAttribute("data-text-original", mobileTxt.innerHTML);
            //     mobileTxt.innerHTML = mobileTxt.getAttribute("data-text-swap");
            // }

        }, false);
    }
} // end toggleNav

toggleNavMenu();

// Page Navigation Smooth Scrolling with Accessibility. 
(function($) {
    // Select all links with hashes
    $('a[href*="#"]')
        // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .not('.tabs-title a')
        .not('.additional_information_tab a')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 85
                    }, 1800, function() {
                        // Callback after animation
                        // Must change focus!
                        var target = $(target);
                        target.focus();
                        if (target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            target.focus(); // Set focus again
                        };
                    });
                }
            }
        })
})(jQuery);

// Back to Top Button
$(function() {
    $(".back-to-top").hide();

    $(window).scroll(function() {
        if ($(this).scrollTop() > 400) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();

        }
    });
})

// YouTube Defer
function init() {
    var vidDefer = document.getElementsByTagName('iframe');
    for (var i = 0; i < vidDefer.length; i++) {
        if (vidDefer[i].getAttribute('data-src')) {
            vidDefer[i].setAttribute('src', vidDefer[i].getAttribute('data-src'));
        }
    }
}
window.onload = init;