const tooltip = document.querySelector('.tooltip')


function loadingTooltips(){
    return new Promise((resolve) =>{
        setTimeout(() =>{
       tooltip.classList.add('show')
        resolve()
        }, 900)
    })
}

loadingTooltips();


async function removeLoadingTooltips(){
   await new Promise(resolve => setTimeout(resolve, 5000));
    tooltip.classList.remove('show')
}

// 
removeLoadingTooltips();