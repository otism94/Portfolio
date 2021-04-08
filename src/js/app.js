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
            // Set new random speed (80-180ms)
            const speed = 80 + (Math.floor(Math.random() * 100))
            // Increment
            i++
            // Call this function again after the random time
            setTimeout(typing, speed)
        }

        // Check if full string *has* been typed
        if (i == txt.length) {
            // Repeat every 1200ms
            setInterval(() => {
                // Set heading colour to transparent
                cursor.css('color', 'transparent')
                // Set colour to white after 600ms
                setTimeout(() => cursor.css('color', '#ddd'), 600)
            }, 1200)
        }
    }

    // Initialise the typing effect
    typing()
}

// Fire the typing effect function on page load
$(document).ready(() => typewriter())