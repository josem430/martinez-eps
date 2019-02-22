$(document).on("ready",function()
{
    cargardatos();
});

var cargardatos=function(){
  $.ajax({
   type:"POST",
   url:"consulta.php"
    }).done(function(data){
        console.log(data);
        var perfil=JSON.parse(data);
        for (var i in perfil)
        {
          $("#perfil").append("<img style='width: 30px;height: 30px;border-radius: 50%;' src='"+perfil[0].PERFIL+"'>");
        }
  });
}



