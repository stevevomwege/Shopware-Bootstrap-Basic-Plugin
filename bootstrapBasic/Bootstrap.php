<?php
use Doctrine\Common\Collections\ArrayCollection;
class Shopware_Plugins_Frontend_bootstrapBasic_Bootstrap extends Shopware_Components_Plugin_Bootstrap

{
    /**
     * @return array
     */
    public function getInfo()
    {
        return [
            'version' => '1.0.0',
            'label' => 'Bootstrap Basic',
            'author' => 'Stee vom Wege | VOM WEGE GmbH'
        ];
    }

    /**
     * @param string $version
     * @return array|bool
     */
    public function update($version)
    {
        if ($version === '1.0.0') {

        }
        return true;
    }

    public function install()
    {
        $this->subscribeEvent(
            'Enlight_Controller_Action_PreDispatch_Frontend',
            'onActionPreDispatchFrontend'
            );

        $this->subscribeEvent(
            'Theme_Compiler_Collect_Plugin_Less',
            'addLessFiles'
        );

        $this->subscribeEvent(
            'Theme_Compiler_Collect_Plugin_Javascript',
            'addJsFiles'
        );

        return true;
    }

    public function onActionPreDispatchFrontend(Enlight_Event_EventArgs $args)
    {
        /** @var \Shopware_Controllers_Frontend_Listing $subject */
        $subject = $args->getSubject();

        $subject->View()->addTemplateDir($this->Path() . 'Views/');
    }

    public function addLessFiles(Enlight_Event_EventArgs $args) {
        $less = new \Shopware\Components\Theme\LessDefinition(
            array(),
            array(
                __DIR__ . '/Views/Resources/less/steve.less'
            ),
            __DIR__
        );
        return new Doctrine\Common\Collections\ArrayCollection(array($less));
    }

    public function addJsFiles(Enlight_Event_EventArgs $args) {
        $jsFiles = array(__DIR__ . '/Views/Resources/js/steve.js');
        return new Doctrine\Common\Collections\ArrayCollection($jsFiles);
    }
    
    public function uninstall()
    {
        return true;
    }

    public function enable()
    {
        return parent::enable();
    }

    public function disable()
    {
        return parent::disable();
    }

}
