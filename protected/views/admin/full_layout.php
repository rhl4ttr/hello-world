<?php

 $this->renderPartial('/admin/header');
 
 echo '
 <div class="content_wrapper">';
 $this->renderPartial('/admin/moderator/leftmenu');
 echo '<div class="contentOuter" id="content">';
 
echo $content;

 echo '<iframe src="about:blank" frameborder="0" id="contentFrame" name="contentFrame" style="width:100%" scrolling="no"></iframe>';
echo '</div>';
echo '</div>';


$this->renderPartial('/admin/footer');

echo '</body></html>';
?>