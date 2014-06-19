$(function(){
	$('input:eq(0)').focus();
});

$('form.post').on('submit', function(){
	var that = $(this),
		url = that.attr('action'),
		type = that.attr('method'),
		data = {};

	that.find('[name]').each(function(index, value){
		var that = $(this),
			name = that.attr('name'),
			value  = that.val();

		data[name] = value;
	});


	$.ajax({
		url: url,
		type: type,
		data: data,
		success: function(response){
			if (response == 'blank_field') {
				$('div:eq(1)').addClass('alert').text('Please fill all the blank');
			} else {
				$('.section').load('post.php');
				$("input[type=text], textarea, input[type=email]").val("");
				$('div:eq(1)').addClass('success').text('The insert is done!');
			}
		}
	});

	return false;
});