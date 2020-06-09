$(document).on('click','a.add-cart-quick',function(e){
	e.preventDefault();
	var href = $(this).attr('href');
	var id = $(this).data('id');
	$.ajax({
		url:href,
		type:'GET',
		success:function(res){
			$('#sum-cart').load(location.href + ' #sum-cart>*','');
		}
	});
});
//tâm
loadDataUser();
function loadDataUser(){
	$("#tbody-user").empty();
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
			table += item['full_name'];
			table += '</td>';
			table += '<td>';
			table += item['email'];
			table += '</td>';
			table += '<td>';
			table += item['address'];
			table += '</td>';
			table += '<td>';
			table += item['phone'];
			table += '</td>';

			table += '<td>';
				table += '<button type="button" class="btn btn-danger btn-del" onclick="btnDelUser('+item['id']+')">';
				table += 'Xóa';
				table += '</button>';
			table += '</td>';
			table += '</tr>';
		})
		$("#tbody-user").append(table);
	}
});
}
$("#btn-user-create-res").click(function(){
	var username = $("input[name='username']").val();
	var password = $("input[name='password']").val();
	var full_name = $("input[name='full_name']").val();
	var email = $("input[name='email']").val();
	var address = $("input[name='address']").val();
	var phone = $("input[name='phone']").val();
	var password_rp = $("input[name='password_rp']").val();
	var groups = $("select[name='groups']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/demo/api/create-user',
		method: "POST",
		data: {username:username,password:password,full_name:full_name,email:email,address:address,phone:phone,groups:groups,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm mới thành công");
				location.href = "http://localhost:8080/demo/backend/user";
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
	});

});



function btnDelUser(id) {
	$.ajax({
		url:'/demo/api/delete-user/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công");
			loadDataUser();
		}
	});
}




loadDataCustomer();
function loadDataCustomer(){
	$("#tbody-customer").empty();
$.ajax({
	url:'/demo/api/customer',
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
			table += item['name'];
			table += '</td>';
			table += '<td>';
			table += item['email'];
			table += '</td>';
			table += '<td>';
			table += item['address'];
			table += '</td>';
			table += '<td>';
			table += item['phone'];
			table += '</td>';
			table += '<td>';
			table += '<a href="/demo/backend/customer-edit/'+item['id']+'" class="btn btn-info btn-del" >Sửa</a>';
			table += '</td>'
			table += '<td>';
			table += '<button type="button" class="btn btn-danger btn-del" onclick="btnDelCustomer('+item['id']+')">';
			table += 'Xóa';
			table += '</button>';
			table += '</td>';
			table += '</tr>';
		})
		$("#tbody-customer").append(table);
	}
});
}
$("#btn-customer-create-res").click(function(){
	var name = $("input[name='name']").val();
	var email = $("input[name='email']").val();
	var sex = $("input[name='sex']").val();
	var address = $("input[name='address']").val();
	var phone = $("input[name='phone']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/demo/api/create-customer',
		method: "POST",
		data: {name:name,sex:sex,email:email,address:address,phone:phone,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm mới thành công");
				location.href = "http://localhost:8080/demo/backend/customer";
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
	});

});


function btnEditCustomer(id){
	var name = $("input[name='name']").val();
	var email = $("input[name='email']").val();
	var sex = $("input[name='sex']").val();
	var address = $("input[name='address']").val();
	var phone = $("input[name='phone']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
	   url:'/demo/api/update-customer/'+id,
	   method: "PUT",
	   dataType: "json",
	   data: {name:name,sex:sex,email:email,address:address,phone:phone,_token:token},
 		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/demo/backend/customer";
			}else{
				alert("that bai");
			}
		}
	});
}

function btnDelUser(id) {
	$.ajax({
		url:'/demo/api/delete-customer/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công");
			loadDataUser();
		}
	});
}



//nam
loadDataPro();
function loadDataPro(){
	$("#tbody-products").empty();
$.ajax({
	url:'/demo/api/products',
	method: "GET",
	dataType: "json",
	data:"",
	success:function(data){
		var table ="";
		$.each(data,function(i,item){
			table += '<tr>';
			table += '<td>';
			table += item['name'];
			table += '</td>';
			table += '<td>';
			table += item['catname'];
			table += '</td>';
			table += '<td>';
			table += item['images1']
			table += '</td>';
			table += '<td>';
			table += item['price'];
			table += '</td>';
			table += '<td>';
			table += item['nation_id'];
			table += '</td>';
			table += '<td>';
			table += item['ingredient'];
			table += '</td>';
			table += '<td>';
			table += item['content'];
			table += '</td>';
			table += '<td>';
			table += item['attention'];
			table += '</td>';
			table += '<td>';
			table += item['quantity'];
			table += '</td>';
			table += '<td>';
			table += '<a href="/demo/backend/products-edit/'+item['id']+'" class="btn btn-info btn-del" >Sửa</a>';
			table += '</td>'
			table += '<td>'
			table += '<button type="button" class="btn btn-danger btn-del" onclick="btnDelPro('+item['id']+')">';
			table += 'Xóa';
			table += '</button>';
			table += '</td>';
			table += '</tr>';
		})
		$("#tbody-products").append(table);
	}
});
}



