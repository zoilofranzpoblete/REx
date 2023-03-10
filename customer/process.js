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

$(document).on('click','#register_btn',function(e) {
var fname = $('#register_fname').val();
var lname = $('#register_lname').val();
var contact = $('#register_contact').val();
var email = $('#register_email').val();
var address = $('#register_address').val();
var barangay = $('#register_brgy').val();
var city = $('#register_city').val();
var province = $('#register_province').val();
var username = $('#register_uname').val();
var password = $('#register_pass').val();
var confirm = $('#register_passconfirm').val();
var allFilled = true;
$('.register').each(function() {
  if ($(this).val() == '') {
    allFilled = false;
    return false;
  }
    return true;
});
if(allFilled){
	if(password == confirm){
		$.ajax({
			data: {
				type: 2,
					fname: fname,
					lname: lname,
					contact: contact,
					email: email,
					address: address,
					barangay: barangay,
					city: city,	
					province: province,
					username: username,
					password: password
			},
			type: "post",
			url: "action.php",
			beforeSend: function () {
				$("#register_btn").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
				$("#register_btn").prop('disabled', true);
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					Swal.fire({
						icon: 'success',
						text: 'Account created successfully! ',
					}).then(function(){
						location.reload();
					}, 2000);
				}else if(dataResult.statusCode==201){
					Swal.fire({
							icon: 'error',
							title:'Attention!',
							text: 'Something went wrong'
						}).then(function(){
						$("#register_btn").html("<b>Create Account</b>");
						$("#register_btn").prop('disabled', false); });
				}
			}
		});
	}else{
		Swal.fire({
			icon: 'warning',
			text: 'Password not match!',
		})
	}
	
}else{
	Swal.fire({
		icon: 'warning',
		text: 'Please fill-out all fields !',
	})
}
});

$(document).on('click','#report_submit',function(e) {
	var email = $('#report_email').val();
	var name = $('#report_name').val();
	var message = $('#report_message').val();
	if(email!="" && name!="" && message!=""){
		$.ajax({
			data: {
				type: 3,
					email: email,
					name: name,
					message: message	
			},
			type: "post",
			url: "action.php",
			beforeSend: function () {
				$("#report_submit").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
				$("#report_submit").prop('disabled', true);
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					Swal.fire({
						icon: 'success',
						text: 'Report sent successfully! ',
					}).then(function(){
						location.reload();
					}, 2000);
				}else if(dataResult.statusCode==201){
					Swal.fire({
							icon: 'error',
							title:'Attention!',
							text: 'Something went wrong'
						}).then(function(){
						$("#report_submit").html("<b>Send Message</b>");
						$("#report_submit").prop('disabled', false); });
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

$(document).on('click','#add_cart_btn',function(e) {
var productID = $('#product_id').val();
var pharmaID = $('#product_pharmaID').val();
var customerID = $('#product_customerID').val();
var image = $('#product_image').val();
var brand = $('#product_brand').val();
var price = $('#product_price').val();
var quantity = $('#product_quantity').val();
if(quantity >= 1){
	$.ajax({
		data: {
			type: 4,
				productID: productID,
				pharmaID: pharmaID,
				customerID: customerID,
				image: image,
				brand: brand,
				price: price,
				quantity: quantity	
		},
		type: "post",
		url: "action.php",
		beforeSend: function () {
			$("#add_cart_btn").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
			$("#add_cart_btn").prop('disabled', true);
		},
		success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				Swal.fire({
					icon: 'success',
					text: 'Added to cart! ',
				}).then(function(){
					location.href = "shop.php?id="+pharmaID;
				}, 2000);
			}else if(dataResult.statusCode==201){
				Swal.fire({
						icon: 'error',
						title:'Attention!',
						text: 'Something went wrong'
					}).then(function(){
					$("#add_cart_btn").html("Add To Cart");
					$("#add_cart_btn").prop('disabled', false); });
			}
		}
	});
}else{
	Swal.fire({
		icon: 'warning',
		text: 'Quantity must not less than or equal to 0',
	})
}
});
	
$(document).on('click','#remove_cart',function(e) {
var id = $(this).attr("data-id");
var product = $(this).attr("data-product");
var quantity = $(this).attr("data-quantity");
	$.ajax({
		data: {
			type: 5,
			id: id,
			product: product,
			quantity: quantity
		},
		type: "post",
		url: "action.php",
		beforeSend: function () {
			$("#remove_cart").html("<i class='fas fa-spinner fa-spin'></i>&nbsp;Processing");
			$("#remove_cart").prop('disabled', true);
		},
		success: function(dataResult){
			var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				Swal.fire({
					icon: 'success',
					text: 'Item Removed! ',
				}).then(function(){
					location.reload();
				}, 2000);
			}else if(dataResult.statusCode==201){
				Swal.fire({
					icon: 'error',
					title:'Attention!',
					text: 'Something went wrong'
				})
			}
		}
	});
});

$(document).on('click','#update_cart',function(e) {
	var id = $(this).attr("data-id");
	var product = $(this).attr("data-product");
	var quantity = $(this).attr("data-quantity");
		$.ajax({
			data: {
				type: 6,
				id: id,
				product: product,
				quantity: quantity
			},
			type: "post",
			url: "action.php",
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					location.reload();
				}else if(dataResult.statusCode==201){
					Swal.fire({
						icon: 'error',
						title:'Attention!',
						text: 'Something went wrong'
					})
				}
			}
		});
	});
