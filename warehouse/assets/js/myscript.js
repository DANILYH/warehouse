function myFunction() 
{
     let name = document.querySelector("input[name_tov]").value;
     if(!name) {
          alert("Форма пустая.");
     } else {
          alert('Спасибо!');
     }
}

function load_sklad(el)
{
$('#sklad_info').html($('#preload div[sklad="'+$(el).val()+'"]').html());
}

$(document).ready(function()
                 {
                     $('select').change();
                 });
