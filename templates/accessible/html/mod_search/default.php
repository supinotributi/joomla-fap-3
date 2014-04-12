<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="search<?php echo $moduleclass_sfx ?>">
    <form action="<?php echo JRoute::_('index.php');?>" method="post" class="form-inline">
            <?php
                $output = '<div><label for="mod-search-searchword" class="element-invisible">' . $label . '</label> <input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="inputbox search-query" type="text" size="' . $width . '" value="' . $text . '"  onblur="if (this.value==\'\') this.value=\'' . $text . '\';" onfocus="if (this.value==\'' . $text . '\') this.value=\'\';" />';

                if ($button) :
                    if ($imagebutton) :
                        $button = '<button value="' . $button_text . '" class="button" onclick="this.form.searchword.focus();"><img alt="' . $button_text . '" src="' . $img . '" /></button>';
                    else :
                        $button = ' <button class="button btn btn-primary" onclick="this.form.searchword.focus();">' . $button_text . '</button>';
                    endif;
                endif;

                switch ($button_pos) :
                    case 'top' :
                        $button = $button . '<br />';
                        $output = $button . $output;
                        break;

                    case 'bottom' :
                        $button = '<br />' . $button;
                        $output = $output . $button;
                        break;

                    case 'right' :
                        $output = $output . $button;
                        break;

                    case 'left' :
                    default :
                        $output = $button . $output;
                        break;
                endswitch;

                echo $output . '</div>';
            ?>
        <div><input type="hidden" name="task" value="search" /></div>
        <div><input type="hidden" name="option" value="com_search" /></div>
        <div><input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" /></div>
    </form>
</div>
