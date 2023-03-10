$(document).on('click','#login_btn',function(e) {
	var username = $('#login_uname').val();
	var password = $('#login_pass').val();
	if(username!="" && password!=""){
		$.ajax({
			data: {
				type: 1,
				username: username,
				password: password		
			},
			type: "post",
			url: "action.php",
			beforeSend: function () {
			$("#login_btn").html("<i class='fas fa-spinner fa-spin text-uppercase'></i> Processing");
			$("#login_btn").prop('disabled', true);
			},
			success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					location.href = "index.php";
				}else if(dataResult.statusCode==201){
					Swal.fire({
						icon: 'warning',
						text: 'Username or password is Incorrect!'
					}).then(function(){
					$("#login_btn").html("<b>login</b>");
					$("#login_btn").prop('disabled', false); });
				}else if(dataResult.statusCode==202){
					Swal.fire({
						icon: 'error',
						text: 'No Account Found!'
					}).then(function(){
					$("#login_btn").html("<b>login</b>");
					$("#login_btn").prop('disabled', false); });
				}
			}
		});
	}else{
		Swal.fire({
			icon: 'warning',
			text: 'Please fill-out all fields !',
		})
	}
});


$(document).on('click','#profile_changepass_btn',function(e) {
	var id=$(this).attr("data-id");
	var name = $('#profile_username').val();
	var password = $('#profile_password').val();
	var new_password=$('#profile_password').val();
	$('#edit_profile_id').val(id);
	$('#edit_profile_username').val(name);
	$('#edit_profile_password').val(password);
	$('#edit_profile_new_password').val(new_password);
});


$(document).on('click','#edit_profile_account',function(e) {
var id = $('#edit_profile_id').val();
var username = $('#edit_profile_username').val();
var current_password = $('#edit_profile_password').val();
var new_password = $('#edit_profile_new_password').val();
	$.ajax({
		data: {
			type: 2,
			id: id,
			username: username,
			current_password: current_password,
			new_password: new_password
		},
		type: "post",
		url: "action.php",
		beforeSend: function () {
			$("#edit_profile_account").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
			$("#edit_profile_account").prop('disabled', true);
		},
		success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				Swal.fire({
					icon: 'success',
					text: 'Password successfully changed! ',
				}).then(function(){
					location.reload();
				}, 2000);
			}else if(dataResult.statusCode==201){
				Swal.fire({
						icon: 'error',
						title:'Attention!',
						text: 'Something went wrong'
					}).then(function(){
					$("#edit_profile_account").html("<i data-feather='save'></i>&nbsp;Save");
					$("#edit_profile_account").prop('disabled', false); });
			}else if(dataResult.statusCode==202){
				Swal.fire({
						icon: 'error',
						title:'Attention!',
						text: 'Incorrect Password'
					}).then(function(){
					$("#edit_profile_account").html("<i data-feather='save'></i>&nbsp;Save");
					$("#edit_profile_account").prop('disabled', false); });
			}
		}
	});
});

$(document).on('click','#profile_changedetails_btn',function(e) {
	var id=$(this).attr("data-id");
	var name = $('#profile_pharmaname').val();
	var email = $('#profile_email').val();
	var contact=$('#profile_contact').val();
	var address=$('#profile_address').val();
	var barangay=$('#profile_barangay').val();
	var city=$('#profile_city').val();
	var province=$('#profile_province').val();
	$('#edit_profdet_id').val(id);
	$('#edit_profdet_name').val(name);
	$('#edit_profdet_email').val(email);
	$('#edit_profdet_contact').val(contact);
	$('#edit_profdet_address').val(address);
	$('#edit_profdet_barangay').val(barangay);
	$('#edit_profdet_city').val(city);
	$('#edit_profdet_province').val(province);
});

$(document).on('click','#edit_profdet_account',function(e) {
	var ids=$('#edit_profdet_id').val();
	var names = $('#edit_profdet_name').val();
	var emails = $('#edit_profdet_email').val();
	var contacts=$('#edit_profdet_contact').val();
	var addresss=$('#edit_profdet_address').val();
	var barangays=$('#edit_profdet_barangay').val();
	var citys=$('#edit_profdet_city').val();
	var provinces=$('#edit_profdet_province').val();
	var username = $('#profile_username').val();
	var password = $('#profile_password').val();
	$.ajax({
		data: {
			type: 3,
			ids: ids,
			names: names,
			emails: emails,
			contacts: contacts,
			addresss: addresss,
			barangays: barangays,
			citys: citys,
			provinces:provinces,
			username: username,
			password: password
		},
		type: "post",
		url: "action.php",
		beforeSend: function () {
			$("#edit_profdet_account").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
			$("#edit_profdet_account").prop('disabled', true);
		},
		success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				Swal.fire({
					icon: 'success',
					text: 'Pharmacy details successfully changed! ',
				}).then(function(){
					location.reload();
				}, 2000);
			}else if(dataResult.statusCode==201){
				Swal.fire({
						icon: 'error',
						title:'Attention!',
						text: 'Something went wrong'
					}).then(function(){
					$("#edit_profdet_account").html("<i data-feather='save'></i>&nbsp;Save");
					$("#edit_profdet_account").prop('disabled', false); });
			}
		}
	});
});

