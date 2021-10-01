$.ajax({
		url:'***.php',
		type:'post',
		dataType:'json',
		data:{...},
		success:function (response){

			if(response.status == 'successful')
			{
				alert(response.message);
			}
			else
			{
				alert(response.message);
			}

		},
		error:function(jqXHR, textStatus, errorThrown){

			console.log(textStatus, errorThrown);
			
		}a
	});
