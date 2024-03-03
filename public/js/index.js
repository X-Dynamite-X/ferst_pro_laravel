document.getElementById('toggleThemeBtn').addEventListener('click', function () {
    const body = document.body;
    const currentTheme = body.getAttribute('data-bs-theme');
    // if (currentTheme === 'dark') {
    //     $('.chat').css('background-color','#fdfdfd');

    // }
    // else{
    //     $('.chat').css('background-color','#767676');


    // }
    body.setAttribute('data-bs-theme', currentTheme === 'dark' ? 'light' : 'dark');
    $('.chat').attr('data-bs-theme', currentTheme === 'dark' ? 'light' : 'dark');

});
