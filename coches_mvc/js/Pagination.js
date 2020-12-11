$(document).ready(function(){
	var totalPage = parseInt($('#totalPages').val());	
	var pag = $('#pagination').simplePaginator({
		totalPages: totalPage,
		maxButtonsVisible: 5,
		currentPage: 1,
		nextLabel: 'Next',
		prevLabel: 'Prev',
		firstLabel: 'First',
		lastLabel: 'Last',
		clickCurrentPage: true,
		pageChange: function(page) {	
			alert("dentro") ;		
			$("#content").html('<tr><td colspan="6"><strong>loading...</strong></td></tr>');
            $.ajax({
				url:"index.php?con=modelo&ope=listar",
				method:"POST",
				dataType: "json",		
				data:{page:	page},
				success:function(responseData){
					$('#content').html(responseData.html);
				}
			});
		}
	});
});