$(document).ready(function(){
  $('#button_buscar_apellido').click(buscarPorApellido);
});

function showDialog(){
  
  $("#dialog-message").dialog({
			  modal: true,
			  buttons: {
				  Ok: function() {
					  $(this).dialog('close');
				  }
			  }
		  });


}

function showTelefonos()
{
  $("#tabla_main_alumno_preparacion_telefonos").dialog({
			  modal: true,
        width: 300,
			  buttons: {
				  Ok: function(){
            $(this).dialog('close');
					}
			  }
		  });  
}

function showEmails()
{
  $("#tabla_main_alumno_preparacion_emails").dialog({
			  modal: true,
        width: 500,
			  buttons: {
				  Ok: function(){
            $(this).dialog('close');
					}
			  }
		  });  
}

function showNewAlumnoDialog(){
  $("#new_alumno_form").dialog({
			  modal: true,
			  buttons: {
				  Salvar: function() {
						checkAlumno();
				  },
				  Cancelar: function(){
            resetAlumnoForm();
						$(this).dialog('close');
					}
			  }
		  });			
}

function checkAlumno(){
	$.ajax({
    type: "POST",
    url: "/frontend_dev.php/alumno/checkAlumno",
    dataType: "json",
    data: $('#form_alumno').serialize(),
    success: function(data){
        if(data.result == 1){
            saveAlumno();
            resetAlumnoForm()
        }else{
						$("#new_alumno_form").dialog( "close" );
            $("#alumnos_parecidos").html(data.body);
            showDialogAlumnosSimilares();
        }
    }

  });	
}

function showDialogAlumnosSimilares(){
  $("#alumnos_parecidos").dialog({
			  modal: true,
			  width: 770,
			  buttons: {
					'Usar el seleccionado': function() {
						//$(this).dialog('close');
						var alumnoId = $('#alumnos_similares_form input:radio:checked').val();
						agregarAlumnoAPreparacion(alumnoId);
						resetAlumnoForm();
						$(this).dialog('close');
						
					},
				  'Es uno nuevo': function() {
						saveAlumno();
						resetAlumnoForm();
						$(this).dialog('close');
				  },
				  Cancelar: function(){
						resetAlumnoForm();
						$(this).dialog('close');
					}
			  }
		  });		
}

function resetAlumnoForm(){
	$(':input','#form_alumno')
	 .not(':button, :submit, :reset, :hidden')
	 .val('')
	 .removeAttr('checked')
	 .removeAttr('selected');
}

function saveAlumno(){
	$.ajax({
    type: "POST",
    url: $('#form_alumno').attr('action'),
    dataType: "json",
    data: $('#form_alumno').serialize(),
    success: function(data){
        if(data.result == 1){
            $("#new_alumno_form").dialog( "close" );
            agregarAlumnoAPreparacion(data.id);
        }else{
            
        }
        $('#new_alumno_form').html(data.body);
    }

  });
}

function showAlumno(element, id){
  $.ajax({
    type: "GET",
    url: $(element).attr('href'),
    dataType: "json",
    beforeSend: function(x) {
        if(x && x.overrideMimeType) {
            x.overrideMimeType("application/json;charset=UTF-8");
        }
    },
    success: function(data){
        $("#dialog-message").html(data.body);
        showDialog();
    }

  });
  return false;
}

function buscarPorApellido(){
  var dataString = 'apellido=' + $('#text_buscar_apellido').val() +'&nombre=' + $('#text_buscar_nombre').val()+ '&preparacionId='+$('#preparacion_id').val();
	$.ajax({
			type: "POST",
			url: $('#button_buscar_apellido').attr('urlToGo'),
			dataType: "json",
			data: dataString,
			success: function(data){
					if(data.result == 1){
							$('#alumnos_search_list').find('li').remove().end();
							var x =0;
							for(x=0;x<data.list.length;x++){
									var aux = data.list[x];
									$("#alumnos_search_list").append(aux.body);
							}
					}else{
							
					}
			}

    });
    return false;
}

function agregarAlumnoAPreparacion(alumnoId){
	var url = $("#alumno_preparacion_form_url").val();
	var dataString = 'alumnoId='+alumnoId+ '&preparacionId='+$('#preparacion_id').val();
	$.ajax({
			type: "POST",
			url: url,
			dataType: "json",
			data: dataString,
			success: function(data){
					if(data.result == 1){
						$("#alumno_preparacion_form").html(data.body);
						$("#alumno_preparacion_form").dialog({
							modal: true,
							width: 340,
							buttons: {
								Salvar: function() {
									saveAlumnoPreparacion();
								},
								Cancelar: function(){
									$(this).dialog('close');
								}
							}
						});
					}
			}

    });
    return false;	
}

function showContactNote()
{
  if($("#forma_contacto option:selected").attr("hasnote")  == "1")
  {
    $("#forma_contacto_note_div").show();
    $("#forma_contacto_has_note").val(1);
  }
  else
  {
    $("#forma_contacto_note_div").hide();
    $("#forma_contacto_has_note").val(0);
  }
}

function saveAlumnoPreparacion(){
	$.ajax({
    type: "POST",
    url: $('#new_alumno_preparacion_form').attr('action'),
    dataType: "json",
    data: $('#new_alumno_preparacion_form').serialize(),
    success: function(data){
        if(data.result == 1){
						$('#tabla_alumno_preparacion').append(data.body);
            $('#tabla_alumno_preparacion tr').fadeIn("slow");
            $('#tabla_alumno_preparacion_email').append(data.bodyEmail);
            $('#tabla_alumno_preparacion_email tr').fadeIn("slow");
            $('#tabla_alumno_preparacion_telefono').append(data.bodyTelefono);
            $('#tabla_alumno_preparacion_telefono tr').fadeIn("slow");
						var place = "#alumno_li_"+data.alumnoId;
						$(place).remove();
						$("#alumno_preparacion_form").dialog( "close" );
        }else{
            $("#alumno_preparacion_form").dialog( "close" );
            $("#alumno_preparacion_form").html(data.body);
            $("#alumno_preparacion_form").dialog({
							modal: true,
							buttons: {
								Cancelar: function(){
									$(this).dialog('close');
								}
							}
						});
            
        }
    }

  });
}

function removeAlumnoFromPreparacion(element, alumnoId, preparacionId){
	$("#confirmar_sacar_alumno").dialog({
							modal: true,
							width: 340,              
							buttons: {
								Eliminar: function() {
									actualRemove($(element).attr('href'), alumnoId, preparacionId);
									$(this).dialog('close');
								},
								Cancelar: function(){
									$(this).dialog('close');
								}
							}
						});
						
	
	return false;
}

function actualRemove(url, alumnoId, preparacionId){
var dataString = 'alumnoId='+alumnoId+ '&preparacionId='+$('#preparacion_id').val();
$.ajax({
    type: "POST",
    url: url,
    dataType: "json",
    data: dataString,
    success: function(data){
        if(data.result == 1){
						var place = "#tr_alumno_" + alumnoId;
						$(place).fadeOut("slow", function() { $(this).remove(); });
            var place = "#tr_alumno_telefono_" + alumnoId;
						$(place).fadeOut("slow", function() { $(this).remove(); });
            var place = "#tr_alumno_email_" + alumnoId;
						$(place).fadeOut("slow", function() { $(this).remove(); });
        }
    }

  });	
}
