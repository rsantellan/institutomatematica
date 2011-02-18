$(document).ready(function(){
  $("input:button").button();
  $(".hyperlink").button();
});

function bringAlumnosList(url)
{
  AjaxLoader.getInstance().show();
  $.ajax({
      type: "POST",
      url: url,
      dataType: "json",
      success: function(data){
          if(data.response == "OK"){
              $("#alumnos_container").html(data.options.body);
              $("#sendMailsButton").show();
          }else{
            
          }
      },
      complete: function(data){
          AjaxLoader.getInstance().hide();
      }



  });  
  return false;
}

function checkAll(element)
{
  var checked_status = element.checked;
  $(element).next('.checkbox_container').children("input:checkbox").each(function()
				{
					this.checked = checked_status;
				});
  
}

function startProccessOfSendingMail(url, mailId)
{
  AjaxLoader.getInstance().show();
  var ids = new Array();
  $('input:checkbox:checked').each(function(index, item){
    var value = $(item).val();
    if(value != "0")
    {
      ids[index] = value;
    }
  });
  var sendIds = ids.join('|');
  $.ajax({
    url: url,
    dataType: 'json',
    type: 'POST',
    data: [{name: "sendIds", value: sendIds}, {name: "id", value: mailId}],
    success: function(json){
      switch(json.response)
        {
          case 'OK':break;
          case 'ERROR':alert(json.options.message);break;
          default:alert('Internal Server Error');break;
        }
      },
      complete: function(data){
          AjaxLoader.getInstance().hide();
      }
  });  
  
}
