<?php 
namespace Concrete\Package\OunziwRecentViews\Block\RecentViews;

use \Concrete\Core\Block\BlockController;
use Core;
class Controller extends BlockController {

    protected $btTable = 'btRecentViews';
    protected $btInterfaceWidth = '300';
    protected $btInterfaceHeight = '200';
    protected $btDefaultSet = 'navigation';
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = false;
    protected $btCacheBlockOutputLifetime = 0; //until manually updated or cleared

    public function getBlockTypeDescription()
    {
        return t("Displays a vistor's recent views history. Note: Do not put two or more blocks on the same page.");
    }

    public function getBlockTypeName()
    {
        return t("Recent Views");
    }

    public function view()
    {

        $this->set('num_of_views', $this->num_of_views);

    }

    public function validate($args)
    {
        $e = Core::make('helper/validation/error');
        $options = array(
            'min_range' => 1,
            'max_range' => 10
        );
        if(!filter_var($args['num_of_views'], FILTER_VALIDATE_INT, $options)) {
            $e->add(t('Number of Posts must be between 1 and 10.'));
        }
        return $e;
    }
    
    public function save($data)
    {
        $args['num_of_views'] = (int) $data['num_of_views'];
        parent::save($args);
    }
}
