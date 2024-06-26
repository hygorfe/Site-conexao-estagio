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





// Modal filtro

const filterModal = () =>{
    const modalFiltro = document.querySelector('.modal-filtro')
    const filtrosModal = document.querySelector('.filtros-modal')
    const btnFilter = document.querySelector('.btn-filter')
    const filtros = document.querySelector('.filtros')

    

    document.addEventListener('click', (e) =>{
        const el = e.target;
        
        // const localizacaoFiltro = document.querySelector('#localizacao_filtro').addEventListener('click', (e) =>{
        //     e.stopPropagation();
        // })
    
        if(el.classList.contains('btn-filter')){
            filtrosModal.classList.add('open')
            modalFiltro.classList.add('active')
            document.body.classList.add('active')
            

        }else if(!filtrosModal.contains(el)) {
            filtrosModal.classList.remove('open')
            modalFiltro.classList.remove('active')
            document.body.classList.remove('active')
            
        }
    })
}
filterModal();


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


// Teste
