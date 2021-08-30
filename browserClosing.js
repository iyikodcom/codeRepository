//-- +
//-- tarayıcı kapandığında yada tarayıcının bulunduğu sekmesi kapandığında -- çalışacak fonksiyon
function triggerFunction()
{
  $.ajax({
    url:'',//-->servis
    type:'post',//-->method
    dataType:'json',//-->type
    data: {...},//-->send data
    success:function (response){

      if(response.status == 'successful')
      {	
        console.log(response.message);

      }
      else
      {
        console.log(response.message);
      }

    },
    error:function(jqXHR, textStatus, errorThrown){

      console.log(textStatus, errorThrown);
    }
  });
}

window.onbeforeunload = triggerFunction;
