<?php

/**
* Released under GN/GPL License : http://www.gnu.org/copyleft/gpl.html
* Date: 7/04/14
* Time: 11:52 AM
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');
jimport('joomla.environment.response');

class plgSystemLoadCssFirst extends JPlugin 
{
    function onContentPrepare($context, &$row, &$params, $page = 0)
    {
        $document = JFactory::getDocument();
        $document->addStyleSheet(JURI::base(). "plugins/system/loadcssfirst/load.css");
        $document->addScript(JURI::base(). "plugins/system/loadcssfirst/load.js");
    }
    function onAfterRender()
    {
        $response = JResponse::getBody();
        $response = JString::str_ireplace('<body class="', '<body class="load ', $response);
        JResponse::setBody($response);
    }
}