$(document).on('click','#edit_product',function(e) {
	var id=$(this).attr("data-id");
	var brand=$(this).attr("data-brand");
	var id=$(this).attr("data-id");
	var generic=$(this).attr("data-generic");
	var type=$(this).attr("data-type");
	var price=$(this).attr("data-price");
	var stock=$(this).attr("data-stock");
	var description=$(this).attr("data-description");
	var image=$(this).attr("data-image");
	var imagePath = '../images/';
	var imageUrl = imagePath + image;
	$('#images').attr('src', imageUrl);
	$('#edit_product_id').val(id);
	$('#edit_product_bname').val(brand);
	$('#edit_product_gname').val(generic);
	$('#edit_product_prescription').val(type);
	$('#edit_product_price').val(price);
	$('#edit_product_stock').val(stock);
	$('#edit_product_description').val(description);
});

$(document).on("click", "#delete_product", function() { 
	var id = $(this).attr("data-id");
	var name = $(this).attr("data-name");
	Swal.fire({
	  	title: 'Are you sure?',
	  	text: "You want to delete this product?",
	  	icon: 'warning',
	  	showCancelButton: true,
        confirmButtonText: 'Yes!',
        cancelButtonText: 'No!',
        buttonsStyling: true
	}).then((result) => {
	  	if (result.value){
	  		$.ajax({
		   		url: 'action.php',
		    	type: 'POST',
		       	data: {
		       		type: 4,
		       		id: id,
					name: name
		       	},
		       	dataType: 'json'
		    })
		    .done(function(){
		     	Swal.fire({
	            icon: 'success',
	            text: 'Record Deleted!',
	        	}).then(function()
	     		{ location.reload(); }, 2000);
		    });
	  	}
	})
});

$(document).on('click','.display_product_details',function(e) {
	var id = $(this).attr("data-id");
	$.ajax({
		data: {
				type: 5,
				id: id
			},
		type: "post",
		url: "action.php",
		success: function(data){
			$('#display_product').modal('show');
			$('#display').html(data);
		}
	});
});

// $(document).on('click','#add_product_details',function(e) {
// var id =  $('#add_product_id').val();
// var brand = $('#add_product_bname').val();
// var generic = $('#add_product_gname').val();
// var prescription =  $('#add_product_prescription').val();
// var price =  $('#add_product_price').val();
// var stock =  $('#add_product_stock').val();
// var description = $('#add_product_description').val();
// var photo =  $('#add_product_image').val();
// var allFilled = true;
// $('.pharma').each(function() {
// 	if ($(this).val() == '') {
// 	allFilled = false;
// 	return false;
// 	}
// 	return true;
// });
// if (allFilled) {
// 	$.ajax({
// 		data: {
// 			type: 4,
// 			id: id,
// 			brand: brand,
// 			generic: generic,
// 			prescription: prescription,
// 			price: price,
// 			stock: stock,
// 			description: description,
// 			photo: photo
// 		},
// 		type: "post",
// 		url: "action.php",
// 		beforeSend: function () {
//         	$("#add_product_details").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
//         	$("#add_product_details").prop('disabled', true);
//     	},
// 		success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
// 				   text: 'New Product added successfully! ',
// 			   }).then(function(){
// 				   location.reload();
// 			   }, 2000);
// 			}else if(dataResult.statusCode==201){
// 			 Swal.fire({
//                         icon: 'error',
//                         title:'Attention!',
//                         text: 'Something went wrong'
//                     }).then(function(){
// 				   $("#add_product_details").html("<i data-feather='save'></i>&nbsp;Save");
//         		   $("#add_product_details").prop('disabled', false); });
// 			}
// 		}
// 	});
// }else{
//     Swal.fire({
//         icon: 'warning',
//         text: 'Please fill-out all fields !',
//     })
// }
// });
// $(document).on('click','#edit_pharma',function(e) {
// 	var id=$(this).attr("data-id");
// 	var name=$(this).attr("data-name");
// 	var email=$(this).attr("data-email");
// 	var number=$(this).attr("data-number");
// 	var address=$(this).attr("data-address");
// 	var barangay=$(this).attr("data-barangay");
// 	var city=$(this).attr("data-city");
// 	var province=$(this).attr("data-province");
// 	var subscription=$(this).attr("data-subscription");
// 	var start=$(this).attr("data-start");
// 	var end=$(this).attr("data-end");
// 	var username=$(this).attr("data-username");
// 	var password=$(this).attr("data-password");
// 	$('#edit_pharma_id').val(id);
// 	$('#edit_pharma_name').val(name);
// 	$('#edit_pharma_email').val(email);
// 	$('#edit_pharma_contact').val(number);
// 	$('#edit_pharma_address').val(address);
// 	$('#edit_pharma_barangay').val(barangay);
// 	$('#edit_pharma_province').val(city);
// 	$('#edit_pharma_city').val(province);
// 	$('#edit_pharma_subs').val(subscription);
// 	$('#edit_pharma_start').val(start);
// 	$('#edit_pharma_end').val(end);
// 	$('#edit_pharma_username').val(username);
// 	$('#edit_pharma_password').val(password);
// });

