import './bootstrap';

function collectRevealTargets(main) {
    const targets = [];

    for (const child of main.children) {
        const tag = child.tagName;

        if (tag === 'SECTION') {
            // Prefer animating repeated "card" items inside sections
            // (e.g. items rendered via @foreach), instead of the whole section.
            const cards = child.querySelectorAll(':scope .rounded-2xl, :scope ul > li');
            if (cards.length) {
                targets.push(...cards);
            } else {
                targets.push(child);
            }
            continue;
        }

        if (tag === 'ARTICLE') {
            // Similar logic for article pages: animate card/list items first.
            const cards = child.querySelectorAll(':scope .rounded-2xl, :scope ul > li');
            if (cards.length) {
                targets.push(...cards);
            } else {
                targets.push(...child.querySelectorAll(':scope > *'));
            }
            continue;
        }

        if (tag === 'DIV') {
            const innerSections = child.querySelectorAll(':scope > section');
            if (innerSections.length) {
                targets.push(...innerSections);
                continue;
            }

            const cards = child.querySelectorAll(':scope > .rounded-2xl, :scope > ul > li');
            if (cards.length) {
                targets.push(...cards);
                continue;
            }

            targets.push(child);
            continue;
        }

        targets.push(child);
    }

    return targets;
}

function initRevealOnScroll() {
    const main = document.querySelector('main.site-main');
    if (!main) {
        return;
    }

    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const targets = collectRevealTargets(main);

    targets.forEach((el, index) => {
        el.classList.add('reveal-on-scroll');
        el.style.setProperty('--reveal-delay', `${Math.min(index * 0.055, 0.33)}s`);

        if (reduceMotion) {
            el.classList.add('is-inview');
        }
    });

    if (reduceMotion || targets.length === 0) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-inview');
                    observer.unobserve(entry.target);
                }
            });
        },
        { root: null, rootMargin: '0px 0px -10% 0px', threshold: 0.08 },
    );

    targets.forEach((el) => observer.observe(el));
}

/** Home-page floating call / WhatsApp: hide on scroll down, show on scroll up; grace period after load. */
function initContactFabScrollHide() {
    const fab = document.querySelector('.site-contact-fabs');
    if (!fab) {
        return;
    }

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const GRACE_MS = 3500;
    const TOP_ALWAYS_SHOW_PX = 56;
    const SCROLL_DELTA = 8;

    let lastY = window.scrollY;
    let graceActive = true;

    window.setTimeout(() => {
        graceActive = false;
    }, GRACE_MS);

    window.addEventListener(
        'scroll',
        () => {
            const y = window.scrollY;

            if (graceActive) {
                fab.classList.remove('site-contact-fabs--hidden');
                lastY = y;
                return;
            }

            if (y <= TOP_ALWAYS_SHOW_PX) {
                fab.classList.remove('site-contact-fabs--hidden');
                lastY = y;
                return;
            }

            const delta = y - lastY;
            if (delta > SCROLL_DELTA) {
                fab.classList.add('site-contact-fabs--hidden');
            } else if (delta < -SCROLL_DELTA) {
                fab.classList.remove('site-contact-fabs--hidden');
            }
            lastY = y;
        },
        { passive: true },
    );
}

