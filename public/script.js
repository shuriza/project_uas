// Update time and date every second
function updateTime() {
    var today = new Date();
    // Time
    var hours = today.getHours().toString().padStart(2, '0');
    var minutes = today.getMinutes().toString().padStart(2, '0'); 
    var seconds = today.getSeconds().toString().padStart(2, '0'); 
    var time = hours + ":" + minutes + ":" + seconds; 
    document.getElementById('time').innerText = time;
    // Date
    var date = today.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    document.getElementById('date').innerText = date;
  }
  updateTime();
  setInterval(updateTime, 1000);


//swipe carousele//
$(document).ready(function(){
  var touchStartX = 0;s
  var touchEndX = 0;

  $('#myCarousel').on('touchstart', function(e){
      touchStartX = e.changedTouches[0].clientX;
  });

  $('#myCarousel').on('touchend', function(e){
      touchEndX = e.changedTouches[0].clientX;
      handleSwipe();
  });

  function handleSwipe(){
      var threshold = 50; // 
      var diff = touchStartX - touchEndX;

      if (Math.abs(diff) >= threshold) {
          if (diff > 0) {
              $('#myCarousel').carousel('next');
          } else {
              $('#myCarousel').carousel('prev');
          }
      }
  }
});
//link whatsapp//
function openWhatsApp1() {
  var phonenumber = '6281775093906';
  var pesan = '*Hallo Admin*, Saya mau berlangganan Mohon dibantu secepatnya yah..';
  var whatsappUrl = 'https://wa.me/' + phonenumber + '?text=' + encodeURIComponent(pesan);

    window.open(whatsappUrl, '_blank');
}

function openWhatsApp2() {
  var PhoneNumber = '6281775093906';
  var Pesan = '*Hallo Kak..*, Saya mau tanya mengenai pemasangan internet *Indibiz*';
  var whatsappUrl = 'https://wa.me/' + PhoneNumber + '?text=' + encodeURIComponent(Pesan);

    window.open(whatsappUrl, '_blank');
}

function openWhatsApp3(speed, isFUP) {
  var phoneNumber = '6281775093906';
  var packageType = isFUP ? 'BASIC FUP' : 'NON FUP';
  var message = '*Hallo Admin*, Saya mau berlangganan *Paket ' + packageType + ' dengan kecepatan ' + speed + ' Mbps*. Mohon dibantu secepatnya yah..';
  var whatsappUrl = 'https://wa.me/' + phoneNumber + '?text=' + encodeURIComponent(message);

  window.open(whatsappUrl, '_blank');
}

//Floating Card//
document.addEventListener("DOMContentLoaded", function() {
  var floatingButton = document.getElementById("floatbutton");
  var floatingCard = document.getElementById("floatcard");

  floatingButton.addEventListener("click", function() {
    if (floatingCard.classList.contains("show")) {
      floatingCard.classList.remove("show");
      floatingCard.classList.add("card-fly-out");
      floatingCard.classList.remove("card-fly-in");
      floatingCard.style.pointerEvents = 'none'; 
    } else {
      floatingCard.classList.add("show");
      floatingCard.classList.add("card-fly-in");
      floatingCard.classList.remove("card-fly-out");
      floatingCard.style.pointerEvents = 'auto'; 
    }
  });
});

//Accordion Persyaratan//
const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");
accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", event => {
    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    else {
      accordionItemBody.style.maxHeight = 0;
    }
    
  });
});

