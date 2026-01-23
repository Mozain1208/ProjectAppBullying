// Immediate theme check to prevent flash of light mode
(function () {
    const theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
})();

// Dark Mode Toggle Functionality
function toggleTheme() {
    const html = document.documentElement;
    const icon = document.querySelector('.theme-toggle-icon');

    if (html.classList.contains('dark')) {
        html.classList.remove('dark');
        if (icon) {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
        localStorage.setItem('theme', 'light');
    } else {
        html.classList.add('dark');
        if (icon) {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        }
        localStorage.setItem('theme', 'dark');
    }
}

// Update icons on page load
document.addEventListener('DOMContentLoaded', function () {
    const theme = localStorage.getItem('theme');
    const icon = document.querySelector('.theme-toggle-icon');

    if (icon) {
        if (theme === 'dark') {
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
        } else {
            icon.classList.remove('fa-sun');
            icon.classList.add('fa-moon');
        }
    }
});
