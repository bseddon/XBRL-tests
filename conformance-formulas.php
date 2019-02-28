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

use lyquidity\XPath2\FunctionTable;
use lyquidity\XPath2\XPath2ResultType;
use function XBRL\functions\getFactDimensionSEqual;
use lyquidity\XPath2\Iterator\DocumentOrderNodeIterator;
use lyquidity\XPath2\Value\QNameValue;
use lyquidity\XPath2\DOM\DOMXPathNavigator;
use lyquidity\XPath2\XPath2Item;
use lyquidity\XPath2\DOM\XmlSchema;
use lyquidity\XPath2\CoreFuncs;
use lyquidity\xml\QName;
use lyquidity\XPath2\XPath2Exception;
use lyquidity\xml\schema\SchemaTypes;

global $use_xbrl_functions, $debug_statements;
// Are documents to be processed in a way that uses formula information
$use_xbrl_functions = true;
// Controls whether verbose debug information is written to the console
$debug_statements = false;

ini_set('xdebug.max_nesting_level', 512);

define( 'UTILITY_LIBRARY_PATH', __DIR__ . '/../utilities/' );
define( 'XML_LIBRARY_PATH', __DIR__ . '/../xml/' );
define( 'XPATH20_LIBRARY_PATH',  __DIR__ . '/../XPath2/' );
define( 'LOG_LIBRARY_PATH', __DIR__ . '/../log/' );

