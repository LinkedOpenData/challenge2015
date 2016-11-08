<?php

namespace Concrete\Core\Page\Type\Composer\Control\CorePageProperty;

use Core;
use Page;

class DescriptionCorePageProperty extends CorePageProperty
{
    public function __construct()
    {
        $this->setCorePagePropertyHandle('description');
        $this->setPageTypeComposerControlName(tc('PageTypeComposerControlName', 'Description'));
        $this->setPageTypeComposerControlIconSRC(ASSETS_URL . '/attributes/textarea/icon.png');
    }

    public function publishToPage(Page $c, $data, $controls)
    {
        $this->addPageTypeComposerControlRequestValue('cDescription', $data['description']);
        parent::publishToPage($c, $data, $controls);
    }

    public function validate()
    {
        $e = Core::make('helper/validation/error');
        if (!$this->getPageTypeComposerControlDraftValue()) {
            $e->add(t('You must specify a page description.'));

            return $e;
        }
    }

    public function getRequestValue($args = false)
    {
        $data = parent::getRequestValue($args);
        $data['description'] = Core::make('helper/security')->sanitizeString($data['description']);

        return $data;
    }

    public function getPageTypeComposerControlDraftValue()
    {
        if (is_object($this->page)) {
            $c = $this->page;

            return $c->getCollectionDescription();
        }
    }
}
