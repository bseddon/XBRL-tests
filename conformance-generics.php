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

namespace tests\generic;

if ( ! defined( 'CONFORMANCE_TEST_SUITE_GENERIC_LOCATION' ) )
{
	define( 'CONFORMANCE_TEST_SUITE_GENERIC_LOCATION', 'D:/GitHub/xbrlquery/conformance/conformance-formula/tests/70000 Linkbase/' );
}

if ( ! class_exists( "\\XBRL", true ) )
{
	/**
	 * Include XBRL
	 */
	// require_once __DIR__ . '/../XPath2/bootstrap.php';
	require_once( __DIR__ . '/../source/XBRL.php' );
}

$log = \XBRL_Log::getInstance();
$log->debugLog();

\XBRL::setValidationState();

$conformance_base = CONFORMANCE_TEST_SUITE_GENERIC_LOCATION;

$tests = array(
	"70011" => "70011-GenericLink-StaticAnalysis-LinkbaseRef/70011 GenericLink LinkbaseRef StaticAnalysis.xml",
	"70012" => "70012-GenericLink-StaticAnalysis-SchemaAppinfo/70012 GenericLink In Appinfo StaticAnalysis.xml",
	"70013" => "70013-GenericLink-StaticAnalysis-Link-Role/70013 GenericLink Link Role StaticAnalysis.xml",
	"70014" => "70014-GenericLink-StaticAnalysis-Loc-DTS-Discovery/70014 Loc DTS Discovery StaticAnalysis.xml",
	"70015" => "70015-GenericLink-StaticAnalysis-Loc-href-targets/70015 Loc href Targets StaticAnalysis.xml",
	"70016" => "70016-GenericLink-StaticAnalysis-Arc-Arcrole/70016 GenericLink Arc Arcrole StaticAnalysis.xml",
	"70017" => "70017-GenericLink-StaticAnalysis-Arc-Label/70017 GenericLink Arc Label StaticAnalysis.xml",
	"70018" => "70018-GenericLink-StaticAnalysis-Arc-Cycles/70018 GenericLink Arc Cycles StaticAnalysis.xml",
	"70019" => "70019-GenericLink-StaticAnalysis-Arc-Override/70019 GenericLink Arc Override StaticAnalysis.xml",
	"70020" => "70020-GenericLink-StaticAnalysis-Arc-Prohibition/70020 GenericLink Arc Prohibition StaticAnalysis.xml",
	"70021" => "70021-GenericLink-StaticAnalysis-Resource-Role/70021 GenericLink Resource Role StaticAnalysis.xml",
	"70111" => "70111-GenericLabel-StaticAnalysis-Label/70111 GenericLabel Label StaticAnalysis.xml",
	"70112" => "70112-GenericLabel-StaticAnalysis-Relationship/70112 GenericLabel Relationship StaticAnalysis.xml",
	"70121" => "70121-GenericPreferredLabel-StaticAnalysis/70121-GenericPreferredLabel-StaticAnalysis.xml",
	"70211" => "70211-GenericReference-StaticAnalysis-Reference/70211 GenericReference Reference StaticAnalysis.xml",
	"70212" => "70212-GenericReference-StaticAnalysis-Relationship/70212 GenericReference Relationship StaticAnalysis.xml",
);

/**
 * This array is used to record any conformance warnings
 * @var array $issues
 */
global $issues;
$issues = array();

foreach ( $tests as $testid => $href )
{
	// if ( $testid != '70018' ) continue;

	performTestcase( $log, $testid, "$conformance_base$href" );
}

global $result;
$result = array(
	'success' => ! $issues,
	'issues' => $issues
);

echo __DIR__ . '/' . basename( __FILE__, 'php' ) . "json\n";
file_put_contents( __DIR__ . '/' . basename( __FILE__, 'php' ) . 'json', json_encode( $result ) );

