// tabs de Oportunidades abertas e Vagas Abertas
const tabsChange = () =>{
    const tabs = document.querySelectorAll('.tab-btn');
 
    const menuClicked = (tab) => {
       tabs.forEach(tab => tab.classList.remove('active'));
       tab.classList.add('active');
 
       const contents = document.querySelectorAll('.content');
       contents.forEach(content => content.classList.remove('show'))
 
       const contentId = tab.getAttribute('content-id');
       const content = document.getElementById(contentId)
       content.classList.add('show');
    }
 
    tabs.forEach(tab => tab.addEventListener('click', () => menuClicked(tab)));
 
    // 
 
    const currentActiveTab = document.querySelector('.tab-btn.active')
    if(currentActiveTab) {
    menuClicked(currentActiveTab);
 }
 }
 tabsChange();

// Menu Mobile
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


const dropMenu = document.querySelector('.dropMenu');
const LogadoBtn = document.querySelector('.logadoBtn')

document.addEventListener('click', (e) =>{
    const el = e.target;
    if(LogadoBtn && el.classList.contains('logadoBtn')){
        if(dropMenu) {
            dropMenu.classList.toggle('drop');
        }
    }else if(dropMenu && !dropMenu.contains(el)){
        dropMenu.classList.remove('drop');
    }
});



// Botao de check
const checkedButton = () =>{
    const modelobtn = document.querySelectorAll('.modelo')

    modelobtn.forEach(modelos => modelos.addEventListener('click', function(e){
       const el = e.target;
    if(el.classList.contains('modelo')){
        el.classList.toggle('checked')
    }
    }));
    
}
checkedButton()



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