// $(document).on('click','#edit_pharma_details',function(e) {
// var id=$('#edit_pharma_id').val();
// var name=$('#edit_pharma_name').val();
// var email=$('#edit_pharma_email').val();
// var number=$('#edit_pharma_contact').val();
// var address=$('#edit_pharma_address').val();
// var barangay=$('#edit_pharma_barangay').val();
// var city=$('#edit_pharma_city').val();
// var province=$('#edit_pharma_province').val();
// var subscription=$('#edit_pharma_subs').val();
// var start=$('#edit_pharma_start').val();
// var end=$('#edit_pharma_end').val();
// var username=$('#edit_pharma_username').val();
// var password=$('#edit_pharma_password').val();
// var allFilled = true;
// $('.edit-pharma').each(function() {
//   if ($(this).val() == '') {
//     allFilled = false;
//     return false;
//   }
//     return true;
// });
// if (allFilled) {
// 		$.ajax({
// 			data: {
// 				type: 4,
// 				id: id,
// 				name: name,
// 				email: email,
// 				number: number,
// 				address: address,
// 				barangay: barangay,
// 				city: city,
// 				province: province,
// 				subscription: subscription,
// 				start: start,
// 				end: end,
// 				username: username,
// 				password: password
// 			},
// 			type: "post",
// 			url: "action.php",
// 			beforeSend: function () {
//                 	$("#update_pet_details").html("<i class='fas fa-spinner fa-spin'></i> Processing");
//                 	$("#update_pet_details").prop('disabled', true);
//             },
// 			success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
//                 	text: 'Record Updated Successfully!',
// 				    }).then(function(){
// 				    	location.reload();	
// 				    },500);
	            						
// 			}else if(dataResult.statusCode==201){
// 				Swal.fire({
// 	                icon: 'error',
// 	                text: 'Something went wrong!',
// 	            	})
// 			}
// 			}
// 		});
// 	}else{
// 		Swal.fire({
//                 icon: 'warning',
//                 text: 'Please fill-out all fields !',
//             })
// 	}
// });

// $(document).on("click", "#delete_pharma", function() { 
// 	var id = $(this).attr("data-id");
// 	Swal.fire({
// 	  	title: 'Are you sure?',
// 	  	text: "You want to delete this pharmacy?",
// 	  	icon: 'warning',
// 	  	showCancelButton: true,
//         confirmButtonText: 'Yes!',
//         cancelButtonText: 'No!',
//         buttonsStyling: true
// 	}).then((result) => {
// 	  	if (result.value){
// 	  		$.ajax({
// 		   		url: 'action.php',
// 		    	type: 'POST',
// 		       	data: {
// 		       		type: 5,
// 		       		id: id
// 		       	},
// 		       	dataType: 'json'
// 		    })
// 		    .done(function(){
// 		     	Swal.fire({
// 	            icon: 'success',
// 	            text: 'Record Deleted!',
// 	        	}).then(function()
// 	     		{ location.reload(); }, 2000);
// 		    });
// 	  	}

// 	})
// });

// $(document).on('click','#add_pet_details',function(e) {
// var pet_code = $('#add_pet_code').val();
// var pet_name = $('#add_pet_name').val();
// var pet_breed = $('#add_pet_breed').val();
// var pet_gender = $('#add_pet_gender').val();
// var pet_color = $('#add_pet_color').val();
// if(pet_name!="" && pet_breed!="" && pet_gender!="" && pet_color!="" ){
// 	$.ajax({
// 		data: {
// 			type: 1,
// 			pet_code: pet_code,
// 			pet_name: pet_name,
// 			pet_breed: pet_breed,
// 			pet_gender: pet_gender,
// 			pet_color: pet_color
// 		},
// 		type: "post",
// 		url: "action.php",
// 		beforeSend: function () {
//         	$("#add_pet_details").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
//         	$("#add_pet_details").prop('disabled', true);
//     	},
// 		success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
// 				   text: 'New Pet Record added successfully! ',
// 			   }).then(function(){
// 				   location.reload();
// 			   }, 2000);
// 			}else if(dataResult.statusCode==201){
// 			 Swal.fire({
//                         icon: 'error',
//                         title:'Attention!',
//                         text: 'Something went wrong'
//                     }).then(function(){
// 				   $("#add_pet_details").html("<i data-feather='save'></i>&nbsp;Save");
//         		   $("#add_pet_details").prop('disabled', false); });
// 			}
// 		}
// 	});
// }else{
//     Swal.fire({
//         icon: 'warning',
//         text: 'Please fill-out all fields !',
//     })
// }
// });

// $(document).on('click','#update_pet',function(e) {
// 	var ids=$(this).attr("data-id");
// 	var code=$(this).attr("data-code");
// 	var name=$(this).attr("data-name");
// 	var breed=$(this).attr("data-breed");
// 	var gender=$(this).attr("data-gender");
// 	var color=$(this).attr("data-color");
// 	$('#update_pet_id').val(ids);
// 	$('#update_pet_code').val(code);
// 	$('#update_pet_name').val(name);
// 	$('#update_pet_breed').val(breed);
// 	$('#update_pet_gender').val(gender);
// 	$('#update_pet_color').val(color);
// });

