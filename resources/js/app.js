document.documentElement.classList.add('js');

// Apparition douce des blocs au défilement
const revealTargets = document.querySelectorAll('[data-reveal]');

if ('IntersectionObserver' in window && revealTargets.length) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { rootMargin: '0px 0px -8% 0px', threshold: 0.08 },
    );

    revealTargets.forEach((el) => observer.observe(el));
} else {
    revealTargets.forEach((el) => el.classList.add('is-visible'));
}

// Barre de navigation : filet après défilement
const header = document.querySelector('[data-header]');

if (header) {
    const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 8);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
}

// Menu mobile plein écran
const menuButton = document.querySelector('[data-menu-button]');
const mobileMenu = document.querySelector('[data-mobile-menu]');

if (menuButton && mobileMenu) {
    const setMenu = (open) => {
        mobileMenu.hidden = !open;
        menuButton.setAttribute('aria-expanded', String(open));
        menuButton.classList.toggle('is-open', open);
        document.body.classList.toggle('overflow-hidden', open);
    };

    menuButton.addEventListener('click', () => setMenu(mobileMenu.hidden));
    document.addEventListener('keydown', (event) => event.key === 'Escape' && setMenu(false));
    mobileMenu.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => setMenu(false)));
}

// Copie du lien d'un article
document.querySelectorAll('[data-copy-link]').forEach((button) => {
    button.addEventListener('click', async () => {
        const label = button.querySelector('[data-copy-label]');
        const original = label?.textContent;

        try {
            await navigator.clipboard.writeText(button.dataset.copyLink);
            if (label) label.textContent = 'Lien copié';
        } catch {
            if (label) label.textContent = 'Copie impossible';
        }

        setTimeout(() => label && (label.textContent = original), 2000);
    });
});
