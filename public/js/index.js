// document.getElementById('toggleThemeBtn').addEventListener('click', function () {
//     const body = document.body;
//     const currentTheme = body.getAttribute('data-bs-theme');

//     body.setAttribute('data-bs-theme', currentTheme === 'dark' ? 'light' : 'dark');
//     $('.chat').attr('data-bs-theme', currentTheme === 'dark' ? 'light' : 'dark');
//     $('.sidenav').attr('data-bs-theme', currentTheme === 'dark' ? 'light' : 'dark');


// });
// تعريف دالة لتغيير الثيم
function toggleTheme() {
    const body = document.body;
    const currentTheme = body.getAttribute('data-bs-theme');

    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    body.setAttribute('data-bs-theme', newTheme);
    $('.chat').attr('data-bs-theme', newTheme);
    $('.sidenav').attr('data-bs-theme', newTheme);
    $('.user_profile').attr('data-bs-theme', newTheme);
    $('.edit_profile').attr('data-bs-theme', newTheme);



    localStorage.setItem('theme', newTheme);
}

const storedTheme = localStorage.getItem('theme');
if (storedTheme) {
    const body = document.body;
    body.setAttribute('data-bs-theme', storedTheme);
    $('.chat').attr('data-bs-theme', storedTheme);
    $('.sidenav').attr('data-bs-theme', storedTheme);
    $('.user_profile').attr('data-bs-theme', storedTheme);
    $('.edit_profile').attr('data-bs-theme', storedTheme);


}

document.getElementById('toggleThemeBtn').addEventListener('click', toggleTheme);

// document.addEventListener("contextmenu", function (e) {
//     e.preventDefault();
// });
// document.addEventListener("keydown", function (e) {
//     if ((e.ctrlKey || e.metaKey) && (e.key === "I" || e.key === "i")) {
//         e.preventDefault();
//     }
//     else if ((e.ctrlKey || e.metaKey) && (e.key === "C" || e.key === "c")) {
//         e.preventDefault();

//     }
// });
