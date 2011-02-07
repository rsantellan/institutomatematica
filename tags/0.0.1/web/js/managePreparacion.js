$(document).ready(function(){
  $('#materias').find('option').remove().end();
});

function sendFormData(){
 $.ajax({
    type: "POST",
    url: $('#new_preparacion').attr('action'),
    dataType: "json",
    data: $('#new_preparacion').serialize(),
    success: function(data){
        if(data.result == 1){
            $("#form_errors").html(data.body);
        }else{
            var x =0;
            for(x=0;x<data.body.length;x++){
              $("#form_errors").append(data.body[x]);
            }
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
