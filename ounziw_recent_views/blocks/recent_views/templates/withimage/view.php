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
    <div class="recent_views" data-num="<?php  echo intval($num_of_views) ;?>" data-template="recent_views<?php echo $bID;?>" data-title="headertitle" data-listclass="viewhistory" data-noimg=""></div>
    <script type="text/html" id="recent_views<?php echo $bID;?>">
        <div class="recent_views_image">
            <img src="<%- thumbnail %>">
        </div>

        <div class="recent_views_text">
            <a href="<%- url %>" target="_self"><%- title %></a>
            <p><%- description %></p>
        </div>
    </script>
<?php  }
