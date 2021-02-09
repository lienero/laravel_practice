$(function (){
    var cont=0;
function loopSlider(){
  var xx= setInterval(function(){
        switch(cont)
        {
        case 0:{
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-purple-800");
            $("#sButton2").addClass("bg-purple-800");
        cont=1;
        
        break;
        }
        case 1:
        {
        
            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-purple-800");
            $("#sButton1").addClass("bg-purple-800");
           
        cont=0;
        
        break;
        }
        
        
        }},8000);

}

function reinitLoop(time){
clearInterval(xx);
setTimeout(loopSlider(),time);
}



function sliderButton1(){

    $("#slider-2").fadeOut(400);
    $("#slider-1").delay(400).fadeIn(400);
    $("#sButton2").removeClass("bg-purple-800");
    $("#sButton1").addClass("bg-purple-800");
    reinitLoop(4000);
    cont=0
    
    }
    
    function sliderButton2(){
    $("#slider-1").fadeOut(400);
    $("#slider-2").delay(400).fadeIn(400);
    $("#sButton1").removeClass("bg-purple-800");
    $("#sButton2").addClass("bg-purple-800");
    reinitLoop(4000);
    cont=1
    
    }

    $(window).ready(function(){
        $("#slider-2").hide();
        $("#sButton1").addClass("bg-purple-800");
        

        loopSlider();
     
        
    
    
    
    
    });
    mobiscroll.settings = {
        lang: 'en',            
        theme: 'ios',          
        themeVariant: 'light' 
    };

    mobiscroll.select('#demo-mobile', {
        display: 'bubble'      
    });

    mobiscroll.select('#demo-desktop', {
        display: 'bubble',     
        touchUi: false         
    });
    
    //price//
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
      event.preventDefault()
      toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
      isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
      isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
      toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
});

//check-all//

$( document ).ready( function() {
    $( '.check-all' ).click( function() {
      $( '.ab' ).prop( 'checked', this.checked );
    } );
  } );

  
