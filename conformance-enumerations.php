<?php

/**
 * The 70000 series tests from the formulas conformance suite are a
 * good test of Generics
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

namespace tests\enumerations;

use lyquidity\xml\MS\XmlReservedNs;

if ( ! defined( 'CONFORMANCE_TEST_SUITE_ENUMS_LOCATION' ) )
{
	define( 'CONFORMANCE_TEST_SUITE_ENUMS_LOCATION', 'D:/GitHub/xbrlquery/conformance/extensible-enumerations-CONF-2014-10-29/' );
}

if ( ! class_exists( "\\XBRL", true ) )
{
	/**
	 * Include XBRL
	 */
	// require_once __DIR__ . '/../XPath2/bootstrap.php';
	require_once( __DIR__ . '/../source/XBRL.php' );
}

/**
 * Load the Log class
 */
require_once dirname( __FILE__ ) . "/../log/log/observer.php";

$log = \XBRL_Log::getInstance();
$log->debugLog();

\XBRL::setValidationState();

$conformance_base = CONFORMANCE_TEST_SUITE_ENUMS_LOCATION;

$tests = array(
	"100" => "100-Taxonomy/100-extensible-enumerations-testcase.xml",
	"200" => "200-Instance/200-extensible-enumerations-testcase.xml",
);

class observer extends \Log_observer
{
	/**
	 * The name to use as the suffix for the transient used to store progress information
	 * @var array
	 */
	private $list = array();

	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct( PEAR_LOG_ALL );
		\XBRL_Log::getInstance()->attach( $this );
	}

	function __destruct()
	{
		$this->detach();
	}

	public function detach()
	{
		\XBRL_Log::getInstance()->detach( $this );
	}

	/**
	 * Called by the log instance to pass log information
	 * @param array $event
	 */
	public function notify( $event )
	{
		if ( ! isset( $event['section'] ) || ! isset( $event['source'] ) ) return;
		$source = $event['section'];

		$source = array( 'message' => $event['message'], 'details' => $event['source'] );
		$this->list[$event['section'] ][] = $source;
	}

	/**
	 * Check to see if the error code is on any of the reported issues
	 * @param string $errorCode
	 */
	public function hasErrorCode( $errorCode )
	{
		foreach ( $this->list as $section => $sectionReport )
		{
			foreach ( $sectionReport as $report )
			{
				if ( ! isset( $report['details']['error'] ) ) continue;
				if ( $report['details']['error'] == $errorCode ) return true;
			}
		}

		return false;
	}
}

/**
 * This array is used to record any conformance warnings
 * @var array $issues
 */
global $issues;
$issues = array();

foreach ( $tests as $testid => $href )
{
	performTestcase( $log, $testid, "$conformance_base$href" );
}

global $result;
$result = array(
	'success' => ! $issues,
	'issues' => $issues
);

echo __DIR__ . '/' . basename( __FILE__, 'php' ) . "json\n";
file_put_contents( __DIR__ . '/' . basename( __FILE__, 'php' ) . 'json', json_encode( $result ) );


/**
 * Perform a specific test case
 *
 * @param XBRL_Log $log
 * @param string $testid
 * @param string $testCaseXmlFilename
 */
