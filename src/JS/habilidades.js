const tagsContainer = document.querySelector('.tags-container');
const tag = document.querySelector('.tag');
let tecInput = document.querySelector('#tec-input');

let textInput = tecInput.value;


document.addEventListener('keypress', (e) =>{
    if(e.key === "Enter"){
        e.preventDefault();
        criaTag(tecInput.value);
        limpaInput();
    }
})
// 

const limpaInput = () =>{
    tecInput.value = "";
    tecInput.focus();
}

const btnApagar = (option) =>{
    const btnX = document.createElement('button')
    btnX.setAttribute('class', 'btnX')
    btnX.innerText = 'x';
    tag.appendChild(btnX);

    btnX.addEventListener('click', (eve) =>{
    const el = eve.target
    el.parentElement.remove('option');
    })
}

const criaTag = (textInput) =>{
    textInput.innerText = " ";
    const option = document.createElement('option');
    option.setAttribute('value', textInput);
    option.innerText = textInput;
    tag.appendChild(option);
    btnApagar();

}

const criandoOptions = () =>{
    
}



