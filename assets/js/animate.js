document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll(
        'section, footer, .banner-item, #classesWrap, #instructorsWrap, .contact-form-container'
    );

    const io = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                let animationClass;

                // индивидуально задаём анимации
                if (el.id === 'classesWrap') {
                    animationClass = 'animate__fadeInLeft';
                } else if (el.id === 'instructorsWrap') {
                    animationClass = 'animate__fadeInRight';
                } else if (el.classList.contains('contact-form-container')) {
                    animationClass = 'animate__fadeInUp';
                } else if (el.tagName.toLowerCase() === 'footer') {
                    animationClass = 'animate__fadeInUp';
                } else {
                    animationClass = 'animate__fadeInUp';
                }

                el.classList.add('animate__animated', animationClass);
                observer.unobserve(el);
            }
        });
    }, {
        threshold: 0.1
    });

    elements.forEach((el, index) => {
        el.style.setProperty('--animate-duration', '1.5s');
        el.style.setProperty('--animate-delay', `${index * 0.3}s`);
        el.style.opacity = 0;
        io.observe(el);
    });
});
