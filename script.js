//hamburger menu
function menuOnClick() {
    document.getElementById("menu-bar").classList.toggle("change");
    document.getElementById("menu-bg").classList.toggle("change-bg");
    if(document.getElementById("nav").classList.contains("change")){
        document.getElementById("nav").classList.toggle("change");
    }else{
        setTimeout(function() {
        document.getElementById("nav").classList.toggle("change");
        }, 400);
    }
  }

    function onclose() {
    nav.style.display = "none";
  }

//gallery modal
var modal = document.getElementById('Modal');
    var images = document.getElementsByClassName('image');
    var modalImg = document.getElementById("image-modal");
    images = [].slice.call(images);

    console.log(images);

    images.forEach(function(item){
    item.onclick = function(){
    modal.style.display = "flex";  
    modalImg.src = this.getAttribute('src');
}
})

    modalImg.onclick = function() { 
    modal.style.display = "none";
}

//cookies
    const cookieContainer = document.querySelector(".cookie-container");
    const agreeBtn = document.querySelector(".agree button");

    setTimeout(() => {
    cookieContainer.classList.remove("hide");
}, 1000);

    agreeBtn.addEventListener("click", () => {
    cookieContainer.classList.add("hide");
});
    
    function set_cookie() {
        sessionStorage.setItem("is_cookie_allowed", "YES");
    }
    if(sessionStorage.getItem("is_cookie_allowed")){
        document.querySelector(".cookie-container").style.display="none";
    }