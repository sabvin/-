$(document).ready(function(){
    
    $('.form-edit').on('click', '#updatePost', function(){
	var 
	    postName = $('#postName').val(),
	    postText = $('#postText').val(),
	    postId = $('#postId').val();

	$.ajax({
	   type: 'POST',
	   url: '/admin/updatePost/' + postId,
	   data: {
	       postName: postName,
	       postText: postText,
	       postId: postId
	   },
	    success: function(data){
		$('#result').text(data);
		$('#result').show();
		setTimeout(function() {
		    $('#result').hide();
		}, 1000);
	    },
	    error:function(){
		/*обработчик ошибок*/
	    }
       })
    })

})