if ( ! defined( 'CONFORMANCE_TEST_SUITE_FORMULA_LOCATION' ) )
{
	define( 'CONFORMANCE_TEST_SUITE_FORMULA_LOCATION', 'D:/GitHub/xbrlquery/conformance/conformance-formula/tests/' );
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

XBRL::setValidationState();

global $conformance_base;
$conformance_base = CONFORMANCE_TEST_SUITE_FORMULA_LOCATION;
// Make sure the path looks like a Linux path and ends in a forward slash
$conformance_base = str_replace( "\\", "/", $conformance_base );
if ( ! SchemaTypes::endsWith( $conformance_base, "/" ) )
{
	$conformance_base .= "/";
}

$run10000SeriesTests = true;
$run20000SeriesTests = true;
$run30000SeriesTests = true;
$run40000SeriesTests = true;
$run50000SeriesTests = true;
$run60000SeriesTests = true;
$runExampleTests = true;

/**
 * This array is used to record any conformance warnings
 * @var array $issues
 */
global $issues;
$issues = array();

// performTestcase( $log, "22090", "20000 Variables/22090-Variable-Processing-VariableSetRelationships/22090 Variable Set Relationship.xml" );
// performTestcase( $log, "23020", "20000 Variables/23020-Variable-AspectTests-TypedDimension/23020 AspectTests TypedDimension.xml" );
// performTestcase( $log, "22180", "20000 Variables/22180-Variable-Processing-BindEmpty/22180 Bind To Empty Sequence.xml" );
// performTestcase( $log, "32210", "30000 Assertions/32210-ExistenceAssertion-Processing/32210 Existence Assertion Processing.xml" );
// performTestcase( $log, "60100", "60000 Extensions/60100 GenericMessages-Processing/60100 GenericMessages Processing.xml" );
// performTestcase( $log, "60500", "60000 Extensions/60500 FormulaTuples-Processing/60500 FormulaTuples-Processing.xml" );
//
// global $result;
// $result = array(
// 	'success' => ! $issues,
// 	'series' => array( '1000' => $run10000SeriesTests, '2000' => $run20000SeriesTests, '3000' => $run30000SeriesTests, '4000' => $run40000SeriesTests, '5000' => $run50000SeriesTests, '6000' => $run60000SeriesTests, 'examples' => $runExampleTests ),
// 	'issues' => $issues
// );
//
// echo  __DIR__ . '/' .  basename( __FILE__, 'php' ) . "json\n";
// file_put_contents( __DIR__ . '/' .  basename( __FILE__, 'php' ) . 'json', json_encode( $result ) );
//
// return;

if ( $run10000SeriesTests )
{
/* 1  */ performTestcase( $log, "11021", "10000 Formula/11021-Formula-StaticAnalysis-MissingConceptRule/11021_MissingConceptRule_testcase.xml" );
/* 2  */ performTestcase( $log, "11023", "10000 Formula/11023-Formula-StaticAnalysis-MissingUnitConstructionRule/11023-MissingUnitRule_testcase.xml" );
/* 2  */ performTestcase( $log, "11025", "10000 Formula/11025-Formula-StaticAnalysis-ConflictingAspectRules/11025-ConflictingAspectRules_testcase.xml" );
/* 1  */ performTestcase( $log, "11027", "10000 Formula/11027-Formula-StaticAnalysis-MissingEntityIdentifierRule/11027-MissingEntityIdentifierRule_testcase.xml" );
/* 1  */ performTestcase( $log, "11028", "10000 Formula/11028-Formula-StaticAnalysis-MissingPeriodRule/11028-MissingPeriodRule_testcase.xml" );
/* 1  */ performTestcase( $log, "11029", "10000 Formula/11029-Formula-StaticAnalysis-incompleteConceptRule/11029-incompleteConceptRule_testcase.xml" );
/* 3  */ performTestcase( $log, "11041", "10000 Formula/11041-Formula-StaticAnalysis-incompleteEntityIdentifierRule/11041-incompleteEntityIdentifierRule_testcase.xml" );
/* 1  */ performTestcase( $log, "11051", "10000 Formula/11051-Formula-StaticAnalysis-incompletePeriodRule/11051-incompletePeriodRule_testcase.xml" );
/* 2  */ performTestcase( $log, "11062", "10000 Formula/11062-Formula-StaticAnalysis-OCC-missingSAVForDimensionRule/11062-OCC-missingSAVForDimensionRule_testcase.xml" );
/* 1  */ performTestcase( $log, "11063", "10000 Formula/11063-Formula-StaticAnalysis-MissingSAVForUnitRule/11063-missingSAVForUnitRule_testcase.xml" );
/* 2  */ performTestcase( $log, "11071", "10000 Formula/11071-Formula-StaticAnalysis-badUsageOfDimensionRule/11071 Bad Usage Of Dimension Rules.xml" );
/* 1  */ performTestcase( $log, "11201", "10000 Formula/11201-Formula-StaticAnalysis-unrecognisedAspectRule/11201-unrecognisedAspectRule_testcase.xml" );
/* 1  */ performTestcase( $log, "11202", "10000 Formula/11202-Formula-StaticAnalysis-illegalUseOfUncoveredQName/11202-illegalUseOfUncoveredQName_testcase.xml" );
/* 2  */ performTestcase( $log, "11204", "10000 Formula/11204-Formula-StaticAnalysis-sequenceSAVConflicts/11204-sequenceSAVConflicts_testcase.xml" );
/* 4  */ performTestcase( $log, "11205", "10000 Formula/11205-Formula-StaticAnalysis-nonExistentSourceVariable/11205-nonExistentSourceVariable_testcase.xml" );
/* 2  */ performTestcase( $log, "11206", "10000 Formula/11206-Formula-StaticAnalysis-bindEmptySourceVariable/11206-bindEmptySourceVariable_testcase.xml" );
/* 1  */ performTestcase( $log, "11207", "10000 Formula/11207-Formula-StaticAnalysis-defaultAspectValueConflicts/11207-defaultAspectValueConflicts_testcase.xml" );
/* 12 */ performTestcase( $log, "12010", "10000 Formula/12010-Formula-Processing-ConstructingFactValue/12010 Constructing fact value.xml" );
/* 4  */ performTestcase( $log, "12020", "10000 Formula/12020-Formula-Processing-AspectRules/12020 Aspect Rules.xml" );
/* 1  */ performTestcase( $log, "12021", "10000 Formula/12021-Formula-Processing-undefinedSAV/12021-undefinedSAV_testcase.xml" );
/* 1  */ performTestcase( $log, "12030", "10000 Formula/12030-Formula-Processing-ConceptRules/12030 Concept Rules.xml" );
/* 3  */ performTestcase( $log, "12040", "10000 Formula/12040-Formula-Processing-EntityRules/12040 Entity Rules.xml" );
/* 8  */ performTestcase( $log, "12050", "10000 Formula/12050-Formula-Processing-PeriodRules/12050 Period Rules.xml" );
/* 10 */ performTestcase( $log, "12060", "10000 Formula/12060-Formula-Processing-OCCRules/12060 OCC Rules.xml" );
/* 26 */ performTestcase( $log, "12061", "10000 Formula/12061-Formula-Processing-DimensionRules/12061 Dimension Rules.xml" );
/* 11 */ performTestcase( $log, "12062", "10000 Formula/12062-Formula-Processing-DimensionUncovered/12062 DimensionUncovered Rules.xml" );
/* 7  */ performTestcase( $log, "12070", "10000 Formula/12070-Formula-Processing-UnitRules/12070 Unit Rules.xml" );
/* 3  */ performTestcase( $log, "12080", "10000 Formula/12080-Formula-Processing-ConstructingAccuracy/12080 Constructing accuracy.xml" );
/* 1  */ performTestcase( $log, "14010", "10000 Formula/14010-Formula-UseCases-BasicCalculation/14010 Use Cases Basic Calculation.xml" );
/* 1  */ performTestcase( $log, "14020", "10000 Formula/14020-Formula-UseCases-Movement/14020 Use Cases Movement.xml" );
}
if ( $run20000SeriesTests )
{
/* 3  */ performTestcase( $log, "21201", "20000 Variables/21201-VariableStaticAnalysis-noCustomFunctionSignature/21201_noCustomFunctionSignature_testcase.xml" );
/* 1  */ performTestcase( $log, "21221", "20000 Variables/21221-VariableStaticAnalysis-parameterNameClash/21221-parameterNameClash_testcase.xml" );
/* 2  */ performTestcase( $log, "21222", "20000 Variables/21222-VariableStaticAnalysis-parameterCyclicDependencies/21222-parameterCyclicDependencies_testcase.xml" );
/* 3  */ performTestcase( $log, "21231", "20000 Variables/21231-VariableStaticAnalysis-parameterTypeMismatch/21231-parameterTypeMismatch_testcase.xml" );
/* 3  */ performTestcase( $log, "21233", "20000 Variables/21233-VariableStaticAnalysis-GeneralVariables/21233 General Variable Static Analysis.xml" );
/* 1  */ performTestcase( $log, "21241", "20000 Variables/21241-VariableStaticAnalysis-FactVariables/21241 Fact Variable Static Analysis.xml" );
/* 6  */ performTestcase( $log, "21251", "20000 Variables/21251-VariableStaticAnalysis-VariableSetDuplicateNames/21251 Variable Set Duplicate Names.xml" );
/* 1  */ performTestcase( $log, "21261", "20000 Variables/21261-VariableStaticAnalysis-VariableFilterRelationships/21261 VariableFilter Relationship.xml" );
/* 1  */ performTestcase( $log, "21271", "20000 Variables/21271-VariableStaticAnalysis-VariableSetFilterRelationships/21271 VariableSetFilter Relationship.xml" );
/* 1  */ performTestcase( $log, "21291", "20000 Variables/21291-VariableStaticAnalysis-VariableSetRelationships/21291 VariableSet Relationship.xml" );
/* 2  */ performTestcase( $log, "21321", "20000 Variables/21321-VariableStaticAnalysis-unkownAspectModel/21321-unkownAspectModel_testcase.xml" );
/* 2  */ performTestcase( $log, "21322", "20000 Variables/21322-VariableStaticAnalysis-aspectModelMismatch/21322-aspectModelMismatch_testcase.xml" );
/* 1  */ performTestcase( $log, "21350", "20000 Variables/21350-VariableStaticAnalysis-PreconditionRelationships/21350 Precondition Relationship.xml" );
/* 3  */ performTestcase( $log, "21363", "20000 Variables/21363-VariableStaticAnalysis-unresolvedDependency/21363-unresolvedDependency_testcase.xml" );
/* 2  */ performTestcase( $log, "21851", "20000 Variables/21851-VariableStaticAnalysis-factVariableReferenceNotAllowed/21851-factVariableReferenceNotAllowed_testcase.xml" );
/* 1  */ performTestcase( $log, "21930", "20000 Variables/21930-VariableStaticAnalysis-cyclicDependencies/21930-cyclicDependencies_testcase.xml" );
/* 17 */ performTestcase( $log, "22010", "20000 Variables/22010-Variable-Processing-XPathUsage/22010 XPath Usage.xml" );
/* 2  */ performTestcase( $log, "22015", "20000 Variables/22015-Variable-Processing-CustomFunctionSignatures/22015 Custom Function Signatures Processing.xml" );
/* 12 */ performTestcase( $log, "22020", "20000 Variables/22020-Variable-Processing-Parameters/22020 Parameters.xml" );
/* 6  */ performTestcase( $log, "22030", "20000 Variables/22030-Variable-Processing-GeneralVariables/22030 General Variables.xml" );
/* 13 */ performTestcase( $log, "22040", "20000 Variables/22040-Variable-Processing-FactVariables/22040 Fact Variables.xml" );
/* 2  */ performTestcase( $log, "22050", "20000 Variables/22050-Variable-Processing-Filters/22050 Filters.xml" );
/* 8  */ performTestcase( $log, "22060", "20000 Variables/22060-Variable-Processing-VariableNames/22060 Variable Names.xml" );
/* 2  */ performTestcase( $log, "22070", "20000 Variables/22070-Variable-Processing-VariableSetFilterRelationships/22070 Variable Set Filter Relationships.xml" );
/* 5  */ performTestcase( $log, "22090", "20000 Variables/22090-Variable-Processing-VariableSetRelationships/22090 Variable Set Relationship.xml" );
/* 4  */ performTestcase( $log, "22140", "20000 Variables/22140-Variable-Processing-Precondition/22140 Preconditions.xml" );
/* 3  */ performTestcase( $log, "22160", "20000 Variables/22160-Variable-Processing-Evaluation/22160 Evaluation.xml" );
/* 0  */ performTestcase( $log, "22161", "20000 Variables/22161-Variable-Processing-Evaluation-ambiguousAspects/22161 Evaluation AmbiguousAspects.xml" );
/* 31 */ performTestcase( $log, "22170", "20000 Variables/22170-Variable-Processing-BindAsSequence/22170 Bind As Sequence.xml" );
/* 35 */ performTestcase( $log, "22180", "20000 Variables/22180-Variable-Processing-BindEmpty/22180 Bind To Empty Sequence.xml" );
/* 8  */ performTestcase( $log, "23020", "20000 Variables/23020-Variable-AspectTests-TypedDimension/23020 AspectTests TypedDimension.xml" );
/* 1  */ performTestcase( $log, "23030", "20000 Variables/23030-Variable-AspectTests-DefaultDimension/23030 AspectTests DefaultDimension.xml" );
/* 1  */ performTestcase( $log, "23040", "20000 Variables/23040-VariableStaticAnalysis-prohibitedNamespaceUsedForCustomFunction/23040-VariableStaticAnalysis-prohibitedNamespaceUsedForCustomFunction.xml" );
}
if ( $run30000SeriesTests )
{
/* 1  */ performTestcase( $log, "31110", "30000 Assertions/31110-ConsistencyAssertion-StaticAnalysis-radiusConflict/31110 Consistency Assertion Radius Conflict.xml" );
/* 2  */ performTestcase( $log, "31130", "30000 Assertions/31130-ConsistencyAssertion-StaticAnalysis-variablesNotAllowed/31130 Consistency Assertion Variables Not Allowed.xml" );
/* 1  */ performTestcase( $log, "31140", "30000 Assertions/31140-ConsistencyAssertion-StaticAnalysis-missingFormulae/31140 Consistency Assertion Missing Formulae.xml" );
/* 17 */ performTestcase( $log, "31210", "30000 Assertions/31210-ConsistencyAssertion-Processing/31210 Consistency Assertion Processing.xml" );
/* 8  */ performTestcase( $log, "31220", "30000 Assertions/31220-ConsistencyAssertion-Processing-Nil/31220 Consistency Assertion Nil Processing.xml" );
/* 15 */ performTestcase( $log, "31230", "30000 Assertions/31230-ConsistencyAssertion-Processing-Accuracy/31230 Consistency Assertion Processing.xml" );
/* 2  */ performTestcase( $log, "31410", "30000 Assertions/31410-ConsistencyAssertion-UseCases-BasicCalculation/31410 Use Cases Basic Calculation.xml" );
/* 1  */ performTestcase( $log, "31420", "30000 Assertions/31420-ConsistencyAssertion-UseCases-DerivedRiskedCapital/31420 Use Case Derived Risked Capital.xml" );
/* 2  */ performTestcase( $log, "31430", "30000 Assertions/31430-ConsistencyAssertion-UseCases-Pharmaceutical/31430 Use Cases Pharmaceutical.xml" );
/* 1  */ performTestcase( $log, "31440", "30000 Assertions/31440-ConsistencyAssertion-UseCases-DimensionalWeightedAverage/31440 Use Cases Dimensional Weighted Average.xml" );
/* 1  */ performTestcase( $log, "32110", "30000 Assertions/32110-ExistenceAssertion-StaticAnalysis-Element/32110 Existence Assertion Element Static Analysis .xml" );
/* 1  */ performTestcase( $log, "32120", "30000 Assertions/32120-ExistenceAssertion-StaticAnalysis-Relationships/32120 Existence Assertion Relationship Static Analysis.xml" );
/* 7  */ performTestcase( $log, "32210", "30000 Assertions/32210-ExistenceAssertion-Processing/32210 Existence Assertion Processing.xml" );
/* 12 */ performTestcase( $log, "33210", "30000 Assertions/33210-ValueAssertion-Processing/33210 Value Assertion Processing.xml" );
/* 5  */ performTestcase( $log, "34110", "30000 Assertions/34110-MultiAssertion-Processing/34110 Multi Assertion Processing.xml" );
// This test case should not be included
// performTestcase( $log, "34120", "30000 Assertions/34120-DifferentEvaluationAssertion-Processing/34120 Different Evaluation Assertion Processing.xml" );
// Don't include these test case.  It includes tests that are eliminated by erratum and do not exist in the previous test case
// performTestcase( $log, "34120", "30000 Assertions/34120-DistinctEvaluationAssertion-Processing/34120 Distinct Evaluation Assertion Processing.xml" );
}
if ( $run40000SeriesTests )
{
/* 2  */ performTestcase( $log, "40110", "40000 Filters/40110-BareFilter-Processing/40110 Bare Filter Processing.xml" );
/* 2  */ performTestcase( $log, "41210", "40000 Filters/41210-BooleanFilter-Processing-And/41210 Boolean And Filter Processing.xml" );
/* 1  */ performTestcase( $log, "41220", "40000 Filters/41220-BooleanFilter-Processing-Or/41220 Boolean Or Filter Processing.xml" );
/* 2  */ performTestcase( $log, "41221", "40000 Filters/41221-BooleanFilter-Processing-NoChildren/41221 Boolean Filter Processing No Children.xml" );
/* 1  */ performTestcase( $log, "41230", "40000 Filters/41230-BooleanFilter-Processing-FilterRelationships/41230 Boolean Filter Relationships Processing.xml" );
/* 3  */ performTestcase( $log, "42210", "40000 Filters/42210-ConceptFilter-Processing-ConceptName/42210 ConceptFilter Processing ConceptName.xml" );
/* 2  */ performTestcase( $log, "42220", "40000 Filters/42220-ConceptFilter-Processing-ConceptPeriodType/42220 ConceptFilter Processing ConceptPeriodType.xml" );
/* 3  */ performTestcase( $log, "42230", "40000 Filters/42230-ConceptFilter-Processing-ConceptBalance/42230 ConceptFilter Processing ConceptBalance.xml" );
/* 3  */ performTestcase( $log, "42240", "40000 Filters/42240-ConceptFilter-Processing-ConceptCustomAttribute/42240 ConceptFilter Processing ConceptCustomAttribute.xml" );
/* 3  */ performTestcase( $log, "42250", "40000 Filters/42250-ConceptFilter-Processing-ConceptDataType/42250 ConceptFilter Processing ConceptDataType.xml" );
/* 4  */ performTestcase( $log, "42260", "40000 Filters/42260-ConceptFilter-Processing-ConceptSubstitutionGroup/42260 ConceptFilter Processing ConceptSubstitutionGroup.xml" );
/* 6  */ performTestcase( $log, "43130", "40000 Filters/43130-DimensionFilter-StaticAnalysis-DimensionMember Filter/43130 DimensionMember Filter.xml" );
/* 9  */ performTestcase( $log, "43210", "40000 Filters/43210-DimensionFilter-Processing-ExplicitDimension/43210 Explicit dimension Filter Processing.xml" );
/* 7  */ performTestcase( $log, "43230", "40000 Filters/43230-DimensionFilter-Processing-DomainMember/43230 Dimension Member Filter Processing.xml" );
// This test is not used
// performTestcase( $log, "43231", "40000 Filters/43231-DimensionFilter-Processing-DRSaxes/43231 Dimension Filter Processing DRSaxes.xml" );
// This test is not used
// performTestcase( $log, "43232", "40000 Filters/43232-DimensionFilter-Processing-VariablesWithoutMember/43232 Dimension Member Filter Processing - variables without member.xml" );
/* 2  */ performTestcase( $log, "43240", "40000 Filters/43240-DimensionFilter-Processing-TypedDimension/43240 Typed dimension Filter Processing.xml" );
/* 1  */ performTestcase( $log, "44210", "40000 Filters/44210-EntityFilter-Processing-EntityIdentifier/44210 EntityFilter Processing EntityIdentifier.xml" );
/* 2  */ performTestcase( $log, "44220", "40000 Filters/44220-EntityFilter-Processing-SpecificScheme/44220 EntityFilter Processing SpecificScheme.xml" );
/* 1  */ performTestcase( $log, "44230", "40000 Filters/44230-EntityFilter-Processing-RegexpScheme/44230 EntityFilter Processing RegexpScheme.xml" );
/* 1  */ performTestcase( $log, "44240", "40000 Filters/44240-EntityFilter-Processing-SpecificIdentifier/44240 EntityFilter Processing SpecificIdentifier.xml" );
/* 1  */ performTestcase( $log, "44250", "40000 Filters/44250-EntityFilter-Processing-RegexpIdentifier/44250 EntityFilter Processing RegexpIdentifier.xml" );
/* 7  */ performTestcase( $log, "45210", "40000 Filters/45210-GeneralFilter-Processing/45210 General Filter Processing.xml" );
/* 10 */ performTestcase( $log, "46210", "40000 Filters/46210-ImplicitFilter-Processing-NonDimensional/46210 NonDimensional ImplicitFilter Processing.xml" );
/* 13 */ performTestcase( $log, "46220", "40000 Filters/46220-ImplicitFilter-Processing-Dimensional/46220 Dimensional ImplicitFilter Processing.xml" );
/* 1  */ performTestcase( $log, "47200", "40000 Filters/47200-NoMatchingFilter-Processing/47200 No MatchingFilter Processing.xml" );
/* 3  */ performTestcase( $log, "47201", "40000 Filters/47201-ConceptMatchingFilter-Processing/47201 ConceptMatchingFilter Processing.xml" );
/* 1  */ performTestcase( $log, "47202", "40000 Filters/47202-LocationMatchingFilter-Processing/47202 LocationMatchingFilter Processing.xml" );
/* 1  */ performTestcase( $log, "47203", "40000 Filters/47203-UnitMatchingFilter-Processing/47203 UnitMatchingFilter Processing.xml" );
/* 2  */ performTestcase( $log, "47204", "40000 Filters/47204-EntityIdentifierMatchingFilter-Processing/47204 EntityIdentifierMatchingFilter Processing.xml" );
/* 1  */ performTestcase( $log, "47205", "40000 Filters/47205-PeriodMatchingFilter-Processing/47205 PeriodMatchingFilter Processing.xml" );
/* 5  */ performTestcase( $log, "47206", "40000 Filters/47206-CompleteSegmentMatchingFilter-Processing/47206 CompleteSegmentMatchingFilter Processing.xml" );
/* 6  */ performTestcase( $log, "47207", "40000 Filters/47207-NonXDTSegmentMatchingFilter-Processing/47207 NonXDTSegmentMatchingFilter Processing.xml" );
// This test is not used
// performTestcase( $log, "47208", "40000 Filters/47208-SegmentDimensionMatchingFilter-Processing/47208 SegmentDimensionMatchingFilter Processing.xml" );
/* 4  */ performTestcase( $log, "47209", "40000 Filters/47209-CompleteScenarioMatchingFilter-Processing/47209 CompleteScenarioMatchingFilter Processing.xml" );
/* 6  */ performTestcase( $log, "47210", "40000 Filters/47210-NonXDTScenarioMatchingFilter-Processing/47210 NonXDTScenarioMatchingFilter Processing.xml" );
// This test is not used
// performTestcase( $log, "47211", "40000 Filters/47211-ScenarioDimensionMatchingFilter-Processing/47211 ScenarioDimensionMatchingFilter Processing.xml" );
/* 9  */ performTestcase( $log, "47212", "40000 Filters/47212-DimensionMatchingFilter-Processing/47212 DimensionMatchingFilter Processing.xml" );
/* 5  */ performTestcase( $log, "47213", "40000 Filters/47213-MatchingFilter-MatchVariableInappropriateValues-Processing/47213 MatchingFilter-MatchVariableInappropriateValues Processing.xml" );
/* 5  */ performTestcase( $log, "48210", "40000 Filters/48210-PeriodFilter-Processing-Period/48210 PeriodFilter Processing Period.xml" );
/* 2  */ performTestcase( $log, "48220", "40000 Filters/48220-PeriodFilter-Processing-PeriodStart/48220 PeriodFilter Processing PeriodStart.xml" );
/* 2  */ performTestcase( $log, "48230", "40000 Filters/48230-PeriodFilter-Processing-PeriodEnd/48230 PeriodFilter Processing PeriodEnd.xml" );
/* 2  */ performTestcase( $log, "48240", "40000 Filters/48240-PeriodFilter-Processing-PeriodInstant/48240 PeriodFilter Processing PeriodInstant.xml" );
/* 1  */ performTestcase( $log, "48250", "40000 Filters/48250-PeriodFilter-Processing-Forever/48250 PeriodFilter Processing Forever.xml" );
/* 2  */ performTestcase( $log, "48260", "40000 Filters/48260-PeriodFilter-Processing-InstantDuration/48260 PeriodFilter Processing InstantDuration.xml" );
/* 4  */ performTestcase( $log, "49210", "40000 Filters/49210-RelativeFilter-Processing-Dimensional/49210 Relative Dimensional Filter Processing.xml" );
/* 2  */ performTestcase( $log, "49220", "40000 Filters/49220-RelativeFilter-Processing-NonDimensional/49220 Relative NonDimensional Filter Processing.xml" );
}
if ( $run50000SeriesTests )
{
/* 3  */ performTestcase( $log, "50210", "40000 Filters/50210-SegmentScenarioFilter-Processing-Segment/50210 SegmentScenarioFilter Processing Segment.xml" );
/* 2  */ performTestcase( $log, "50220", "40000 Filters/50220-SegmentScenarioFilter-Processing-Scenario/50220 SegmentScenarioFilter Processing Scenario.xml" );
/* 2  */ performTestcase( $log, "51210", "40000 Filters/51210-TupleFilter-Processing-Parent/51210 Tuple Parent Processing.xml" );
/* 2  */ performTestcase( $log, "51220", "40000 Filters/51220-TupleFilter-Processing-Ancestor/51220 Tuple Ancestor Processing.xml" );
/* 1  */ performTestcase( $log, "51230", "40000 Filters/51230-TupleFilter-Processing-Sibling/51230 Tuple Sibling Processing.xml" );
/* 4  */ performTestcase( $log, "51240", "40000 Filters/51240-TupleFilter-Processing-Location/51240 Tuple Location Processing.xml" );
/* 3  */ performTestcase( $log, "52210", "40000 Filters/52210-UnitFilter-Processing-SingleMeasure/52210 Unit Single Measure Processing.xml" );
/* 3  */ performTestcase( $log, "52220", "40000 Filters/52220-UnitFilter-Processing-General/52220 Unit General Measures Processing.xml" );
/* 1  */ performTestcase( $log, "53210", "40000 Filters/53210-ValueFilter-Processing-Nil/53210 ValueFilter Processing Nil.xml" );
/* 2  */ performTestcase( $log, "53230", "40000 Filters/53230-ValueFilter-Processing-Precision/53230 ValueFilter Processing Precision.xml" );
}
if ( $run60000SeriesTests )
{
/* 9  */ performTestcase( $log, "60100", "60000 Extensions/60100 GenericMessages-Processing/60100 GenericMessages Processing.xml" );
/* 19 */ performTestcase( $log, "60200", "60000 Extensions/60200 CustomXPathFuctions-Processing/60200 CustomXPathFunction Processing.xml" );
// This test is not supported
// performTestcase( $log, "60300", "60000 Extensions/60300 Instances-Processing/60300 Instances-Processing.xml" );
// performTestcase( $log, "60300", "60000 Extensions/60300 Instances-Processing/aaa-testcase.xml" );
// Instance chaining is not yet supported
// performTestcase( $log, "60400", "60000 Extensions/60400 Chaining-Processing/60400 Chaining-Processing.xml" );
/* 4  */ performTestcase( $log, "60500", "60000 Extensions/60500 FormulaTuples-Processing/60500 FormulaTuples-Processing.xml" );
/* 5  */ performTestcase( $log, "60600", "60000 Extensions/60600 VariablesScope-Processing/60600 VariablesScope-Processing.xml" );
/* 20 */ performTestcase( $log, "61000", "60000 Extensions/61000 AspectCoverFilter-Processing/61000 AspectCoverFilter Processing.xml" );
/* 11 */ performTestcase( $log, "61100", "60000 Extensions/61100 ConceptRelationsFilter-Processing/61100 ConceptRelationsFilter Processing.xml" );
}
// /* 2  */ performTestcase( $log, "70011", "70000 Linkbase/70011-GenericLink-StaticAnalysis-LinkbaseRef/70011 GenericLink LinkbaseRef StaticAnalysis.xml" );
// /* 1  */ performTestcase( $log, "70012", "70000 Linkbase/70012-GenericLink-StaticAnalysis-SchemaAppinfo/70012 GenericLink In Appinfo StaticAnalysis.xml" );
// /* 6  */ performTestcase( $log, "70013", "70000 Linkbase/70013-GenericLink-StaticAnalysis-Link-Role/70013 GenericLink Link Role StaticAnalysis.xml" );
// /* 2  */ performTestcase( $log, "70014", "70000 Linkbase/70014-GenericLink-StaticAnalysis-Loc-DTS-Discovery/70014 Loc DTS Discovery StaticAnalysis.xml" );
// /* 14 */ performTestcase( $log, "70015", "70000 Linkbase/70015-GenericLink-StaticAnalysis-Loc-href-targets/70015 Loc href Targets StaticAnalysis.xml" );
// /* 10 */ performTestcase( $log, "70016", "70000 Linkbase/70016-GenericLink-StaticAnalysis-Arc-Arcrole/70016 GenericLink Arc Arcrole StaticAnalysis.xml" );
// /* 3  */ performTestcase( $log, "70017", "70000 Linkbase/70017-GenericLink-StaticAnalysis-Arc-Label/70017 GenericLink Arc Label StaticAnalysis.xml" );
// /* 4  */ performTestcase( $log, "70018", "70000 Linkbase/70018-GenericLink-StaticAnalysis-Arc-Cycles/70018 GenericLink Arc Cycles StaticAnalysis.xml" );
// /* 1  */ performTestcase( $log, "70019", "70000 Linkbase/70019-GenericLink-StaticAnalysis-Arc-Override/70019 GenericLink Arc Override StaticAnalysis.xml" );
// /* 1  */ performTestcase( $log, "70020", "70000 Linkbase/70020-GenericLink-StaticAnalysis-Arc-Prohibition/70020 GenericLink Arc Prohibition StaticAnalysis.xml" );
// /* 5  */ performTestcase( $log, "70021", "70000 Linkbase/70021-GenericLink-StaticAnalysis-Resource-Role/70021 GenericLink Resource Role StaticAnalysis.xml" );
// /* 2  */ performTestcase( $log, "70111", "70000 Linkbase/70111-GenericLabel-StaticAnalysis-Label/70111 GenericLabel Label StaticAnalysis.xml" );
// /* 1  */ performTestcase( $log, "70112", "70000 Linkbase/70112-GenericLabel-StaticAnalysis-Relationship/70112 GenericLabel Relationship StaticAnalysis.xml" );
// /* 5  */ performTestcase( $log, "70121", "70000 Linkbase/70121-GenericPreferredLabel-StaticAnalysis/70121-GenericPreferredLabel-StaticAnalysis.xml" );
// /* 2  */ performTestcase( $log, "70211", "70000 Linkbase/70211-GenericReference-StaticAnalysis-Reference/70211 GenericReference Reference StaticAnalysis.xml" );
// /* 1  */ performTestcase( $log, "70212", "70000 Linkbase/70212-GenericReference-StaticAnalysis-Relationship/70212 GenericReference Relationship StaticAnalysis.xml" );
//
if ( $runExampleTests )
{
/* 1  */ performTestcase( $log, '0001', '../examples/0001 Boolean test of balance sheet/index.xml' );
/* 1  */ performTestcase( $log, '0002', '../examples/0002 Assets equals liabilities plus equity/index.xml' );
/* 1  */ performTestcase( $log, '0003', '../examples/0003 End stock derivation from start stock and flows/index.xml' );
/* 2  */ performTestcase( $log, '0004', '../examples/0004 End stock with restatement date dimension/index.xml' );
/* 1  */ performTestcase( $log, '0005', '../examples/0005 Aggregate across dimension/index.xml' );
/* 1  */ performTestcase( $log, '0005', '../examples/0005 Aggregate across dimension/index-FranceSpain-GroupFilter.xml' );
/* 1  */ performTestcase( $log, '0006', '../examples/0006 Parameters for filtering/index.xml' );
/* 1  */ performTestcase( $log, '0007', '../examples/0007 Concept data type and precondition filtering/index.xml' );
/* 1  */ performTestcase( $log, '0008', '../examples/0008 Tuple filtering/index.xml' );
/* 1  */ performTestcase( $log, '0009', '../examples/0009 Typed dimension filtering/index.xml' );
/* 2  */ performTestcase( $log, '0010', '../examples/0010 Concept name filter/index.xml' );
/* 2  */ performTestcase( $log, '0011', '../examples/0011 Concept filter with tuple filter/index.xml' );
/* 2  */ performTestcase( $log, '0012', '../examples/0012 Concept filter with period filter/index.xml' );
/* 2  */ performTestcase( $log, '0013', '../examples/0013 Concept filter with unit filter/index.xml' );
/* 2  */ performTestcase( $log, '0014', '../examples/0014 Concept filter with entity filters/index.xml' );
/* 4  */ performTestcase( $log, '0014', '../examples/0014 Concept filter with scenario and segment filters/index.xml' );
/* 2  */ performTestcase( $log, '0014', '../examples/0014 Wagetax example part 5/index.xml' );
/* 1  */ performTestcase( $log, '0015', "../examples/0015 Movement Pattern/movement-pattern-testcase.xml" );
/* 1  */ performTestcase( $log, '0015', '../examples/0015 Movement Pattern/index.xml' );
/* 1  */ performTestcase( $log, '0016', '../examples/0016 Pharmaceutical Dimension Aggregation/index.xml' );
/* 1  */ performTestcase( $log, '0017', '../examples/0017 COREP 18 Dimensional Weighted Avg/index.xml' );
// /* 3  */ performTestcase( $log, '0018', '../examples/0018 GL Examples/index.xml' );
/* 1  */ performTestcase( $log, '0019', '../examples/0019 Value Assertion/index.xml' );
/* 1  */ performTestcase( $log, '0020', '../examples/0020 Existence Assertion/index.xml' );
/* 1  */ performTestcase( $log, '0021', '../examples/0021 Consistency Assertion/index.xml' );
/* 2  */ performTestcase( $log, '0022', '../examples/0022 Assertion Set/index.xml' );
/* 4  */ performTestcase( $log, '0023', '../examples/0023 Context and Unit checking/index.xml' );
/* 1  */ performTestcase( $log, '0024', '../examples/0024 FactVariables multi purpose/index.xml' );
/* 2  */ performTestcase( $log, '0025', '../examples/0025 Consistency Assertion Variables/index.xml' );
// These seem to use old element names and arc roles
// performTestcase( $log, '0026', '../examples/0026 Formula Chaining (Extension)/index.xml' );
// performTestcase( $log, '0027', '../examples/0027 Tuple Generation (Extension)/index.xml' );
// performTestcase( $log, '0028', '../examples/0028 Multi-Instance (Extension)/index.xml' );
// performTestcase( $log, '0029', '../examples/0029 GL Generation (Extension)/index.xml' );
// performTestcase( $log, '0030', '../examples/0030 Functions in XPath (Extension)/index.xml' );
}

global $result;
$result = array(
	'success' => ! $issues,
	'series' => array( '1000' => $run10000SeriesTests, '2000' => $run20000SeriesTests, '3000' => $run30000SeriesTests, '4000' => $run40000SeriesTests, '5000' => $run50000SeriesTests, '6000' => $run60000SeriesTests, 'examples' => $runExampleTests ),
	'issues' => $issues
);

echo  __DIR__ . '/' .  basename( __FILE__, 'php' ) . "json\n";
file_put_contents( __DIR__ . '/' .  basename( __FILE__, 'php' ) . 'json', json_encode( $result ) );

return;

/**
 * Perform a specific test case
 *
 * @param XBRL_Log $log
 * @param string $testid
 * @param string $testCaseXmlFilename
 */
function performTestcase( $log, $testid, $testCaseXmlFilename )
{
	// if ( $testid != '22015' ) return;

	global $conformance_base;

	$testCaseFolder = dirname( "$conformance_base$testCaseXmlFilename" );
	$testCase = simplexml_load_file( "$conformance_base$testCaseXmlFilename" );

	$attributes = $testCase->attributes();
	$outpath = (string) $attributes->outpath;
	$name = (string) $attributes->name;

	$testName = trim( $testCase->name );
	$testDescription = trim( $testCase->description );
	$log->info("Test {$testid}: $testName");
	$log->info("    $testDescription");
	$count = count( $testCase->children()->variation );
	$log->info(     "There are $count tests");

	foreach ( $testCase->children()->variation as $key => /** @var SimpleXMLElement $variation */ $variation )
	{
		$variationAttributes = $variation->attributes();
		$description = trim( (string) $variation->description );

		$source = array(
			'variation id'	=> (string) $variationAttributes->id,
			'description'	=> $description,
		);

		// === Put specific test conditions here (begin) ====

		if ( $testid == "11021" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "11023" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "11025" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "11204" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "11205" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "11206" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "11207" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "12010" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "12020" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "12050" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "12060" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "12061" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "12062" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "12070" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "12080" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "14010" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "21201" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "21233" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "21251" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "21363" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "22010" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "22015" )
		{
			if ( $source['variation id'] < 'V-00' ) continue;

			// Implement the custom function
			$functionTable = FunctionTable::getInstance();
			$functionTable->AddWithArity( 'http://www.example.com/wgt-avg/function', "PDxEV", 2, XPath2ResultType::NodeSet, function( $context, $provider, $args )
			{
				$result = array();
				require_once __DIR__ . "/../xbrl/XPathFunctions/getFactDimensionSEqual.php";

				foreach ( $args[0] as /** @var DOMXPathNavigator $pd */ $pd )
				{
					foreach ( $args[1] as /** @var DOMXPathNavigator $ev */ $ev )
					{
						$res = getFactDimensionSEqual( $context, $provider, array( $ev, $pd, QNameValue::fromQName( new QName( null, 'http://www.example.com/wgt-avg', 'ExposuresDimension') ) ) );
						if ( $res == CoreFuncs::$True )
						{
							$result[] = XPath2Item::fromValueAndType( $pd->getTypedValue()->Mul( $ev->getTypedValue() ), XmlSchema::$Decimal );
						}
					}
				}

				return DocumentOrderNodeIterator::fromItemset( $result );
			});
		}

		if ( $testid == "22020" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "22030" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "22040" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "22060" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "22090" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "22140" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "22170" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "22180" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "23020" )
		{
			if ( $source['variation id'] < 'V-50' ) continue;
		}

		if ( $testid == "31210" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "31220" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "31230" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "32210" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "34110" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "34120" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "41210" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "41220" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "42210" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "42220" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "42230" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "42240" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "42250" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "43130" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "43210" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "43231" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "44220" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "45210" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "46210" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "46220" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "47201" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "47206" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "47212" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "47213" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "48210" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "48220" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "48230" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "48240" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "49210" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "53230" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "60100" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "60200" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "60500" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "60600" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "61000" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "61100" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "70018" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "0004" )
		{
			if ( $source['variation id'] < 'V.01' ) continue;
		}

		if ( $testid == "0006" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "0012" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "0018" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "0022" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "0023" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		if ( $testid == "0025" )
		{
			if ( $source['variation id'] < 'V-01' ) continue;
		}

		// === (end) ========================================

		$instanceElements = $variation->data->instance;
		$instanceFile = (string) $variation->data->instance; // Set a default
		$instanceFiles = array();
		$docNamespaces = $variation->getDocNamespaces( true );

		foreach ( $instanceElements as $instanceElement )
		{
			$readMeFirst = property_exists( $instanceElement->attributes(), 'readMeFirst' )
				? filter_var( $instanceElement->attributes()->readMeFirst, FILTER_VALIDATE_BOOLEAN )
				: false;

			if ( $readMeFirst )
			{
				// If there is a name attribute use it
				$name = property_exists( $instanceElement->attributes(), 'name' )
					? (string)$instanceElement->attributes()->name
					: '{http://xbrl.org/2010/variable/instance"}standard-input-instance';

				if ( ! empty( $name ) )
				{
					$qname = qname( $name, $docNamespaces );
					$name = $qname->clarkNotation();
				}

				$instanceFiles[ $name] = "$testCaseFolder/$instanceElement";
			}
		}

		if ( isset( $instanceFiles['{http://xbrl.org/2010/variable/instance"}standard-input-instance'] ) )
		{
			$instanceFile = $instanceFiles['{http://xbrl.org/2010/variable/instance"}standard-input-instance'];
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

		$parameters = $instanceFiles;
		$domNode = dom_import_simplexml( $variation->data );
		$domNode = $domNode->firstChild;
		while ( $domNode )
		{
			if ( $domNode->nodeType == XML_ELEMENT_NODE )
			{
				/**
				 * @var DOMElement $domNode
				 */
				if ( $domNode->localName == 'parameter' )
				{
					$parameter = simplexml_import_dom( $domNode );
					$docNamespaces = $parameter->getDocNamespaces( true );
					$localNamespaces = $parameter->getDocNamespaces( true, false );
					$attributes = $parameter->attributes();
					$name = trim( $attributes->name );
					$qname = qname( $name, array_merge( $docNamespaces, $localNamespaces ) );
					$clark = $qname->clarkNotation();
					$dataType = property_exists( $attributes, 'datatype' ) ? trim( $attributes->datatype ) : 'xs:anyType';
					$value = property_exists( $attributes, 'value' ) ? trim( $attributes->value ) : '';
					$parameters[ $clark ] = array(
						'qname' => $qname,
						'datatype' => $dataType,
						'value' => "'$value'",
					);
				}
			}
			$domNode = $domNode->nextSibling;
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

		/**
		 * @var SimpleXMLElement $result
		 */
		$result = $variation->result;
		if ( property_exists( $result, "instance" ) )
		{
			$resultsFilename = (string) $result->instance;
		}
		$expected = property_exists( $result, 'error' )
			? trim( $result->error )
			: ( property_exists( $result->attributes(), "expected" )
					? (string)$result->attributes()->expected
					: "valid"
			  );
		$resultsFile = property_exists( $result, 'file' ) ? true : false;

		$log->resetConformanceIssueWarning();
		XBRL_Instance::reset();
		XBRL::setValidationState();
		unset( $ex );

		try
		{
			if ( empty( $instanceFile ) )
			{
				echo "$xsd ($testid-{$variationAttributes->id} $expected) $description\n";
				$taxonomy = XBRL::load_taxonomy( "$testCaseFolder/$xsd" );

				if ( !empty( $linkbaseFile ) )
				{
					// Need to load this file
					if ( $log->hasInstanceValidationWarning() )
					{
						$log->info("Adding additional linkbase so removing existing instance warnings");
						$log->resetInstanceValidationWarning();
					}
					$taxonomy->addLinkbaseRef( $linkbaseFile, $source['description'], "", XBRL_Constants::$genericLinkbaseRef );
				}

				if ( $taxonomy->getHasFormulas() )
				{
					// Time to evaluate formulas
					$formulas = new XBRL_Formulas();
					$formulas->processFormulasForTaxonomy( $taxonomy, $testCase->getDocNamespaces( true ), $parameters );
				}
			}
			else
			{
				$instanceFile = urldecode( $instanceFile );

				$log->info( "Linkbase: " . basename( $instanceFile ) . " ($testid-{$variationAttributes->id} $expected)" );
				if ( ! empty( $description ) )
				{
					$log->info( "        $description" );
				}

				$instance = XBRL_Instance::FromInstanceDocument( "$instanceFile" );
				$taxonomy = $instance->getInstanceTaxonomy();

				if ( $instance )
				{
					switch ( $testid )
					{
						case '23020':

							foreach ( $linkbaseElements as $linkbaseElement )
							{
								if ( (string)$linkbaseElement != "23020-customTest-reverseString-aspectTest.xml") continue;
								$linkbase = $taxonomy->getLabelLinkRoleRefs( (string)$linkbaseElement );
								if ( ! $linkbase)
								{
									// $taxonomy->addLinkbaseRef( (string)$linkbaseElement, $source['description'], "", XBRL_Constants::$genericLinkbaseRef );
								}
								break;
							}
							break;

						default:

							break;
					}
				}

				if ( $taxonomy->getHasFormulas() )
				{
					// Time to evaluate formulas
					$formulas = new XBRL_Formulas();
					if ( ! $formulas->processFormulasAgainstInstances( $instance, $testCase->getDocNamespaces( true ), $parameters ) )
					{
						// Report the failure
						$log->formula_validation( "Test $testid failed", "The test failed to complete",
							array(
								'test id' => $testid,
								'instance' => $instanceFile
							)
						);
					}
					else
					{
						// Check the actual result against expected result
						$expectedResultNode = $variation->result;
						$result = $formulas->compareResult( $testCaseFolder, $expectedResultNode );
						if ( $result !== false )
						{
							// Report the failure
							$log->formula_validation( "Test $testid failed", "The test failed comparing the expected result with the generated result",
								array(
									'test id' => $testid,
									'result' => $result
								)
							);
						}
					}
				}
			}
		}
		catch ( \XBRL\Formulas\Exceptions\FormulasException $ex )
		{
			$log->warning( $ex->getMessage() );

			// Sometimes a specific error is not specified by the test (for example 60600 V-03)
			if ( $expected == 'invalid' ) continue;

			// If an expected error is reported the continue
			if ( $ex->error == $expected || "err:{$ex->error}" == $expected ) continue;

			// Test 21201 V-01 expectes a missing signature to report xbrlve:noCustomFunctionSignature.  However 60200 V-26 expects the same condition
			// to report an XPath error XPST0017 which the root cause of the error in 21201 V-01 (though this test wants a different error)
			if ( $testid == 60200 && $source['variation id'] == "V-26" && $expected == 'err:XPST0017' && $ex->error == 'xbrlve:noCustomFunctionSignature' ) continue;

			// Record the issue for external reporting
			global $issues;
			$issues[] = array(
				'id' => $testid,
				'variation' => $source['variation id'],
				'type' => 'FormulasException',
				'expected error' => $expected,
				'actual error' => $ex->error,
				'message' => $ex->getMessage(),
			);

		}
		catch ( XPath2Exception $ex )
		{
			// $log->warning( $ex->getMessage() );
			$log->formula_validation( "XPath 2.0", "XPath 2.0 Exception",
				array(
					'error code' => $ex->ErrorCode,
					'message' => $ex->getMessage()
				)
			);
		}

		if ( $expected == 'valid' )
		{
			// These are not errors in the conformance tests because "there is no general mechanism to test these is in place"
			// However, it is possible and not reporting the error makes it more difficult for formula authors to find their errors.
			if ( in_array( $testid, array(
					'21261',  // Don't understand why this is not an error given that the final arc is invalid (variable-set-filter from a filter to a variable)
					'21271',  // Don't understand why this is not an error given that the final arc is invalid (variable-set-filter from a variable to a general variable)
					'21291',  // Don't understand why this is not an error given that the final arc is invalid (variable-set from a formula to a filter)
					'21350'   // Don't understand why this is not an error given that the final arc is invalid (pre-condition from formula to a general variable)
					)
				)
			)
			{
				if ( ! $log->hasConformanceIssueWarning() )
				{
					$log->conformance_issue( $testid, "Expected test $testid to be valid but expected a conformance warning", $source );

					// Record the issue for external reporting
					global $issues;
					$issues[] = array(
						'id' => $testid,
						'variation' => $source['variation id'],
						'expected' => $expected,
						'actual' => 'invalid'
					);
				}
				continue;
			}

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
