

const body = document.getElementById('body')

function trocarTema(){
    if(body.classList == 'tema-escuro')
    {
        body.classList = 'tema-claro'
    }
    else
    {
        body.classList = 'tema-escuro'
    }
}

const mode = document.getElementById('mode-icon');

mode.addEventListener('click', () => {
    const form = document.getElementsByClassName('Forms');
    if(mode.classList.contains('fa-moon')){
        mode.classList.remove('fa-moon');
        mode.classList.add('fa-sun');
        return;
    }
        
    mode.classList.add('fa-moon');
    mode.classList.remove('fa-sun');
});

