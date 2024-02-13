document.getElementById('toggleThemeBtn').addEventListener('click', function () {
    const body = document.body;
    const currentTheme = body.getAttribute('data-bs-theme');

    body.setAttribute('data-bs-theme', currentTheme === 'dark' ? 'light' : 'dark');
});
