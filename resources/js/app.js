import './bootstrap';

function collectRevealTargets(main) {
    const targets = [];

    for (const child of main.children) {
        const tag = child.tagName;

        if (tag === 'SECTION') {
            targets.push(child);
            continue;
        }

        if (tag === 'ARTICLE') {
            targets.push(...child.querySelectorAll(':scope > *'));
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

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initRevealOnScroll);
} else {
    initRevealOnScroll();
}
