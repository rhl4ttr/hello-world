<?php /* @var $batch Batch */ 

$batch = $data->batch;

$errors =array();
$evalCode = '';


$html = '';

if(!Yii::app()->request->isPostRequest){
	
	
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




$batchVars = array("batch_code", "batch_location", "batch_remarks");
$values = array(
	"batch_code"=>$batch->code,
	"batch_start_date"=>date("d-m-Y", $batch->startDate),
	"batch_end_date"=>date("d-m-Y", $batch->endDate),
	"batch_location"=>$batch->location,
	"batch_remarks"=>$batch->comments
);



$evalCode .= <<<EOD
var cl = this;
$(this.batchVars).each(function(){
	$("#"+this).attr("value", cl.batchValues[this]);
});

$("#batch_form .field_error").remove();


EOD;


if(!empty($data->errors)){


	$errors = $data->errors;
	
	$evalCode .= <<<EOD
	
					
	$(this.batchSubmitResults).each(function(){
		$("#"+this.el).parent().append("<div class='field_error'>"+this.msg+"</div>");
	});
	
	
	$("#flash_message").html("");
	
	
EOD;


}elseif(Yii::app()->request->isPostRequest){
	$evalCode .= '$("#flash_message").html("Batch has been saved successfully.");';
}




echo CJSON::encode(array("html"=>$html, "batchValues"=>$values, "batchVars"=>$batchVars, "run"=>$evalCode, "batchSubmitResults"=>$errors));

?>