var slideIndex = 1;
function displaySlides(n){
    var ind;
    var allSlides = document.getElementsByClassName("slide");
    var len = allSlides.length;
    if(n > len){
        slideIndex = 1;
    }
    else if(n < 1){
        slideIndex = len;
    }
    for(i = 0; i < len; i++){
        allSlides[i].style.display = "none";
    }
    allSlides[slideIndex-1].style.display = "block";
    //console.log(slideIndex-1);
}
function nextSlide(n){
    slideIndex += n;
    displaySlides(slideIndex);
}
function currSlide(n) {
  slideIndex = n;
  displaySlides(slideIndex);
}
