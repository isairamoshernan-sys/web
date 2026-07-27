// JavaScript Document
/*eslint-env es6*/

let slideIndexActual=0;

function changeSlide(direction){
	const slides=document.querySelectorAll(".carrusel-slide img");
	
	if(slides.length===0)return;
	
	slides.forEach(img => img.classList.remove("active"));
	
	slideIndexActual =(slideIndexActual + direction + slides.length)% slides.length;
	
	slides[slideIndexActual].classList.add("active");
}
setInterval(() => {
	changeSlide(1);
},3000);