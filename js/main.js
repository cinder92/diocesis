 jQuery(function($) {
  $(document).ready(function() {
        if ($(window).width() > 992) {
            $(".menu").sticky({topSpacing: 0});
            $("#selected_post-2").sticky({topSpacing: 60});
        }

        $(window).scroll(function(d){
          var height = $(document).scrollTop()
         
          if($(window).width() > 992 && height >= 80){
            $(".menu").addClass('is-sticky')
          }else{
            $(".menu").removeClass('is-sticky')
          }

          var current = $('#selected_post-2').offset().top,
          currentHeight = $('#selected_post-2').height(),
          footer = $('.footer-menu').offset().top
         
            if ( footer >= height + currentHeight + 100 ) {
              
              $("#selected_post-2").show()
              
            }else{
              $("#selected_post-2").hide()
            }

        })

        //center dynamically megamenu
        var windowWidth = $(window).width(),
        hasMegaMenus = $('.mega-menu').length

        if(hasMegaMenus){
          var megamenuWidth = 1000,
          newLeft = 0
          $.each($('.mega-menu'),function(i,val){
              //set in css megamenu.css
                        //1265      //1000          //16   //281
             if(newLeft == 0){
              //first item
               newLeft = windowWidth - megamenuWidth - 51
             }else{
               //281
               newLeft = megamenuWidth - newLeft - 156
             }
             console.log(newLeft)
             $(val).css('left','-'+newLeft+'px')
          })
        }

        //flexslider
        $('.flexslider').flexslider({
          animation: "slide",
          controlNav: false
        });

        function eventTpl(title,dianum,mes,link,dia,hora){
          return '<li class="item event-item"><div class="event-date"> <span class="date">'+dianum+'</span> <span class="month">'+mes+'</span> </div><div class="event-detail"><h4><a href="'+link+'">'+title+'</a></h4><span class="event-dayntime meta-data">'+dia+' | '+hora+'</span> </div><div class="to-event-url" style="height: 54px;"><div><a href="'+link+'" class="btn btn-default btn-sm">Detalles</a></div></div></li>';
        }

        //calendario de eventos proximos
        $('#eventsMonths').on('change',function(){
           var mes = $(this).val()
           console.log(mes)

           if(mes > 0){
              $('#spinnerEvent').show();
              $.ajax({
                url : ajaxurl,
                method : 'POST',
                dataType:'JSON',
                data : {
                  action : 'getEvents',
                  month : mes
                },
                timeout : 3000,
                success : function(response){
                  //console.log(response.length)
                  if(response.length > 0){
                    var newData = ""
                    for(var i = 0; i < response.length; i++){
                      //console.log(response[i])
                       newData += eventTpl(response[i].title,response[i].dianum,response[i].mes,response[i].link,response[i].dia,response[i].hora)
                    }
                    $('#eventsList').html(newData);
                  }
                  $('#spinnerEvent').hide();
                },
                error : function(response){
                   console.log(error,'success')
                   $('#spinnerEvent').hide();
                }
              })
           }  
        })

        //countdow
        var date = $('#counter').attr('data-date')
        $('#counter').countdown(date).on('update.countdown', function(event) {
           //<span>%-w</span> week%!w
           //'<span>%-d</span> day%!d '
           //<span>%H</span> hr
           //'<span>%M</span> min '
           var $this = $(this).html(event.strftime(''
             + '<div class="timer-col"><span id="days">%D</span> <span class="timer-type">día%!d</span></div>'
             + '<div class="timer-col"><span id="hours">%H</span> <span class="timer-type">hrs</span></div>'
             + '<div class="timer-col"><span id="minutes">%M</span> <span class="timer-type">mins</span></div>'
             + '<div class="timer-col"><span id="seconds">%S</span> <span class="timer-type">segs</span></div>'));
        });

        //owl carousel de noticias
        $('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          nav:true,
          navText: ["<i class='icon ion-ios-arrow-left'>","<i class='icon ion-ios-arrow-right'>"],
          dots : false,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:3
              },
              1000:{
                  items:3
              }
          }
        })

        //venobox
        $('.venobox').venobox(); 

      //show map

        //mapas
      var map;
      var marker
      var latLang = $('#mapa').attr('data-coords');
      var zoom = 15;
      if(latLang == '') {
          latLang = "54.470636, 18.469391";
          zoom = 12;
      } 
      latLang = latLang.split(',');
    
    
    function initialize() {
        
        
        var mapOptions = {
            zoom:zoom,
            center: new google.maps.LatLng(latLang[0],latLang[1])
        }
        map = new google.maps.Map(document.getElementById('mapa'),mapOptions);


       marker = new google.maps.Marker({
            draggable: false,
            position: new google.maps.LatLng(latLang[0],latLang[1]), 
            map: map,
            title: "Your location"
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);
    

    });
});

