<?php

 $this->renderPartial('/admin/header');
 
 echo '
 <div class="content_wrapper">';
 $this->renderPartial('/admin/leftmenu');
 echo '<div class="contentOuter" id="content">';
 
echo $content;


echo '</div>';
echo '</div>';


$this->renderPartial('/admin/footer');

echo '</body></html>';
?>