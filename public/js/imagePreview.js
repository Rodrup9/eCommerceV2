const inImage = document.querySelector("#addImg")



inImage.addEventListener("fullscreenchange",(e)=>{
    const lector = new FileReader()
    lector.onload = (e)=>{
        document.querySelector(".img-principal").src=e.target.result
        

    }


})