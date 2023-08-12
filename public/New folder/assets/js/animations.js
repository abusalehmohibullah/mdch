document.addEventListener("DOMContentLoaded", function() {
    const elementsToAnimateOnLoad = document.querySelectorAll('.animate-on-load');
    
    elementsToAnimateOnLoad.forEach(element => {
        element.classList.add('animate__animated');
    });
});

const animateOnScroll = (entries, observer) => {
    entries.forEach(entry => {
        const animationType = entry.target.getAttribute('data-animation');
        const animationDelay = entry.target.getAttribute('data-animation-delay') || '0'; // Default to 0 if not specified

        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', `animate__${animationType}`);
            entry.target.style.animationDelay = `${animationDelay}s`; // Apply the animation delay
        } else {
            entry.target.classList.remove('animate__animated', `animate__${animationType}`);
            entry.target.style.animationDelay = ''; // Reset animation delay
        }
    });
};

const observer = new IntersectionObserver(animateOnScroll, {
    root: null,
    threshold: 0,
});

const elementsToAnimate = document.querySelectorAll('.animate-on-scroll');

elementsToAnimate.forEach(element => {
    observer.observe(element);
});
