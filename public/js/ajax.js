$.ajax({
   url:'/demo/api/user',
   method: "GET",
   dataType: "json",
   data:"",
   success:function(data){
   		var table ="";
   		$.each(data,function(i,item){
   			table += '<tr>';
	   			table += '<td>';
		   			table += item['id'];
	   			table += '</td>';
	   			table += '<td>';
		   			table += item['username'];
	   			table += '</td>';
	   			table += '<td>';
		   			table += '<button type="button" class="btn-del" data='+item['id']+'>';
		   				table += 'Xóa';
		   			table += '</button>';
	   			table += '</td>';
   			table += '</tr>';
   		})
     	$("#tbody-user").append(table);
   }
});