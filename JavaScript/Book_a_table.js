let Btn = document.getElementById("btn");

Btn.addEventListener("mouseover",function(){
    Btn.style.backgroundColor="black";
    Btn.style.color="white";
    Btn.style.border ="3px solid white"

})
Btn.addEventListener("mouseout",function(){
    Btn.style.backgroundColor="white";
    Btn.style.color="black";
    Btn.style.border ="3px solid black"
})