$("#btn-products-create-res").click(function(){
	var name = $("input[name='name']").val();
	var price = $("input[name='price']").val();
	var cat_id = $("select[name='cat_id']").val();
	var unit_id = $("select[name='unit_id']").val();
	var nation_id = $("select[name='nation_id']").val();
	var images1 = $("input[name='images1']").val();
	var images2 = $("input[name='images2']").val();
	var ingredient = $("input[name='ingredient']").val();
	var uses = $("input[name='uses']").val();
	var content = $("input[name='content']").val();
	var using = $("input[name='using']").val();
	var attention = $("input[name='attention']").val();

	var token = $("input[name='_token']").val();

	$.ajax({
	   url:'/demo/api/create-products',
	   method: "POST",
	   dataType: "json",
	   enctype: 'multipart/form-data',
	   data: {name:name,price:price,nation_id:nation_id,cat_id:cat_id,images1:images1,images2:images2,ingredient:ingredient,uses:uses,content:content,using:using,attention:attention,unit_id:unit_id,_token:token},
	   success:function(res){
	   		if (res==1) {
				alert("Thêm mới thành công");
				location.href = "http://localhost:8080/demo/backend/products";
			}else{
				$(".error").html("them that bai");
			}
	   },
	   fail:function(res){
	   }
	});
});


function btnEditPro(id){
	var name = $("input[name='name']").val();
	var price = $("input[name='price']").val();
	var cat_id = $("select[name='cat_id']").val();
	var unit_id = $("select[name='unit_id']").val();
	var nation_id = $("select[name='nation_id']").val();
	var status = $("select[name='status']").val();
	var images1 = $("input[file='images1']").val();
	var images2 = $("input[name='images2']").val();
	var ingredient = $("input[name='ingredient']").val();
	var uses = $("input[name='uses']").val();
	var content = $("input[name='content']").val();
	var using = $("input[name='using']").val();
	var attention = $("input[name='attention']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
	   url:'/demo/api/update-products/'+id,
	   method: "PUT",
	   dataType: "json",
	   data: {name:name,price:price,cat_id:cat_id,nation_id:nation_id,status:status,images1:images1,images2:images2,ingredient:ingredient,uses:uses,content:content,using:using,attention:attention,unit_id:unit_id,_token:token},
	   success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/demo/backend/products";
			}else{
				alert("that bai");
			}
		}
	});
}

function btnDelPro(id) {
	$.ajax({
		url:'/demo/api/delete-products/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công");
			loadDataPro();
		}
	});
}
//thành
loadDataSupply();
function loadDataSupply(){
	$("#tbody-supply").empty();
$.ajax({
	url:'/demo/api/supply',
	method: "GET",
	dataType: "json",
	data:"",
	success:function(data){
		var table ="";
		$.each(data,function(i,item){
			table += '<tr>';
			table += '<td>';
			table += item['name'];
			table += '</td>';
			table += '<td>';
			table += item['phone'];
			table += '</td>';
			table += '<td>';
			table += item['address'];
			table += '</td>';
			table += '<td>';
			table += '<a href="/demo/backend/supply-edit/'+item['id']+'" class="btn btn-info btn-del" >Sửa</a>';
			table += '</td>';
			table += '<td>';
			table += '<button type="button" class="btn btn-danger btn-del" onclick="btnDelSupply('+item['id']+')">';
			table += 'Xóa';
			table += '</button>';
			table += '</td>';
			table += '</tr>';
		})
		$("#tbody-supply").append(table);
	}
});
}
$("#btn-supply-create-res").click(function(){
	var name = $("input[name='name']").val();
	var tax_code = $("input[name='tax_code']").val();
	var address = $("input[name='address']").val();
	var phone = $("input[name='phone']").val();
	var fax = $("input[name='fax']").val();
	var email = $("input[name='email']").val();
	var explain = $("input[name='explain']").val();
	var token = $("input[name='_token']").val();
	$.ajax({
		url:'/demo/api/create-supply',
		method: "POST",
		data: {name:name,tax_code:tax_code,explain:explain,email:email,address:address,phone:phone,fax:fax,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
				location.href = "http://localhost:8080/demo/backend/supply";
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
	});
});


function btnEditSupply(id){
	var tax_code = $("input[name='tax_code']").val();
	var name = $("input[name='name']").val();
	var address = $("input[name='address']").val();
	var phone = $("input[name='phone']").val();
	var fax = $("input[name='fax']").val();
	var email = $("input[name='email']").val();
	var explain = $("input[name='explain']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/demo/api/update-supply/'+id,
		method: "PUT",
		dataType: "json",
		data: {tax_code:tax_code,name:name,address:address,phone:phone,fax:fax,email:email,explain:explain,_token:token},
		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/demo/backend/supply";
			}else{
				alert("that bai");
			}
		}
	});
}

function btnDelSupply(id) {
	$.ajax({
		url:'/demo/api/delete-supply/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công");
			loadDataSupply();
		}
	});
}

