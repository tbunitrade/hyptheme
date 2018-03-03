 $(document).ready(function(){
    console.log('ready');

     // $('.panel-image-prop').mouseover( function() {
     //     console.log('hover at article');
     //     $(this).css("opacity", "0.5");
     //     $('.hrefTypeOne').css("opacity","1");
     //
     // });
     //
     // $('.panel-image-prop').mouseout( function() {
     //     console.log('hover at article');
     //     $(this).css("opacity", "1");
     // });


    $('.hrefTypeOne').mouseover(function(){
       if ( $('.hrefTypeOne').hover() == true ) {
           console.log('true');
       }
       else {
           console.log('false');
       }
    });
 });