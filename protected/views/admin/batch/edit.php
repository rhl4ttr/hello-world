<?php /* @var $batch Batch */ 

$batch = $data->batch;
?>
<div id="flash_message"></div>
<form name="batch_form" id="batch_form" method="post" action="/admin/batch/edit/id/<?php echo $batch->id; ?>">

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
		<td><div><?php 
		
		
		
$this->widget('zii.widgets.jui.CJuiDatePicker', 
	array(
		'name'=>'batch_start_date',
		'value'=>(!empty($batch->startDate)?date('d-m-Y', $batch->startDate):''),
		'options'=>array(
						'showAnim'=>'fold',
						'dateFormat'=>'dd-mm-yy',
		      			),
		'htmlOptions'=>array(
						'style'=>'height:20px;'
						)
		)
); 



?></div></td>
	</tr>
	<tr>
		<td><span class="setting_title">Completion Date</span></td>
		<td><div><?php 
		
		
		
$this->widget('zii.widgets.jui.CJuiDatePicker', 
	array(
		'name'=>'batch_end_date',
		'value'=>(!empty($batch->endDate)?date('d-m-Y', $batch->endDate):''),
		'options'=>array(
						'showAnim'=>'fold',
						'dateFormat'=>'dd-mm-yy',
		      			),
		'htmlOptions'=>array(
						'style'=>'height:20px;'
						)
		)
); 



?></div></td>
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



<script type="text/javascript">
<!--
toggleFormRows();



window.batchVars = ["batch_code", "batch_location", "batch_remarks"];

<?php





$values = 
array(

	"batch_code"=>$batch->code,
	"batch_start_date"=>date("d-m-Y", $batch->startDate),
	"batch_end_date"=>date("d-m-Y", $batch->endDate),
	"batch_location"=>$batch->location,
	"batch_remarks"=>$batch->comments

		

);

echo 'window.batchValues = '.json_encode($values).';';

echo <<<EOD

$(window.batchVars).each(function(){
	$("#"+this).attr("value", window.batchValues[this]);
});
EOD;


if(!empty($data->errors)){


echo 'window.batchSubmitResults = '.json_encode($data->errors).';';

echo <<<EOD


				
				
$(window.batchSubmitResults).each(function(){
$("#"+this.el).parent().append("<div class='field_error'>"+this.msg+"</div>");
});

EOD;


}elseif(Yii::app()->request->isPostRequest){
	echo '$("#flash_message").html("Batch has been saved successfully.");';
}

?>
//-->
</script>