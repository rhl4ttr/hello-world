<?php 

$evalCode = '$("#flash_message").html("");$("#batch_form .field_error").remove();';
$html = '';
$batchVars = array("batch_code", "batch_start_date", "batch_end_date", "batch_location", "batch_remarks");
$batchValues = array();
$errors = $data->errors;
$isPost = Yii::app()->request->isPostRequest;
$success = false;





if($isPost && !empty($errors)){	
	$batchValues = $_POST;
}elseif($isPost){
	$success = true;
	$batchValues = array();	
}



$showForm = $success || !$isPost;

if($showForm){
	
$evalCode .= '
		$("#content").html(this.html);
		toggleFormRows();
		$("#batch_form").submit(myformsubmit);
		$("#batch_start_date").datepicker({showAnim:"fold",dateFormat:"dd-mm-yy"});
		$("#batch_end_date").datepicker({showAnim:"fold",dateFormat:"dd-mm-yy"});';
	
$html .= '
		<div id="flash_message"></div>
		
		<form name="batch_form" id="batch_form" method="post" action="/admin/batch/create">
 
<table id="formTable" border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td class="sub_title_bar" colspan="2">CREATE BATCH</td>
	</tr>

	<tr>		
		<td><span class="setting_title">Code</span><br>
		<span class="setting_title_exp">Batch Code</span></td>		
		<td><div><input name="batch_code" id="batch_code" size="30" maxlength="50" value="" type="text" /></div></td>
			
	</tr>

	<tr>
		<td><span class="setting_title">Start From</span></td>
		
		<td><div><input type="text" value="" name="batch_start_date" id="batch_start_date"/></div></td>
	</tr>
	<tr>
		<td><span class="setting_title">Completion Date</span></td>
		<td><div><input type="text" value="" name="batch_end_date" id="batch_end_date"/></div></td>
	</tr>
	
	<tr>
		<td><span class="setting_title">Location</span></td>
		<td><div><input name="batch_location" id="batch_location" size="30" maxlength="50" value="" type="text" /></div></td>
	</tr>
	
	<tr>
		<td><span class="setting_title">Comments</span></td>
		<td><div><textarea id="batch_remarks" name="batch_remarks" rows="5" style="width:50%;"></textarea></div></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Create Batch"></td>
 	</tr>
</table>

</form>








</table>';
}

if($success){
	$evalCode .= '$("#flash_message").html("Batch has been created successfully.");';
}else{
	$evalCode .= <<<EOD
		
		
			$(this.batchSubmitResults).each(function(){
	$("#"+this.el).parent().append("<div class='field_error'>"+this.msg+"</div>");
});
EOD;
}
$evalCode .= '
		var t = this;
$(this.batchVars).each(function(){
	$("#"+this).attr("value", t.batchValues[this]);
});';


echo CJSON::encode(array( "html"=>$html, "batchValues"=>$batchValues, "batchVars"=>$batchVars, "run"=>$evalCode, "batchSubmitResults"=>$errors));

?>