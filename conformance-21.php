<?php

/**
 * Conformance test functions for XBRL 2.1
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

// This define allows any test to know that it is being used by the XBRL 2.1 test suite (for example see XBRL::validatedPresentationLinkbasePreferredLabels)
define( 'CONFORMANCE_TEST_SUITE_XBRL_21', true );
if ( ! defined( 'CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION' ) )
{
	define( 'CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION', 'D:/GitHub/xbrlquery/conformance/XBRL-CONF-2014-12-10/' );
}

if ( ! class_exists( "\\XBRL", true ) )
{
	/**
	 * Include XBRL
	 */
	require_once( __DIR__ . '/../source/XBRL.php' );
}

$log = XBRL_Log::getInstance();
$log->debugLog();

/**
 * This array is used to record any conformance warnings
 * @var array $issues
 */
global $issues;
$issues = array();

$run100Series = true;
$run200Series = true;
$run300Series = true;
$run400Series = true;

// performTestcase( $log, '314', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/314-lax-validation-testcase.xml' );
// performTestcase( $log, '302', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/302-context.xml' );
// return;

if ( $run100Series )
{
	performTestcase( $log, "102", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/102-item.xml' );
	performTestcase( $log, "103", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/103-type.xml' );
	performTestcase( $log, "104", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/104-tuple.xml' );
	performTestcase( $log, "105", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/105-balance.xml' );
	performTestcase( $log, "106", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/106-targetNamespace.xml' );
	performTestcase( $log, "107", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/107-DTSWithLinkbaseInSchema.xml' );
	performTestcase( $log, "114", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/114-lax-validation-testcase.xml' );
	performTestcase( $log, "115", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/115-ArcroleAndRoleRefs-testcase.xml' );
	performTestcase( $log, "155", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/155-TypeExtension.xml' );
	performTestcase( $log, "160", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/160-UsedOn.xml' );
	performTestcase( $log, "161", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/100-schema/161-Appinfo.xml' );
	// return;
}

if ( $run200Series )
{
	performTestcase( $log, "201", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/201-linkref.xml' );
	performTestcase( $log, "202", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/202-xlinkLocator.xml' );
	performTestcase( $log, "204", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/204-arcCycles.xml' );
	performTestcase( $log, "205", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/205-roleDeclared.xml' );
	performTestcase( $log, "206", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/206-arcDeclared.xml' );
	performTestcase( $log, "207", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/207-arcDeclaredCycles.xml' );
	performTestcase( $log, "208", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/208-balance.xml' );
	performTestcase( $log, "209", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/209-Arcs.xml' );
	performTestcase( $log, "210", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/210-relationshipEquivalence.xml' );
	performTestcase( $log, "211", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/211-Testcase-sEqualUsedOn.xml' );
	performTestcase( $log, "212", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/212-Testcase-linkbaseDocumentation.xml' );
	performTestcase( $log, "213", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/213-SummationItemArcEndpoints.xml' );
	performTestcase( $log, "214", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/214-lax-validation-testcase.xml' );
	performTestcase( $log, "215", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/215-ArcroleAndRoleRefs-testcase.xml' );
	performTestcase( $log, "220", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/220-NonStandardArcsAndTypes.xml' );
	performTestcase( $log, "230", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/230-CustomLinkbasesAndLocators.xml' );
	performTestcase( $log, "231", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/231-SyntacticallyEqualArcsThatAreNotEquivalentArcs.xml' );
	performTestcase( $log, "291", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/291-inferArcOverride.xml' );
	performTestcase( $log, "292", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/292-Embeddedlinkbaseinthexsd.xml' );
	performTestcase( $log, "293", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/293-UsedOn.xml' );
	performTestcase( $log, "299", CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/200-linkbase/preferredLabel.xml' );
	// return;
}

if ( $run300Series )
{
	performTestcase( $log, '301', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/301-idScope.xml' );
	performTestcase( $log, '302', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/302-context.xml' );
	performTestcase( $log, '303', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/303-periodType.xml' );
	performTestcase( $log, '304', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/304-unitOfMeasure.xml' );
	performTestcase( $log, '305', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/305-decimalPrecision.xml' );
	performTestcase( $log, '306', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/306-required.xml' );
	performTestcase( $log, '307', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/307-schemaRef.xml' );
	performTestcase( $log, '308', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/308-ArcroleAndRoleRefs-testcase.xml' );
	performTestcase( $log, '314', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/314-lax-validation-testcase.xml' );
	performTestcase( $log, '320', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/320-CalculationBinding.xml' );
	performTestcase( $log, '321', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/321-internationalization.xml' );
	performTestcase( $log, '322', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/322-XmlXbrlInteraction.xml' );
	performTestcase( $log, '330', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/330-s-equal-testcase.xml' );
	performTestcase( $log, '331', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/331-equivalentRelationships-testcase.xml' );
	// This is a very long running test
	// performTestcase( $log, '391', 'Common\300-instance\391-inferDecimalPrecision.xml' );
	performTestcase( $log, '392', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/392-inferEssenceAlias.xml' );
	performTestcase( $log, '395', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/395-inferNumericConsistency.xml' );
	performTestcase( $log, '397', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/397-Testcase-SummationItem.xml' );
	performTestcase( $log, '398', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/300-instance/398-Testcase-Nillable.xml' );
}

if ( $run400Series )
{
	performTestcase( $log, '400', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/400-misc/400-nestedElements.xml' );
	performTestcase( $log, '401', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/400-misc/401-datatypes.xml' );
	performTestcase( $log, '402', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common/related-standards/xlink/arc-duplication/arc-duplication-testcase.xml' );
	// These 403 tests will not be used.  The tests apply to tuples but the tests do not include instance documents with tuples.
	// performTestcase( $log, '403', CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION . 'Common\related-standards\xml-schema\uniqueParticleAttribution\uniqueParticleAttribution-testcase.xml' );
}
// performAllTestcases( $log );

global $result;
$result = array(
	'success' => ! $issues,
	'series' => array( '100' => $run100Series, '200' => $run200Series, '300' => $run300Series, '400' => $run400Series ),
	'issues' => $issues
);

echo __DIR__ . "/" .  basename( __FILE__, 'php' ) . 'json' . "\n";
file_put_contents( __DIR__ . "/" .  basename( __FILE__, 'php' ) . 'json', json_encode( $result ) );

return;

/**
 * Generate HTML using the stylesheet in the xbrl.xml of the
 * conformance suite. The open the instances associated with
 * each test case using XBRL_Instance::FromInstanceDocument
 *
 * @param XBRL_Log $log
 */
function performAllTestcases( $log )
{
	$testCasesFolder = 'D:\GitHub\xbrlquery\conformance\XBRL-CONF-2014-12-10';
	$testCases = simplexml_load_file( "$testCasesFolder/xbrl.xml" );
	$xpath = new DOMXPath( dom_import_simplexml( $testCases )->ownerDocument );
	$pi = $xpath->evaluate( 'string(//processing-instruction("xml-stylesheet"))' );
	$result = preg_match( "/(type=\"(?<type>.*)\" )?href=\"(?<href>.*)\"/", $pi, $matches );
	if ( ! isset( $matches['href'] ) ) return;

	$styleSheet = XBRL::resolve_path( $testCasesFolder, $matches['href'] );

	$xslt = new XSLTProcessor();
	$xslt->importStylesheet( new SimpleXMLElement( file_get_contents( $styleSheet ) ) );
	$html = $xslt->transformToXml( $testCases );

	// echo "$html\n";
	// file_put_contents( "{$styleSheet}.html", $html );

	foreach ( $testCases as $testCase )
	{
		$testCaseFile = (string) $testCase->attributes()->uri;
		$id = "";
		// The first three characters are the id
		if ( preg_match( '!^.*/(?<id>\d{3,3}).*!', $testCaseFile, $matches ) )
		{
			$id = $matches['id'];
		}
		$testCaseXml = "$testCasesFolder/$testCaseFile";
		performTestcase( $id, $testCaseXml );
	}
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
	// if ( $testid != '302' ) return;

	$testCaseFolder = dirname( $testCaseXmlFilename );
	$testCase = simplexml_load_file( $testCaseXmlFilename );

	$attributes = $testCase->attributes();
	$outpath = (string) $attributes->outpath;
	$name = (string) $attributes->name;

	$xpath = new DOMXPath( dom_import_simplexml( $testCase )->ownerDocument );
	$pi = $xpath->evaluate( 'string(//processing-instruction("xml-stylesheet"))' );
	$result = preg_match( "/(type=\"(?<type>.*)\" )?href=\"(?<href>.*)\"/", $pi, $matches );
	// if ( isset( $matches['href'] ) )
	// {
	// 	$styleSheet = XBRL::resolve_path( $testCaseXmlFilename, $matches['href'] );
    //
	// 	$xslt = new XSLTProcessor();
	// 	$xslt->importStylesheet( new SimpleXMLElement( file_get_contents( $styleSheet ) ) );
	// 	$html = $xslt->transformToXml( $testCase );
	// 	$htmlPage = basename( $testCaseXmlFilename ) . ".html";
	// 	// file_put_contents( $htmlPage, $html );
	// }

	foreach ( $testCase->children() as $key => $variation )
	{
		$variationAttributes = $variation->attributes();

		$instanceFile = (string) $variation->data->instance; // Set a default
		$instanceElements = $variation->data->instance;
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

		$result = $variation->result;
		$resultsFilename = (string) $result;
		$expected = (string) $result->attributes()->expected;
		$description = (string) $variation->description;

		$log->resetConformanceIssueWarning();
		XBRL_Instance::reset();
		XBRL::setValidationState();

		$source = array(
			'variation id'	=> (string) $variationAttributes->id,
			'description'	=> (string) $variation->description,
		);

		// === Put specific test conditions here (begin) ====

		// if ( $testid != 202 ) continue;
		// $id = (int)str_replace( "V-", "", $source['variation id'] );
		// if ( $id < 10 ) continue;
		$id = str_replace( "V-", "", $source['variation id'] );
		// if ( $id != '06' ) continue;

		// These tests will never be run because they test arc role overrides on reference linkbases which has not been implemented
		if ( $testid == '291' && in_array( $id, array( '12', '13', '14', '15' ) ) ) continue;
		if ( $testid == '400' && in_array( $id, array( 'v05', 'v06' ) ) ) continue;

		// === (end) ========================================

		if ( empty( $instanceFile ) )
		{
			echo "$xsd ($expected) $description\n";
			$taxonomy = XBRL::load_taxonomy( "$testCaseFolder/$xsd" );

			switch ( $testid )
			{
				case "291":

					// Various label tests (plus some reference link tests)
					performTestcase291( $log, $taxonomy, empty( $resultsFilename ) ? false : "$testCaseFolder/$outpath/$resultsFilename", $expected, $source );

					break;

				case "299":

					// Preferred label tests
					// Check the presentation arc preferred label exists
					break;
			}
		}
		else
		{
			echo "$instanceFile ($expected) $description\n";

			$instance = XBRL_Instance::FromInstanceDocument( "$testCaseFolder/$instanceFile" );

			if ( $instance )
			{
				switch ( $testid )
				{
					case "102": // Schema
					case "103":
					case "104":
					case "105":
					case "106":
					case "107":
					case "114":
					case "115":
					case "155":
					case "160":
					case "161":

					case "201":
// "202"
					case "204":
					case "205":
					case "206":
					case "207":
					case "208":
					case "209":
					case "210":
					case "211":
					case "212":
					case "213":
					case "214":
					case "215":
					case "220":
					case "230":
					case "231":
					case "291":
					case "292":
					case "293";
					case "299":

					case "301": // Instance
					case "302":
					case "303":
					case "304":
					case "305":
					case "306":
					case "307":
					// case "314": This is validated while processing instance elements
					case "320":
					case "321":
					case "322":
					case "330":
					case "331":
					case "392":
					case "395":
					case "397":
					case "401":
						$result = $instance->validate();
						// $text = $instance->getInstanceTaxonomy()->getTaxonomyDescriptionForIdWithDefaults( 'RoleL.xsd#conceptA', 'http://mycompany.com/xbrl/roleL/newLabelRole', 'en' );
						break;

					case "391":
						performTestcase391( $log, $instance, "$testCaseFolder/$outpath/$resultsFilename", $expected, $source );
						break;
					default:
						break;
				}
			}
		}

		if ( $expected == 'valid' )
		{
			if ( ! $log->hasConformanceIssueWarning() ) continue;
			// Excuse this failure. The test expects that when a dependent taxonomy is not valid it will not be added to the DTS
			// This implies that a taxonomy is vaidated first then added.  However this implementation performs both at the same
			// time and records the error in the dependent taxonomy which is carried through to this point.
			if ( $testid == '230' && (string) $source['variation id'] == "V-02"  )
			{
				continue;
			}
			// These tests use the linkbase file as the start point.  I have no interest in supporting this entry point just for a test.
			if (
				 ( $testid == "400" && (string) $source['variation id'] == "v05" ) ||
				 ( $testid == "400" && (string) $source['variation id'] == "v06" )
			)
			{
				continue;
			}

			$log->conformance_issue( $testid, "Expected the test to be valid", $source );

			// Record the issue for external reporting
			global $issues;
			$issues[] = array(
				'id' => $testid,
				'variation' => $source['variation id'],
				'expected' => $expected,
				'actual' => 'invalid'
			);
		}
		else
		{
			if ( $log->hasConformanceIssueWarning() ) continue;
			if ( $testid == '202' && (string) $source['variation id'] == "V-02a"  )
			{
				// I don't understand why this test is an issue.  The href of the locator is empty
				// (so it behaves as a reference to the xsd) but the locator is not used.  Compare
				// this with 202 V-02b which also has a locator with an empty but which is used.
				// However the arc is from/to the same label (locator) so the problem with an empty href is not relevant
				continue;
			}
			// These test failures can be excused because reference linkbases are not supported
			if (
				 ( $testid == "291" && (string) $source['variation id'] == "V-12" ) ||
				 ( $testid == "291" && (string) $source['variation id'] == "V-13" ) ||
				 ( $testid == "291" && (string) $source['variation id'] == "V-14" ) ||
				 ( $testid == "291" && (string) $source['variation id'] == "V-15" )
			)
			{
				continue;
			}

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

/**
 * Perform the 291 test - Infer arc override
 *
 * @param XBRL_Log $log A log instance
 * @param XBRL $taxonomy  The source instance of test elements
 * @param string $resultsFilename The file containing results
 * @param string $expected valid or invalid The expected state of the test
 * @param array $source The id of this variation
 * @return boolean
 */
function performTestcase291( $log, $taxonomy, $resultsFilename, $expected, $source )
{
	$testId = "291";

	if ( empty( $resultsFilename ) && $expected == 'valid' )
	{
		// This test requires valid/invalid responses
		$log->warning( "Valid/invalid test response file missing for test $testId variation '{$source['variation id']}' ($resultsFilename)" );
	}
	else
	{
		if ( $resultsFilename )
		{
			// This test has results in a file
			if ( ! file_exists( "$resultsFilename" ) )
			{
				// $log->conformance_issue( $testId, "The test results file for the variation is not valid", $source );
				$log->warning( "Valid/invalid test response file missing for test $testId variation '{$source['variation id']}' ($resultsFilename)" );
				return false;
			}

			// Open the results document
			$results = simplexml_load_file( "$resultsFilename" );

			// There will be an arc element in the results for each valid label
			foreach ( $results->arc as $key => /** @var SimpleXMLElement $arc */ $arc )
			{
				$attributes = $arc->attributes();

				// Look for labels in taxonomy with these characteristics
				$arcRole = (string) $attributes->arcRole;
				$extRole = (string) $attributes->extRole;
				$fromPath = (string) $attributes->fromPath;
				$toPath = (string) $attributes->toPath;
				$linkType = (string) $attributes->linkType;
				$order = (string) $attributes->order;

				$parts = explode( '#', $fromPath );
				$namespace = $parts[0];
				$fragment = $parts[1];

				$from = str_replace( $namespace, $taxonomy->getTaxonomyXSD(), $fromPath );
				$to = str_replace( $namespace, $taxonomy->getTaxonomyXSD(), $toPath );

				$t = $taxonomy->getTaxonomyForNamespace( $namespace );
				$xsd = $t->getTaxonomyXSD();

				switch ( $source['variation id'] )
				{
					case "V-1":
					case "V-2":
					case "V-3":
					case "V-7":
					case "V-09":

						$labelLang = (string) $attributes->labelLang;
						$resRole = (string) $attributes->resRole;
						$text = (string) $arc;
						$label = $taxonomy->getTaxonomyDescriptionForId( "{$xsd}#{$fragment}", array( $resRole ), $labelLang, $extRole );

						if ( $expected == 'valid' )
						{
							if ( $text == $label ) continue;
						}
						else
						{
							if ( $text != $label ) continue;
						}

						XBRL_Log::getInstance()->taxonomy_validation( "", "Label prohibition/override result not correct",
							array(
								'outcome' => "'$text'",
								'result' => "'$label'",
								'expected' => $expected,
								'test' => $testId,
							) + $source
						);

						break;

					case "V-4":
					case "V-5":
					case "V-6":

						$requiresElementList = $taxonomy->getRequireElementsList();

						if ( ! isset( $requiresElementList[ $from ] ) )
						{
							XBRL_Log::getInstance()->taxonomy_validation( "", "Label prohibition/override result not correct",
								array(
									'outcome' => 'invalid',
									'expected' => "'$text'",
									'from' => $fromPath,
									'test' => $testId,
								) + $source
							);
							continue;
						}

						if ( ! isset( $requiresElementList[ $from ][ $to ] ) )
						{
							XBRL_Log::getInstance()->taxonomy_validation( "", "Label prohibition/override result not correct",
								array(
									'outcome' => 'invalid',
									'expected' => "'$text'",
									'from' => $fromPath,
									'to' => $toPath,
									'test' => $testId,
								) + $source
							);
							continue;
						}
						break;

					case "V-10":

						// Reference tests so not supported yet
						break;
				}
			}
		}
		else
		{
			switch ( $source['variation id'] )
			{
				case "V-3":
				case "V-7":
					// Should be empty
					$label = $taxonomy->getTaxonomyDescriptionForId( "291-03-ArcOverrideLabelLinkbases.xsd#fixedAssets", "http://www.xbrl.org/2003/role/label", "en" );
					if ( ! empty( $label ) )
					{
						XBRL_Log::getInstance()->taxonomy_validation( "", "Label prohibition/override result not correct",
							array(
								'outcome' => "(empty)",
								'result' => "'$label'",
								'expected' => $expected,
								'test' => $testId,
							) + $source
						);
					}
					break;
			}

		}
	}

}

/**
 * Perform the 391 test - Infer precision
 *
 * @param XBRL_Log $log A log instance
 * @param XBRL_Instance $instance  The source instance of test elements
 * @param string $resultsFilename The file containing results
 * @param string $expected valid or invalid The expected state of the test
 * @param array $source The id of this variation
 * @return boolean
 */
function performTestcase391( $log, $instance, $resultsFilename, $expected, $source )
{
	$testId = "391";
	$instance_elements = $instance->getElements()->getElements();

	if ( empty( $resultsFilename ) )
	{
		// This test requires valid/invalid responses
		echo "\n";
		$log->conformance_issue( $testId, "Valid/invalid test response file missing", $source );
	}
	else
	{
		// This test has results in a file
		if ( ! file_exists( "$resultsFilename" ) )
		{
			$log->conformance_issue( $testid, "The test results file for the variation is not valid", $source );
			return false;
		}

		// Open the results document

		$results = XBRL_Instance::FromInstanceDocument( "$resultsFilename" );
		$results_elements = $results->getElements()->getElements();

		if ( count( $instance_elements ) != count( $results_elements ) )
		{
			$log->conformance_issue( $testid, "391 Test and specimen results element counts are not the same", $source );
			return false;
		}

		foreach ( $instance_elements as $id => $element )
		{
			foreach ( $element as $entry )
			{
				$inferredPrecision = $instance->inferPrecision( $entry['value'], $entry['decimals'] );

				// Find the corresponding element in the specimen results
				if ( ! isset( $results_elements[ $id ] ) || ! count( $results_elements[ $id ] ) )
				{
					$log->conformance_issue( $testid, "The instance element id cannot be found in the speciment results", $source + array( 'id' => $id ) );
					return false;
				}

				foreach ( $results_elements[ $id ] as $results_entry )
				{
					if ( ! isset( $results_entry['precision'] ) )
					{
						$log->conformance_issue( $testid, "A precision is not defined", $source + array( 'id' => $id ) );
						continue;
					}

					if ( $results_entry['precision'] != $inferredPrecision )
					{
						$log->conformance_issue( $testid, "Does not match", $source + array( 'id' => $id ) );
					}
				}
			}
		}
	}

}

function tests( $instanceFile, $xsd )
{
	// if ( $xsd != '102-04-substitutionItem.xsd' ) continue;
	// if ( $xsd != '102-05-substitutionItem.xsd' ) continue;
	// if ( $xsd != '102-09-substitutionTuple.xsd' ) continue;

	// if ( $xsd != '103-01-ComplexContentCounterExample.xsd' ) continue;

	// if ( $xsd != '104-06-TupleCounterExampleNestedComplexType.xsd' ) continue;
	// if ( $xsd != '104-08-TupleAnyCounterExample.xsd' ) continue;
	// if ( $xsd != '104-11-TupleGroupCounterExample.xsd' ) continue;
	// if ( $xsd != '104-12-TupleMixedCounterExample.xsd' ) continue;
	// if ( $xsd != '104-16-TupleAbstractCounterExample.xsd' ) continue;
	// if ( $xsd != '104-17-TupleAnonymousCounterExample.xsd' ) continue;
	// if ( $xsd != '104-18-redefine.xsd' ) continue;
	// if ( $xsd != '104-19-abstractTuple.xsd' ) continue;

	// if ( $xsd != '105-04-DerivedElementWithBalanceTypeMonetary.xsd' ) continue;
	// if ( $xsd != '105-05-DerivedElementWithBalanceTypeString.xsd' ) continue;

	// if ( $xsd != '106-01-NonEmptyTargetNamespace.xsd' ) continue;
	// if ( $xsd != '106-02-EmptyTargetNamespace.xsd' ) continue;
	// if ( $xsd != '106-03-ExtTargetNamespace.xsd' ) continue;
	// if ( $xsd != '106-04-ExtTargetNamespace.xsd' ) continue;

	// if ( $xsd != '155-TypeExtension-Valid.xsd' ) continue;

	// if ( $xsd != '201-01-LinkbaseRefCounterExample.xsd' ) continue;
	// if ( $xsd != '201-02-LinkbaseRef.xsd' ) continue;
	// if ( $xsd != '201-03-LinkbaseRefXMLBase.xsd' ) continue;
	// if ( $xsd != '201-04-LinkbaseRefLabelCounterExample.xsd' ) continue;
	// if ( $xsd != '201-05-LinkbaseRefReferenceCounterExample.xsd' ) continue;
	// if ( $xsd != '201-06-LinkbaseRefDefinitionCounterExample.xsd' ) continue;
	// if ( $xsd != '201-07-LinkbaseRefPresentationCounterExample.xsd' ) continue;
	// if ( $xsd != '201-08-LinkbaseRefCalculationCounterExample.xsd' ) continue;
	// if ( $xsd != '201-09-LinkbaseRefMultipleExample.xsd' ) continue;

	// if ( $xsd != '202-01-HrefResolution.xsd' ) continue;
	// if ( $xsd != '202-02-HrefResolutionCounterExample.xsd' ) continue;
	// if ( $xsd != '202-03-HrefResolutionXMLBase.xsd' ) continue;
	// if ( $xsd != '202-04-XLinkLabelCounterExample.xsd' ) continue;
	// if ( $xsd != '202-05-ElementLocatorExample.xsd' ) continue;
	// if ( $xsd != '202-06-DuplicateLocatorExample.xsd' ) continue;
	// if ( $xsd != '202-07-ShorthandPointerExample.xsd' ) continue;
	// if ( $xsd != '202-08-XPointerLocatorExample.xsd' ) continue;

	// 202
	// if ( $xsd != 'ArcCyclesPCNC.xsd' ) continue;
	// if ( $xsd != 'ArcCyclesPCNCWR.xsd' ) continue;
	// if ( $xsd != 'ArcCyclesPCDC.xsd' ) continue;

	// 203
	// if ( $xsd != 'ArcCyclesPCDC.xsd' ) continue;
	// if ( $instanceFile != 'ArcCyclesPCNCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesPCWCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSINC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSINCWR.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSIUC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSIDC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSINCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSIWCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSNC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSNCWR.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSUC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSDC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSNCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSWUCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSWDCExtension.xml' ) continue;

	// 204
	// if ( $instanceFile != 'ArcCyclesPCNC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesPCNCWR.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesPCDC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesPCNCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesPCWCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSINC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSINCWR.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSIUC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSIDC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSINCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesSIWCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSNC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSNCWR.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSUC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSDC.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSNCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSWUCExtension.xml' ) continue;
	// if ( $instanceFile != 'ArcCyclesGSWDCExtension.xml' ) continue;

	// 205
	// if ( $instanceFile != 'RoleS.xml' ) continue;
	// if ( $instanceFile != 'RoleE.xml' ) continue;
	// if ( $instanceFile != 'RoleL.xml' ) continue;
	// if ( $instanceFile != 'RoleR.xml' ) continue;
	// if ( $instanceFile != 'RoleSBU.xml' ) continue;
	// if ( $instanceFile != 'RoleSBR.xml' ) continue;
	// if ( $instanceFile != 'RoleSDR.xml' ) continue;
	// if ( $instanceFile != 'RoleSDRI.xml' ) continue;
	// if ( $instanceFile != 'RoleEBR.xml' ) continue;
	// if ( $instanceFile != 'RoleE2.xml' ) continue;
	// if ( $instanceFile != 'RoleLDR.xml' ) continue;

	// 206
	// if ( $instanceFile != 'ArcRoleG.xml' ) continue;
	// if ( $instanceFile != 'ArcRoleBU.xml' ) continue;
	// if ( $instanceFile != 'ArcRoleBR.xml' ) continue;
	// if ( $instanceFile != 'ArcRoleBR2.xml' ) continue;
	// if ( $instanceFile != 'ArcRoleDR.xml' ) continue;
	// if ( $instanceFile != 'ArcRoleDR2.xml' ) continue;
	// if ( $instanceFile != 'ArcRoleDR3.xml' ) continue;

	// 207
	// if ( $instanceFile != 'DecArcCyclesNN.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesNU.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesND.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesNUE.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesNE.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesUN.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesUU.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesUD.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesUUE.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesUDE.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesDN.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesDU.xml' ) continue;
	// if ( $instanceFile != 'DecArcCyclesDD.xml' ) continue;

	// 208
	// if ( $instanceFile != '208-01-ItemNoneSummationNone-instance.xml' ) continue;
	// if ( $instanceFile != '208-02-ItemCreditSumCreditWeight+1-instance.xml' ) continue;
	// if ( $instanceFile != '208-03-ItemCreditSumCreditWeight-1-instance.xml' ) continue;
	// if ( $instanceFile != '208-04-ItemDebitSumCreditWeight+1-instance.xml' ) continue;
	// if ( $instanceFile != '208-05-ItemDebitSumCreditWeight-1-instance.xml' ) continue;
	// if ( $instanceFile != '208-06-ItemCreditSumDebitWeight+1-instance.xml' ) continue;
	// if ( $instanceFile != '208-07-ItemCreditSumDebitWeight-1-instance.xml' ) continue;
	// if ( $instanceFile != '208-08-ItemDebitSumDebitWeight+1-instance.xml' ) continue;
	// if ( $instanceFile != '208-09-ItemDebitSumDebitWeight-1-instance.xml' ) continue;
	// if ( $instanceFile != '208-10-WeightNotZero-instance.xml' ) continue;

	// 209
	// if ( $xsd != '209-01-DifferentWeights.xsd' ) continue;
	// if ( $xsd != '209-02-DifferentPreferredLabels.xsd' ) continue;
	// if ( $xsd != '209-03-SameDefinitionArcs.xsd' ) continue;
	// if ( $xsd != '209-04-DifferentArcroles.xsd' ) continue;

	// 210
	// if ( $instanceFile != '210-01-RelationshipEquivalence-instance.xml' ) continue;
	// if ( $instanceFile != '210-02-DifferentOrder-instance.xml' ) continue;
	// if ( $instanceFile != '210-03-MissingOrder-instance.xml' ) continue;

	// 211
	// if ( $xsd != '211-00-NonSEqualUsedOn-valid.xsd' ) continue;
	// if ( $xsd != '211-01-SEqualUsedOnSamePrefixSameNamespace-invalid.xsd' ) continue;
	// if ( $xsd != '211-02-SEqualUsedOnDifferentPrefixesSameNamespace-invalid.xsd' ) continue;
	// if ( $xsd != '211-03-NonSEqualUsedOnSamePrefixDifferentNamespaces-valid.xsd' ) continue;

	// 291
	// if ( $xsd != 'ArcOverrideDisjointLinkbases.xsd' ) continue;
	// if ( $xsd != '291-02-ArcOverrideLabelLinkbases.xsd' ) continue;
	// if ( $xsd != '291-03-ArcOverrideLabelLinkbases.xsd' ) continue;
	// if ( $xsd != '291-04-ArcOverrideDisjointLinkbases.xsd' ) continue;
	// if ( $xsd != '291-05-ArcOverrideDisjointLinkbases.xsd' ) continue;
	// if ( $xsd != '291-06-ArcOverrideDisjointLinkbases.xsd' ) continue;
	// if ( $xsd != '291-07-ArcOverrideLabelLinkbases.xsd' ) continue;
	// if ( $xsd != '291-08-ArcOverrideLabelLinkbases.xsd' ) continue;
	// if ( $xsd != '291-09-ArcOverrideLabelLinkbases.xsd' ) continue;
	// if ( $xsd != '291-10-ArcOverrideDisjointLinkbases.xsd' ) continue;
	// if ( $xsd != '291-11-ArcOverrideReferenceLinkbases.xsd' ) continue;
	// if ( $xsd != '291-12-ArcOverrideReferenceLinkbases.xsd' ) continue;
	// if ( $xsd != '291-13-ArcOverrideReferenceLinkbases.xsd' ) continue;
	// if ( $xsd != '291-14-ArcOverrideReferenceLinkbases.xsd' ) continue;
	// if ( $xsd != '291-15-ArcOverrideReferenceLinkbases.xsd' ) continue;

	// if ( $instanceFile != '102-06-substitutionItemValid.xbrl' ) continue;

	// if ( $instanceFile != '104-02-TupleExampleAnyOrder.xml' ) continue;
	// if ( $instanceFile != '104-03-TupleExampleCardinality.xml' ) continue;
	// if ( $instanceFile != '104-04-TupleExampleComplextype.xml' ) continue;
	// if ( $instanceFile != '104-05-TupleExampleNestedComplextype.xml' ) continue;
	// if ( $instanceFile != '104-07-TupleChoiceExample.xml' ) continue;
	// if ( $instanceFile != '104-09-TupleAttributeCounterExample.xml' ) continue;
	// if ( $instanceFile != '104-10-TupleXBRLAttributeCounterExample.xml' ) continue;
	// if ( $instanceFile != '104-13-TupleRestrictionExample.xml' ) continue;
	// if ( $instanceFile != '104-14-TupleNestedRestrictionExample.xml' ) continue;

	// if ( $instanceFile != '105-01-ElementWithBalanceTypeNotMonetary-instance.xml' ) continue;
	// if ( $instanceFile != '105-02-TuplesMustHaveNoBalanceAttribute-instance.xml' ) continue;
	// if ( $instanceFile != '105-03-ElementWithBalanceTypeMonetary.xml' ) continue;

	// if ( $instanceFile != '155-TypeExtension-instance-Valid.xml' ) continue;

	// if ( $instanceFile != '301-05-IdScopeUnitRefToContext.xml' ) continue;
	// if ( $instanceFile != '301-06-FootnoteScopeValid.xml' ) continue;

	// if ( $instanceFile != '303-02-PeriodDurationValid.xml' ) continue;

	// if ( $instanceFile != '304-03-monetaryItemTypeUnitsRestrictions.xml' ) continue;
	// if ( $instanceFile != '304-04-monetaryItemTypeUnitsRestrictions.xml' ) continue;
	// if ( $instanceFile != '304-17-sameOrderMeasuresValid.xml' ) continue;
	// if ( $instanceFile != '304-18-sameOrderDivisionMeasuresValid.xml' ) continue;
	// if ( $instanceFile != '304-21-measuresInvalid.xml' ) continue;
	// if ( $instanceFile != '304-22-divisionMeasuresInvalid.xml' ) continue;

	// if ( $instanceFile != '306-02-RequiredInstanceTupleValid.xml' ) continue;

	// if ( $instanceFile != '392-01-EssenceAliasValid.xml' ) continue;
	// if ( $instanceFile != '392-02-EssenceAliasDuplicate.xml' ) continue;
	// if ( $instanceFile != '392-03-EssenceAliasDuplicateNoEssence.xml' ) continue;
	// if ( $instanceFile != '392-04-EssenceAliasReverse.xml' ) continue;
	// if ( $instanceFile != '392-05-EssenceAliasValidWithValue.xml' ) continue;
	// if ( $instanceFile != '392-06-EssenceAliasInvalid.xml' ) continue;
	// if ( $instanceFile != '392-07-EssenceAliasDifferentScopeValid.xml' ) continue;
	// if ( $instanceFile != '392-08-EssenceAliasDifferentScopeInValid.xml' ) continue;
	// if ( $instanceFile != '392-09-EssenceAliasDifferentScopeValidWithValue.xml' ) continue;
	// if ( $instanceFile != '392-10-EssenceAliasDifferentUnit.xml' ) continue;
	// if ( $instanceFile != '392-11-EssenceAliasDifferentContext.xml' ) continue;
	// if ( $instanceFile != '392-12-EssenceAliasInvalid.xml' ) continue;
	// if ( $instanceFile != '392-13-EssenceAliasDifferentPeriodType.xml' ) continue;
	// if ( $instanceFile != '392-14-EssenceAliasNonNumericValid.xml' ) continue;
	// if ( $instanceFile != '392-15-EssenceAliasNonNumericInValid.xml' ) continue;
	// if ( $instanceFile != '392-16-EssenceAliasNonNumericTupleValid.xml' ) continue;
	// if ( $instanceFile != '392-17-EssenceAliasNonNumericTupleInValid.xml' ) continue;

	// if ( $instanceFile != '395-01-InferCalculatedValueConsistencyValid.xml' ) continue;
	// if ( $instanceFile != '395-02-InferCalculatedValueConsistencyDifferentValue.xml' ) continue;

	// if ( $instanceFile != '397-00-ConsistentInstance-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-01-InconsistentInstance-invalid.xbrl' ) continue;
	// if ( $instanceFile != '397-02-NonCEqualContributing-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-03-NonUEqualContributing-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-04-SEqualContextsAndUnitsContributing-invalid.xbrl' ) continue;
	// if ( $instanceFile != '397-05-BothNilContributing-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-06-OneNilContributing-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-07-OneNilContributing-invalid.xbrl' ) continue;
	// if ( $instanceFile != '397-08-OneContributing-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-09-OneContributing-invalid.xbrl' ) continue;
	// if ( $instanceFile != '397-10-NilSummationItem-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-11-DuplicateSummationItems-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-12-DuplicateContributingItems-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-13-InconsistentWithinTuple-invalid.xbrl' ) continue;
	// if ( $instanceFile != '397-14-SeparateTuplesConsistent-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-15-ContributingWithinTuples-invalid.xbrl' ) continue;
	// if ( $instanceFile != '397-16-MultiLevelBinding-invalid.xbrl' ) continue;
	// if ( $instanceFile != '397-17-ConsistentCountdown-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-18-InconsistentCountdown-invalid.xbrl' ) continue;
	// if ( $instanceFile != '397-19-DuplicateCountdown-valid.xbrl' ) continue;
	// if ( $instanceFile != '397-20-NoSummationItemInference-invalid.xbrl' ) continue;
	// if ( $instanceFile != '397-21-NoEssenceAliasInference-invalid.xbrl' ) continue;

}

function runEqualityTests()
{
	$namespaces = array();
	$types = XBRL_Types::getInstance();

	XBRL_Equality::testUnits( $types, $namespaces );
	return;

	// XBRL_Equality::generateXEqualTestcases();
	XBRL_Equality::testXEquals();
	XBRL_Equality::testXPathEquality();
	XBRL_Equality::testIdentifiers();
	XBRL_Equality::testSegments();
	XBRL_Equality::testPeriodTypes();
	XBRL_Equality::testEntities();
	XBRL_Equality::testContexts();
	XBRL_Equality::testMeasures( $types, $namespaces );
	XBRL_Equality::testDivides( $types, $namespaces );
	XBRL_Equality::testUnits( $types, $namespaces );

}
