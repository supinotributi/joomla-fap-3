<?php
/**
* This file is part of
* Joomla! 2.5 FAP
* @package   JoomlaFAP
* @author    Alessandro Pasotti
* @copyright    Copyright (C) 2012 Alessandro Pasotti http://www.itopen.it
* @license      GNU/AGPL

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


defined( '_JEXEC' ) or die( 'Restricted access' );

/**
* Map to protostar
*
* NOTE: index.php must match aliases defined here !!!
*/
function get_accessible_pos($pos){

    /* protostar positions
        <position>banner</position>
        <position>debug</position>
        <position>position-0</position>
        <position>position-1</position>
        <position>position-2</position>
        <position>position-3</position>
        <position>position-4</position>
        <position>position-5</position>
        <position>position-6</position>
        <position>position-7</position>
        <position>position-8</position>
        <position>position-9</position>
        <position>position-10</position>
        <position>position-11</position>
        <position>position-12</position>
        <position>position-13</position>
        <position>position-14</position>
        <position>footer</position>
    */

    $_accessible_position_aliases = array(
        'right' => 'position-7',
        'left' => 'position-8',
        //'user4' => 'position-8',
        //'inset' => 'position-8',
        //'banner' => 'position-0',
        //'footer' => 'position-14',
        //'user1' => 'position-2',
        //'user2' => 'position-2',
        'bottom' => 'position-2',
        'breadcrumb' => 'position-0',
        'center' => 'position-3',
        'user3' => 'position-1'
    );

    $res = array();
    $separator = '';
    if(strpos($pos, ' or ') !== -1){
        $separator = ' or ';
    } elseif(strpos($pos, ' and ') !== -1){
        $separator = ' and ';
    }
    if(!$separator) {
        $separator = ' or ';
        $parms = array($pos);
    } else {
        $parms = explode($separator, $pos);
    }
    foreach($parms as $p){
        $res[] = $p;
        if(array_key_exists($p, $_accessible_position_aliases)){
            if(is_array($_accessible_position_aliases[$p])){
                $res += $_accessible_position_aliases[$p];
            } else {
                $res[] = $_accessible_position_aliases[$p];
            }
        }
    }
    $res = implode($separator, $res);
    //echo("<p>$pos => $res</p>");
    return $res;
}

?>
