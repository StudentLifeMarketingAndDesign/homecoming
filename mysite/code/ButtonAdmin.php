<?php

use SilverStripe\Forms\GridField\GridFieldFilterHeader;
use Colymba\BulkUpload\BulkUploader;
use Colymba\BulkManager\BulkManager;
use SilverStripe\Admin\ModelAdmin;

class ButtonAdmin extends ModelAdmin {
  private static $managed_models = array('Button'); // Can manage multiple models
  private static $url_segment = 'buttons'; // Linked as /admin/products/
  private static $menu_title = 'Button Archive';

  public function getEditForm($id = null, $fields = null) {
        $form = parent::getEditForm($id, $fields);
        $gridField = $form->Fields()->fieldByName($this->sanitiseClassName($this->modelClass));
        $gridField->getConfig()->addComponent(new GridFieldFilterHeader());
        $gridField->getConfig()->addComponent(new BulkUploader());
        $gridField->getConfig()->addComponent(new BulkManager());

        return $form;
    }

}