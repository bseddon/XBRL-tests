<?php

/**
 * Conformance test functions for XBRL Formulas
 *  _                      _     _ _ _
 * | |   _   _  __ _ _   _(_) __| (_) |_ _   _
 * | |  | | | |/ _` | | | | |/ _` | | __| | | |
 * | |__| |_| | (_| | |_| | | (_| | | |_| |_| |
 * |_____\__, |\__, |\__,_|_|\__,_|_|\__|\__, |
 *       |___/    |_|                    |___/
 *
 * @author Bill Seddon
 * @version 0.9
 * @Copyright (C) 2018 Lyquidity Solutions Limited
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

global $use_xbrl_functions, $debug_statements;
// Are documents to be processed in a way that uses formula information
$use_xbrl_functions = false;
// Controls whether verbose debug information is written to the console
$debug_statements = false;

ini_set('xdebug.max_nesting_level', 512);

if ( ! class_exists( "\\XBRL", true ) )
{
	/**
	 * Include XBRL
	 */
	require_once( __DIR__ . '/../source/XBRL.php' );
}

$log = XBRL_Log::getInstance();
$log->debugLog();

XBRL::setValidationState();

/**
 * Include the iXBRL test class
 */
require_once( __DIR__ . '/../source/XBRL-Inline.php' );

/**
 * This array is used to record any conformance warnings
 * @var array $issues
 */
global $issues;
$issues = array();

$testClass = 'all';
// $testClass = 'errors';
// $testClass = 'compares';
$testCategory = array(
	'baseURIs' => false,
	'continuation' => false,
	'exclude' => false,
	'footnotes' => false,
	'format' => false,
	'fraction' => true,
	'fullSizeTests' => false,
	'header' => false,
	'hidden' => false,
	'html' => false,
	'ids' => false,
	'multiIO' => false,
	'nonFraction' => false,
	'nonNumeric' => false,
	'references' => false,
	'relationships' => false,
	'resources' => false,
	'specificationExamples' => false,
	'transformations' => false,
	'tuple' => false,
	'xmllang' => false
);

// Enable 'em all
array_walk( $testCategory, function( &$value ) { $value = true; } );

// cacheLocation can be any location where remote files can be cached
$cacheLocation = "C:/LyquidityWeb/site2011/wp-content/uploads/sites/7/xbrl-validate/cache";
$testCasesFolder = "D:/GitHub/xbrlquery/conformance/inlineXBRL-1.1-conformanceSuite-2020-04-08/";

\lyquidity\ixbrl\XBRL_Inline::Test( $cacheLocation, $testCasesFolder, $testCategory, $testClass );

global $result;
$result = array(
	'success' => ! $issues,
	'issues' => $issues
);

if ( $issues )
{
	$log->warning('There are issues');
	error_log( print_r( $issues, true  ) );
}

echo  __DIR__ . '/' .  basename( __FILE__, 'php' ) . "json\n";
file_put_contents( __DIR__ . '/' .  basename( __FILE__, 'php' ) . 'json', json_encode( $result ) );