// $(document).on('click','#update_pet_details',function(e) {
// var id = $('#update_pet_id').val();
// var pet_code = $('#update_pet_code').val();
// var pet_name =  $('#update_pet_name').val();
// var pet_breed =  $('#update_pet_breed').val();
// var pet_gender =  $('#update_pet_gender').val();
// var pet_color =  $('#update_pet_color').val();
// if(pet_name!="" && pet_breed!="" && pet_gender!="" && pet_color!="" ){
// 		$.ajax({
// 			data: {
// 				type: 2,
// 				id: id,
// 				pet_code: pet_code,
// 				pet_name: pet_name,
// 				pet_breed: pet_breed,
// 				pet_gender: pet_gender,
// 				pet_color: pet_color
// 			},
// 			type: "post",
// 			url: "action.php",
// 			beforeSend: function () {
//                 	$("#update_pet_details").html("<i class='fas fa-spinner fa-spin'></i> Processing");
//                 	$("#update_pet_details").prop('disabled', true);
//             },
// 			success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
//                 	text: 'Record Updated Successfully!',
// 				    }).then(function(){
// 				    	location.reload();	
// 				    },500);
	            						
// 			}else if(dataResult.statusCode==201){
// 				Swal.fire({
// 	                icon: 'error',
// 	                text: 'Something went wrong!',
// 	            	})
// 			}
// 			}
// 		});
// 	}else{
// 		Swal.fire({
//                 icon: 'warning',
//                 text: 'Please fill-out all fields !',
//             })
// 	}
// });



// $(document).on('click','#add_schedule_details ',function(e) {
// var schedule_site = $('#add_schedule_site').val();
// var schedule_date = $('#add_schedule_date').val();
// var schedule_slot = $('#add_schedule_slot').val();
// if(schedule_site!="" && schedule_date!="" && schedule_slot!=""){
// 	$.ajax({
// 		data: {
// 			type: 4,
// 			schedule_site: schedule_site,
// 			schedule_date: schedule_date,
// 			schedule_slot: schedule_slot
// 		},
// 		type: "post",
// 		url: "action.php",
// 		beforeSend: function () {
//         	$("#add_schedule_details").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
//         	$("#add_schedule_details").prop('disabled', true);
//     	},
// 		success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
// 				   text: 'New Schedule added successfully! ',
// 			   }).then(function(){
// 				   location.reload();
// 			   }, 2000);
// 			}else if(dataResult.statusCode==201){
// 			 Swal.fire({
//                         icon: 'error',
//                         title:'Attention!',
//                         text: 'Something went wrong'
//                     }).then(function(){
// 				   $("#add_schedule_details").html("<i data-feather='save'></i>&nbsp;Save");
//         		   $("#add_schedule_details").prop('disabled', false); });
// 			}else if(dataResult.statusCode==202){
// 			 Swal.fire({
//                         icon: 'error',
//                         title:'Attention!',
//                         text: 'Schedule Date must be greater than or equal to Date today!'
//                     }).then(function(){
// 				   $("#add_schedule_details").html("<i data-feather='save'></i>&nbsp;Save");
//         		   $("#add_schedule_details").prop('disabled', false); });
// 			}
// 		}
// 	});
// }else{
//     Swal.fire({
//         icon: 'warning',
//         text: 'Please fill-out all fields !',
//     })
// }
// });

// $(document).on('click','#update_schedule',function(e) {
// 	var ids=$(this).attr("data-id");
// 	var site=$(this).attr("data-name");
// 	var date=$(this).attr("data-date");
// 	var slot=$(this).attr("data-slot");
// 	$('#update_schedule_id').val(ids);
// 	$('#update_schedule_site').val(site);
// 	$('#update_schedule_date').val(date);
// 	$('#update_schedule_slot').val(slot);
// });

// $(document).on('click','#update_schedule_details',function(e) {
// var id = $('#update_schedule_id').val();
// var schedule_site = $('#update_schedule_site').val();
// var schedule_date =  $('#update_schedule_date').val();
// var schedule_slot =  $('#update_schedule_slot').val();
// if(schedule_site!="" && schedule_date!="" && schedule_slot!=""){
// 		$.ajax({
// 			data: {
// 				type: 5,
// 				id: id,
// 				schedule_site: schedule_site,
// 				schedule_date: schedule_date,
// 				schedule_slot: schedule_slot
// 			},
// 			type: "post",
// 			url: "action.php",
// 			beforeSend: function () {
//                 	$("#update_schedule_details").html("<i class='fas fa-spinner fa-spin'></i> Processing");
//                 	$("#update_schedule_details").prop('disabled', true);
//             },
// 			success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
//                 	text: 'Schedule Updated Successfully!',
// 				    }).then(function(){
// 				    	location.reload();	
// 				    },500);
	            						
// 			}else if(dataResult.statusCode==201){
// 				Swal.fire({
// 	                icon: 'error',
// 	                text: 'Something went wrong!',
// 	            	})
// 			}else if(dataResult.statusCode==202){
// 			 Swal.fire({
//                         icon: 'error',
//                         title:'Attention!',
//                         text: 'Schedule Date must be greater than or equal to Date today!'
//                     }).then(function(){
// 				   $("#update_schedule_details").html("<i data-feather='save'></i>&nbsp;Save");
//         		   $("#update_schedule_details").prop('disabled', false); });
// 			}
// 			}
// 		});
// 	}else{
// 		Swal.fire({
//                 icon: 'warning',
//                 text: 'Please fill-out all fields !',
//             })
// 	}
// });

