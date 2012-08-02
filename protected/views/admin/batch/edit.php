<?php /* @var $batch Batch */ 
$evalCode = '$("#flash_message").html("");$("#batch_form .field_error").remove();';

$batch = $data->batch;
$errors = $data->errors;
$batchVars = array("batch_code", "batch_location", "batch_remarks");
$values = array(
		"batch_code"=>$batch->code,
		"batch_start_date"=>date("d-m-Y", $batch->startDate),
		"batch_end_date"=>date("d-m-Y", $batch->endDate),
		"batch_location"=>$batch->location,
		"batch_remarks"=>$batch->comments
);
$success = false;

$isPost = Yii::app()->request->isPostRequest;





if($isPost && empty($data->errors)){
	$success = true;
	$batchValues = array();
}


$showForm = !$isPost;


$html = '';

if($showForm){
	
	
	$evalCode .= '
			$("#content").html(this.html);
			$("#batch_form").submit(myformsubmit);
			toggleFormRows();
			$("#batch_start_date").datepicker({showAnim:"fold",dateFormat:"dd-mm-yy"});
			$("#batch_end_date").datepicker({showAnim:"fold",dateFormat:"dd-mm-yy"});';

$html .= '
<div id="flash_message"></div>
<form name="batch_form" id="batch_form" method="post" action="/admin/batch/edit/id/'. $batch->id .'">

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
		<td><div>';

		
		

$html .= '<input type="text" value="'.(!empty($batch->startDate)?date('d-m-Y', $batch->startDate):'').'" name="batch_start_date" id="batch_start_date"/>';


$html .= '</div></td>
	</tr>
	<tr>
		<td><span class="setting_title">Completion Date</span></td>
		<td><div>';
		 
		
		
$html .= '<input type="text" value="'.(!empty($batch->endDate)?date('d-m-Y', $batch->endDate):'').'" name="batch_end_date" id="batch_end_date"/>';


$html .= '</div></td>
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

</form>';


}

$evalCode .= '
		var t = this;
$(this.batchVars).each(function(){
	$("#"+this).attr("value", t.batchValues[this]);
});';



if($success){
	$evalCode .= '$("#flash_message").html("Batch has been saved successfully.");';
}else{
	$evalCode .= <<<EOD
	
		
$(this.batchSubmitResults).each(function(){
	$("#"+this.el).parent().append("<div class='field_error'>"+this.msg+"</div>");
});
	
	
EOD;
}




echo CJSON::encode(array("html"=>$html, "batchValues"=>$values, "batchVars"=>$batchVars, "run"=>$evalCode, "batchSubmitResults"=>$errors));

?>