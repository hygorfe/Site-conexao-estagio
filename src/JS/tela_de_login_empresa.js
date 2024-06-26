const form = document.querySelector('form')
const inputSenha = document.getElementById('senha')
const inputEmailEmpresa = document.getElementById('emailEmpresa')
const btnEntrar = document.querySelector('.btnEntrar')
const minhaSenha = document.querySelector('.minha-senha')
const modalRedefinirSenha = document.querySelector('.modal-redefinir-senha')
const btnCloseModal = document.querySelector('.btnCloseModal')
const btnRedefinir = document.querySelector('.btnRedefinir')
const modal = document.querySelector('.modal')
const formRedefinir = document.querySelector('.form-redefinir')
const emailRedefinir = document.getElementById('emailRedefinir')
const loading = document.querySelector('.loading')
const modalEmailEnviado = document.querySelector('.modal-email-enviado')
const modalEmail = document.querySelector('.modalEmail')
const btnContinuar = document.querySelector('.btnContinuar')


// 
document.addEventListener('click', (e) =>{
    const el = e.target;
    if(el.classList.contains('minha-senha')){
        modalRedefinirSenha.classList.add('open')
        modal.classList.add('show')
    }
    if(el.classList.contains('btnCloseModal')){
        modalRedefinirSenha.classList.remove('open')
        modal.classList.remove('show')
    }
})


document.addEventListener('click', (e) =>{
    const el = e.target;
    if(el.classList.contains('btnEntrar') && inputEmail.value === "" && inputSenha.value === ""){
        inputEmail.focus();
        if(inputEmail.value === ""){
            setErro(inputEmail, "Email é obrigatório")
        }else{
                const formItem = inputEmail.parentElement;
                formItem.className = "box"
            }

            if(inputSenha.value === ""){
            setErro(inputSenha, "Senha é Obrigatório")            
        }else if(inputSenha.value.length < 8){
            setErro(inputSenha, "Senha deve ter no minimo 8 caracteres")
            
        }else{
            const formItem = inputSenha.parentElement;
            formItem.className = "box";
        }
        
    }

})


function loadingClick(){
    return new Promise((resolve) =>{
        setTimeout(() =>{
        loading.classList.add('click')
        resolve()
        }, 1000)
    })
}


async function removeLoading(){
   await new Promise(resolve => setTimeout(resolve, 1000));
    loading.classList.remove('click');
    modalRedefinirSenha.classList.remove('open');
    modalEmailEnviado.classList.add('push');
}



btnRedefinir.addEventListener('click', async () =>{
    if(emailRedefinir.value === ""){
    emailRedefinir.focus();
    setErro(emailRedefinir, "Por favor, insira seu e-mail cadastrado para redefinir sua senha")
    }else{
    await loadingClick()
    await removeLoading()
    }
})



document.addEventListener('click', (e) =>{
    const el = e.target;
    if(el.classList.contains('btnContinuar')){
        modalEmailEnviado.classList.remove('push')
    }else if(el.classList.contains('btnCloseModal')){
        modalEmailEnviado.classList.remove('push')
    }
})



formRedefinir.addEventListener('click', (e) =>{
    isValid = true;

    if(emailRedefinir.value === ""){
        isValid = false
    }

    if(!isValid){
        e.preventDefault();
    }
})

emailRedefinir.addEventListener('keyup', () =>{
  if(emailRedefinir.value === ""){
    setErro(emailRedefinir, "Por favor, insira seu e-mail cadastrado para redefinir sua senha")
  }else{
    const formItem = emailRedefinir.parentElement;
    formItem.className = "box";
  }
})






inputEmailEmpresa.addEventListener('keyup', () =>{
    if(inputEmailEmpresa.value === ""){
        setErro(inputEmailEmpresa, "Email é obrigatório")
    }else{
        const formItem = inputEmailEmpresa.parentElement;
        formItem.className = "box"
    }
})

inputSenha.addEventListener('keyup', () =>{
    if(inputSenha.value === ""){
        setErro(inputSenha, "Senha é Obrigatório")            
    }else if(inputSenha.value.length < 8){
        setErro(inputSenha, "Senha deve ter no minimo 8 caracteres")

    }else{
        const formItem = inputSenha.parentElement;
        formItem.className = "box";
    }
})




form.addEventListener('submit', (event) =>{
    isValid = true;

    if(inputEmailEmpresa.value === ""){
        isValid = false;
    }

    if(inputSenha.value === "" || inputSenha.value.length < 8){
        isValid = false;
    }

    if(!isValid){
        event.preventDefault();
    }
    
})


document.addEventListener('click', (e) =>{
    const el = e.target;
    if(el.classList.contains('btnEntrar') && inputEmailEmpresa.value === "" && inputSenha.value === ""){
        inputEmailEmpresa.focus();
        if(inputEmailEmpresa.value === ""){
            setErro(inputEmailEmpresa, "Email é obrigatório")
        }else{
                const formItem = inputEmailEmpresa.parentElement;
                formItem.className = "box"
            }

            if(inputSenha.value === ""){
            setErro(inputSenha, "Senha é Obrigatório")            
        }else if(inputSenha.value.length < 8){
            setErro(inputSenha, "Senha deve ter no minimo 8 caracteres")
            
        }else{
            const formItem = inputSenha.parentElement;
            formItem.className = "box";
        }
        
    }

})





const setErro = (input, msg) =>{
const formItem = input.parentElement;
const textMsg = formItem.querySelector('span')

textMsg.innerText = msg;

formItem.className = "box erro";
}


document.addEventListener('keypress', (e) =>{
    if(e.key === "Enter"){

        isValid = true;


        if(emailRedefinir.value === ""){
            isValid = false;
        }
    
        if(!isValid){
            e.preventDefault();
        }
    }
})
