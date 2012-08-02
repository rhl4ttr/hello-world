<?php


$evalCode = 'loadAjax2(this.url);';

echo CJSON::encode(array("url"=>"/".$this->id.'/list', "run"=> $evalCode));

?>