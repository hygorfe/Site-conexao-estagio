const menuSidebarMobile = () =>{
    const btnClose = document.querySelector('.btn-close')
    const btnMenu = document.querySelector('.btn-menu')
    const sidebarMenu = document.querySelector('.sidebar-menu')
    const modalSidebar = document.querySelector('.modal-sidebar')
    
    document.addEventListener('click', (e) =>{
        const el = e.target;
    
    if(el.classList.contains('btn-menu')){
        sidebarMenu.classList.add('open')
        modalSidebar.classList.add('show')
        document.body.classList.add('block')
    }else if(el.classList.contains('btn-close') || (!sidebarMenu.contains(el))){
        sidebarMenu.classList.remove('open')
        modalSidebar.classList.remove('show')
        document.body.classList.remove('block')
    }

    })
}
menuSidebarMobile()


// 
const dropMenu = document.querySelector('.dropMenu');
const LogadoBtn = document.querySelector('.logadoBtn')

document.addEventListener('click', (e) =>{
    const el = e.target;
    if(el.classList.contains('logadoBtn')){
    dropMenu.classList.toggle('drop')
    }else if(!dropMenu.contains(el)){
        dropMenu.classList.remove('drop')
    }
})




// darkmode

const btnchangeTheme = document.querySelector('#change-Theme');

function toggleDarkMode (){
    document.body.classList.toggle('dark');
}

function loadTheme(){
    const darkmode = localStorage.getItem("dark")

    if(darkmode){
        toggleDarkMode();
    }
}

loadTheme();

btnchangeTheme.addEventListener("change", function (){
    toggleDarkMode();

    localStorage.removeItem("dark");

    if(document.body.classList.contains("dark")){
        localStorage.setItem("dark", 1);
    }
})