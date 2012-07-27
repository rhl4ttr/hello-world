<form name="batch_form" id="batch_form" method="post" action="/admin/batch/create">
 
<table id="formTable" border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="heading_bar" colspan="2">CREATE BATCH</td>
	</tr>

	<tr>		
		<td><span class="setting_title">Code</span><br>
		<span class="setting_title_exp">Unique Batch Code</span></td>		
		<td><div><input name="batch_code" id="batch_code" size="30" maxlength="50" value="" type="text" /></div></td>
			
	</tr>

	<tr>
		<td><span class="setting_title">Start From</span></td>
		<td><div><input name="batch_start_date" id="batch_start_date" size="30" maxlength="50" value="" type="text" /></div></td>
	</tr>
	<tr>
		<td><span class="setting_title">Completion Date</span></td>
		<td><div><input name="batch_end_date" id="batch_end_date" size="30" maxlength="50" value="" type="text" /></div></td>
	</tr>
	
	<tr>
		<td><span class="setting_title">Location</span></td>
		<td><div><input name="batch_location" id="batch_location" size="30" maxlength="50" value="" type="text" /></div></td>
	</tr>
	
	<tr>
		<td><span class="setting_title">Comments</span></td>
		<td><div><textarea id="batch_remarks" name="batch_remarks" rows="5" style="width:70%;"></textarea></div></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Submit"></td>
 	</tr>
</table>

</form>








</table>

<script type="text/javascript">
<!--
toggleFormRows();



window.batchVars = ["batch_code", "batch_start_date", "batch_end_date", "batch_location", "batch_remarks"];

<?php 

echo 'window.batchValues = '.json_encode($_POST).';';




if(!empty($this->errors)){


echo 'window.batchSubmitResults = '.json_encode($this->errors).';';

echo <<<EOD

$(window.batchVars).each(function(){
$("#"+this).attr("value", window.batchValues[this]);
});
				
				
$(window.batchSubmitResults).each(function(){
$("#"+this.el).parent().append("<div class='field_error'>"+this.msg+"</div>");
});

EOD;


}

?>
//-->
</script>