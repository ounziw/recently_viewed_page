<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php 
echo t("Number of Views: (1 - 10)");
echo $form->number('num_of_views', $controller->num_of_views, array('min'=>1,'max'=>10));
?>
