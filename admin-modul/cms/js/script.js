let itemBtns = document.getElementsByClassName('info-btn-item');

for (let i = 0 ; i < itemBtns.length; i++) {
    itemBtns[i].addEventListener('click', test);
}


function test() {
    console.log('ok');
}