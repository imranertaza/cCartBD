"use strict";

const imgOption = document.querySelectorAll('.img-opt');
const mainImg = document.querySelector('#mainImg');

imgOption.forEach(ele=>{
    ele.addEventListener('click',e=>{
        const target = e.target.src;
        mainImg.src = target;
        console.log(target)
    })
})