<?php
require_once 'Smarty\libs\Smarty.class.php';
use Smarty\Smarty;
/**
 * This class is responsible for initializing the Smarty template engine.
 * It sets the directories for the templates, configs, cache and compiled templates.
 */
class StartSmarty{
    /**
     * Starts Smarty and sets the directories
     * @return Smarty
     */
    static function configuration(){
        $smarty=new Smarty();
        $smarty->setTemplateDir('Smarty\templates');
        $smarty->setConfigDir('Smarty\templates_c');
        $smarty->setCompileDir('Smarty\configs');
        $smarty->setCacheDir('Smarty\cache');
        return $smarty;
    }
}