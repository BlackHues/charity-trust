import './bootstrap';

const NAV_SHRINK_MS = 3000;

document.addEventListener('DOMContentLoaded', () => {
    const header = document.getElementById('site-header');
    if (!header?.classList.contains('site-header--home')) {
        return;
    }

    window.setTimeout(() => {
        header.classList.add('site-header--compact');
        document.getElementById('home-hero-logo')?.classList.add('home-hero-logo--compact');
    }, NAV_SHRINK_MS);
});
