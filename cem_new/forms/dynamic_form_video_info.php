<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<?php
echo<<<HTML
        <div class="container-fluid">
                <div class="form-group">
                        <form name="add_video" id="add_video">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td><input type="text" name="label[]" placeholder="Enter your Label" class="form-control name_list" /></td>
                                        <td><input type="text" name="detail[]" placeholder="Enter your Detail" class="form-control name_list" /></td>
                                        <td><button type="button" name="add_info" id="add_info" class="btn btn-info">Add More Info</button>
                                        </td>
                                    </tr>
                                </table>
                            <input type="button" name="submit" id="submit" class="btn btn-success" value="Submit" />
                        </div>
                    </form>
                </div>           
            </div>
HTML;

?>

<script>
$(document).ready(function(){
	var i=1;
	$('#add_info').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" id = "label[]" name="label[]" placeholder="Enter your Label" class="form-control name_list" /></td>' +
            '<td><input type="text" id = "detail[]" name="detail[]" placeholder="Enter your Detail" class="form-control name_list" /></td>' +
            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){
	    var labels = $("#label[]").val();
	    alert ( $("#label[]").val());
		$.ajax({
			url:"forms/add_video_form.php",
			method:"POST",
			data:$('#add_video').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_video')[0].reset();
			}
		});
	});
         
	
});
</script>