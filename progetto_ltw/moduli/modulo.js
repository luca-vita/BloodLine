$(document).ready(function(){
    $('#acc').change(function(){
        if($(this).prop('checked')){
            $('#non').prop('checked', false);
        }
        else{
            $('#non').prop('checked', true);
        }
    });
    $('#non').change(function(){
        if($(this).prop('checked')){
            $('#acc').prop('checked', false);
        }
        else{
            $('#acc').prop('checked', true);
        }
    });
});

$(document).ready(function(){
  //controlli informativa
  $('#informativa-succ').click(function(e){
    const accCheckbox = $('#acc');
    const nonCheckbox = $('#non');
    if(!accCheckbox.is(':checked') && !nonCheckbox.is(':checked')){
      e.preventDefault();
      $(".error-acc").html('Seleziona una delle due opzioni per proseguire.');
      $(".error-acc").css("display", "block");
      return false;
    }
  });
  //controlli malattie
  $('#malattie-succ').click(function(e){
    const vCheckbox = $('#v');
    if(!vCheckbox.is(':checked')){
      e.preventDefault();
      $(".error-v").html('Seleziona la casella per proseguire.');
      $(".error-v").css("display", "block");
      return false;
    }
  });
});

$(document).ready(function() {
    $(".file a").click(function() {
        $(this).css("color", "rgb(129, 80, 137)");
    });
});