// $(document).on("click", "#delete_schedule", function() { 
// 	var ids=$(this).attr("data-id");
// 	Swal.fire({
// 	  	title: 'Are you sure?',
// 	  	text: "You want to delete this record",
// 	  	icon: 'warning',
// 	  	showCancelButton: true,
//         confirmButtonText: 'Yes!',
//         cancelButtonText: 'No!',
//         buttonsStyling: true
// 	}).then((result) => {
// 	  	if (result.value){
// 	  		$.ajax({
// 		   		url: 'action.php',
// 		    	type: 'POST',
// 		       	data: {
// 		       		type: 6,
// 		       		ids: ids
// 		       	},
// 		       	dataType: 'json'
// 		    })
// 		    .done(function(){
// 		     	Swal.fire({
// 	            icon: 'success',
// 	            text: 'Schedule Deleted!',
// 	        	}).then(function()
// 	     		{ location.reload(); }, 2000);
// 		    });
// 	  	}

// 	})
// });


// $(document).on('click','.display_details',function(e) {
// 	var id = $(this).attr("data-id");
// 	$.ajax({
// 		data: {
// 				type: 7,
// 				id: id
// 			},
// 		type: "post",
// 		url: "action.php",
// 		success: function(data){
// 				$('#display').html(data);
// 		}
// 	});
// });


// $(document).on("click", "#approve_request", function() { 
// 	var idd=$(this).attr("data-id");
// 	var name=$(this).attr("data-name");
// 	var email=$(this).attr("data-email");
// 	var code=$(this).attr("data-code");
// 	Swal.fire({
// 	  	title: 'Are you sure?',
// 	  	text: "You want to approved this request",
// 	  	icon: 'warning',
// 	  	showCancelButton: true,
//         confirmButtonText: 'Yes!',
//         cancelButtonText: 'No!',
//         buttonsStyling: true
// 	}).then((result) => {
// 	  	if (result.value){
// 	  		$.ajax({
// 		   		url: 'action.php',
// 		    	type: 'POST',
// 		       	data: {
// 		       		type: 8,
// 		       		idd: idd,
// 					name: name,
// 					email: email,
// 					code: code
// 		       	},
// 		       	dataType: 'json'
// 		    })
// 		    .done(function(){
// 		     	Swal.fire({
// 	            icon: 'success',
// 	            text: 'Approved!',
// 	        	}).then(function()
// 	     		{ location.reload(); }, 2000);
// 		    });
// 	  	}

// 	})
// });

// $(document).on("click", "#reject_request", function() { 
// 	var id=$(this).attr("data-id");
// 	var name=$(this).attr("data-name");
// 	var email=$(this).attr("data-email");
// 	Swal.fire({
// 	  	title: 'Are you sure?',
// 	  	text: "You want to reject this request",
// 	  	icon: 'question',
// 	  	showCancelButton: true,
//         confirmButtonText: 'Yes!',
//         cancelButtonText: 'No!',
//         buttonsStyling: true
// 	}).then((result) => {
// 	  	if (result.value){
// 	  		$.ajax({
// 		   		url: 'action.php',
// 		    	type: 'POST',
// 		       	data: {
// 		       		type: 9,
// 		       		id: id,
// 					name: name,
// 					email: email
// 		       	},
// 		       	dataType: 'json'
// 		    })
// 		    .done(function(){
// 		     	Swal.fire({
// 	            icon: 'success',
// 	            text: 'Rejected!',
// 	        	}).then(function()
// 	     		{ location.reload(); }, 2000);
// 		    });
// 	  	}

// 	})
// });

// $(document).on('click','#add_register_details',function(e) {
// var register_date = $('#register_date').val();
// var pet_name = $('#register_petname').val();
// var pet_breed = $('#register_petbreed').val();
// var pet_gender = $('#register_petgender').val();
// var pet_color = $('#register_petcolor').val();
// var first_name = $('#register_firstname').val();
// var middle_name = $('#register_middlename').val();
// var last_name = $('#register_lastname').val();
// var gender = $('#register_gender').val();
// var birthday = $('#register_birthday').val();
// var contact = $('#register_contact').val();
// var email = $('#register_email').val();
// var address = $('#register_address').val();
// var petbirthday = $('#register_petbirthday').val()
// var microchip = $('#register_microchip').val();

// if(pet_name!="" && pet_breed!="" && pet_gender!=""  && pet_color!=""  && first_name!=""  && middle_name!=""  && last_name!=""  && gender!="" && birthday!=""  && contact!=""  && email!=""  && address!=""  && microchip!="" ){
// 	$.ajax({
// 		data: {
// 			type: 10,
// 			register_date: register_date,
// 			pet_name: pet_name,
// 			pet_breed: pet_breed,
// 			pet_gender: pet_gender,
// 			pet_color: pet_color,
// 			first_name: first_name,
// 			middle_name: middle_name,
// 			last_name: last_name,
// 			gender: gender,
// 			birthday: birthday,
// 			contact: contact,
// 			email: email,
// 			address: address,
// 			petbirthday: petbirthday,
// 			microchip: microchip
// 		},
// 		type: "post",
// 		url: "action.php",
// 		beforeSend: function () {
//         	$("#add_register").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
//         	$("#add_register").prop('disabled', true);
//     	},
// 		success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
// 				   text: 'Pet record added successfully! ',
// 			   }).then(function(){
// 				   location.reload();
// 			   }, 2000);
// 			}else if(dataResult.statusCode==201){
// 			 Swal.fire({
//                         icon: 'error',
//                         title:'Attention!',
//                         text: 'Something went wrong'
//                     }).then(function(){
// 				   $("#add_register").html("<i data-feather='save'></i>&nbsp;Save");
//         		   $("#add_register").prop('disabled', false); });
// 			}
// 		}
// 	});
// }else{
//     Swal.fire({
//         icon: 'warning',
//         text: 'Please fill-out all fields !',
//     })
// }
// });

