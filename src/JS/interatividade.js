// Menu sidebar
const menuSidebar = () =>{
const menuMobile = document.querySelector('.menu-mobile');
const modalSideBar = document.querySelector('.modal-sidebar');
const buttonClose = document.querySelector('.button-close')
const sideBarMenu = document.querySelector('.side-bar-menu');

document.addEventListener('click', (e) =>{
    const el = e.target;

    if(el.classList.contains('menu-mobile')){
        document.body.classList.add('active')
        sideBarMenu.classList.add('open')
        modalSideBar.classList.add('show')
    }else if(el.classList.contains('button-close') || (!sideBarMenu.contains(el))){
        modalSideBar.classList.remove('show')
        sideBarMenu.classList.remove('open')
        document.body.classList.remove('active')
        console.log(el)
    }
    // 
})
}
menuSidebar();







// Dark/light mode

