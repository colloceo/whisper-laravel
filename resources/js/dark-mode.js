export function initDarkMode() {
    const toggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

    // Apply saved preference. Default to light.
    if (savedTheme === 'dark') {
        html.setAttribute('data-theme', 'dark');
        if (toggle) toggle.checked = true;
    } else {
        html.setAttribute('data-theme', 'light');
        if (toggle) toggle.checked = false;
    }

    // Toggle event listener
    if (toggle) {
        toggle.addEventListener('change', () => {
            if (toggle.checked) {
                html.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            } else {
                html.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            }
        });
    }

    // Listen for system preference changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
        if (!localStorage.getItem('theme')) {
            if (event.matches) {
                html.setAttribute('data-theme', 'dark');
                if (toggle) toggle.checked = true;
            } else {
                html.setAttribute('data-theme', 'light');
                if (toggle) toggle.checked = false;
            }
        }
    });

    console.log('Dark Mode Initialized');
}

// Run immediately if DOM is ready, otherwise wait
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initDarkMode);
} else {
    initDarkMode();
}
