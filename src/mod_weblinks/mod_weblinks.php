<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_weblinks
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the weblinks functions only once
require_once __DIR__ . '/helper.php';

$cats = ModWeblinksHelper::getSubCategories($params);
foreach ($cats as $key => $cat)
{
	$list[$cat->id] = ModWeblinksHelper::getList($params, $cat->id);
	// remove empty categories from array
	if (!$list[$cat->id])
		unset($cats[$key]);
}

if (!count($list))
{
	return;
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_weblinks', $params->get('layout', 'default'));
