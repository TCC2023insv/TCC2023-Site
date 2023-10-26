
window.addEventListener("load",()=>{

    const foto = document.querySelector('#upload');
    const fotoSelecionada = document.querySelector(".uploaded");

    foto.addEventListener('change', event =>{

    const reader = new FileReader;

    // console.log(foto.files[0]);

    reader.onload = function(event){
        const miniatura = document.createElement('img');
        miniatura.width = 100;
        miniatura.height = 100;
        miniatura.id = 'miniatura';
        miniatura.src = event.target.result;
        fotoSelecionada.insertAdjacentElement('afterend', miniatura);
    }

    reader.readAsDataURL(foto.files[0]);

    })


    const input = document.getElementById("upload");
    const filewrapper = document.getElementById("filewrapper");

    input.addEventListener("change",(e)=>{
        let fileName = e.target.files[0].name;
        console.log(fileName);
        fileshow(fileName);
    })

    const fileshow=(fileName)=>{
        
        // Caixa com borda cinza (showfilebox)
        const showfileboxElem = document.createElement("div");
        showfileboxElem.classList.add("showfilebox");

        // Caixa azul com tipo da imagem (left)
        const leftElem = document.createElement("div");
        leftElem.classList.add("left");

        // Mostra o nome da imagem
        const filetitleElem = document.createElement("h3");
        filetitleElem.innerHTML = fileName;
        leftElem.append(filetitleElem);
        showfileboxElem.append(leftElem);
        
        // Caixa da direita (com o X)
        const rightElem = document.createElement("div");
        rightElem.classList.add("right");
        showfileboxElem.append(rightElem);

        // X
        const crossElem = document.createElement("span");
        crossElem.innerHTML = "&#215;";
        rightElem.append(crossElem);
        filewrapper.append(showfileboxElem);
        
        crossElem.addEventListener("click",()=>{
            input.value = "";
            filewrapper.removeChild(showfileboxElem); 
            miniatura.remove();
        })
    }
})