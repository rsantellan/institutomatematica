$(document).ready(function(){
    $('#button_buscar_apellido').click(buscarPorApellido);
    $("input:button").button();
    $(".show_preparacion_mostrar_title a").button();
    changeRemoveToIcon();
    
    
    $("a#link_mostrar_tabla_telefonos").fancybox({
        autoDimensions: 'true',
        centerOnScroll: 'true',
        'onClosed'		: function() {
            $("#tabla_main_alumno_preparacion_telefonos").hide();
        },
        'onStart'		: function() {
            $("#tabla_main_alumno_preparacion_telefonos").show();
        },
        'scrolling'  : 'true',
        'titlePosition'  : 'inside',
        'transitionIn' : 'elastic',
        'transitionOut' : 'elastic'
    });
    
    $("a#link_mostrar_tabla_email").fancybox({
        autoDimensions: 'true',
        centerOnScroll: 'true',
        'onClosed'		: function() {
            $("#tabla_main_alumno_preparacion_emails").hide();
        },
        'onStart'		: function() {
            $("#tabla_main_alumno_preparacion_emails").show();
        },
        'scrolling'  : 'true',
        'titlePosition'  : 'inside',
        'transitionIn' : 'elastic',
        'transitionOut' : 'elastic'
    });

    $("a#link_mostrar_tabla_contactos").fancybox({
        autoDimensions: 'true',
        centerOnScroll: 'true',
        'onClosed'		: function() {
            $("#tabla_main_alumno_preparacion_contacto").hide();
        },
        'onStart'		: function() {
            $("#tabla_main_alumno_preparacion_contacto").show();
        },
        'scrolling'  : 'true',
        'titlePosition'  : 'inside',
        'transitionIn' : 'elastic',
        'transitionOut' : 'elastic'
    }); 
});

function changeRemoveToIcon()
{
     $(".remove_link").button({
            icons: {
                primary: "ui-icon-trash"
            },
            text: false
        }); 
}
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

function showNewAlumnoDialog(checkUrl){
    $("#new_alumno_form").dialog({
        modal: true,
        buttons: {
            Salvar: function() {
                checkAlumno(checkUrl);
            },
            Cancelar: function(){
                resetAlumnoForm();
                $(this).dialog('close');
            }
        }
    });
}

function checkAlumno(checkUrl){
    $.ajax({
        type: "POST",
        url: checkUrl,
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
    AjaxLoader.getInstance().show();
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
        },
        complete: function(data){
          AjaxLoader.getInstance().hide();
        }

    });
    return false;
}

function buscarPorApellido(){
    AjaxLoader.getInstance().show();
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
                $("#alumnos_search_list li input:button").button();
            }else{
							
            }
        },
        complete: function(data){
            AjaxLoader.getInstance().hide();
        }



    });
    return false;
}

function agregarAlumnoAPreparacion(alumnoId){
    
    AjaxLoader.getInstance().show();
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
        },
        complete: function(data){
          AjaxLoader.getInstance().hide();
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
    AjaxLoader.getInstance().show();
    $.ajax({
        type: "POST",
        url: $('#new_alumno_preparacion_form').attr('action'),
        dataType: "json",
        data: $('#new_alumno_preparacion_form').serialize(),
        success: function(data){
            if(data.response == "OK"){
                $('#tabla_alumno_preparacion').append(data.options.body);
                $('#tabla_alumno_preparacion tr').fadeIn("slow");
                $('#tabla_alumno_preparacion_email').append(data.options.bodyEmail);
                $('#tabla_alumno_preparacion_email tr').fadeIn("slow");
                $('#tabla_alumno_preparacion_telefono').append(data.options.bodyTelefono);
                $('#tabla_alumno_preparacion_telefono tr').fadeIn("slow");
                $('#tabla_alumno_preparacion_contacto').append(data.options.bodyContacto);
                $('#tabla_alumno_preparacion_contacto tr').fadeIn("slow");
                var place = "#alumno_li_"+data.options.alumnoId;
                $(place).remove();
                changeRemoveToIcon();
                $("#alumno_preparacion_form").dialog( "close" );
            }else{
                $("#alumno_preparacion_form").dialog( "close" );
                $("#alumno_preparacion_form").html(data.options.body);
                $("#alumno_preparacion_form").dialog({
                    modal: true,
                    buttons: {
                        Cancelar: function(){
                            $(this).dialog('close');
                        }
                    }
                });
            
            }
        },
        complete: function(data){
            AjaxLoader.getInstance().hide();
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
            if(data.response == "OK"){
                var place = "#tr_alumno_" + alumnoId;
                $(place).fadeOut("slow", function() {
                    $(this).remove();
                });
                place = "#tr_alumno_telefono_" + alumnoId;
                $(place).fadeOut("slow", function() {
                    $(this).remove();
                });
                place = "#tr_alumno_email_" + alumnoId;
                $(place).fadeOut("slow", function() {
                    $(this).remove();
                });
                place = "#tr_alumno_contacto_" + alumnoId;
                $(place).fadeOut("slow", function() {
                    $(this).remove();
                });
            }
        }

    });
}

function changePaymentStatus(url, alumnoId)
{
    AjaxLoader.getInstance().show();
    var dataString = 'alumnoId='+alumnoId+ '&preparacionId='+$('#preparacion_id').val();
    $.ajax({
        type: "POST",
        url: url,
        dataType: "json",
        data: dataString,
        success: function(data){
            if(data.response == "OK"){
                $("#pagos_form_container").html(data.options.body);
                $("#pagos_form_container").dialog({
                    modal: true,
                    width: 400,
                    buttons: {
                        Cancelar: function(){
                            $(this).dialog('close');
                        },
                        Guardar: function() {
                            savePaymentForm();
                            //actualRemove($(element).attr('href'), alumnoId, preparacionId);
                            $(this).dialog('close');
                        }
                    }
                });
            }
        },
        complete: function(data){
          AjaxLoader.getInstance().hide();
        }

    });
}

function savePaymentForm()
{

    $.ajax({
        type: "POST",
        url: $('#pagos_complete_form').attr('action'),
        dataType: "json",
        data: $('#pagos_complete_form').serialize(),
        success: function(data){
            if(data.response == "OK"){
                var image = "#payment_image_" + data.options.alumnoId;
                $(image).attr("src", data.options.image);

            //$("#new_alumno_form").dialog( "close" );
            //agregarAlumnoAPreparacion(data.id);
            }else{
            
        }
        //$('#new_alumno_form').html(data.body);
        }

    });
 
}

function pausecomp(millis)
{
  var date = new Date();
  var curDate = null;

  do { curDate = new Date(); }
  while(curDate-date < millis);
} 
