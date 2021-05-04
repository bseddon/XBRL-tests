<?php

/**
 * Conformance test functions for XBRL Function Registry
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

use lyquidity\xml\MS\XmlNamespaceManager;
use lyquidity\XPath2\DOM\DOMXPathNavigator;
use lyquidity\XPath2\NodeProvider;
use lyquidity\XPath2\XPath2Expression;
use lyquidity\XPath2\FalseValue;
use lyquidity\xml\MS\XmlReservedNs;
use lyquidity\XPath2\XPath2NodeIterator;
use lyquidity\xml\schema\SchemaException;
use lyquidity\XPath2\XPath2Exception;

/**
 * Conformance test functions for XBRL functions
 */

if ( ! defined( 'UTILITY_LIBRARY_PATH' ) ) define( 'UTILITY_LIBRARY_PATH', __DIR__ . '/../utilities/' );
if ( ! defined( 'UTILITIES_LIBRARY_PATH' ) ) define( 'UTILITIES_LIBRARY_PATH', __DIR__ . '/../utilities/' );
if ( ! defined( 'XML_LIBRARY_PATH' ) ) define( 'XML_LIBRARY_PATH', __DIR__ . '/../xml/' );
if ( ! defined( 'XPATH20_LIBRARY_PATH' ) ) define( 'XPATH20_LIBRARY_PATH',  __DIR__ . '/../XPath2/' );
if ( ! defined( 'LOG_LIBRARY_PATH' ) ) define( 'LOG_LIBRARY_PATH', __DIR__ . '/../log/' );

if ( ! defined( 'CONFORMANCE_TEST_SUITE_XFI_LOCATION' ) )
{
	define( 'CONFORMANCE_TEST_SUITE_XFI_LOCATION', 'D:/GitHub/xbrlquery/conformance/conformance-formula/function-registry/' );
}

/**
 * Include the XBRL and example test code
 */
global $use_xbrl_functions;
$use_xbrl_functions = true;

if ( ! class_exists( "\\XBRL", true ) )
{
	/**
	 * Include XBRL
	 */
	require_once( __DIR__ . '/../source/XBRL.php' );
}

XBRL::setValidationState( true );

$log = XBRL_Log::getInstance();
$log->debugLog();

$conformance_base = CONFORMANCE_TEST_SUITE_XFI_LOCATION;

$xfiTests = simplexml_load_file( $conformance_base . "functionregistry.xml" );

$log->info( (string)$xfiTests->name );
$log->info( "There are " . count( $xfiTests->entry ) . " functions being tested" );

/**
 * This array is used to record any conformance warnings
 * @var array $issues
 */
global $issues;
$issues = array();