// $(document).on('click','#update_register',function(e) {
// 	var id = $(this).attr("data-id");
// 	var registration = $(this).attr("data-registrationdate");
// 	var lastname = $(this).attr("data-lastName");
// 	var firstname = $(this).attr("data-firstname");
// 	var middlename = $(this).attr("data-middlename");
// 	var gender = $(this).attr("data-gender");
// 	var birthday = $(this).attr("data-birthday");
// 	var contact = $(this).attr("data-contact");
// 	var email = $(this).attr("data-email");
// 	var address = $(this).attr("data-address");
// 	var petname = $(this).attr("data-petname");
// 	var petbreed = $(this).attr("data-petbreed");
// 	var petgender = $(this).attr("data-petbreed");
// 	var petcolor = $(this).attr("data-petcolor");
// 	var petbirthday = $(this).attr("data-petbirthday");
// 	var petsex = $(this).attr("data-petsex");
// 	var microchip = $(this).attr("data-microchip");
// 	$('#update_register_id').val(id);
// 	$('#update_register_date').val(registration);
// 	$('#update_register_petname').val(petname);
// 	$('#update_register_petbreed').val(petbreed);
// 	$('#update_register_petgender').val(petsex);
// 	$('#update_register_petcolor').val(petcolor);
// 	$('#update_register_petbirthday').val(petbirthday);
// 	$('#update_register_firstname').val(firstname);
// 	$('#update_register_middlename').val(middlename);
// 	$('#update_register_lastname').val(lastname);
// 	$('#update_register_gender').val(gender);
// 	$('#update_register_birthday').val(birthday);
// 	$('#update_register_contact').val(contact);
// 	$('#update_register_email').val(email);
// 	$('#update_register_address').val(address);
// 	$('#update_register_microchip').val(microchip);
// });

// $(document).on('click','#update_register_details',function(e) {
// var id = $('#update_register_id').val();
// var register_date = $('#update_register_date').val();
// var pet_name = $('#update_register_petname').val();
// var pet_breed = $('#update_register_petbreed').val();
// var pet_gender = $('#update_register_petgender').val();
// var pet_color = $('#update_register_petcolor').val();
// var pet_birthday = $('#update_register_petbirthday').val();
// var first_name = $('#update_register_firstname').val();
// var middle_name = $('#update_register_middlename').val();
// var last_name = $('#update_register_lastname').val();
// var gender = $('#update_register_gender').val();
// var birthday = $('#update_register_birthday').val();
// var contact = $('#update_register_contact').val();
// var email = $('#update_register_email').val();
// var address = $('#update_register_address').val();
// var microchip = $('#update_register_microchip').val();


// if(pet_name!="" && pet_breed!="" && pet_gender!=""  && pet_color!=""  && first_name!=""  && middle_name!=""  && last_name!=""  && gender!="" && birthday!=""  && contact!=""  && email!=""  && address!=""  && microchip!="" ){
// 	$.ajax({
// 		data: {
// 			type: 11,
// 			id: id,
// 			register_date: register_date,
// 			pet_name: pet_name,
// 			pet_breed: pet_breed,
// 			pet_gender: pet_gender,
// 			pet_color: pet_color,
// 			first_name: first_name,
// 			middle_name: middle_name,
// 			last_name: last_name,
// 			gender: gender,
// 			birthday: birthday,
// 			contact: contact,
// 			email: email,
// 			address: address,
// 			pet_birthday: pet_birthday,
// 			microchip: microchip
// 		},
// 		type: "post",
// 		url: "action.php",
// 		beforeSend: function () {
//         	$("#update_register_details").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
//         	$("#update_register_details").prop('disabled', true);
//     	},
// 		success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
// 				   text: 'Pet record updated successfully! ',
// 			   }).then(function(){
// 				   location.reload();
// 			   }, 2000);
// 			}else if(dataResult.statusCode==201){
// 			 Swal.fire({
//                         icon: 'error',
//                         title:'Attention!',
//                         text: 'Something went wrong'
//                     }).then(function(){
// 				   $("#update_register_details").html("<i data-feather='save'></i>&nbsp;Update");
//         		   $("#update_register_details").prop('disabled', false); });
// 			}
// 		}
// 	});
// }else{
//     Swal.fire({
//         icon: 'warning',
//         text: 'Please fill-out all fields !',
//     })
// }
// });


