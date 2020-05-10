var sayfa = 1;
Degistir(sayfa);
function hareket(n) {
  Degistir(sayfa += n);
}
function Degistir(n) {
  var i;
  var slider = document.getElementsByClassName("slider-panel");
  var sira = document.getElementsByClassName("sira");
  if (n > slider.length) {sayfa = 1}    
  if (n < 1) {sayfa = slider.length} ;
  for (i = 0; i < slider.length; i++) {
     slider[i].style.display = "none";  
  }
  for (i = 0; i < sira.length; i++) {
     sira[i].classList.remove("slideractive");
  }
  slider[sayfa-1].style.display = "block";  
  sira[sayfa-1].classList.add("slideractive");
}