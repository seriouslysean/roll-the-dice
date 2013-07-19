<?php
/**
 * Splitleaf_RollSomeDice
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT LICENSE
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/MIT
 *
 * @category   Splitleaf
 * @package    Splitleaf_RollSomeDice
 * @copyright  Copyright 2013 Splitleaf, LLC
 * @license    http://opensource.org/licenses/MIT
 * @author     Sean Kennedy <sean@splitleaf.net>
 * @version    1.0.1
 */

// Variables
mt_srand(crc32(microtime()));
$_query = "{query}";
$_output = '';
$_numDice = 1;
$_typeDice;

// Just a number? Roll it!
if (is_numeric($_query)) {
  $_output .= mt_rand(1, (int)$_query);
  die($_output);
}

// Specific number of dice
if (!strstr($_query, 'd'))
  die('Error; use a command like "roll 1d20"!');

// Get dice values
$_diceRollArr = explode('d', $_query);
if (!empty($_diceRollArr[0]) && (int)$_diceRollArr[0]>0)
  $_numDice = $_diceRollArr[0];
if (!empty($_diceRollArr[1]) && (int)$_diceRollArr[1]<0)
  die("Error; dice type not set!");

// Do the rolls
$_typeDice = $_diceRollArr[1];
for($i=1;$i<=$_numDice;$i++):
  $_output .= mt_rand(1, (int)$_typeDice);
  if($i<$_numDice)
    $_output .= ', ';
endfor;

// What're the rolls?
die($_output);