// $(document).on('click','.display_register_details',function(e) {
// 	// var id = $(this).attr("data-id");
// 	var petID = $(this).attr("data-petid");
// 	// $.ajax({
// 	// 	data: {
// 	// 			type: 12,
// 	// 			id: id
// 	// 		},
// 	// 	type: "post",
// 	// 	url: "action.php",
// 	// 	success: function(data){
// 	// 			$('#display_register').html(data);
// 	// 	}
// 	// });
// 	window.location.replace('petRegistration.php?id='+petID);	
// });

// $(document).on("click", "#delete_register", function() { 
// 	var id=$(this).attr("data-id");
// 	Swal.fire({
// 	  	title: 'Are you sure?',
// 	  	text: "You want to delete this record",
// 	  	icon: 'warning',
// 	  	showCancelButton: true,
//         confirmButtonText: 'Yes!',
//         cancelButtonText: 'No!',
//         buttonsStyling: true
// 	}).then((result) => {
// 	  	if (result.value){
// 	  		$.ajax({
// 		   		url: 'action.php',
// 		    	type: 'POST',
// 		       	data: {
// 		       		type: 13,
// 		       		id: id
// 		       	},
// 		       	dataType: 'json'
// 		    })
// 		    .done(function(){
// 		     	Swal.fire({
// 	            icon: 'success',
// 	            text: 'Record Deleted!',
// 	        	}).then(function()
// 	     		{ location.reload(); }, 2000);
// 		    });
// 	  	}

// 	})
// });

// $(document).on('click','#add_vaccination_details',function(e) {
// 	var petid=$(this).attr("data-id");
// 	var name=$(this).attr("data-name");
// 	$('#history_petid').val(petid);
// 	$('#history_petname').val(name);
// });

// $(document).on('click','#save_history',function(e) {
// var petid = $('#history_petid').val();
// var petname = $('#history_petname').val();
// var vaccinationsite = $('#history_vaccinationsite').val();
// var vaccinationdate = $('#history_vaccinationdate').val();
// if(petname!="" ){
// 	$.ajax({
// 		data: {
// 			type: 14,
// 			petid: petid,
// 			petname: petname,
// 			vaccinationsite: vaccinationsite,
// 			vaccinationdate: vaccinationdate
// 		},
// 		type: "post",
// 		url: "action.php",
// 		beforeSend: function () {
//         	$("#save_history").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
//         	$("#save_history").prop('disabled', true);
//     	},
// 		success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
// 				   text: 'Record added successfully! ',
// 			   }).then(function(){
// 				   location.reload();
// 			   }, 2000);
// 			}else if(dataResult.statusCode==201){
// 			 Swal.fire({
//                         icon: 'error',
//                         title:'Attention!',
//                         text: 'Something went wrong'
//                     }).then(function(){
// 				   $("#save_history").html("<i data-feather='save'></i>&nbsp;Save");
//         		   $("#save_history").prop('disabled', false); });
// 			}
// 		}
// 	});
// }else{
//     Swal.fire({
//         icon: 'warning',
//         text: 'Please fill-out all fields !',
//     })
// }
// });



// $(document).on('click','#monitor',function(e) {
// var a = $(this).attr("data-id");
// var b = $(this).attr("data-req");
// window.location.replace('seed_monitoring.php?id='+a);	
// });

// $(document).on('click','.show_request',function(e) {
// 	var id = $(this).attr("data-id");
// 	$.ajax({
// 		data: {
// 				type: 5,
// 				id: id
// 			},
// 		type: "post",
// 		url: "action.php",
// 		success: function(data){
// 				$('#show').html(data);
// 		}
// 	});
// });

// $(document).on('click','#monitor_request',function(e) {
// var id = $(this).attr("data-id");
// var monitoring_id =  $('#monitoring_id').val(id);
// $('#monitoring_modal').modal('show');

// });

// $(document).on('click','#save_monitoring',function(e) {
// var monitoring_id =  $('#monitoring_id').val();
// var monitored_by =  $('#monitored_by').val();
// var monitoring_month =  $('#monitoring_month').val();
// var monitoring_production =  $('#monitoring_production').val();
// var monitoring_sales =  $('#monitoring_sales').val();
// var monitoring_consumption =  $('#monitoring_consumption').val();
// var monitoring_remarks =  $('#monitoring_remarks').val();
// if(monitoring_month !='' || monitoring_remarks !=''){
// 	$.ajax({
// 		data: {
// 				type: 6,
// 				monitoring_id: monitoring_id,
// 				monitored_by: monitored_by,
// 				monitoring_month: monitoring_month,
// 				monitoring_production: monitoring_production,
// 				monitoring_sales: monitoring_sales,
// 				monitoring_consumption: monitoring_consumption,
// 				monitoring_remarks: monitoring_remarks
// 			},
// 		type: "post",
// 		url: "action.php",
// 		success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
//                 	text: 'Saved Successfully!',
// 				    }).then(function(){
// 				    	location.reload();	
// 				    },500);
	            						
// 			}else if(dataResult.statusCode==201){
// 				Swal.fire({
// 	                icon: 'error',
// 	                text: 'Something went wrong!',
// 	            	})
// 			}else if(dataResult.statusCode==202){
// 				Swal.fire({
// 	                icon: 'error',
// 	                text: 'You have already monitored this request in the seleted month!',
// 	            	})
// 			}
// 		}
// 	});
// }else{
// 	Swal.fire({
//     icon: 'warning',
//     text: 'Please fill-out all fields !'
// 	})
// }
// });