function debugTests( $conformance_base, $log )
{
	global $issues;
	$href = '80153 xfi.precision/80153 xfi.precision function.xml';
	$href = 'math functions/31001 pi functions testcase.xml';
	$href = 'math functions/31002 exp functions testcase.xml';
	$href = 'math functions/31003 exp10 functions testcase.xml';
	$href = 'math functions/31004 log functions testcase.xml';
	$href = 'math functions/31005 log10 functions testcase.xml';
	$href = 'math functions/31006 pow functions testcase.xml';
	$href = 'math functions/31007 sqrt functions testcase.xml';
	$href = 'math functions/31008 sin functions testcase.xml';
	$href = 'math functions/31009 cos functions testcase.xml';
	$href = 'math functions/31010 tan functions testcase.xml';
	$href = 'math functions/31011 asin functions testcase.xml';
	$href = 'math functions/31012 acos functions testcase.xml';
	$href = 'math functions/31013 atan functions testcase.xml';
	$href = 'math functions/31014 atan2 functions testcase.xml';
	$href = '90313 xfi.fact-typed-dimension-simple-value/90313 xfi.fact-typed-dimension-simple-value testcase.xml';
	$href = '80300 xfi.taxonomy-refs/80300 xfi.taxonomy-refs testcase.xml';
	$href = '80301 xfi.any-identifier/80301 xfi.any-identifier testcase.xml';
	$href = '80302 xfi.unique-identifiers/80302 xfi.unique-identifiers testcase.xml';
	$href = '80303 xfi.single-unique-identifier/80303 xfi.single-unique-identifier testcase.xml';
	$href = '80304 xfi.any-start-date/80304 xfi.any-start-date testcase.xml';
	$href = '80305 xfi.unique-start-dates/80305 xfi.unique-start-dates testcase.xml';
	$href = '80306 xfi.single-unique-start-date/80306 xfi.single-unique-start-date testcase.xml';
	$href = '80307 xfi.any-end-date/80307 xfi.any-end-date testcase.xml';
	$href = '80308 xfi.unique-end-dates/80308 xfi.unique-end-dates testcase.xml';
	$href = '80309 xfi.single-unique-end-date/80309 xfi.single-unique-end-date testcase.xml';
	$href = '80310 xfi.any-instant-date/80310 xfi.any-instant-date testcase.xml';
	$href = '80311 xfi.unique-instant-dates/80311 xfi.unique-instant-dates testcase.xml';
	$href = '80312 xfi.single-unique-instant-date/80312 xfi.single-unique-instant-date testcase.xml';
	$href = '80360 xfi.positive-filing-indicators/80360 xfi.positive-filing-indicators testcase.xml';
	$href = '80361 xfi.negative-filing-indicators/80361 xfi.negative-filing-indicators testcase.xml';
	$href = '80362 xfi.positive-filing-indicator/80362 xfi.positive-filing-indicator testcase.xml';
	$href = '80363 xfi.negative-filing-indicator/80363 xfi.negative-filing-indicator testcase.xml';

	processTest( "$conformance_base$href", $log );
	global $result;
	$result = array(
		'success' => ! $issues,
		'issues' => $issues
	);
}

debugTests( $conformance_base, $log ); return;

