$(document).on('click','#report_submit',function(e) {
var email = $('#report_email').val();
var name = $('#report_name').val();
var message = $('#report_message').val();
if(email!="" && name!="" && message!=""){
	$.ajax({
		data: {
			type: 1,
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