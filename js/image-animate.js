// $(window).on('scroll', function(){
//     if($(window).scrollTop()){
//         $('#image').addClass('image-height');
        
//     }else{
// 		$('#image').removeClass('image-height');
//     }
// })

$(window).on('scroll', function(){
  if($(window).scrollTop()){
      $('#image').attr('src', 'img/logo-light.png');
      $('#image').removeClass('logo-index');

  }else{
  $('#image').attr('src', 'img/logo-index.png');
  $('#image').addClass('logo-index');
  }
})