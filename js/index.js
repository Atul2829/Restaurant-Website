const breakfast = document.getElementById('breakfast');
const lunch = document.getElementById('lunch');
const dinner = document.getElementById('dinner');
const salad = document.getElementById('salad');
const drinks = document.getElementById('drinks');
const desserts = document.getElementById('dessert');

// var a=document.getElementsByClassName('a');
// var ul=document.getElementById('ul');
// console.log(li);
//
// a[1].onclick = function(){
//     a.className='active';
// };

// li.addEventListener('click',function () {
//     li.classList='active';
// });

// function active() {
//     ul.className='active';
// }

function showBreakfast() {
    breakfast.className='active';
    lunch.className='inactive';
    dinner.className='inactive';
    salad.className='inactive';
    drinks.className='inactive';
    desserts.className='inactive';
}

function showLunch() {
    breakfast.className='inactive';
    lunch.className='active';
    dinner.className='inactive';
    salad.className='inactive';
    drinks.className='inactive';
    desserts.className='inactive';
}

function showDinner() {
    breakfast.className='inactive';
    lunch.className='inactive';
    dinner.className='active';
    salad.className='inactive';
    drinks.className='inactive';
    desserts.className='inactive';
}

function showSalad() {
    breakfast.className='inactive';
    lunch.className='inactive';
    dinner.className='inactive';
    salad.className='active';
    drinks.className='inactive';
    desserts.className='inactive';
}

function showDrinks() {
    breakfast.className='inactive';
    lunch.className='inactive';
    dinner.className='inactive';
    salad.className='inactive';
    drinks.className='active';
    desserts.className='inactive';
}

function showDesserts() {
    breakfast.className='inactive';
    lunch.className='inactive';
    dinner.className='inactive';
    salad.className='inactive';
    drinks.className='inactive';
    desserts.className='active';
}