foreach ( $xfiTests->entry as /** @var SimpleXMLElement $entry */ $entry )
{
	$status = (string)$entry->status;
	$attributes = $entry->url->attributes( XBRL_Constants::$standardPrefixes[ STANDARD_PREFIX_XLINK ] );
	$href = (string)$attributes->href;
	if ( empty( $href ) )
	{
		$log->warning( "Unable to locate file '$href' in folder '$conformance_base'" );
		continue;
	}

	switch ( $href )
	{
		case "80101 xfi.context/80101 xfi.context function.xml":
		case "80102 xfi.unit/80102 xfi.unit function.xml":
		case "80103 xfi.unit-numerator/80103 xfi.unit-numerator function.xml":
		case "80104 xfi.unit-denominator/80104 xfi.unit-denominator function.xml":
		case "80105 xfi.measure-name/80105 xfi.measure-name function.xml":
		case "80120 xfi.period/80120 xfi.period function.xml":
		case "80121 xfi.context-period/80121 xfi.context-period function.xml":
		case "80122 xfi.is-start-end-period/80122 xfi.is-start-end-period function.xml":
		case "80123 xfi.is-forever-period/80123 xfi.is-forever-period function.xml":
		case "80124 xfi.is-duration-period/80124 xfi.is-duration-period function.xml":
		case "80125 xfi.is-instant-period/80125 xfi.is-instant-period function.xml":
		case "80126 xfi.period-start/80126 xfi.period-start function.xml":
		case "80127 xfi.period-end/80127 xfi.period-end function.xml":
		case "80129 xfi.period-instant/80129 xfi.period-instant function.xml":
		case "80130 xfi.entity/80130 xfi.entity function.xml":
		case "80131 xfi.context-entity/80131 xfi.context-entity function.xml":
		case "80132 xfi.identifier/80132 xfi.identifier function.xml":
		case "80133 xfi.context-identifier/80133 xfi.context-identifier function.xml":
		case "80134 xfi.entity-identifier/80134 xfi.entity-identifier function.xml":
		case "80135 xfi.identifier-value/80135 xfi.identifier-value function.xml":
		case "80136 xfi.identifier-scheme/80136 xfi.identifier-scheme function.xml":
		case "80137 xfi.segment/80137 xfi.segment function.xml":
		case "80138 xfi.entity-segment/80138 xfi.entity-segment function.xml":
		case "80139 xfi.context-segment/80139 xfi.context-segment function.xml":
		case "80140 xfi.scenario/80140 xfi.scenario function.xml":
		case "80141 xfi.context-scenario/80141 xfi.context-scenario function.xml":
		case "80142 xfi.fact-identifier-value/80142 xfi.fact-identifier-value function.xml":
		case "80143 xfi.fact-identifier-scheme/80143 xfi.fact-identifier-scheme function.xml":
		case "80150 xfi.is-non-numeric/80150 xfi.is-non-numeric function.xml":
		case "80151 xfi.is-numeric/80151 xfi.is-numeric function.xml":
		case "80152 xfi.is-fraction/80152 xfi.is-fraction function.xml":
		case "80153 xfi.precision/80153 xfi.precision function.xml":
		case "80154 xfi.decimals/80154 xfi.decimals function.xml":
		case "80155 xff.uncovered-aspect/80155 xff.uncovered-aspect function.xml":
		case "80156 xff.has-fallback-value/80156 xff.has-fallback-value function.xml":
		case "80157 xff.uncovered-non-dimensional-aspects/80157 xff.uncovered-non-dimensional-aspects function.xml":
		case "80158 xff.uncovered-dimensional-aspects/80158 xff.uncovered-dimensional-aspects function.xml":
		case "80200 xfi.identical-nodes/80200 xfi.identical-nodes function.xml":
		case "80201 xfi.s-equal/80201 xfi.s-equal function.xml":
		case "80202 xfi.u-equal/80202 xfi.u-equal function.xml":
		case "80203 xfi.v-equal/80203 xfi.v-equal function.xml":
		case "80204 xfi.c-equal/80204 xfi.c-equal function.xml":
		case "80205 xfi.identical-node-set/80205 xfi.identical-node-set function.xml":
		case "80206 xfi.s-equal-set/80206 xfi.s-equal-set function.xml":
		case "80207 xfi.v-equal-set/80207 xfi.v-equal-set function.xml":
		case "80208 xfi.c-equal-set/80208 xfi.c-equal-set function.xml":
		case "80209 xfi.u-equal-set/80209 xfi.u-equal-set function.xml":
		case "80210 xfi.x-equal/80210 xfi.x-equal function.xml":
		case "80211 xfi.duplicate-item/80211 xfi.duplicate-item function.xml":
		case "80212 xfi.duplicate-tuple/80212 xfi.duplicate-tuple function.xml":
		case "80213 xfi.p-equal/80213 xfi.p-equal function.xml":
		case "80214 xfi.cu-equal/80214 xfi.cu-equal function.xml":
		case "80215 xfi.pc-equal/80215 xfi.pc-equal function.xml":
		case "80216 xfi.pcu-equal/80216 xfi.pcu-equal function.xml":
		case "80217 xfi.start-equal/80217 xfi.start-equal function.xml":
		case "80218 xfi.end-equal/80218 xfi.end-equal function.xml":
		case "80219 xfi.nodes-correspond/80219 xfi.nodes-correspond function.xml":
		case "90101 xfi.facts-in-instance/90101 xfi.facts-in-instance function.xml":
		case "90102 xfi.items-in-instance/90102 xfi.items-in-instance function.xml":
		case "90103 xfi.tuples-in-instance/90103 xfi.tuples-in-instance function.xml":
		case "90104 xfi.items-in-tuple/90104 xfi.items-in-tuple function.xml":
		case "90105 xfi.tuples-in-tuple/90105 xfi.tuples-in-tuple function.xml":
		case "90106 xfi.non-nil-facts-in-instance/90106 xfi.non-nil-facts-in-instance function.xml":
		case "90201 xfi.concept-balance/90201 xfi.concept-balance function.xml":
		case "90202 xfi.concept-period-type/90202 xfi.concept-period-type function.xml":
		case "90203 xfi.concept-custom-attribute/90203 xfi.concept-custom-attribute function.xml":
		case "90204 xfi.concept-data-type/90204 xfi.concept-data-type function.xml":
		case "90205 xfi.concept-data-type-derived-from/90205 xfi.concept-data-type-derived-from function.xml":
		case "90206 xfi.concept-substitutions/90206 xfi.concept-substitutions function.xml":
		case "90213 xfi.filter-member-network-selection/90213 xfi.filter-member-network-selection function.xml":
		case "90214 xfi.filter-member-DRS-selection/90214 xfi.filter-member-DRS-selection function.xml":
		// case "90301 xfi.fact-explicit-scenario-dimension-value/90301 xfi.fact-explicit-scenario-dimension-value function.xml":
		case "90304 xfi.fact-segment-remainder/90304 xfi.fact-segment-remainder function.xml":
		case "90305 xfi.fact-scenario-remainder/90305 xfi.fact-scenario-remainder function.xml":
		case "90306 xfi.fact-has-explicit-dimension/90306 xfi.fact-has-explicit-dimension function.xml":
		case "90307 xfi.fact-has-typed-dimension/90307 xfi.fact-has-typed-dimension function.xml":
		case "90308 xfi.fact-has-explicit-dimension-value/90308 xfi.fact-has-explicit-dimension-value function.xml":
		case "90309 xfi.fact-explicit-dimension-value/90309 xfi.fact-explicit-dimension-value function.xml":
		case "90310 xfi.fact-typed-dimension-value/90310 xfi.fact-typed-dimension-value function.xml":
		case "90311 xfi.fact-explicit-dimensions/90311 xfi.fact-explicit-dimensions function.xml":
		case "90312 xfi.fact-typed-dimensions/90312 xfi.fact-typed-dimensions function.xml" :
		case "90403 xfi.fact-dimension-s-equal2/90403 xfi.fact-dimension-s-equal2 function.xml":
		// This test does not really pass.  The XBRL implementation does not accumulate a list of
		// ELRs indexed by arc role.  Plus, for example, the XBRL implementation does not currently
		// process footnote linkbases.
		case "90501 xfi.linkbase-link-roles/90501 xfi.linkbase-link-roles function.xml":
		// This test does not include a conformance test file reference
		// case "90501i xfi.linkbase-link-roles/90501i xfi.linkbase-link-roles function.xml":
		// This function does not appear in the functions registry.
		// Although the signature has been implemenented the functionality has not.
		case "90502 xfi.navigate-relationships/90502 xfi.navigate-relationships function.xml":
		case "90503 xfi.concept-label/90503 xfi.concept-label function.xml":
		// This test does not include a conformance test file reference
		// case "90503i xfi.concept-label/90503i xfi.concept-label function.xml":
		case "90504 xfi.arcrole-definition/90504 xfi.arcrole-definition function.xml":
		// This test does not include a conformance test file reference
		// case "90504i xfi.arcrole-definition/90504i xfi.arcrole-definition function.xml":
		case "90505 xfi.role-definition/90505 xfi.role-definition function.xml":
		// This test does not include a conformance test file reference
		// case "90505i xfi.role-definition/90505i xfi.role-definition function.xml":
		case "90506 xfi.fact-footnotes/90506 xfi.fact-footnotes function.xml":
		case "90507 xfi.concept-relationships/90507 xfi.concept-relationships function.xml":
		// This test does not include a conformance test file reference
		// case "90507i xfi.concept-relationships/90507i xfi.concept-relationships function.xml":
		case "90508 xfi.relationship-from-concept/90508 xfi.relationship-from-concept function.xml":
		case "90509 xfi.relationship-to-concept/90509 xfi.relationship-to-concept function.xml":
		case "90510 xfi.distinct-nonAbstract-parent-concepts/90510 xfi.distinct-nonAbstract-parent-concepts function.xml":
		// This test does not include a conformance test file reference
		// case "90510i xfi.distinct-nonAbstract-parent-concepts/90510i xfi.distinct-nonAbstract-parent-concepts function.xml":
		case "90511 xfi.relationship-attribute/90511 xfi.relationship-attribute function.xml":
			// The tests below are the one containing custom and generic links
		case "90512 xfi.relationship-link-attribute/90512 xfi.relationship-link-attribute function.xml":
		case "90513 xfi.relationship-name/90513 xfi.relationship-name function.xml":
		case "90514 xfi.relationship-link-name/90514 xfi.relationship-link-name function.xml":
		case "90601 xfi.xbrl-instance/90601 xfi.xbrl-instance function.xml":
		case "90701 xfi.format-number/90701 xfi.format-number function.xml":
			// continue 2;

		case "math functions/31001 pi functions testcase.xml":
		case "math functions/31002 exp functions testcase.xml":
		case "math functions/31003 exp10 functions testcase.xml":
		case "math functions/31004 log functions testcase.xml":
		case "math functions/31005 log10 functions testcase.xml":
		case "math functions/31006 pow functions testcase.xml":
		case "math functions/31007 sqrt functions testcase.xml":
		case "math functions/31008 sin functions testcase.xml":
		case "math functions/31009 cos functions testcase.xml":
		case "math functions/31010 tan functions testcase.xml":
		case "math functions/31011 asin functions testcase.xml":
		case "math functions/31012 acos functions testcase.xml":
		case "math functions/31013 atan functions testcase.xml":
		case "math functions/31014 atan2 functions testcase.xml":
		case "80300 xfi.taxonomy-refs/80300 xfi.taxonomy-refs testcase.xml":
		case "80301 xfi.any-identifier/80301 xfi.any-identifier testcase.xml":
		case "80302 xfi.unique-identifiers/80302 xfi.unique-identifiers testcase.xml":
		case "80303 xfi.single-unique-identifier/80303 xfi.single-unique-identifier testcase.xml":
		case "80304 xfi.any-start-date/80304 xfi.any-start-date testcase.xml":
		case "80305 xfi.unique-start-dates/80305 xfi.unique-start-dates testcase":
		case "80306 xfi.single-unique-start-date/80306 xfi.single-unique-start-date testcase.xml":
		case "80307 xfi.any-end-date/80307 xfi.any-end-date testcase.xml":
		case "80308 xfi.unique-end-dates/80308 xfi.unique-end-dates testcase":
		case "80309 xfi.single-unique-end-date/80309 xfi.single-unique-end-date testcase.xml":
		case "80310 xfi.any-instant-date/80310 xfi.any-instant-date testcase.xml":
		case "80311 xfi.unique-instant-dates/80311 xfi.unique-instant-dates testcase":
		case "80312 xfi.single-unique-instant-date/80312 xfi.single-unique-instant-date testcase.xml":
		case "80360 xfi.positive-filing-indicators/80360 xfi.positive-filing-indicators testcase.xml":
		case "80361 xfi.negative-filing-indicators/80361 xfi.negative-filing-indicators testcase.xml":
		case "80362 xfi.positive-filing-indicator/80362 xfi.positive-filing-indicator testcase.xml":
		case "80363 xfi.negative-filing-indicator/80363 xfi.negative-filing-indicator testcase.xml":

			break;

		default:
			continue 2;
	}

	processTest( "$conformance_base$href", $log );
}

