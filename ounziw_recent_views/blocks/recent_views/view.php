<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php 
if (!filter_var($num_of_views, FILTER_VALIDATE_INT)) {
    $num_of_views = 5;
}

$c = Page::getCurrentPage();
if ($c->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item"><?php  echo t('Recent Views Block is disabled in edit mode.')?></div>
<?php  } else {?>
    <div class="heading-types">
        <h2 class="left-border"><span><?php  echo t('Recently Viewed Pages');?></span></h2>
    </div>
    <div class="recent_views" data-num="<?php  echo intval($num_of_views) ;?>" data-title="title" data-listclass="viewhistory"></div>
<?php  }
