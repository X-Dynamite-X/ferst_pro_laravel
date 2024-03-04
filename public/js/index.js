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

    // تبديل الثيم بين النهار والليل
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

    // تعيين الثيم الجديد
    body.setAttribute('data-bs-theme', newTheme);
    $('.chat').attr('data-bs-theme', newTheme);
    $('.sidenav').attr('data-bs-theme', newTheme);

    // تخزين حالة الثيم في Local Storage
    localStorage.setItem('theme', newTheme);
}

// تحقق إذا كان هناك حالة ثيم مخزنة في Local Storage واستخدامها
const storedTheme = localStorage.getItem('theme');
if (storedTheme) {
    const body = document.body;
    body.setAttribute('data-bs-theme', storedTheme);
    $('.chat').attr('data-bs-theme', storedTheme);
    $('.sidenav').attr('data-bs-theme', storedTheme);
}

// إضافة استماع لزر تبديل الثيم
document.getElementById('toggleThemeBtn').addEventListener('click', toggleTheme);
