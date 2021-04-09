/**
 * @file Main JS file for Portfolio site
 * @author Otis Moorman
 */

/**
 * Homepage heading typing effect
 */
const typewriter = () => {
    // Cursor DOM query
    const cursor = $('#cursor')
    // Incrementing variable
    let i = 0
    // String to print
    const txt = 'My Name is Otis Moorman'

    /**
     * Prints each character on a timeout, then blinks a bar on an interval
     */
    const typing = () => {
        // Check if full string *has not* been typed
        if (i < txt.length) {
            // Print next character
            cursor.before(txt.charAt(i))
            // Set new random speed (80-200ms)
            const speed = 80 + (Math.floor(Math.random() * 120))
            // Increment
            i++
            // Call this function again after the random time elapses
            setTimeout(typing, speed)
        }

        // Check if full string *has* been typed
        if (i == txt.length) {
            // Repeat every 1200ms
            setInterval(() => {
                // Set colour to transparent
                cursor.css('color', 'transparent')
                // Set colour to white after 600ms
                setTimeout(() => cursor.css('color', '#ddd'), 600)
            }, 1200)
        }
    }

    // Initialise the typing effect
    typing()
}

/**
 * Fire typewriter function when page content is fully loaded
 */
$(window).on('load', () => typewriter())

/**
 * Set navbar to/from off-canvas on document load
 */
$(document).ready(() => {
    // Navbar initially set with off-canvas classes
    // Check window width > xs viewport range (767px)
    if ($(window).innerWidth() > 767) {

        // Remove off-canvas classes and move <nav> inside #container
        $('nav').removeClass('pushy pushy-left')
            .prependTo('#container')
        $('#nav--content').removeClass('pushy-content')
    }
})

/**
 * Set navbar to/from off-canvas on window resize
 */
$(window).on('resize', () => {
    // Navbar DOM queries
    const nav = $('nav')
    const navContent = $('#nav--content')

    // Check window width <= xs viewport range (767px) and navbar *isn't* off-canvas
    if ($(window).innerWidth() <= 767 && !nav.hasClass('pushy')) {
        // Add off-canvas classes and move <nav> outside of #container
        nav.addClass('pushy pushy-left')
            .prependTo('body')
        navContent.addClass('pushy-content')

    // Check window width > xs viewport range (767px) and navbar *is* off-canvas
    } else if ($(window).innerWidth() > 767 && nav.hasClass('pushy')) {
        // Remove off-canvas classes and move <nav> inside #container
        nav.removeClass('pushy pushy-left')
            .prependTo('#container')
        navContent.removeClass('pushy-content')

        // Remove class that causes <body> to slide
        $('body').removeClass()
    }
})