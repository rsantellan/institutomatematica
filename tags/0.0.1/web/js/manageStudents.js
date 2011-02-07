$(document).ready(function(){
  $('#button_buscar_apellido').click(buscarPorApellido);
});

function buscarPorApellido(){
  var dataString = 'apellido="' + $('#text_buscar_apellido').val() + '"';
  console.log(dataString);
    $.ajax({
        type: "POST",
        url: $('#button_buscar_apellido').attr('urlToGo'),
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
                //location.reload();
            }
        }

    });
    return false;
}


