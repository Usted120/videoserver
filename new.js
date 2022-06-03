const likeBtn = document.getElementById("likeSvg");

likeBtn.addEventListener('click',like);

function like(){
    if (likeBtn.classList.contains("clicked")){
        console.log('-1 like');
        likeBtn.classList.toggle('clicked');
    }else{
        console.log('1+ like');
        likeBtn.classList.toggle('clicked');
    }
    
}

function dislike(){
    if (likeBtn.classList.contains("clicked")){
        console.log('-1 dislike');
        likeBtn.classList.toggle('clicked');
    }else{
        console.log('+1 dislike');
        likeBtn.classList.toggle('clicked');
    }
}
const dislikeBtn = document.getElementById("dislikeSvg");

dislikeBtn.addEventListener('click',dislike);