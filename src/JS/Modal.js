const addModal = document.querySelector('.add-modal');
const btnCancelar = document.querySelector('.cancelar');
const modalContainer = document.querySelector('.modal-container');
const modalContainerEdit = document.querySelector('.modal-container-edit');
const editBtn = document.querySelectorAll('.editBtn')
const dataTermino = document.getElementById("data-termino");






editBtn.forEach((editBtn) =>{
    editBtn.addEventListener('click', (e) =>{
        const id = e.target.getAttribute('data-id')

        console.log(id);
    })
})

// 




document.addEventListener('click', (e) =>{
    const el = e.target;
    if(el.classList.contains('editBtn')){
        modalContainerEdit.classList.add('open')
    }
})

addModal.addEventListener('click', (e) =>{
    modalContainer.classList.add('show');
    document.addEventListener('keypress', (e) =>{
        if(e.key === "Enter"){
            e.preventDefault();
        }
    })
})

btnCancelar.addEventListener('click', (e) =>{
    modalContainer.classList.remove('show');
    e.preventDefault();
})

dataTermino.addEventListener('keypress', function(e) {

    var valor = e.target.value;
  
  // Permitir apenas números
  var charCode = (e.which) ? e.which : e.keyCode;
  if (charCode < 48 || charCode > 57) {
    e.preventDefault();
    return;
  }
  
  // Permitir apenas 4 números
  if (valor.length >= 4) {
    e.preventDefault();
  }
});



