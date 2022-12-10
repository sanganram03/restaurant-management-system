<script>
$(function(){

  var overlay = $('<div></div>');
      overlay.css({
        background: 'rgba(0,0,0,0.5)',
        '-webkit-background-size': 'cover',
        position: 'fixed',
        top: 0,
        left: 0,
        right: 0,
        bottom: 0,
        'z-index': 999,
        'pointer-events': 'none'
      });

  var input = $('.panel input, .panel textarea');

  input.focusin(function(){
    $('body').prepend(overlay)
    var panel = $(this).parents('.panel');
    panel.css({
      'z-index': 1000,
      position: 'relative'
    })
  });

  input.focusout(function(){
    var panel = $(this).parents('.panel');
    panel.css({
      position: 'static'
    })
    overlay.detach();
  });


  // esc releases focus from inputs
  $(document).keyup(function(e){
    if(e.keyCode === 27){
      input.blur();
    };
  });

})
</script>