global $result;
$result = array(
	'success' => ! $issues,
	'issues' => $issues
);

echo __DIR__ . '/' . basename( __FILE__, 'php' ) . "json\n";
file_put_contents( __DIR__ . '/' . basename( __FILE__, 'php' ) . 'json', json_encode( $result ) );

return;

/**
 * Process the tests for each numbered function
 * @param string $href
 * @param XBRL_Log $log
 */
function processTest( $href, $log )
{
	if ( ! file_exists( $href ) )
	{
		$log->warning( "  The test file cannot be found: $href" );
	}

	$log->info( "Processing: " . basename( $href ) );

	$testDetails = simplexml_load_file( $href );
	if ( ! isset( $testDetails->conformanceTest ) )
	{
		// The functions described by $href do not include a conformance test file reference
		$log->warning("The functions described by the xml file do not include a conformance test file reference");
		return;
	}
	$conformanceTest = $testDetails->conformanceTest->attributes( XBRL_Constants::$standardPrefixes[ STANDARD_PREFIX_XLINK ] );
	$conformanceTestFile = (string)$conformanceTest->href;

	if ( ! file_exists( dirname( $href ) . "/$conformanceTestFile" ) )
	{
		$log->warning( " The test variations file cannot be found: $conformanceTestFile " );
	}

	/**
	 * @var \SimpleXMLElement
	 */
	$testCases = simplexml_load_file( dirname( $href ) . "/$conformanceTestFile", "SimpleXMLElement", LIBXML_NOBLANKS );

	$log->info( $testCases->name );
	$xbrlInstance = null;

	foreach ( $testCases->variation as $variation )
	{
		$attributes = $variation->attributes();
		$id = (string)$attributes->id;

		// if ( $id < "V-11" || $id > "V-11" ) continue;

 		$name = $variation->name;

		$log->info( "  $id - $name" );

		$nsMgr = new XmlNamespaceManager();
		foreach ( XBRL_Constants::$standardPrefixes as $prefix => $namespace )
		{
			$nsMgr->addNamespace( $prefix, $namespace );
		}

		foreach ( $testCases->getDocNamespaces( true ) as $prefix => $namespace )
		{
			$nsMgr->addNamespace( $prefix, $namespace );
		}

		/**
		 * Inputs
		 */
		$inputs = $variation->inputs;
		if ( property_exists( $inputs, 'schema' ) )
		{
			$schema = (string)$inputs->schema->attributes( XBRL_Constants::$standardPrefixes[ STANDARD_PREFIX_XLINK ] )->href;
		}

		$xbrlInstance = null;
		$taxonomy = null;
		$provider = null;

		if ( property_exists( $inputs, 'instance' ) )
		{
			$instances = array();
			$first = "";
			foreach ( $inputs->instance as $instance )
			{
				$attributes = $inputs->instance->attributes( XBRL_Constants::$standardPrefixes[ STANDARD_PREFIX_XLINK ] );
				$file = (string)$attributes->href;
				$instances[] = $file;
				$attributes = $inputs->instance->attributes();
				if ( ! property_exists( $attributes, 'readMeFirst' ) || ! filter_var( (string)$attributes->readMeFirst, FILTER_VALIDATE_BOOLEAN ) ) continue;
				$first = $file;
			}

			if ( $first )
			{
				if ( ( $key = array_search( $first, $instances ) ) !== false )
				{
					unset( $instances[ $key ] );
				}
			}

			/**
			 * @var XBRL_Instance $xbrlInstance
			 */
			$document = XBRL::resolve_path( $href, $first );
			if ( ! $xbrlInstance || $xbrlInstance->getDocumentName() != $document )
			{
				// Here need to 'reset' the document just like the XBRL/XDT conformance tests or the wrong documents are selected
				XBRL_Instance::reset();
				$xbrlInstance = XBRL_Instance::FromInstanceDocument( $document );
			}

			foreach ( $instances as $instance )
			{
				// To do if necessary
			}

			foreach ( $xbrlInstance->getInstanceNamespaces() as $prefix => $namespace )
			{
				$nsMgr->addNamespace( $prefix, $namespace );
			}

			$dom = dom_import_simplexml( $xbrlInstance->getInstanceXml() );
			$nav = new DOMXPathNavigator( $dom );
			$nav->MoveToRoot();

			$provider = new NodeProvider( $nav );
		}
		else if ( isset( $schema ) )
		{
			XBRL_Instance::reset();

			$document = XBRL::resolve_path( $href, $schema );
			$taxonomy = XBRL::load_taxonomy( $document, false );
			$log->info( "    Using schema document: " . $document );
			if ( ! $taxonomy )
			{
				$log->warning( "    !!! Schema document cannot be loaded" );
				continue;
			}

			if ( property_exists( $inputs, 'linkbase' ) )
			{
				foreach ( $inputs->linkbase as $id => $linkbase )
				{
					$attributes = $linkbase->attributes( XBRL_Constants::$standardPrefixes[ STANDARD_PREFIX_XLINK ] );
					$file = (string)$attributes->href;
					$linkbaseRoleTypes = $taxonomy->getAllLinkbaseRoleTypes();
					if ( isset( $linkbaseRoleTypes[ $file ] ) ) continue;

					$xml = simplexml_load_file( dirname( $href) . "/" . $file );
					$nodes = $xml->children( XBRL_Constants::$standardPrefixes[ STANDARD_PREFIX_LINK ] );
					$role = "";
					foreach ( $nodes as $node )
					{
						switch ( $node->getName() )
						{
							case "presentationLink" :
								$role = XBRL_Constants::$PresentationLinkbaseRef;
								break;

							case "labelLink":
								$role = XBRL_Constants::$LabelLinkbaseRef;
								break;

							case "definitionLink":
								$role = XBRL_Constants::$DefinitionLinkbaseRef;
								break;

							case "calculationLink":
								$role = XBRL_Constants::$CalculationLinkbaseRef;
								break;

							case "referenceLink":
								$role = XBRL_Constants::$ReferenceLinkbaseRef;
								break;

							default:
								continue 2;
						}
					}
					unset( $nodes );
					unset( $xml );
					$taxonomy->addLinkbaseRef( $file, (string)$name, "simple", $role );
				}
			}

			foreach ( $taxonomy->getDocumentNamespaces() as $prefix => $namespace )
			{
				$nsMgr->addNamespace( $prefix, $namespace );
			}
		}

		$call = trim( (string)$inputs->children( XBRL_Constants::$standardPrefixes[ STANDARD_PREFIX_CONFORMANCE_FUNCTION ] ) );
		$log->info( "    Query: $call" );

		/**
		 * Outputs
		 */
		$outputs = $variation->outputs;
		$errorCode = "";
		if ( property_exists( $outputs, "error" ) )
		{
			$errorCode = (string)$outputs->error;
			$q = \qname( $errorCode, $testCases->getDocNamespaces() );
			if ( $q->namespaceURI == XmlReservedNs::xqtErrors )
			{
				$errorCode = $q->localName;
			}
			$log->info( "    Error expected '$errorCode'" );
			$test = null;
		}
		else
		{
			$test = trim( (string)$outputs->children( XBRL_Constants::$standardPrefixes[ STANDARD_PREFIX_CONFORMANCE_FUNCTION ] )->test );
			$log->info( "    Error not expected" );
			$log->info( "    Test: $test" );
		}

		try
		{
			/**
			 * @var XPath2Expression $expression
			 */
			$expression = XPath2Expression::Compile( $call, $nsMgr );
			$expression->AddToContext( "xbrlInstance", $xbrlInstance );
			$expression->AddToContext( "xbrlTaxonomy", $xbrlInstance ? $xbrlInstance->getInstanceTaxonomy() : $taxonomy );
			$result = $expression->EvaluateWithVars( $provider, array( /* 'xbrlInstance' => $xbrlInstance */ ) );

			if ( $result instanceof XPath2NodeIterator )
			{
				// This is required to exercise results that can only generate
				// an error when evaluated such as has-fallback-value
				$count = $result->getCount();
				// $result->MoveNext();
				// $result->Reset();
				// foreach ( $result as $item )
				// {
				//  	$x = $item->getValue();
				// }
			}

			if ( empty( $test ) )
			{
				$log->warning( "Expected error" );

				// Record the issue for external reporting
				global $issues;
				$issues[] = array(
					'test' => $conformanceTestFile,
					'variation' => $id,
					'type' => "Expected error",
				);
			}
			else
			{
				$tests = array(
					$test
				);

				foreach ( $tests as $test )
				{
					// $log->info( $test );
					$expression = XPath2Expression::Compile( $test, $nsMgr );
					$testResult = $expression->EvaluateWithVars( $provider, array( 'result' => $result ) );

					if ( ! $testResult || $testResult instanceof FalseValue )
					{
						$log->warning( "    ** Test failed." );

						// Record the issue for external reporting
						global $issues;
						$issues[] = array(
							'test' => $conformanceTestFile,
							'variation' => $id,
							'expected' => "Test failed",
							'test' => $test
						);
					}
				}
			}
		}
		catch( XPath2Exception $ex )
		{
			if ( $ex->ErrorCode == $errorCode ) continue;
			$log->warning( "    " . $ex->getMessage() );

			// Record the issue for external reporting
			global $issues;
			$issues[] = array(
				'test' => $conformanceTestFile,
				'variation' => $id,
				'type' => "XPath2Exception",
				'message' => $ex->getMessage()
			);
		}
		catch( SchemaException $ex )
		{
			$log->warning( "    Unexpected schema exception: " . $ex->getMessage() );

			// Record the issue for external reporting
			global $issues;
			$issues[] = array(
				'test' => $conformanceTestFile,
				'variation' => $id,
				'type' => "SchemaException",
				'message' => $ex->getMessage()
			);
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
	}

}