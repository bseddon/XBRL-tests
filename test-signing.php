<?php

use lyquidity\xmldsig\XAdES;
use lyquidity\xmldsig\xml\SignatureProductionPlaceV2;
use lyquidity\xmldsig\xml\SignerRoleV2;

require_once __DIR__ . '/../../../xml-signer/xml-signer/autoload.php';
require_once __DIR__ . '/../../../ocsp/requester/src/autoload.php';
require __DIR__ . '/../../core/source/XBRL_Signing.php';

$sourcePackageFilename = __DIR__ . '/../taxonomies/us-gaap-2018-01-31.zip';
$targetPackageFilename = __DIR__ . '/../taxonomies/us-gaap-2018-01-31-signed.zip';
$certificateFile = 'D:\GitHub\xml-signer\finance.crt';
$keyFile = 'D:\GitHub\xml-signer\finance.key';

global $certificateBundlePath;
$reflector = new \ReflectionClass('lyquidity\TSA\TSA');
$ocspPath = dirname( dirname( dirname( dirname( $reflector->getFileName() ) ) ) );
$certificateBundlePath = $ocspPath . '/cacerts-for-php-curl/cacerts.pem';

XBRL_Signing::addSignature( $sourcePackageFilename, $targetPackageFilename, $certificateFile, $keyFile, false, false, 'London', 'CEO' );
// XBRL_Signing::addSignature( $sourcePackageFilename, $targetPackageFilename, $certificateFile, $keyFile, false, true , 
// 	new SignatureProductionPlaceV2( 'London', null, null, null, 'UK' ), 
// 	new SignerRoleV2( 'CEO' )
// );

XBRL_Signing::verifySignature( $targetPackageFilename );

return;

/*
 * Below is the old test code for the now deleted XML-Signer.php script
 */

/**
 * Load the memory stream class
 */
require_once __DIR__ . "/../utilities/MemoryStream.php";

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

$signedXml = __DIR__ . '/signed-instance.xml';
$signedXml = __DIR__ . '/tuple-instance.xml';
$signedXml = __DIR__ . '/example-signed.xml';

class XBRL_Signer
{
	function sign_instance() {}
	function verify_instance() {}
	function createRootCertificate() {}
	function createClientCertificate() {}
};

$signer = new XBRL_Signer();

/**
 * Test sign an XML document
 *
 * @param \XBRL_Signer $signer
 * @param string $signedXml Source XML
 * @return void
 */
function testSigning( $signer, $signedXml )
{
	$xml = __DIR__ . '/tuple-instance.xml';
	$xml = __DIR__ . '/example.xml';
	$key = __DIR__ . '/client.key';
	$cert = __DIR__ . '/client.crt';

	$signer->sign_instance( $xml, $key, $cert, $signedXml ); // Embedded signature file
	$verified = $signer->verify_instance( $signedXml );
	// $signer->sign_instance( $xml, $key, $cert, null ); // Separate signature file
	// $verified = $signer->verity_instance( $xml );
}
// testSigning( $signer, $signedXml ); return;

if ( ! file_exists( __DIR__ . '/root.crt' ) || ! file_exists( __DIR__ . '/root.key' ) )
{
	$dn = array(
		'countryName'					=> 'UK',
		'stateOrProvinceName'			=> 'Surrey',
		'localityName'					=> 'New Malden',
		'organizationName'				=> 'XBRL Query',
		'commonName'					=> 'XBRL Query',
		'emailAddress'					=> 'signing@xbrlquery.com',
		'organizationalUnitName'		=> 'Certification'
	);

	if ( ! $signer->createRootCertificate( $dn, __DIR__ . '/root.crt',  __DIR__ . '/root.key' ) )
	{
		return;
	}
}

$dn = array(	'countryName'					=> 'UK',
	'stateOrProvinceName'			=> 'Surrey',
	'localityName'					=> 'New Malden',
	'organizationName'				=> 'XBRL Query',
	'commonName'					=> 'XBRL Query',
	'emailAddress'					=> 'client@xbrlquery.com',
	'organizationalUnitName'		=> 'Certification',
	'givenName'						=> 'Bill',
	'surname'						=> 'Seddon',
	'title'							=> 'CEO',
	'organizationalUnitName'		=> 'Head office'
);

$rootCert = openssl_x509_read( file_get_contents( __DIR__ . '/root.crt' ) );
$rootPkey = openssl_pkey_get_private( file_get_contents( __DIR__ . '/root.key' ) );

$signer->createClientCertificate( $dn, $rootCert, $rootPkey, __DIR__ . '/client.crt',  __DIR__ . '/client.key', 'A1B2C3D3E5F6G7H8I9J0', 'CEO', null );