// $(document).on('click','.show_monitoring',function(e) {
// 	var id = $(this).attr("data-id");
// 	$.ajax({
// 		data: {
// 				type: 7,
// 				id: id
// 			},
// 		type: "post",
// 		url: "action.php",
// 		success: function(data){
// 				$('#show_remarks').html(data);
// 		}
// 	});
// });


// $(document).on('click','#add_user_details',function(e) {
// var user_code = $('#add_user_code').val();
// var user_fname = $('#add_user_fname').val();
// var user_lname = $('#add_user_lname').val();
// var user_brgy = $('#add_user_assign').val();
// var user_uname = $('#add_user_username').val();
// var user_pass = $('#add_user_pass').val();
// var user_level = $('#add_user_level').val();
// if(user_fname!="" && user_lname!="" && user_brgy!="" && user_uname!="" && user_level!=""){
// 	$.ajax({
// 		data: {
// 			type: 8,
// 			user_code: user_code,
// 			user_fname: user_fname,
// 			user_lname: user_lname,
// 			user_brgy: user_brgy,
// 			user_uname: user_uname,
// 			user_pass: user_pass,
// 			user_level: user_level
// 		},
// 		type: "post",
// 		url: "action.php",
// 		beforeSend: function () {
//         	$("#add_user_details").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
//         	$("#add_user_details").prop('disabled', true);
//     	},
// 		success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
// 				   text: 'New user added successfully! ',
// 			   }).then(function(){
// 				   location.reload();
// 			   }, 2000);
// 			}else if(dataResult.statusCode==201){
// 			 Swal.fire({
//                         icon: 'error',
//                         title:'Attention!',
//                         text: 'Something went wrong'
//                     }).then(function(){
// 				   $("#add_user_details").html("<i data-feather='save'></i>&nbsp;Save");
//         		   $("#add_user_details").prop('disabled', false); });
// 			}
// 		}
// 	});
// }else{
//     Swal.fire({
//         icon: 'warning',
//         text: 'Please fill-out all fields !',
//     })
// }
// });

// $(document).on("click", "#reject_request", function() { 
// 	var process_by=$(this).attr("data-process");
// 	var request_id=$(this).attr("data-id");
// 	var email=$(this).attr("data-email");
// 	var name=$(this).attr("data-name");
// 	Swal.fire({
// 	  	title: 'Are you sure?',
// 	  	text: "You want to reject this request",
// 	  	icon: 'question',
// 	  	showCancelButton: true,
//         confirmButtonText: 'Yes!',
//         cancelButtonText: 'No!',
//         buttonsStyling: true
// 	}).then((result) => {
// 	  	if (result.value){
// 	  		$.ajax({
// 		   		url: 'action.php',
// 		    	type: 'POST',
// 		       	data: {
// 		       		type: 9,
// 		       		process_by: process_by,
// 					request_id: request_id,
// 					email: email,
// 					name: name
// 		       	},
// 		       	dataType: 'json'
// 		    })
// 		    .fail(function(){
// 		     	Swal.fire({
// 	            icon: 'success',
// 	            text: 'Rejected!',
// 	        	}).then(function()
// 	     		{ location.reload(); }, 2000);
// 		    });
// 	  	}

// 	})
// });

// $(document).on('click','#update_user',function(e) {
// 	var id=$(this).attr("data-id");
// 	var fname=$(this).attr("data-fname");
// 	var lname=$(this).attr("data-lname");
// 	var brgy=$(this).attr("data-brgy");

// 	$('#update_user_id').val(id);
// 	$('#update_user_fname').val(fname);
// 	$('#update_user_lname').val(lname);
// 	$('#update_user_brgy').val(brgy);
// });

// $(document).on('click','#update_user_details',function(e) {
// var id = $('#update_user_id').val();
// var user_fname = $('#update_user_fname').val();
// var user_lname = $('#update_user_lname').val();
// var user_brgy =  $('#update_user_brgy').val();
// if(user_fname!="" && user_lname!="" && user_brgy!=""){
// 		$.ajax({
// 			data: {
// 				type: 10,
// 				id: id,
// 				user_fname: user_fname,
// 				user_lname: user_lname,
// 				user_brgy: user_brgy
// 			},
// 			type: "post",
// 			url: "action.php",
// 			beforeSend: function () {
//                 	$("#update_user_details").html("<i class='fas fa-spinner fa-spin'></i> Processing");
//                 	$("#update_user_details").prop('disabled', true);
//             },
// 			success: function(dataResult){
// 			var dataResult = JSON.parse(dataResult);
// 			if(dataResult.statusCode==200){
// 				Swal.fire({
// 					icon: 'success',
//                 	text: 'Record Updated Successfully!',
// 				    }).then(function(){
// 				    	location.reload();	
// 				    },500);
	            						
// 			}else if(dataResult.statusCode==201){
// 				Swal.fire({
// 	                icon: 'error',
// 	                text: 'Something went wrong!',
// 	            	})
// 			}
// 			}
// 		});
// 	}else{
// 		Swal.fire({
//                 icon: 'warning',
//                 text: 'Please fill-out all fields !',
//             })
// 	}
// });