<?php 
namespace Concrete\Package\OunziwRecentViews;

use BlockType;
use Events;
use View;
use Core;
use Page;
use Loader;
use Concrete\Core\Asset\AssetList;

defined('C5_EXECUTE') or die("Access Denied.");

class Controller extends \Concrete\Core\Package\Package {

    protected $pkgHandle = 'ounziw_recent_views';
    protected $appVersionRequired = '5.7.5';
    protected $pkgVersion = '1.0';

    public function getPackageDescription() {
        return t("Visitors views will be stored in his/her localstorage. The Recent Views block will display his/her recent views.");
    }

    public function getPackageName() {
        return t("Recent Views");
    }

    public function install() {
        $pkg = parent::install();
        BlockType::installBlockTypeFromPackage('recent_views', $pkg);
    }

    public function uninstall() {
        parent::uninstall();
        $db = Loader::db();
        $db->Execute('DROP TABLE btRecentViews');
    }

    public function on_start() {
        Events::addListener('on_page_view', array($this,'on_page_view'));
    }

    public function on_page_view(){
        $this->registerjs();

        $c = Page::getCurrentPage();
        $dh = Core::make('helper/concrete/dashboard');
        if ($c->getCollectionPath() != '/login' && $c->getCollectionPath() != '/register' && mb_substr($c->getCollectionPath(),0,8) != '/account' && !$dh->inDashboard()) {
            $v = View::getInstance();
            $v->requireAsset('javascript', 'jquery');
            $v->requireAsset('javascript-inline', 'recent_views_record');
            $v->requireAsset('javascript', 'recent_views_record');
        }
    }
    protected function registerjs() {
        $al = AssetList::getInstance();
        $al->register(
            'javascript', 'recent_views_record', 'js/record.js', array(), $this->pkgHandle
        );
        $jsdata = $this->createPageDataJs();
        $al->register(
            'javascript-inline', 'recent_views_record', $jsdata, array(), $this->pkgHandle
        );
    }

    /**
     * pickups page data, and pass these data to javascript.
     * @return string
     */
    protected function createPageDataJs() {
        $json = Core::make('helper/json');
        $c = Page::getCurrentPage();
        $pagetitle =  $c->getCollectionName();
        $thumbnail_url = '';
        $thumbnail = $c->getAttribute('thumbnail');
        if (is_object($thumbnail) && !$thumbnail->isError()) {
            $thumbnail_url = $thumbnail->getURL();
        }
        $pageDescription = $c->getCollectionAttributeValue('meta_description');
        if (!$pageDescription) {
            $pageDescription = $c->getCollectionDescription();
        }

        $jsarray = array(
            'pagetitle' => $pagetitle,
            'thumbnail' => $thumbnail_url,
            'pagedescription' => $pageDescription,
        );
        $jsdata = 'var ounziw_recent_views = ' . $json->encode($jsarray) . ';';

        return $jsdata;
    }
}