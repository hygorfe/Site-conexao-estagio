const addModal = document.querySelector('.add-modal');
const modalContainer = document.querySelector('.modal-container');
const btnCancelar = document.querySelector('.cancelar');

addModal.addEventListener('click', (e) =>{
    modalContainer.classList.add('show');
    document.addEventListener('keypress', (e) =>{
        if(e.key === "Enter"){
            e.preventDefault();
        }
    })
})

btnCancelar.addEventListener('click', () =>{
    modalContainer.classList.remove('show');
})
// 

// Validação Input Modal
const inputCEP = document.getElementById('cep')
const inputNumero = document.getElementById('numero')
const inputComplemento = document.getElementById('complemento')
const inputBairro = document.getElementById('bairro')
const inputCidade = document.getElementById('cidade')
const inputEstado = document.getElementById('estado')
const inputEndereco = document.getElementById('endereco')
const form = document.querySelector('form')

form.addEventListener('submit', (e) =>{
    isValid = true;

    if(inputCEP.value === "" || inputCEP.value.length < 8){
        isValid = false;
    }

    if(!isValid){
        e.preventDefault();

    }
})
// Input CEP
inputCEP.addEventListener('keyup', (e) =>{
    if(inputCEP.value === ""){
        setErro(inputCEP, "Preencha um CEP válido")
    }else if(inputCEP.value.length < 8){
        setErro(inputCEP, "CEP Invalido")
    }else{
        inputCEP.value = inputCEP.value.slice(0, 8)
        const formItem = inputCEP.parentElement;
        formItem.className = "box";
    }

    // let valor = e.target.value;
    // valor = valor.replace(/\D/g, "");
    // valor = valor.replace(/^(\d{5})(\d)/, "$1-$2");
    // valor = valor.replace(/\.(\d{3})(\d)/, ".$1-$2"); 
    // e.target.value = valor;
    
})

const setErro = (input, msg) =>{
    const formItem = input.parentElement;
    const textMsg = document.querySelector('.erros')

    textMsg.innerText = msg;
    formItem.className = "box erro";
}