//trường
loadDataCat();
function loadDataCat(){
	$("#tbody-category").empty();
	$.ajax({
		url:'/demo/api/category',
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
				table += item['name'];
				table += '</td>';
				table += '<td>';
				table += '<a href="/demo/backend/category-edit/'+item['id']+'" class="btn btn-app  bg-green" ><i class="fa fa-pencil"></i><span> Sửa</span></a>';
				table += '<button type="button" class="btn btn-app bg-red" onclick="btnDelCat('+item['id']+')">';
				table += '<i class="fa fa-trash"></i><span> Xóa</span>';
				table += '</button>';
				table += '</td>';
				table += '</tr>';
			})
			$("#tbody-category").append(table);
		}
	});
}
$("#btn-category-create-res").click(function(){
	var name = $("input[name='name']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/demo/api/create-category',
		method: "POST",
		data: {name:name,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
				location.href = "http://localhost:8080/demo/backend/category";
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
	});
});
function BtnAddCategory_Click() {
    var CatName = $("input[name = 'CatName']").val();
	var token = $("input[name='_token']").val();
    $.ajax({
		url:'/demo/api/create-category',
		method: "POST",
		data: {name:CatName,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
    })
}

function btnEditCat(id){
	var name = $("input[name='name']").val();
	var token = $("input[name='_token']").val();
	$.ajax({
		url:'/demo/api/update-category/'+id,
		method: "PUT",
		dataType: "json",
		data:{name:name,token:token},
		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/demo/backend/category";
			}else{
				alert("that bai");
			}
		}
	});
}

function btnDelCat(id) {
	$.ajax({
		url:'/demo/api/delete-category/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công");
			loadDataCat();
		}
	});
}

loadDataUnit();
function loadDataUnit(){
	$("#tbody-unit").empty();
	$.ajax({
		url:'/demo/api/unit',
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
				table += item['name'];
				table += '</td>';
				table += '<td>';
				table += '<a href="/demo/backend/unit-edit/'+item['id']+'" class="btn btn-app  bg-green" ><i class="fa fa-pencil"></i><span> Sửa</span></a>';
				table += '</td>';
				table += '</tr>';
			})
			$("#tbody-unit").append(table);
		}
	});
}

$("#btn-unit-create-res").click(function(){
	var name = $("input[name='name']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/demo/api/create-unit',
		method: "POST",
		data: {name:name,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
				location.href = "http://localhost:8080/demo/backend/unit";
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
	});
});
function BtnAddUnit_Click() {
    var UnitName = $("input[name = 'UnitName']").val();
	var token = $("input[name='_token']").val();
    $.ajax({
		url:'/demo/api/create-unit',
		method: "POST",
		data: {name:UnitName,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
    })
}


function btnEditUnit(id){
	var name = $("input[name='name']").val();
	var token = $("input[name='_token']").val();
	$.ajax({
		url:'/demo/api/update-unit/'+id,
		method: "PUT",
		dataType: "json",
		data:{name:name,_token:token},
		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/demo/backend/unit";
			}else{
				alert("Sửa thất bại");
			}
		}
	});
}
function btnDelUnit(id) {
	$.ajax({
		url:'/demo/api/delete-unit/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công");
			loadDataUnit();
		}
	});
}

loadDataNation();
function loadDataNation(){
	$("#tbody-nation").empty();
	$.ajax({
		url:'/demo/api/nation',
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
				table += item['name'];
				table += '</td>';
				table += '<td>';
				table += '<a href="/demo/backend/nation-edit/'+item['id']+'" class="btn btn-app  bg-green" ><i class="fa fa-pencil"></i><span> Sửa</span></a>';
				table += '</td>';
				table += '</tr>';
			})
			$("#tbody-nation").append(table);
		}
	});
}

$("#btn-nation-create-res").click(function(){
	var name = $("input[name='name']").val();
	var token = $("input[name='_token']").val();

	$.ajax({
		url:'/demo/api/create-nation',
		method: "POST",
		data: {name:name,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
				location.href = "http://localhost:8080/demo/backend/nation";
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
	});
});
function BtnAddNation_Click() {
    var NationName = $("input[name = 'NationName']").val();
	var token = $("input[name='_token']").val();
    $.ajax({
		url:'/demo/api/create-nation',
		method: "POST",
		data: {name:NationName,_token:token},
		dataType: "json",
		success:function(res){
			if (res==1) {
				alert("Thêm thành công");
			}else{
				$(".error").html("them that bai");
			}
		},
		fail:function(res){
		}
    })
}


function btnEditNation(id){
	var name = $("input[name='name']").val();
	var token = $("input[name='_token']").val();
	$.ajax({
		url:'/demo/api/update-nation/'+id,
		method: "PUT",
		dataType: "json",
		data:{name:name,_token:token},
		success:function(res){
			if (res == 1) {
				alert("Sửa thành công");
				location.href = "http://localhost:8080/demo/backend/nation";
			}else{
				alert("that bai");
			}
		}
	});
}
function btnDelNation(id) {
	$.ajax({
		url:'/demo/api/delete-nation/'+id,
		method: "DELETE",
		dataType: "json",
		success:function(res){
			alert("Xóa thành công");
			loadDataNation();
		}
	});
}
