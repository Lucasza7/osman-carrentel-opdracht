let menubar = document.querySelector('#menu-bar');
let mymenu = document.querySelector('.menu');

menubar.onclick = () =>{
    menubar.classList.toggle('fa-times')
    mymenu.classList.toggle('active')
}