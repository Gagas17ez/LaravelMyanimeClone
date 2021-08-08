ul = document.querySelector('ul');
li = document.querySelectorAll('li');

li.forEach(el => {
    el.addEventListener('click', function () {
        ul.querySelector('.active').classList.remove('active');
        el.classList.add('active');
    });
});
