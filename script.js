searchForm =document.querySelector('.search-form');
document.querySelector('#search-btn').onclick=()=>{
    searchForm.classList.toggle('active');
}
let loginForm=document.querySelector('.login-form-container')
document.querySelector('#login-btn').onclick=()=>{
   loginForm.classList.toggle ('active');
}
document.querySelectorAll('.login-btn').forEach((button) => {
    button.onclick = () => {
        console.log('Button clicked'); // Kiểm tra xem sự kiện click có được kích hoạt không
        loginForm.classList.toggle('active');
    }
});
document.querySelector('#close-login-btn').onclick=()=>{
    loginForm.classList.remove('active');
}
window.onscroll =()=>{
    if(window.scroll>80){
        document.querySelector('.header .header-2').classList.add('active');
    }
    
    else{
        document.querySelector('.header .header-2').classList.remove('active');
    }
}
window.onload=()=>{
    if(window.scroll>80){
        document.querySelector('.header .header-2').classList.add('active');
    }
    
    else{
        document.querySelector('.header .header-2').classList.add('active');
    }
    }
    var swiper =new Swiper(".featured-slider",{
        spaceBetwen:10,
        loop:true,
        centeredSlides:true,
        autoplay:{
            delay:9500,
            disableOnInteraction: false,
        },
        navigator:{
            nextE1:".swiper-button-next",
            prevE1:".swiper-button-prev"
        },
        breakpoints:{
            0:{
                slidesPerView: 1,
            },
            450:{
                slidesPerView: 2,
            },
            768:{
                slidesPerView: 3,
    
            },
            1024:{
                slidesPerView:4,
            },
        },
    });
    var swiper =new Swiper(".arrivals-slider",{
        spaceBetwen:10,
        loop:true,
        centeredSlides:true,
        autoplay:{
            delay:9500,
            disableOnInteraction: false,
        },
    
        breakpoints:{
            0:{
                slidesPerView: 1,
            },
            768:{
                slidesPerView: 2,
        
            },
            1024:{
                slidesPerView:3,
            },
        },
    });
    var swiper =new Swiper(".sach-slider",{
        spaceBetwen:10,
        loop:true,
        centeredSlides:true,
        autoplay:{
            delay:9500,
            disableOnInteraction: false,
        },
    
    
    
    
        breakpoints:{
            0:{
                slidesPerView: 1,
            },
            768:{
                slidesPerView: 2,
        
            },
            1024:{
                slidesPerView:3,
            },
        },
    });
    var swiper =new Swiper(".vanhoc-slider",{
        spaceBetwen:10,
        loop:true,
        centeredSlides:true,
        autoplay:{
            delay:9500,
            disableOnInteraction: false,
        },
    
    
    
    
        breakpoints:{
            0:{
                slidesPerView: 1,
            },
            768:{
                slidesPerView: 2,
        
            },
            1024:{
                slidesPerView:3,
            },
        },
    });
    var swiper =new Swiper(".khoahoc-slider",{
        spaceBetwen:10,
        loop:true,
        centeredSlides:true,
        autoplay:{
            delay:9500,
            disableOnInteraction: false,
        },
    
    
    
    
        breakpoints:{
            0:{
                slidesPerView: 1,
            },
            768:{
                slidesPerView: 2,
        
            },
            1024:{
                slidesPerView:3,
            },
        },
    });
    var swiper =new Swiper(".kinangsong-slider",{
        spaceBetwen:10,
        loop:true,
        centeredSlides:true,
        autoplay:{
            delay:9500,
            disableOnInteraction: false,
        },
    
    
    
    
        breakpoints:{
            0:{
                slidesPerView: 1,
            },
            768:{
                slidesPerView: 2,
        
            },
            1024:{
                slidesPerView:3,
            },
        },
    });
//CARRT
const btn = document.querySelectorAll('button')
//console.log(btn)
btn.forEach(function(button,index){
    button.addEventListener("click",function(event){{ 
        var btnItem = event.target
        var product = btnItem.parentElement
        var productImg = product.querySelector("img").src
        var productName = product.querySelector("H2").innerText
        var productPrice = product.querySelector("span").innerText
       
        addcart(productPrice,productImg,productName)
     }})
})
function addcart(productPrice,productImg,productName){
    var addtr = document.createElement("tr")
    var trcontent = '  <tr><td style="display: flex; align-items: center;"><img style="width: 70px;" src="'+productImg+'" alt=""><span class="title">'+productName+'</span></td><td><p><span class="prices">'+productPrice+'</span><sub>đ</sub></p></td><td><input style="width: 30px; outline: none;" type="number" value="1" min="0"></td><td style="cursor: pointer;"><span class="cart-delete">XÓA</span></td></tr>'
    addtr.innerHTML = trcontent
    var cartTable = document.querySelector("tbody")
   // console.log(cartTable)
   cartTable.append(addtr)// thêm biến tr vào tbody
   
   deleteCart()
   carttotal ()
   alert("SẢN PHẨM ĐÃ CÓ TRONG GIỎ HÀNG")

}
// total
function carttotal (){
    var totalC = 0
    var cartItem = document.querySelectorAll("tbody tr")
   // console.log(cartItem.length)
    for(var i=0;i<cartItem.length; i++){
        var inputValue = cartItem[i].querySelector('input').value
        //console.log(inputValue)
        var productPrice = cartItem[i].querySelector('.prices').innerHTML
        
        //console.log(productPrice)
        totalA = inputValue*productPrice*1000
        //tocalB = totalA.toLocaleString('de-DE')
        totalC = totalC + totalA
        //console.log(totalC)
       // totalD =totalC.toLocaleString('de-DE')
       
        }
        var cartTotalA = document.querySelector(".price-total span")
        cartTotalA.innerHTML = totalC.toLocaleString('de-DE')
        inputchange()
    
     }
  //-----------Delete cart-----------
  function deleteCart(){
    var cartItem = document.querySelectorAll("tbody tr")
    for (var i=0;i<cartItem.length;i++){
        var productT =document.querySelectorAll(".cart-delete")
        productT[i].addEventListener("click",function(event){
            var cartDelete = event.target
            var cartitemR = cartDelete.parentElement.parentElement
            cartitemR.remove()
            carttotal()
           // console.log(cartitemR)
        })
    }
  }
  function inputchange(){
    var cartItem = document.querySelectorAll("tbody tr")
    for(var i=0;i<cartItem.length;i++){
        var inputValue = cartItem[i].querySelector("input")
        inputValue.addEventListener("change",function(){
            carttotal()
        })
    }
  }
//
const cartbtn = document.querySelector(".cart .fa-times")
const cartshow = document.querySelector(".fa-shopping-cart")
cartshow.addEventListener("click",function(){
   // console.log(cartshow)
    document.querySelector(".cart").style.right ="0"
})
cartbtn.addEventListener("click",function(){
   // console.log(cartbtn)
   document.querySelector(".cart").style.right ="-100%"
})

