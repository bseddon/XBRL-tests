<?php

/**
 * Conformance test functions for XBRL Dimensions
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

if ( ! class_exists( "\\XBRL", true ) )
{
	/**
	 * Include XBRL
	 */
	require_once( __DIR__ . '/../source/XBRL.php' );
}

$log = XBRL_Log::getInstance();
$log->debugLog();
// XBRL::setValidationState();
if ( ! defined( 'CONFORMANCE_TEST_SUITE_XDT_LOCATION' ) )
{
	define( 'CONFORMANCE_TEST_SUITE_XDT_LOCATION', 'D:/GitHub/xbrlquery/conformance/XDT-CONF-CR4-2009-10-06/' );
}

/**
 * This array is used to record any conformance warnings
 * @var array $issues
 */
global $issues;
$issues = array();

performTestcase( $log, '001', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '000-Schema-invalid/001-Taxonomy/001-TestCase-Taxonomy.xml' );
performTestcase( $log, '101', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/101-HypercubeElementIsNotAbstractError/101-TestCase-HypercubeElementIsNotAbstractError.xml' );
performTestcase( $log, '102', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/102-HypercubeDimensionSourceError/102-TestCase-HypercubeDimensionSourceError.xml' );
performTestcase( $log, '103', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/103-HypercubeDimensionTargetError/103-TestCase-HypercubeDimensionTargetError.xml' );
performTestcase( $log, '104', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/104-HasHypercubeSourceError/104-TestCase-HasHypercubeSourceError.xml' );
performTestcase( $log, '105', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/105-HasHypercubeTargetError/105-TestCase-HasHypercubeTargetError.xml' );
performTestcase( $log, '106', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/106-HasHypercubeMissingContextElementAttributeError/106-TestCase-HasHypercubeMissingContextElementAttributeError.xml' );
performTestcase( $log, '107', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/107-TargetRoleNotResolvedError/107-TestCase-TargetRoleNotResolvedError.xml' );
performTestcase( $log, '108', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/108-DimensionElementIsNotAbstractError/108-TestCase-DimensionElementIsNotAbstractError.xml' );
performTestcase( $log, '109', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/109-TypedDomainRefError/109-TestCase-TypedDomainRefError.xml' );
performTestcase( $log, '110', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/110-TypedDimensionError/110-TestCase-TypedDimensionError.xml' );
performTestcase( $log, '111', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/111-TypedDimensionURIError/111-TestCase-TypedDimensionURIError.xml' );
performTestcase( $log, '112', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/112-DimensionDomainSourceError/112-TestCase-DimensionDomainSourceError.xml' );
performTestcase( $log, '113', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/113-DimensionDomainTargetError/113-TestCase-DimensionDomainTargetError.xml' );
performTestcase( $log, '115', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/115-PrimaryItemPolymorphismError/115-TestCase-PrimaryItemPolymorphismError.xml' );
performTestcase( $log, '116', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/116-DomainMemberSourceError/116-TestCase-DomainMemberSourceError.xml' );
performTestcase( $log, '117', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/117-DomainMemberTargetError/117-TestCase-DomainMemberTargetError.xml' );
performTestcase( $log, '122', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/122-DimensionDefaultSourceError/122-TestCase-DimensionDefaultSourceError.xml' );
performTestcase( $log, '123', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/123-DimensionDefaultTargetError/123-TestCase-DimensionDefaultTargetError.xml' );
performTestcase( $log, '124', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/124-TooManyDefaultMembersError/124-TestCase-TooManyDefaultMembersError.xml' );
performTestcase( $log, '125', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/125-DRSUndirectedCycleError/125-TestCase-DRSUndirectedCycleError.xml' );
performTestcase( $log, '126', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/126-DRSDirectedCycleError/126-TestCase-DRSDirectedCycleError.xml' );
performTestcase( $log, '127', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '100-xbrldte/127-OutOfDTSSchemaError/127-TestCase-OutOfDTSSchemaError.xml' );
performTestcase( $log, '202', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '200-xbrldie/202-DefaultValueUsedInInstanceError/202-TestCase-DefaultValueUsedInInstanceError.xml' );
performTestcase( $log, '203', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '200-xbrldie/203-PrimaryItemDimensionallyInvalidError/203-TestCase-PrimaryItemDimensionallyInvalidError.xml' );
performTestcase( $log, '204', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '200-xbrldie/204-RepeatedDimensionInInstanceError/204-TestCase-RepeatedDimensionInInstanceError.xml' );
performTestcase( $log, '205', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '200-xbrldie/205-TypedMemberNotTypedDimensionError/205-TestCase-TypedMemberNotTypedDimensionError.xml' );
performTestcase( $log, '206', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '200-xbrldie/206-ExplicitMemberNotExplicitDimensionError/206-TestCase-ExplicitMemberNotExplicitDimensionError.xml' );
performTestcase( $log, '207', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '200-xbrldie/207-ExplicitMemberUndefinedQNameError/207-TestCase-ExplicitMemberUndefinedQNameError.xml' );
performTestcase( $log, '208', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '200-xbrldie/208-IllegalTypedDimensionContentError/208-TestCase-IllegalTypedDimensionContentError.xml' );
performTestcase( $log, '270', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '200-xbrldie/270-DefaultValueExamples/270-DefaultValueExamples.xml' );
// This one does not seem to be included in the set of XDT testcases
// performTestcase( $log, '271', '200-xbrldie/271-PrimaryItemDimensionallyInvalidError/271-Testcase-PrimaryItemDimensionallyInvalidError.xml' );
performTestcase( $log, '301', CONFORMANCE_TEST_SUITE_XDT_LOCATION . '300-factlist/301-factlist/301-factlist-testcase.xml' );

// performAllTestcases( $log );

global $result;
$result = array(
	'success' => ! $issues,
	'issues' => $issues
);

file_put_contents( basename( __FILE__, 'php' ) . 'json', json_encode( $result ) );

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
	$testCasesFolder = 'D:\GitHub\xbrlquery\conformance\XDT-CONF-CR4-2009-10-06';
	$testCases = simplexml_load_file( "$testCasesFolder/xdt.xml" );
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
		// echo "performTestcase( \$log, '$id', '$testCasesFolder/$testCaseFile' );\n";
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
	$testCaseFolder = dirname( $testCaseXmlFilename );
	$testCase = simplexml_load_file( $testCaseXmlFilename );

	$attributes = $testCase->attributes();
	$outpath = (string) $attributes->outpath;
	$name = (string) $attributes->name;

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

	foreach ( $testCase->children() as $key => $variation )
	{
		$variationAttributes = $variation->attributes();

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
		$resultsFilename = (string) $result;
		$expected = property_exists( $result, 'error' ) ? "invalid" : "valid";
		$description = (string) $variation->description;
		$resultsFile = property_exists( $result, 'file' ) ? true : false;

		$log->resetConformanceIssueWarning();
		XBRL_Instance::reset();
		XBRL::setValidationState();

		$source = array(
			'variation id'	=> (string) $variationAttributes->id,
			'description'	=> (string) $variation->description,
		);

		// === Put specific test conditions here (begin) ====

		// if ( $source['variation id'] != 'V-22' ) continue;

		// === (end) ========================================

		if ( empty( $instanceFile ) )
		{
			echo "$xsd ($testid-{$variationAttributes->id} $expected) $description\n";
			$taxonomy = XBRL::load_taxonomy( "$testCaseFolder/$xsd" );

			if ( !empty( $linkbaseFile ) )
			{
				// Need to load this file
				$taxonomy->addLinkbaseRef( $linkbaseFile, $source['description'] );
			}
		}
		else
		{
			echo "$instanceFile ($testid-{$variationAttributes->id} $expected) $description\n";
			$instance = XBRL_Instance::FromInstanceDocument( "$testCaseFolder/$instanceFile" );

			if ( $instance )
			{
				switch ( $testid )
				{
					case '113':
					case '115':
					case '116':
					case '117':
					case '122':
					case '123':
					case '124':
					case '125':
					case '126':
					case '127':

					case '202':
					case '203':
					case '204':
					case '205':
					case '206':
					case '207':
					case '208':
					case '270':

					case '301':

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
			// If there is a file *and* and error then the result is ambigous.
			// For example, 270 v-02.
			if ( $resultsFile ) continue;
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

function previousTests()
{
	// 001
	// if ( $xsd != 'hypercubeDimensionTargetRoleInvalidURI.xsd' ) continue;
	// if ( $xsd != 'hasHypercubeContextElementInvalid.xsd' ) continue;
	// if ( $xsd != 'hasHypercubeClosedInvalid.xsd' ) continue;
	// if ( $xsd != 'hasHypercubeTargetRoleInvalidURI.xsd' ) continue;
	// if ( $xsd != 'dimensionDomainTargetRoleInvalidURI.xsd' ) continue;
	// if ( $xsd != 'domainMemberTargetRoleInvalidURI.xsd' ) continue;
	// if ( $xsd != 'domainMemberUsableValid.xsd' ) continue;
	// if ( $xsd != 'domainMemberUsableInvalid.xsd' ) continue;

	// 101
	// if ( $xsd != 'hypercubeValid.xsd' ) continue;
	// if ( $xsd != 'hypercubeNotAbstract.xsd' ) continue;
	// if ( $xsd != 'hypercubeNotAbstractWithSGComplexities.xsd' ) continue;

	// 102
	// if ( $xsd != 'hypercubeDimensionValid.xsd' ) continue;
	// if ( $xsd != 'hypercubeDimensionSubValid.xsd' ) continue;
	// if ( $xsd != 'sourceHypercubeDimensionIsItemInvalid.xsd' ) continue;
	// if ( $xsd != 'sourceHypercubeDimensionIsTupleInvalid.xsd' ) continue;
	// if ( $xsd != 'sourceHypercubeDimensionIsDimensionInvalid.xsd' ) continue;
	// if ( $xsd != 'sourceHypercubeDimensionIsDimensionSubInvalid.xsd' ) continue;

	// 103
	// if ( $xsd != 'targetHypercubeDimensionIsItemInvalid.xsd' ) continue;
	// if ( $xsd != 'targetHypercubeDimensionIsTupleInvalid.xsd' ) continue;
	// if ( $xsd != 'targetHypercubeDimensionIsHypercubeInvalid.xsd' ) continue;

	// 104
	// if ( $xsd != 'hasHypercubeAllValid.xsd' ) continue;
	// if ( $xsd != 'hasHypercubeNotAllValid.xsd' ) continue;
	// if ( $xsd != 'hasHypercubeAllAbsPriItemValid.xsd' ) continue;
	// if ( $xsd != 'hasHypercubeAllTwoCubesValid.xsd' ) continue;
	// if ( $xsd != 'hasHypercubeAllSubsValid.xsd' ) continue;
	// if ( $xsd != 'sourceHasHypercubeIsDimensionInvalid.xsd' ) continue;
	// if ( $xsd != 'sourceHasHypercubeIsDimensionSubInvalid.xsd' ) continue;

	// 105
	// if ( $xsd != 'targetHasHypercubeIsItemInvalid.xsd' ) continue;
	// if ( $xsd != 'targetHasHypercubeIsDimensionInvalid.xsd' ) continue;

	// 106
	// if ( $xsd != 'hasHypercubeNoContextElementInvalid.xsd' ) continue;
	// if ( $xsd != 'notAllHasHypercubeNoContextElementInvalid.xsd' ) continue;

	// 107
	// if ( $xsd != 'hypercubeDimensionTargetRoleValid.xsd' ) continue;
	// if ( $xsd != 'hypercubeDimensionTargetRoleNotResolved.xsd' ) continue;
	// if ( $xsd != 'hasHypercubeTargetRoleValid.xsd' ) continue;
	// if ( $xsd != 'hasHypercubeTargetRoleNotResolved.xsd' ) continue;
	// if ( $xsd != 'dimensionDomainTargetRoleValid.xsd' ) continue;
	// if ( $xsd != 'dimensionDomainTargetRoleNotResolved.xsd' ) continue;
	// if ( $xsd != 'domainMemberTargetRoleValid.xsd' ) continue;
	// if ( $xsd != 'domainMemberTargetRoleNotResolved.xsd' ) continue;
	// if ( $xsd != 'notAllHasHypercubeTargetRoleValid.xsd' ) continue;
	// if ( $xsd != 'notAllHasHypercubeTargetRoleNotResolved.xsd' ) continue;
	// if ( $xsd != 'domainMemberTargetRoleMissingRoleRef.xsd' ) continue;
	// if ( $xsd != 'unconnectedDRS.xsd' ) continue;

	// 108
	// if ( $xsd != 'dimensionValid.xsd' ) continue;
	// if ( $xsd != 'dimensionNotAbstract.xsd' ) continue;

	// 109
	// if ( $xsd != 'typedDomainRefvalid.xsd' ) continue;
	// if ( $xsd != 'typedDomainRefvalid2.xsd' ) continue;
	// if ( $xsd != 'typedDomainRefonNonItemDeclaration.xsd' ) continue;
	// if ( $xsd != 'TwotypedDomainRefattributesContainSameRef.xsd' ) continue;
	// if ( $xsd != 'TwotypedDomainRefattributesContainRefsLocatingSameElement.xsd' ) continue;

	// 110
	// if ( $xsd != 'typedDomainReflocatesDeclarationInSameFile.xsd' ) continue;
	// if ( $xsd != 'typedDomainReftoAbstractItemDeclaration.xsd' ) continue;
	// if ( $xsd != 'typedDomainReflocatesTypeDeclaration.xsd' ) continue;
	// if ( $xsd != 'typedDomainRefLocatesNonGlobalElementDeclaration.xsd' ) continue;
	// if ( $xsd != 'typedDomainReflocatesDeclarationInDifferentFileWithImport.xsd' ) continue;

	// 111
	// There is only one

	// 112
	// if ( $xsd != 'dimensionDomainValid.xsd' ) continue;
	// if ( $xsd != 'dimensionDomainSubsValid.xsd' ) continue;
	// if ( $xsd != 'sourceDimensionDomainIsItemInvalid.xsd' ) continue;
	// if ( $xsd != 'sourceDimensionDomainIsHypercubeInvalid.xsd' ) continue;
	// if ( $xsd != 'sourceExplicitDimensionIsTypedDomainInvalid.xsd' ) continue;

	// 113
	// if ( $xsd != 'targetDimensionDomainIsDimensionInvalid.xsd' ) continue;
	// if ( $xsd != 'targetDimensionDomainIsHypercubeInvalid.xsd' ) continue;

	// 115
	// if ( $linkbaseFile != 'polymorphismDirectError-definition.xml' ) continue;
	// if ( $linkbaseFile != 'polymorphismIndirectError-definition.xml' ) continue;
	// if ( $linkbaseFile != 'polymorphismDirectUnusableError-definition.xml' ) continue;
	// if ( $linkbaseFile != 'polymorphismIndirectUnusableError-definition.xml' ) continue;
	// if ( $xsd != 'polymorphismErrorDifferentSubgraph.xsd' ) continue;
	// if ( $linkbaseFile != 'polymorphismErrorInherited-definition.xml' ) continue;
	// if ( $xsd != 'polymorphismDefaultTest1.xsd' ) continue;

	// 116
	// if ( $xsd != 'sourceDomainMemberIsDimensionInvalid.xsd' ) continue;
	// if ( $xsd != 'sourceDomainMemberIsHypercubeInvalid.xsd' ) continue;

	// 117
	// if ( $xsd != 'targetDomainMemberIsDimensionInvalid.xsd' ) continue;
	// if ( $xsd != 'targetDomainMemberIsHypercubeInvalid.xsd' ) continue;

	// 122
	// if ( $xsd != 'dimensionDefaultValid.xsd' ) continue;
	// if ( $xsd != 'sourceDimensionDefaultNotDimensionInvalid.xsd' ) continue;
	// 123

	// if ( $xsd != 'targetDimensionDefaultIsDimensionInvalid.xsd' ) continue;
	// if ( $xsd != 'targetDimensionDefaultNotMemberInvalid.xsd' ) continue;

	// 124
	// if ( $xsd != 'dimensionDefaultSameRoleValid.xsd' ) continue;
	// if ( $xsd != 'dimensionDefaultSameRoleInvalid.xsd' ) continue;
	// if ( $xsd != 'dimensionDefaultDifferentRolesInvalid.xsd' ) continue;
	// if ( $xsd != 'dimensionDefaultOneArcWithTwoLocators.xsd' ) continue;
	// if ( $xsd != 'multipleArcsResolveToSameDefault.xsd' ) continue;
	// if ( $xsd != 'dimensionDefaultDifferentDomainsInvalid.xsd' ) continue;

	// 125
	// if ( $linkbaseFile != 'hypercubeDimensionUndirected-definition.xml' ) continue;
	// if ( $linkbaseFile != 'dimensionDomainUndirected-definition.xml' ) continue;
	// if ( $linkbaseFile != 'domainMemberUndirected-definition.xml' ) continue;

	// 126
	// if ( $linkbaseFile != 'domainMemberDirected-definition.xml' ) continue;
	// if ( $linkbaseFile != 'domainMemberDirected2-definition.xml' ) continue;
	// if ( $linkbaseFile != 'domainMemberDirectedWithoutHypercube-definition.xml' ) continue;
	// if ( $linkbaseFile != 'domainMemberParallel-definition.xml' ) continue;
	// if ( $linkbaseFile != 'domainMemberParallelWithoutHypercube-definition.xml' ) continue;
	// if ( $linkbaseFile != 'domainMemberDirectedReverse-definition.xml' ) continue;
	// if ( $linkbaseFile != 'domainMemberDirected2WithoutHypercube-definition.xml' ) continue;

	// 127
	// if ( $xsd != 'typedDomainRefdoesnotlocateDeclarationInDifferentFile.xsd' ) continue;
	// if ( $xsd != 'typedDomainReflocatesDeclarationInDifferentFile.xsd' ) continue;
	// if ( $xsd != 'XBRLTaxonomyA.xsd' ) continue;
	// if ( $xsd != 'typed-dimension-schema-uses-redefine-no-dts-2.xsd' ) continue;

	// 202
	// if ( $instanceFile != 'defaultValueInInstance.xbrl' ) continue;
	// if ( $instanceFile != 'defaultValueInInstanceOK.xbrl' ) continue;

	// 203
	if ( false && ! in_array( $instanceFile, array(
		'combinationOfCubesCase1Segment.xbrl', // V-01
		'combinationOfCubesCase6Segment.xbrl', // V-02
		'combinationOfCubesCase2Segment.xbrl', // V-03
		'combinationOfCubesCase3Segment.xbrl', // V-04
		'combinationOfCubesCase4Segment.xbrl', // V-05
		'combinationOfCubesCase5Segment.xbrl', // V-06
		'contextForbiddenExplicitDimInSegment.xbrl',  // V-07
		'contextForbiddenExplicitDimInScenario.xbrl', // V-08
		'contextImplicitDimNotInSegment.xbrl',   // V-09
		'contextImplicitDimNotInScenario.xbrl',  // V-10
		'contextExplicitDimNotInSegment.xbrl',   // V-11
		'contextExplicitDimNotInScenario.xbrl',  // V-12
		'combinationOfCubesUnusableMemberInvalid.xbrl', // V-13
		'combinationOfCubesUnusableDomainInvalid.xbrl', // V-14
		'closedEmptyHypercubeIsValid.xbrl', // V-15
		'openEmptyHypercubeIsValid.xbrl', // V-16
		'closedEmptyHypercubeIsInvalid.xbrl', // V-17
		'closedNotEmptyHypercubeIsValid.xbrl', // V-18
		'closedNotEmptyHypercubeIsInvalid.xbrl', // V-19
		'openNotEmptyHypercubeIsValid.xbrl', // V-20
		'InstanceValidAccordingToTwoDimensionalTaxonomies.xbrl', // V-21
		'InstanceInvalidAccordingToTwoDimensionalTaxonomies.xbrl', // V-22
		'InstanceInvalidTheValueIsNotADomainMember.xbrl', // V-23
		'InstanceInvalidTheValueIsNotADomainMemberCase2.xbrl', // V-24
		'complexHypercubeInheritance_ValidLink1.xbrl', // V-25
		'complexHypercubeInheritance_ValidLink2.xbrl', // V-26
		'complexHypercubeInheritance_Invalid3.xbrl', // V-27
		'memberExcludedFromValidDomain1.xbrl', // V-28
		'memberExcludedFromValidDomain2.xbrl', // V-29
		'primaryItemValidContainsNoHypercubes.xbrl', // V-30
		'combinationOfCubesCase7BothOpen.xbrl', // V-31
		'combinationOfCubesCase8NotAllClosed.xbrl', // V-32
		'closedHypercubeAndDefaultMembers.xbrl', // V-33
	) ) ) return;

	if ( false && ! in_array( $instanceFile, array(
		'inheritanceEdgeUseCase-p1-c1.xbrl', // V-34
		'inheritanceEdgeUseCase-p1-c2.xbrl', // V-35
		'inheritanceEdgeUseCase-p2-c1.xbrl', // V-36
		'inheritanceEdgeUseCase-p2-c2.xbrl', // V-37
		'inheritanceEdgeUseCase-p3-c1.xbrl', // V-38
		'inheritanceEdgeUseCase-p3-c2.xbrl', // V-39
		'inheritanceEdgeUseCase-p5-c1.xbrl', // V-40
		'inheritanceEdgeUseCase-p5-c2.xbrl', // V-41
		'inheritanceEdgeUseCase-p9-c1.xbrl', // V-42
		'inheritanceEdgeUseCase-p9-c2.xbrl', // V-43
		'inheritanceEdgeUseCase-p10-c1.xbrl', // V-44
		'inheritanceEdgeUseCase-p10-c2.xbrl', // V-45
		'inheritanceEdgeUseCase-p11-c1.xbrl', // V-46
		'inheritanceEdgeUseCase-p11-c2.xbrl', // V-47
		'inheritanceEdgeUseCase-p13-c1.xbrl', // V-48
		'inheritanceEdgeUseCase-p13-c2.xbrl', // V-49
		'inheritanceEdgeUseCase-p15-c1.xbrl', // V-50
		'inheritanceEdgeUseCase-p15-c2.xbrl', // V-51
		'inheritanceEdgeUseCase-p16-c1.xbrl', // V-52
		'inheritanceEdgeUseCase-p16-c2.xbrl', // V-53
		'inheritanceEdgeUseCase-p17-c1.xbrl', // V-54
		'inheritanceEdgeUseCase-p17-c2.xbrl', // V-55
		'inheritanceEdgeUseCase-p19-cOther.xbrl', // V-56
		'inheritanceEdgeUseCase-p21-c1.xbrl', // V-57
		'inheritanceEdgeUseCase-p21-c2.xbrl', // V-58
		'inheritanceEdgeUseCase-p22-c1.xbrl', // V-59
		'inheritanceEdgeUseCase-p22-c2.xbrl', // V-60
		'inheritanceEdgeUseCase-p23-c1.xbrl', // V-61
		'inheritanceEdgeUseCase-p23-c2.xbrl', // V-62
		'inheritanceEdgeUseCase-p24-c1.xbrl', // V-63
		'inheritanceEdgeUseCase-p24-c2.xbrl', // V-64
		'inheritanceEdgeUseCase-p26-c1.xbrl', // V-65
		'inheritanceEdgeUseCase-p26-c2.xbrl', // V-66
		'inheritanceSharedCube-p3-c1.xbrl', // V-67
		'inheritanceSharedCube-p3-c2.xbrl', // V-68
		'inheritanceOfClosedAttr-p3-c2closed.xbrl', // V-72
		'inheritanceOfClosedAttr-p3-c2open.xbrl', // V-73
		'inheritanceUsableAttr-p1-c1.xbrl',// V-74
	) ) ) return;

	if ( false && ! in_array( $instanceFile, array(
		'multiRoleInheritenceTest1Instance1.xbrl', // V-100
		'multiRoleInheritenceTest1Instance2.xbrl', // V-101
		'multiRoleInheritenceTest1Instance3.xbrl', // V-102
		'multiRoleInheritenceTest1Instance4.xbrl', // V-103
		'multiRoleInheritenceTest1Instance5.xbrl', // V-104
		'multiRoleInheritenceTest1Instance6.xbrl', // V-105
		'multiRoleInheritenceTest1Instance7.xbrl', // V-106
		'multiRoleInheritenceTest1Instance8.xbrl', // V-107
		'multiRoleInheritenceTest1Instance9.xbrl', // V-108
		'multiRoleInheritenceTest1Instance10.xbrl', // V-109
		'multiRoleInheritenceTest1Instance11.xbrl', // V-110
		'multiRoleInheritenceTest1Instance12.xbrl', // V-111
		'multiRoleInheritenceTest1Instance13.xbrl', // V-112
		'multiRoleInheritenceTest1Instance14.xbrl', // V-113
		'multiRoleInheritenceTest1Instance15.xbrl', // V-114
		'multiRoleInheritenceTest1Instance16.xbrl', // V-115
		'multiRoleInheritenceTest1Instance17.xbrl', // V-116
		'multiRoleInheritenceTest1Instance18.xbrl', // V-117
		'multiRoleInheritenceTest1Instance19.xbrl', // V-118
		'multiRoleInheritenceTest1Instance20.xbrl', // V-119
		'multiRoleInheritenceTest1Instance21.xbrl', // V-120
		'multiRoleInheritenceTest1Instance22.xbrl', // V-121
		'multiRoleInheritenceTest1Instance23.xbrl', // V-122
		'multiRoleInheritenceTest1Instance24.xbrl', // V-123
		'multiRoleInheritenceTest1Instance25.xbrl', // V-124
		'multiRoleInheritenceTest1Instance26.xbrl', // V-125
		'multiRoleInheritenceTest1Instance27.xbrl', // V-126
		'multiRoleInheritenceTest1Instance28.xbrl', // V-127
		'multiRoleInheritenceTest1Instance29.xbrl', // V-128
		'multiRoleInheritenceTest1Instance30.xbrl', // V-129
		'multiRoleInheritenceTest1Instance31.xbrl', // V-130
		'multiRoleInheritenceTest1Instance32.xbrl', // V-131
	) ) ) return;

	if ( false && ! in_array( $instanceFile, array(
		'multiRoleInheritenceTest2Instance1.xbrl', // V-132
		'multiRoleInheritenceTest2Instance2.xbrl', // V-133
		'multiRoleInheritenceTest2Instance3.xbrl', // V-134
		'multiRoleInheritenceTest2Instance4.xbrl', // V-135
		'multiRoleInheritenceTest2Instance5.xbrl', // V-136
		'multiRoleInheritenceTest2Instance6.xbrl', // V-137
		'multiRoleInheritenceTest2Instance7.xbrl', // V-138
		'multiRoleInheritenceTest2Instance8.xbrl', // V-139
		'multiRoleInheritenceTest2Instance9.xbrl', // V-140
		'multiRoleInheritenceTest2Instance10.xbrl',  // V-141
		'multiRoleInheritenceTest2Instance11.xbrl',  // V-142
		'multiRoleInheritenceTest2Instance12.xbrl',  // V-143
		'multiRoleInheritenceTest2Instance13.xbrl',  // V-144
		'multiRoleInheritenceTest2Instance14.xbrl',  // V-145
		'multiRoleInheritenceTest2Instance15.xbrl',  // V-146
		'multiRoleInheritenceTest2Instance16.xbrl',  // V-147
		'multiRoleInheritenceTest2Instance17.xbrl',  // V-148
		'multiRoleInheritenceTest2Instance18.xbrl',  // V-149
		'multiRoleInheritenceTest2Instance19.xbrl',  // V-150
		'multiRoleInheritenceTest2Instance20.xbrl',  // V-151
		'multiRoleInheritenceTest2Instance21.xbrl',  // V-152
		'multiRoleInheritenceTest2Instance22.xbrl',  // V-153
		'multiRoleInheritenceTest2Instance23.xbrl',  // V-154
		'multiRoleInheritenceTest2Instance24.xbrl',  // V-155
		'multiRoleInheritenceTest2Instance25.xbrl',  // V-156
		'multiRoleInheritenceTest2Instance26.xbrl',  // V-157
		'multiRoleInheritenceTest2Instance27.xbrl',  // V-158
		'multiRoleInheritenceTest2Instance28.xbrl',  // V-159
		'multiRoleInheritenceTest2Instance29.xbrl',  // V-160
		'multiRoleInheritenceTest2Instance30.xbrl',  // V-161
		'multiRoleInheritenceTest2Instance31.xbrl',  // V-162
		'multiRoleInheritenceTest2Instance32.xbrl',  // V-163
		'multiRoleInheritenceTest2Instance33.xbrl',  // V-164
		'multiRoleInheritenceTest2Instance34.xbrl',  // V-165
		'multiRoleInheritenceTest2Instance35.xbrl',  // V-166
		'multiRoleInheritenceTest2Instance36.xbrl',  // V-167
		'multiRoleInheritenceTest2Instance37.xbrl',  // V-168
		'multiRoleInheritenceTest2Instance38.xbrl',  // V-169
		'multiRoleInheritenceTest2Instance39.xbrl',  // V-170
		'multiRoleInheritenceTest2Instance40.xbrl',  // V-171
		'multiRoleInheritenceTest2Instance41.xbrl',  // V-172
		'multiRoleInheritenceTest2Instance42.xbrl',  // V-173
		'multiRoleInheritenceTest2Instance43.xbrl',  // V-174
		'multiRoleInheritenceTest2Instance44.xbrl',  // V-175
		'multiRoleInheritenceTest2Instance45.xbrl',  // V-176
		'multiRoleInheritenceTest2Instance46.xbrl',  // V-177
		'multiRoleInheritenceTest2Instance47.xbrl',  // V-178
		'multiRoleInheritenceTest2Instance48.xbrl',  // V-179
		'multiRoleInheritenceTest2Instance49.xbrl',  // V-180
		'multiRoleInheritenceTest2Instance50.xbrl',  // V-181
		'multiRoleInheritenceTest2Instance51.xbrl',  // V-182
		'multiRoleInheritenceTest2Instance52.xbrl',  // V-183
		'multiRoleInheritenceTest2Instance53.xbrl',  // V-184
		'multiRoleInheritenceTest2Instance54.xbrl',  // V-185
		'multiRoleInheritenceTest2Instance55.xbrl',  // V-186
		'multiRoleInheritenceTest2Instance56.xbrl',  // V-187
		'multiRoleInheritenceTest2Instance57.xbrl',  // V-188
		'multiRoleInheritenceTest2Instance58.xbrl',  // V-189
		'multiRoleInheritenceTest2Instance59.xbrl',  // V-190
		'multiRoleInheritenceTest2Instance60.xbrl',  // V-191
		'multiRoleInheritenceTest2Instance61.xbrl',  // V-192
		'multiRoleInheritenceTest2Instance62.xbrl',  // V-193
		'multiRoleInheritenceTest2Instance63.xbrl',  // V-194
		'multiRoleInheritenceTest2Instance64.xbrl',  // V-195
	) ) ) return;

	if ( false && ! in_array( $instanceFile, array(
		'multiRoleInheritenceTest3Instance1.xbrl',  // V-196
		'multiRoleInheritenceTest3Instance2.xbrl',  // V-197
		'multiRoleInheritenceTest3Instance3.xbrl',  // V-198
		'multiRoleInheritenceTest3Instance4.xbrl',  // V-199
		'multiRoleInheritenceTest3Instance5.xbrl',  // V-200
		'multiRoleInheritenceTest3Instance6.xbrl',  // V-201
		'multiRoleInheritenceTest3Instance7.xbrl',  // V-202
		'multiRoleInheritenceTest3Instance8.xbrl',  // V-203
		'multiRoleInheritenceTest3Instance9.xbrl',  // V-204
		'multiRoleInheritenceTest3Instance10.xbrl', // V-205
		'multiRoleInheritenceTest3Instance11.xbrl', // V-206
		'multiRoleInheritenceTest3Instance12.xbrl', // V-207
		'multiRoleInheritenceTest3Instance13.xbrl', // V-208
		'multiRoleInheritenceTest3Instance14.xbrl', // V-209
		'multiRoleInheritenceTest3Instance15.xbrl', // V-210
		'multiRoleInheritenceTest3Instance16.xbrl', // V-211
	) ) ) return;

	if ( false && ! in_array( $instanceFile, array(
		'multiRoleInheritenceTest4Instance1.xbrl',  // V-212
		'multiRoleInheritenceTest4Instance2.xbrl',  // V-213
		'multiRoleInheritenceTest4Instance3.xbrl',  // V-214
		'multiRoleInheritenceTest4Instance4.xbrl',  // V-215
		'multiRoleInheritenceTest4Instance5.xbrl',  // V-216
	) ) ) return;

	if ( true && ! in_array( $instanceFile, array(
		'multiRoleInheritenceTest5Instance1.xbrl',  // V-217
		'multiRoleInheritenceTest5Instance2.xbrl',  // V-218
		'multiRoleInheritenceTest5Instance3.xbrl',  // V-219
		'multiRoleInheritenceTest5Instance4.xbrl',  // V-220
		'multiRoleInheritenceTest5Instance5.xbrl',  // V-221
		'multiRoleInheritenceTest5Instance6.xbrl',  // V-222
		'multiRoleInheritenceTest5Instance7.xbrl',  // V-223
		'multiRoleInheritenceTest5Instance8.xbrl',  // V-224
	) ) ) return;

	if ( false && ! in_array( $instanceFile, array(
		'EmptyDimensionAndNotAllHypercube-2.xbrl', // V-225
		'EmptyDimensionAndNotAllHypercube-3.xbrl', // V-226
		'closedNotEmptyHypercubeIsInvalid2.xbrl', // V-227
		'openNotEmptyHypercubeIsValid2.xbrl', // V-228
		'closedAllOpenNotAllWithDefaults-instance1.xbrl', // V-301
		'closedAllOpenNotAllWithDefaults-instance2.xbrl', // V-302
		'closedAllOpenNotAllWithDefaults-instance3.xbrl', // V-303
	) ) ) return;

	if ( false && ! in_array( $instanceFile, array(
		// 'InstanceInvalidAccordingToTwoDimensionalTaxonomies.xbrl', // V-22
		// 'combinationOfCubesCase1Segment.xbrl', // V-01
		// 'inheritanceEdgeUseCase-p3-c2.xbrl', // V-39
		// 'inheritanceEdgeUseCase-p5-c1.xbrl', // V-40
		// 'inheritanceSharedCube-p3-c1.xbrl', // V-67
		// 'inheritanceSharedCube-p3-c2.xbrl', // V-68
		// 'inheritanceOfClosedAttr-p3-c2closed.xbrl', // V-72
		// 'inheritanceOfClosedAttr-p3-c2open.xbrl', // V-73
		// 'inheritanceUsableAttr-p1-c1.xbrl',// V-74
		// 'multiRoleInheritenceTest2Instance7.xbrl', // V-138
		// 'multiRoleInheritenceTest3Instance1.xbrl',  // V-196
		// 'multiRoleInheritenceTest3Instance2.xbrl',  // V-197
		// 'multiRoleInheritenceTest4Instance1.xbrl',  // V-212
		// 'multiRoleInheritenceTest4Instance4.xbrl',  // V-215
		// 'multiRoleInheritenceTest5Instance1.xbrl',  // V-217
		// 'multiRoleInheritenceTest5Instance3.xbrl',  // V-219
		// 'multiRoleInheritenceTest5Instance4.xbrl',  // V-220
		// 'multiRoleInheritenceTest5Instance5.xbrl',  // V-221
		// 'multiRoleInheritenceTest5Instance6.xbrl',  // V-222
		// 'multiRoleInheritenceTest5Instance7.xbrl',  // V-223
		// 'multiRoleInheritenceTest5Instance8.xbrl',  // V-224
		// 'closedNotEmptyHypercubeIsInvalid2.xbrl', // V-227
		// 'closedAllOpenNotAllWithDefaults-instance1.xbrl', // V-301
	) ) ) return;

	// 204

	// if ( $instanceFile != 'contextContainsTypedDimensionValid.xbrl' ) continue; // v-01
	// if ( $instanceFile != 'contextContainsRepeatedDimension.xbrl' ) continue; // v-02
	// if ( $instanceFile != 'bi-locational-seg-explicit-instance.xml' ) continue; // v-03
	// if ( $instanceFile != 'bi-locational-dual-explicit-instance.xml' ) continue; // v-04
	// if ( $instanceFile != 'bi-locational-seg-typed-instance.xml' ) continue; // v-04b
	// if ( $instanceFile != 'bi-locational-dual-typed-instance.xml' ) continue; // v-05
	// if ( $instanceFile != 'bi-locational-dual-explicit-instance2.xml' ) continue; // v-07
	// if ( $instanceFile != 'repeatedDimensionInScenario.xbrl' ) continue; // v-08

	// 205
	// if ( $instanceFile != 'typedMemberIsExplicitInvalid.xbrl' ) continue;

	// 206
	// if ( $instanceFile != 'contextMemberNotExplicitDimension.xbrl' ) continue;

	// 207
	// if ( $instanceFile != 'contextExplicitDimDomainMemberNotFound.xbrl' ) continue;
	// if ( $instanceFile != 'EmptyDimensionAndNotAllHypercube-1.xbrl' ) continue;
	// if ( $instanceFile != 'EmptyDimensionAndNotAllHypercube-4.xbrl' ) continue;
	// if ( $instanceFile != 'EmptyDimensionAndNotAllHypercube-5.xbrl' ) continue;

	// 208
	// if ( $instanceFile != 'typedDimSegValid-instance.xml' ) continue;
	// if ( $instanceFile != 'typedDimScenValid-instance.xml' ) continue;
	// if ( $instanceFile != 'typedDimSegInvalid-instance.xml' ) continue;
	// if ( $instanceFile != 'typedDimScenInvalid-instance.xml' ) continue;
	// if ( $instanceFile != 'typedDimSegUnused-instance.xml' ) continue;
	// if ( $instanceFile != 'typedDimScenUnused-instance.xml' ) continue;

	// 270
	// if ( $instanceFile != 'example01-instance01-all.xml' ) continue;
	// if ( $instanceFile != 'example01-instance01-a.xml' ) continue;
	// if ( $instanceFile != 'example01-instance01-b.xml' ) continue;
	// if ( $instanceFile != 'example01-instance01-c.xml' ) continue;
	// if ( $instanceFile != 'example01-instance01-d.xml' ) continue;
	// if ( $instanceFile != 'example01-instance01-e.xml' ) continue;
	// if ( $instanceFile != 'example01-instance01-hc1-d1.xml' ) continue;
	// if ( $instanceFile != 'example01-instance01-hc2-d2.xml' ) continue;
	// if ( $instanceFile != 'example01-instance01-hc3-d3.xml' ) continue;
	// if ( $instanceFile != 'example01-instance01-d4.xml' ) continue;
	// if ( $instanceFile != 'illegal-default-instance01.xml' ) continue;
	// if ( $instanceFile != 'default-is-fact-item-instance.xml' ) continue;

	// 270
	// if ( $instanceFile != 'together.xml' ) continue;
	// if ( $instanceFile != 'apart.xml' ) continue;
	// if ( $instanceFile != '302-04-SegmentScenarioTupleValid.xml' ) continue;

}