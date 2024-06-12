let background = document.querySelector('.animate');

function animate(){
    setTimeout(()=>{
        background.classList.add('animate');
    }, 2000)
}

animate()