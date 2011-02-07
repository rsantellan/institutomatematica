function executeFilterByAjax()
{
  $.ajax({
        type: "POST",
        url: $("#form_filters").attr('action'),
        dataType: "json",
        data: $("#form_filters").serialize(),
        success: function(data){
				  if(data.result == 1){
						
						  $('#table_data_body').html(data.body);
						  var x =0;
						  for(x=0;x<data.list.length;x++){
								  var aux = data.list[x];
								  color(aux.place, aux.finish, aux.materia, aux.docente);
								
								  //$("#materias").append("<option value='"+aux.id+"'>"+aux.name+"</option>");
						  }
						  removeEmptyRows();
				  }else{
						  $('#materias').find('option').remove().end();
				  }

        }

    });
  return false;
}

function bringAll(url){
	if($('#docentes').val() == 0) return;
	var dataString = "docenteId="+$('#docentes').val();
	$.ajax({
		type: "POST",
		url: url,
		dataType: "json",
		data: dataString,
		success: function(data){
				if(data.result == 1){
						
						$('#table_data_body').html(data.body);
						var x =0;
						for(x=0;x<data.list.length;x++){
								var aux = data.list[x];
								color(aux.place, aux.finish, aux.materia, aux.docente);
								
								//$("#materias").append("<option value='"+aux.id+"'>"+aux.name+"</option>");
						}
						removeEmptyRows();
				}else{
						$('#materias').find('option').remove().end();
				}
			}

		});
	return false;	
}

  var nowArray = new Array();
  var usedHours = new Array();
  
  function color(place, finish, materia, docente){
    var results = new Array();
    var aux = $('#'+place);
    var currentId = $(aux).attr('id');
    var finished = false;
    var finishArray = finish.split('_');
    nowArray = new Array();
    nowArray = currentId.split('_');
    var day = currentId.split('_')[0];
    var hour = currentId.split('_')[1];
    var minutes = currentId.split('_')[2];
    var i = 0;
    var oneMore = false;
    while(!finished){
      if(finishArray[0] == day)
      {
        if(finishArray[1] == hour)
        {
          if(finishArray[2] == minutes)
          {
            finished = true;
          }
          else
          {
            if((finishArray[2] - minutes) < 0)
            {
              finished = true;
            }
            else
            {
              if((finishArray[2] - minutes) < 15)
              {
                oneMore = true;
                finished = true;
              }
            }
          }
        }
      }
      else
      {
        finished=true;
      }
      var parseado = day + '_' + hour + '_' + minutes;
      if(minutes == 0)
      {
        parseado += '0';
      }
      results.push(parseado);
      usedHours.push(hour);
      minutes = parseInt(minutes) + 15;
      if(minutes == 60){
        minutes = 0;
        hour = parseInt(hour) + 1; 
      }
      if(oneMore)
      {
        var parseado = day + '_' + hour + '_' + minutes;
        if(minutes == 0)
        {
          parseado += '0';
        }
        results.push(parseado);        
      }
      i++;
      if(i > 100){
         console.log(results);
         return;
       }
    }
    for (x in results)
    {
      $('#'+results[x]).html(materia);
      $('#'+results[x]).css("background-color","#F3F781")
    }
    return;


  }
  
  function removeEmptyRows()
  {
    $('#calendar_table tbody tr').each(function(){
      var list = $(this).children('.data');
      var id = $(list[0]).attr('id');
      var aux = id.split('_');
      var index = 0;
      var myDelete = true;
      while(index < usedHours.length && myDelete){
        if(parseInt(usedHours[index]) == parseInt(aux[1]))
        {
          myDelete = false;
          
        }
        index++;
      }
      if(myDelete){
        $(list[0]).parent().hide();
        
      }
    });
  }
  
  function restoreTable(){
    $('#calendar_table tbody td').each(function(){
      if($(this).hasClass('data'))
      {
        $(this).html(' ');
      }
      $(this).parent().show();
    });
  }
  