function initHomeHeroCarousel() {
    const carousel = document.querySelector('[data-home-carousel]');
    if (!carousel) {
        return;
    }

    const slides = Array.from(carousel.querySelectorAll('[data-home-slide]'));
    const dots = Array.from(carousel.querySelectorAll('[data-home-dot]'));
    const prevBtn = carousel.querySelector('[data-home-prev]');
    const nextBtn = carousel.querySelector('[data-home-next]');

    if (slides.length < 2) {
        return;
    }

    let activeIndex = slides.findIndex((slide) => slide.classList.contains('is-active'));
    if (activeIndex < 0) {
        activeIndex = 0;
    }

    const bannerMotionOk = !window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const restartBannerAnimations = () => {
        if (!bannerMotionOk) {
            return;
        }

        slides.forEach((slide) => {
            slide.classList.remove('home-hero-banner--play');
        });

        void carousel.offsetWidth;

        window.requestAnimationFrame(() => {
            slides[activeIndex]?.classList.add('home-hero-banner--play');
        });
    };

    const setActive = (nextIndex) => {
        activeIndex = (nextIndex + slides.length) % slides.length;

        slides.forEach((slide, index) => {
            slide.classList.toggle('is-active', index === activeIndex);
        });

        dots.forEach((dot, index) => {
            dot.classList.toggle('is-active', index === activeIndex);
            dot.setAttribute('aria-current', index === activeIndex ? 'true' : 'false');
        });

        restartBannerAnimations();
    };

    const goNext = () => setActive(activeIndex + 1);
    const goPrev = () => setActive(activeIndex - 1);

    setActive(activeIndex);
    prevBtn?.addEventListener('click', goPrev);
    nextBtn?.addEventListener('click', goNext);

    dots.forEach((dot) => {
        dot.addEventListener('click', () => {
            const targetIndex = Number(dot.getAttribute('data-home-dot'));
            if (Number.isFinite(targetIndex)) {
                setActive(targetIndex);
            }
        });
    });

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    const INTERVAL_MS = 6000;
    let timer = null;

    const stop = () => {
        if (timer) {
            window.clearInterval(timer);
            timer = null;
        }
    };

    const start = () => {
        stop();
        timer = window.setInterval(goNext, INTERVAL_MS);
    };

    carousel.addEventListener('mouseenter', stop);
    carousel.addEventListener('mouseleave', start);
    carousel.addEventListener('focusin', stop);
    carousel.addEventListener('focusout', start);
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            stop();
        } else {
            start();
        }
    });

    start();
}

function initInquiryTypeForm() {
    const forms = document.querySelectorAll('[data-inquiry-form]');
    if (!forms.length) {
        return;
    }

    forms.forEach((form) => {
        const typeSelect = form.querySelector('[data-inquiry-type]');
        if (!typeSelect) {
            return;
        }

        const updateVisibility = () => {
            const current = typeSelect.value;
            const conditionalBlocks = form.querySelectorAll('[data-show-for]');

            conditionalBlocks.forEach((block) => {
                const allowed = (block.getAttribute('data-show-for') ?? '').split(/\s+/).filter(Boolean);
                const visible = allowed.includes(current);
                block.classList.toggle('hidden', !visible);
            });
        };

        typeSelect.addEventListener('change', updateVisibility);
        updateVisibility();
    });
}

/** Mobile / tablet nav: hamburger, slide-in drawer, body scroll lock (matches CSS max-width 1535px). */
function initSiteNavDrawer() {
    const toggle = document.querySelector('[data-site-nav-toggle]');
    const backdrop = document.querySelector('[data-site-nav-backdrop]');
    const drawer = document.querySelector('[data-site-nav-drawer]');

    if (!toggle || !backdrop || !drawer) {
        return;
    }

    const drawerLinks = drawer.querySelectorAll('[data-site-nav-drawer-link]');
    const mq = window.matchMedia('(min-width: 1536px)');

    let pointerDownPos = null;

    const setOpen = (open) => {
        document.body.classList.toggle('site-nav-open', open);
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        drawer.setAttribute('aria-hidden', open ? 'false' : 'true');
        backdrop.setAttribute('aria-hidden', open ? 'false' : 'true');
        document.body.style.overflow = open && !mq.matches ? 'hidden' : '';
    };

    const close = () => setOpen(false);

    toggle.addEventListener('pointerdown', (event) => {
        if (event.pointerType === 'touch' || event.pointerType === 'pen') {
            pointerDownPos = { x: event.clientX, y: event.clientY };
        } else {
            pointerDownPos = null;
        }
    });

    toggle.addEventListener('click', (event) => {
        if (pointerDownPos) {
            const dx = Math.abs(event.clientX - pointerDownPos.x);
            const dy = Math.abs(event.clientY - pointerDownPos.y);

            if (dx > 10 || dy > 10) {
                pointerDownPos = null;
                return;
            }
        }

        setOpen(!document.body.classList.contains('site-nav-open'));
    });

    backdrop.addEventListener('click', close);

    drawerLinks.forEach((a) => {
        a.addEventListener('click', close);
    });

    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && document.body.classList.contains('site-nav-open')) {
            close();
        }
    });

    const onViewportChange = () => {
        if (mq.matches) {
            close();
        }
    };

    mq.addEventListener('change', onViewportChange);
}

function initSiteUi() {
    initHomeHeroCarousel();
    initInquiryTypeForm();
    initRevealOnScroll();
    initContactFabScrollHide();
    initSiteNavDrawer();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSiteUi);
} else {
    initSiteUi();
}
