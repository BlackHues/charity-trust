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

function initSiteUi() {
    initRevealOnScroll();
    initContactFabScrollHide();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSiteUi);
} else {
    initSiteUi();
}
