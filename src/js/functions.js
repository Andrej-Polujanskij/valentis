function debounce(func, wait, immediate) {
    let timeout;
    return function () {
        const context = this, args = arguments;
        const later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

export default {
    init() {
        this.setVh();
        window.addEventListener('resize', this.setVh);
    },
    setVh() { // Sets --vh css variable to be correct on mobile devices
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
        //     height: 100vh; // Fallback height for browsers that don't support css variables
        //     height: calc(var(--vh, 1vh) * 100); // Sets the elements height to the actual 100vh of the device
    },
    validateEmail(email) { // Checks if the email is valid
        const re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (typeof email !== 'string') return false;
        return re.test(email);
    },
    autoScrollY(y) { // Scrolls to the given y position
        let scrollAttempts = 0;
        let incrementScrollAttempts = debounce(function () {
            scrollAttempts++;
        });

        window.addEventListener('scroll', incrementScrollAttempts);

        const chkReadyState = setInterval(function () {
            if (el) {
                window.scrollTo(0, y);
            }
            if (document.readyState === 'complete' || scrollAttempts > 1) {
                clearInterval(chkReadyState);
                window.removeEventListener('scroll', incrementScrollAttempts, false);
            }
        }, 100);
    },
    autoScroll(selector) { // scrolls to the selector
        const el = document.querySelector(selector);
        this.autoScrollY(el.offsetTop);
    }
};