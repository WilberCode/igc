 
// // Menu Height 
const d = document;
let Id = d.getElementById.bind(document) 
let qS = d.querySelector.bind(document) 
let qSA = d.querySelector.bind(document) 
// window.onscroll = function () {
//   stickyStop()
// }
let space = '60px'
let spaceDefault = '100px'
let navbar = Id('header-content')
let rootStyles = d.documentElement.style
let sticky = navbar.offsetTop
let navFirst = Id('nav-first')
let navSecond = Id('nav-second')
let infoWrap = Id('info-wrap')
let frontSearch = Id('front-search')  
let LogoImg = Id('logo__img')
let bigMenu = d.querySelectorAll('#big-menu li ul') // Submenu se establece con top 60px
let main = Id('main')  
 
// function stickyStop () {
//   let bigMenuLength= bigMenu.length 
//   for(let i = 0;i<bigMenuLength;i++){  // Submenu
  
//   if (window.pageYOffset > sticky) {
//     rootStyles.setProperty('--header-height', space)  
//     infoWrap.classList.add('info-wrap--hidden')
//     // navFirst.classList.add('nav-first-hidden')
//     navFirst.style.display="none"
//     navSecond.classList.add('nav-second-space')
//     LogoImg.classList.add('logo-img-space')
//     // LogoImg.style.transform = "scale(0.6) translateX(-112px)";
//     main.classList.add('main-top')
//     frontSearch.classList.add('search-top')
//     bigMenu[i].classList.add('sub-menu--top')
 
//   } else {
//     rootStyles.setProperty('--header-height', spaceDefault)
//     infoWrap.classList.remove('info-wrap--hidden')
//     // navFirst.classList.remove('nav-first-hidden')
//     navFirst.style.display="flex"
//     navSecond.classList.remove('nav-second-space')
//     LogoImg.classList.remove('logo-img-space')
//     // LogoImg.style.transform = "none";
//     main.classList.remove('main-top') 
//     frontSearch.classList.remove('search-top')
//     bigMenu[i].classList.remove('sub-menu--top')
    
//   }
// }
// }
 
// Nav
 const navAll =  Id('nav-all'),
       btnToggle = Id('toggle')

  btnToggle.addEventListener('click', () => { 
      navAll.classList.toggle('nav-all-active') 
      btnToggle.classList.toggle('toggle-close-left')
      btnToggle.classList.toggle('toggle-close') 
  })

 
 
 //- Menu All
//  const allMenua = document.querySelectorAll('#all-menu>li>a')
//  const allMenuul = document.querySelectorAll(' #all-menu>li>ul') 
//  let allMenuaLength= allMenua.length
//  let allMenuulLength= allMenuul.length
//  for(let i = 0;i<allMenuaLength;i++){  // Submenu
//   allMenua[i].classList.add('collapsible-header')  
//  }
//  for(let i = 0;i<allMenuulLength;i++){  // Submenu 
//   allMenuul[i].classList.add('collapsible-body')
//  }


  //Search
  
  // const searchBtn =  Id('front-search__btn')
  // , 
  //       placeholderSearch = Id('s').placeholder = 'Buscar...'

  // searchBtn.addEventListener('click', () => { 
  //   frontSearch.classList.toggle('search-active')   
    
  // })
  // Evento para cerrar la caja de busqueda
  // let frontSearchClose = Id('front-search__close')
  // frontSearchClose.addEventListener('click', ()=>{
  //   frontSearch.classList.toggle('search-active')    
  // })


 
// El Loader se ejecuta miestras que cargue la pagina
// const igcOverlay = Id('igc-overlay')  
// window.addEventListener('load',()=>{
//   igcOverlay.style.display = 'none';
//   d.body.style.overflowY = 'scroll';
// }) 
 
// Color Hex to rgb 
// function  hexToRgb(h='#ffffff',isPct =true){
//   let ex = /^#([\da-f]{3}){1,2}$/i;
// 	if (ex.test(h)) {
// 		let r = 0, g = 0, b = 0;
// 		isPct = isPct === true;

// 		// 3 digits
// 		if (h.length == 4) {
// 			r = "0x" + h[1] + h[1];
// 			g = "0x" + h[2] + h[2];
// 			b = "0x" + h[3] + h[3];

// 		// 6 digits
// 		} else if (h.length == 7) {
// 			r = "0x" + h[1] + h[2];
// 			g = "0x" + h[3] + h[4];
// 			b = "0x" + h[5] + h[6];
// 		}
// 		if (isPct) {
// 			r = +(r / 255 * 100).toFixed(1);
// 			g = +(g / 255 * 100).toFixed(1);
// 			b = +(b / 255 * 100).toFixed(1);
// 		}
// 		return "rgb("+ (isPct ? r + "%," + g + "%," + b + "%" : +r + "," + +g + "," + +b) + ")";

// } 
// ;  
M.AutoInit();   

d.addEventListener('DOMContentLoaded', function() {
  var elems = d.querySelectorAll('.collapsible');
  var instances = M.Collapsible.init(elems, options);
});