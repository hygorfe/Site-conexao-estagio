const form = document.querySelector("form");
const redefinirSenha = document.getElementById('redefinir_senha')
const confirmarSenha = document.getElementById('confirmar_senha')

form.addEventListener('submit', (e) =>{
    
    isValid = true;

    if(redefinirSenha.value === "" || redefinirSenha.value.length < 8){
        isValid = false;
    }
    if(confirmarSenha.value === "" || confirmarSenha.value !== redefinirSenha.value){
        isValid = false;
    }

    if(!isValid){
        e.preventDefault();
    }
// 
})


    redefinirSenha.addEventListener('keyup', () =>{
        if(redefinirSenha.value === ""){
            setErro(redefinirSenha, 'A senha é obrigatória')
        }else if(redefinirSenha.value.length < 8){
            setErro(redefinirSenha, 'Senha deve ter no minimo 8 caracteres')
        }else{
            const formItem = redefinirSenha.parentElement;
            formItem.className = "box"
        }
    })

    confirmarSenha.addEventListener('keyup', () =>{
        if(confirmarSenha.value === ""){
            setErro(confirmarSenha, "A confirmação de senha é obrigatória")
        }else if(confirmarSenha.value !== redefinirSenha.value){
            setErro(confirmarSenha, "Confirmação de senha deve ser igual senha")
        }else{
            const formItem = confirmarSenha.parentElement;
            formItem.className = "box";
        }
    })


const setErro = (input, msg) =>{
    const formItem = input.parentElement;
    const textMsg = formItem.querySelector('span')
    
    textMsg.innerText = msg;
    
    formItem.className = "box erro";
}
