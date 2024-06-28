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

const fechaAbreSidebar = () =>{
const btnMenu = document.querySelector('.btn-menu');
const sidebar = document.querySelector('.sidebar');
const closeBtn = document.querySelector('.close-btn');
const nameEmail = document.querySelector('.name-email')
const tabContents = document.querySelector('.tab-contents')
const btnMenuMobile = document.querySelector('.btn-menu-mobile')
const modalSidebar = document.querySelector('.modal-sidebar')

document.addEventListener('click', (e) =>{
   const el = e.target;
   if(el.classList.contains('btn-menu')){
      sidebar.classList.add('expanded')
      btnMenu.classList.add('hide')
      nameEmail.classList.add('show')
      closeBtn.classList.add('show')
      tabContents.classList.add('margExpanded')
      modalSidebar.classList.add('open')

   }else if((el.classList.contains('close-btn') || (!sidebar.contains(el)))){
      sidebar.classList.remove('expanded')
      closeBtn.classList.remove('show')
      btnMenu.classList.remove('hide')
      nameEmail.classList.remove('show')
      tabContents.classList.remove('margExpanded')
      document.body.classList.remove('active')
   }
   
      
})
}
fechaAbreSidebar();


document.addEventListener('click', (e) =>{
   const sidebar = document.querySelector('.sidebar');
   const nameEmail = document.querySelector('.name-email')
   const closeBtn = document.querySelector('.close-btn');
   const logo = document.querySelector('.logo')
   const btnMenuMobile = document.querySelector('.btn-menu-mobile')
   const modalSidebar = document.querySelector('.modal-sidebar')

   const el = e.target;
   if(el.classList.contains('btn-menu-mobile')){
      sidebar.classList.add('expanded')
      nameEmail.classList.add('show')
      document.body.classList.add('active')
      modalSidebar.classList.add('open')
   }else if((el.classList.contains('close-btn') || (!sidebar.contains(el)))){
      document.body.classList.remove('active')
      nameEmail.classList.remove('show')
      modalSidebar.classList.remove('open')
   }
})


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
