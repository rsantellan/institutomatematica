$(document).ready(function(){
  $(".hyperlink").button();
});

function showFullText(id)
{
    //$(element).slideToggle("slow");
    $('#span_'+id).slideToggle('slow');
    $('#hide_link_'+id).slideToggle('slow');
    $('#show_link_'+id).slideToggle('slow');
}