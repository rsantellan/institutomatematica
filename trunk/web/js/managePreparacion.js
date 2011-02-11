$(document).ready(function(){
  $('#materias').find('option').remove().end();
  if($("#link_agregar_preparacion").length > 0)
  {
    $("#link_agregar_preparacion").fancybox({
      'transitionIn'	:	'elastic',
      'transitionOut'	:	'elastic',
      'speedIn'		:	600, 
      'speedOut'		:	200,
      'hideOnContentClick' : false,
      'overlayOpacity' : 0.6,
      'onComplete' : function(){
                        $('#materias').find('option').remove().end();
                      }
      });

  }

  activatePaymentsFancyboxs();
  
});

function activatePaymentsFancyboxs()
{
  $("a.link_hidden_payment").fancybox({
      'centerOnScroll' : true,
      'transitionIn'	:	'elastic',
      'transitionOut'	:	'elastic',
      'speedIn'		:	600, 
      'speedOut'		:	200,
      'overlayOpacity' : 0.6
    });  
}

function sendFormData(){
 $.ajax({
    type: "POST",
    url: $('#new_preparacion').attr('action'),
    dataType: "json",
    data: $('#new_preparacion').serialize(),
    success: function(data){
        if(data.response == "OK")
        {
          $.fancybox.close();
          var place = "#preparaciones_big_container .preparaciones_small_container:last";
          $("#preparaciones_big_container").prepend(data.options.body);
          $(place).fadeOut("slow", function() {
                    $(this).remove();
                });
          $("#preparaciones_big_container .preparaciones_small_container:first .simple_rounded").addClass('new_simple_rounded');
          activatePaymentsFancyboxs();
        }
        else
        {
          
        }
    }

  });
}

function bringSubjects(){
  var dataString = 'facultadId=' + $('#facultades').val();
    $.ajax({
        type: "POST",
        url: $('#facultades').attr('urlToGo'),
        dataType: "json",
        data: dataString,
        success: function(data){
            if(data.result == 1){

                $('#materias').find('option').remove().end();
                var x =0;
                for(x=0;x<data.list.length;x++){
                    var aux = data.list[x];
                    $("#materias").append("<option value='"+aux.id+"'>"+aux.name+"</option>");
                }
            }else{
                $('#materias').find('option').remove().end();
            }
        }

    });
    return false;
}
