console.log('connected');

// $(document).ready(function(){
// 	getProfile();
// 	$('#product-table').DataTable({
// 		responsive: true,
// 		autoWidth: false,
// 		searching:false,
// 		paging:false,
// 	})
	
	$('#submit').click(function(event){
		event.preventDefault();
		// var formData = $("#add-product-form").serialize();
		// console.log(formData);
		var productform = document.querySelector("#add-product-form");
		$.ajax({
			method :"POST",
			processData:false,
			contentType: false,
			dataType:'json',
			url: "addProfile.php",
			data: new FormData(productform),
		}).done(function(data){
			console.log(data);
			//Doc lại danh sách sản phẩm
			//Đóng modal
			//$('#myModal').modal('toggle');

			//Xóa trống input
			//$('#myModal input').val('');
			//$('#myModal #description').html('');
			
			

		}).fail(function(jqXHR, statusText, errorThrown){
			console.log("Fail :"+jqXHR.responseText);
			console.log(errorThrown);
		})
	})
	
	// ---------------------------------test upload picture----------------------------------
	function loadImage(input){
	if (input.file && input.file[0]) {
		var reader = new FileReader();
		reader.onload = function(e){
			$("#image-input").attr("src",e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}

$("#image-input").change(function(){
	loadImage(this);
})
	// ---------------------------------test upload picture----------------------------------

// -----------------------------timeline-----------------------------

// -----------------------------timeline-----------------------------