function performTestcase( $log, $testid, $testCaseXmlFilename )
{
	$testCaseFolder = dirname( $testCaseXmlFilename );
	$testCase = simplexml_load_file( $testCaseXmlFilename );

	$attributes = $testCase->attributes();
	$name = (string) $attributes->name;

	$log->info( "Test $testid: $name" );

	/*
	 $xpath = new DOMXPath( dom_import_simplexml( $testCase )->ownerDocument );
	 $pi = $xpath->evaluate( 'string(//processing-instruction("xml-stylesheet"))' );
	 $result = preg_match( "/(type=\"(?<type>.*)\" )?href=\"(?<href>.*)\"/", $pi, $matches );
	 if ( isset( $matches['href'] ) )
	 {
		$styleSheet = XBRL::resolve_path( $testCaseXmlFilename, $matches['href'] );

		$xslt = new XSLTProcessor();
		$xslt->importStylesheet( new SimpleXMLElement( file_get_contents( $styleSheet ) ) );
		$html = $xslt->transformToXml( $testCase );
		$htmlPage = basename( $testCaseXmlFilename ) . ".html";
		// file_put_contents( $htmlPage, $html );
		}
		*/

	foreach ( $testCase->children()->variation as $key => $variation )
	{
		$observer = new observer();

		$variationAttributes = $variation->attributes();
		$variationName = trim( (string)$variationAttributes->name );
		$variationDesc = trim( (string)$variation->description );

		$instanceElements = $variation->data->instance;
		$instanceFile = (string) $variation->data->instance; // Set a default
		foreach ( $instanceElements as $instanceElement )
		{
			$readMeFirst = property_exists( $instanceElement->attributes(), 'readMeFirst' )
				? filter_var( $instanceElement->attributes()->readMeFirst, FILTER_VALIDATE_BOOLEAN )
				: false;

			if ( $readMeFirst )
			{
				$instanceFile = (string) $instanceElement;
				break;
			}
		}

		$xsdElements = $variation->data->xsd;
		$xsd = (string) $xsdElements; // Set a default
		foreach ( $xsdElements as $xsdElement )
		{
			$readMeFirst = property_exists( $xsdElement->attributes(), 'readMeFirst' )
				? filter_var( $xsdElement->attributes()->readMeFirst, FILTER_VALIDATE_BOOLEAN )
				: false;

			if ( $readMeFirst )
			{
				$xsd = (string) $xsdElement;
				break;
			}
		}

		$linkbaseElements = $variation->data->linkbase;
		$linkbaseFile = "";
		foreach ( $linkbaseElements as $linkbaseElement )
		{
			$readMeFirst = property_exists( $linkbaseElement->attributes(), 'readMeFirst' )
				? filter_var( $linkbaseElement->attributes()->readMeFirst, FILTER_VALIDATE_BOOLEAN )
				: false;

			if ( $readMeFirst )
			{
				$linkbaseFile = (string) $linkbaseElement;
				break;
			}
		}

		if ( ! empty( $linkbaseFile ) )
		{
			// Get the xsd
			$xsd = (string) $xsdElements; // Set a default
			foreach ( $xsdElements as $xsdElement )
			{
				$readMeFirst = property_exists( $xsdElement->attributes(), 'readMeFirst' )
					? filter_var( $xsdElement->attributes()->readMeFirst, FILTER_VALIDATE_BOOLEAN )
					: false;

				if ( ! $readMeFirst )
				{
					$xsd = (string) $xsdElement;
					break;
				}
			}
		}

		$result = $variation->result;
		$description = (string) $variation->description;
		$resultsFile = property_exists( $result, 'file' ) ? true : false;

		$log->resetConformanceIssueWarning();
		\XBRL_Instance::reset();

		$source = array(
			'variation id'	=> (string) $variationAttributes->id,
			'description'	=> (string) $variation->description,
		);

		// === Put specific test conditions here (begin) ====

		// if ( $source['variation id'] <= 'V-00' ) continue;
		// if ( $testid == "100" ) continue;

		// === (end) ========================================

		$log->info( "$xsd ($testid-{$variationAttributes->id} $expected)" );
		$log->info( "    Name: " . ( empty( $variationName ) ? "no name provided" : "Name: $variationName" ) );
		if ( ! empty( $variationDesc ) )
		{
			$log->info( "    Desc: $variationDesc" );
		}

		/**
		 * result
		 */
		$errorCode = "";
		if ( property_exists( $result, "error" ) )
		{
			$errorCode = (string)$result->error;
			$q = \qname( $errorCode, $testCase->getDocNamespaces(true) );
			if ( $q->namespaceURI == XmlReservedNs::xqtErrors )
			{
				$errorCode = $q->localName;
			}
			$log->info( "    Error expected '$errorCode'" );
			$test = null;
		}
		else
		{
			$log->info( "    Error not expected" );
		}

		try
		{
			if ( empty( $instanceFile ) )
			{
				$taxonomy = \XBRL::load_taxonomy( "$testCaseFolder/$xsd" );

				if ( ! empty( $linkbaseFile ) )
				{
					// Reset the warnings so
					$log->resetConformanceIssueWarning();
					// Need to load this file
					$taxonomy->addLinkbaseRef( $linkbaseFile, $source['description'], "simple", \XBRL_Constants::$anyLinkbaseRef );
				}
			}
			else
			{
				echo "$instanceFile ($testid-{$variationAttributes->id} $expected) $description\n";
				$instance = \XBRL_Instance::FromInstanceDocument( "$testCaseFolder/$instanceFile" );

				if ( $instance )
				{
					switch ( $testid )
					{
						case '200':

							$result = $instance->validate();
							break;

						default:
							break;
					}
				}
			}

			if ( $errorCode )
			{
				// Check to see if this error code is in the observer
				if ( ! $observer->hasErrorCode( $errorCode ) )
				{

					$log->warning( "    Error expected ($errorCode)"  );

					// Record the issue for external reporting
					global $issues;
					$issues[] = array(
						'test' => $conformanceTestFile,
						'variation' => $id,
						'type' => "expected error code",
						'expected' => $errorCode,
						'actual' => "",
					);
				}
			}
		}
		catch( \Exception $ex )
		{
			if ( $ex->error != $errorCode )
			{
				$log->warning( "    " . $ex->getMessage() );

				// Record the issue for external reporting
				global $issues;
				$issues[] = array(
					'test' => $conformanceTestFile,
					'variation' => $id,
					'type' => "invalid error code",
					'expected' => $errorCode,
					'actual' => $ex->error,
					'message' => $ex->getMessage()
				);
			}
		}

		$observer->detach();
		$observer = null;

		// if ( $expected == 'valid' )
		// {
		// 	if ( ! $log->hasConformanceIssueWarning() ) continue;
		// 	$log->conformance_issue( $testid, "Expected the test to be valid", $source );
		// }
		// else
		// {
		// 	if ( $log->hasConformanceIssueWarning() ) continue;
		// 	// If there is a file *and* and error then the result is ambigous.
		// 	if ( $resultsFile ) continue;
		// 	$log->conformance_issue( $testid, "Expected the test to be invalid", $source );
        //
		// 	// Record the issue for external reporting
		// 	global $issues;
		// 	$issues[] = array(
		// 		'id' => $testid,
		// 		'variation' => $source['variation id'],
		// 		'expected' => $expected,
		// 		'actual' => 'valid'
		// 	);
        //
		// }
	}
}


