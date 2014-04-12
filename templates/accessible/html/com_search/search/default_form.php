<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_search
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * ABP: added legend inside first fieldset
 */

// no direct access
defined('_JEXEC') or die;
$lang = JFactory::getLanguage();
$upper_limit = $lang->getUpperLimitSearchWord();

require_once(dirname(__FILE__) . '/../../fap_utils.php');

fap_load_tpl_lang();

?>

<form id="searchForm" action="<?php echo JRoute::_('index.php?option=com_search');?>" method="post">

    <fieldset class="word">
        <legend><?php echo JText::_('FAP_COM_SEARCH');?>
        </legend>
        <label for="search-searchword">
            <?php echo JText::_('COM_SEARCH_SEARCH_KEYWORD'); ?>
        </label>
        <input type="text" name="searchword" id="search-searchword" size="30" maxlength="<?php echo $upper_limit; ?>" value="<?php echo $this->escape($this->origkeyword); ?>" class="inputbox" />
        <button name="Search" onclick="this.form.submit()" class="button"><?php echo JText::_('COM_SEARCH_SEARCH');?></button>
        <input type="hidden" name="task" value="search" />
    </fieldset>

    <div class="searchintro<?php echo $this->params->get('pageclass_sfx'); ?>">
        <?php if (!empty($this->searchword)):?>
        <p><?php echo JText::plural('COM_SEARCH_SEARCH_KEYWORD_N_RESULTS', $this->total);?></p>
        <?php endif;?>
    </div>

    <!-- not accessible due to bootstrap styling of selects
    <fieldset class="phrases">
        <legend><?php echo JText::_('FAP_COM_SEARCH_FOR');?>
        </legend>
            <div class="phrases-box">
            <?php echo $this->lists['searchphrase']; ?>
            </div>
            <div class="ordering-box">
            <label for="ordering" class="ordering">
                <?php echo JText::_('COM_SEARCH_ORDERING');?>
            </label>
            <?php echo $this->lists['ordering'];?>
            </div>
    </fieldset>

    -->

    <?php if ($this->params->get('search_areas', 1)) : ?>
        <fieldset class="only">
        <legend><?php echo JText::_('COM_SEARCH_SEARCH_ONLY');?></legend>
        <?php foreach ($this->searchareas['search'] as $val => $txt) :
            $checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="checked"' : '';
        ?>
        <input type="checkbox" name="areas[]" value="<?php echo $val;?>" id="area-<?php echo $val;?>" <?php echo $checked;?> />
            <label for="area-<?php echo $val;?>">
                <?php echo JText::_($txt); ?>
            </label>
        <?php endforeach; ?>
        </fieldset>
    <?php endif; ?>

<?php if ($this->total > 0) : ?>

    <div class="form-limit">
        <label for="limit">
            <?php echo JText::_('JGLOBAL_DISPLAY_NUM'); ?>
        </label>
        <?php echo fap_fix_filter($this->pagination->getLimitBox()); ?>
    </div>
    <?php if($this->pagination->getPagesCounter()): ?>
    <p class="counter">
        <?php echo $this->pagination->getPagesCounter(); ?>
    </p>
    <?php endif; ?>
<?php endif; ?>
</form>