function opinionExample( $log )
{
	$conformance_base = "D:/GitHub/xbrlquery/conformance/Generic/";

	$document = "{$conformance_base}opinion.xsd";

	$taxonomy = \XBRL::load_taxonomy( $document, false );
	$log->info( "    Using schema document: " . $document );
	if ( ! $taxonomy )
	{
		$log->warning( "    !!! Schema document cannot be loaded" );
		return;
	}

	$types = \XBRL_Types::getInstance();

	$taxonomy->addLinkbaseRef( "{$conformance_base}opinion-linkbase.xml", "Generic example", "simple", \XBRL_Constants::$anyLinkbaseRef );
	$roles = $taxonomy->getGenericRoleRefs( array( "http://www.xbrl.org/2003/role/link" ) );
}

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
	$name = (string) $testCase->name;

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
		$variationAttributes = $variation->attributes();
		$variationName = trim( (string)$variation->name );
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

		$xsdElements = $variation->data->schema;
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
		$resultsFilename = (string) $result;
		$expected = (string) $result->attributes()->expected;
		$description = (string) $variation->description;
		$resultsFile = property_exists( $result, 'file' ) ? true : false;

		$log->resetConformanceIssueWarning();
		\XBRL_Instance::reset();

		$source = array(
			'variation id'	=> (string) $variationAttributes->id,
			'description'	=> (string) $variation->description,
		);

		// === Put specific test conditions here (begin) ====

		if ( $testid == '70013' )
		{
			if ( (string)$variationAttributes->id < "V-00" )
			{
				continue;
			}
		}
			if ( $testid == '70014' )
		{
			if ( (string)$variationAttributes->id < "V-00" )
			{
				continue;
			}
		}
		if ( $testid == '70015' )
		{
			if ( (string)$variationAttributes->id < "V-01" )
			{
				continue;
			}
		}
		if ( $testid == '70016' )
		{
			if ( (string)$variationAttributes->id < "V-01" )
			{
				continue;
			}
		}
		if ( $testid == '70017' )
		{
			if ( (string)$variationAttributes->id < "V-00" )
			{
				continue;
			}
		}
		if ( $testid == '70018' )
		{
			if ( (string)$variationAttributes->id < "V-01" )
			{
				continue;
			}
		}
		if ( $testid == '70021' )
		{
			if ( (string)$variationAttributes->id < "V-00" )
			{
				continue;
			}
		}
		if ( $testid == '70121' )
		{
			if ( (string)$variationAttributes->id < "V-01" )
			{
				continue;
			}
		}
		if ( $testid == '70211' )
		{
			if ( (string)$variationAttributes->id < "V-00" )
			{
				continue;
			}
		}

		// === (end) ========================================

		$log->info( "$xsd ($testid-{$variationAttributes->id} $expected)" );
		$log->info( "    Name: " . ( empty( $variationName ) ? "no name provided" : "Name: $variationName" ) );
		if ( ! empty( $variationDesc ) )
		{
			$log->info( "    Desc: $variationDesc" );
		}

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
					case '70011':
					case '70012':
					case '70013':
					case '70015':
					case '70016':
					case '70017':
					case '70018':

						$result = $instance->validate();
						break;

					default:
						break;
				}
			}
		}

		if ( $expected == 'valid' )
		{
			if ( ! $log->hasConformanceIssueWarning() ) continue;
			$log->conformance_issue( $testid, "Expected the test to be valid", $source );
		}
		else
		{
			if ( $log->hasConformanceIssueWarning() ) continue;
			// If there is a file *and* and error then the result is ambigous.
			// For example, 270 v-02.
			if ( $resultsFile ) continue;
			// Ignore the issue with Formula generics test 70212 because it tests element-reference arcrole.
			// References are not yet supported so the error is never tested.
			if ( $testid == "70212") continue;
			$log->conformance_issue( $testid, "Expected the test to be invalid", $source );

			// Record the issue for external reporting
			global $issues;
			$issues[] = array(
				'id' => $testid,
				'variation' => $source['variation id'],
				'expected' => $expected,
				'actual' => 'valid'
			);

		}
	}
}


