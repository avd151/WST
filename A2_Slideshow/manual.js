var slideIndex = 1;
var timeInterval = 2;
var slider = document.getElementById("speed");
var speedVal = document.getElementById("speedValue");
speedVal.innerHTML = slider.value;
slider.oninput = function () {
  speedVal.innerHTML = this.value;
  timeInterval = this.value;
};
// if(timeVal != 0)
//     timeInterval = timeVal*1000;
console.log(timeInterval);
showSlides();
function showSlides() {
  var i;
  var allSlides = document.getElementsByClassName("slide");
  var len = allSlides.length;
  for (i = 0; i < len; i++) {
    allSlides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > len) {
    slideIndex = 1;
  }
  allSlides[slideIndex - 1].style.display = "block";
  console.log(slideIndex - 1);
  setTimeout(showSlides, timeInterval * 1000);
}
