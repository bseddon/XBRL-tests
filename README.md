# Conformance testing for the Lyquidity XBRL project

**Table of contents**
* [About the project](#about-the-project)
* [Status](#status)
* [License](#license)
* [Contributing](#contributing)
* [Install](#install)
* [Getting started](#getting-started)

## About the project

This project provides a test harness to run the conformance suite test defined for XBRL 2.1, XDT, Formulas and Function Registry functions

### Test harness notes

#### XBRL 2.1

A small number of the tests are not used.  The XBRL processor only has incomplete support for reference link bases so tests using or relating to 
reference links are not run for any of the conformance suites.  These tests include tests 291 V-12, V-13, V-14 and V-15

#### Formulas

The formula processor does support some of the specifications that do not yet have a recommended status such as 
[Formula Tuples](http://www.xbrl.org/Specification/formulaTuples/CR-2011-11-30/formulaTuples-CR-2011-11-30.html)
and [Vaiables Scope](http://www.xbrl.org/Specification/variables-scope/CR-2011-11-30/variables-scope-CR-2011-11-30.html).  However it
does not support the [Variable Instances for Multi-Instance Processing and Chaining](http://www.xbrl.org/specification/instances/cr-2012-10-03/instances-cr-2012-10-03.html) specifications.

This means the XBRL Formula processor test harness will not include tests in the groups 60300 (Instances processing) and 60400 (Instances chaining processing).

### Links

This project does not include the conformance suite tests.  The relevant suite files can be downloaded:

* [XBRL-CONF-2014-12-10.zip](http://www.xbrl.org/2014/XBRL-CONF-2014-12-10.zip)
* [xdt-conf-cr4-2009-10-06.zip](http://www.xbrl.org/2009/xdt-conf-cr4-2009-10-06.zip)
* [formula-conf-rec-2013-09-12.zip](http://www.xbrl.org/specification/formula/rec-2011-10-24/conformance/formula-conf-rec-2013-09-12.zip)

## Status

![XBRL 2.1 conformance](https://www.xbrlquery.com/tests/status.php?test=conformance_21&x=y "XBRL 2.1 conformance suite tests")
![XBRL dimensions conformance](https://www.xbrlquery.com/tests/status.php?test=conformance_xdt&x=y "XBRL Dimensions conformance suite tests")
![XBRL functions registry conformance](https://www.xbrlquery.com/tests/status.php?test=conformance_functions&x=y "XBRL functions registry conformance suite tests")
![XBRL Formulas conformance](https://www.xbrlquery.com/tests/status.php?test=conformance_formulas&x=y "XBRL Formulas conformance suite tests")

![Build status last run date](https://www.xbrlquery.com/tests/status.php?test=date "The date of the last run")

### Dependencies

This project depends on [lyquidity/XPath20](https://github.com/bseddon/XPath20) and on the [lyquidity/XBRL](https://github.com/beseddon/XBRL).

## License

This project is released under [GPL version 3.0](LICENCE)

**What does this mean?**

It means you can use the source code in any way you see fit.  However, the source code for any changes you make must be made available to others and must be made
available on the same terms as you receive the source code in this project: under a GPL v3.0 license.  You must include the license of this project with any
distribution of the source code whether the distribution includes all the source code or just part of it.  For example, if you create a class that derives 
from one of the classes provided by this project - a new taxonomy class, perhaps - that is derivative.

**What does this not mean?**

It does *not* mean that any products you create that only *use* this source code must be released under GPL v3.0.  If you create a budgeting application that uses
the source code from this project to access data in instance documents, used by the budgeting application to transfer data, that is not derivative. 

## Contributing

We welcome contributions.  See our [contributions page](https://gist.github.com/bseddon/cfe04753192087c82766bee583f519aa) for more information.  If you do choose
to contribute we will ask you to agree to our [Contributor License Agreement (CLA)](https://gist.github.com/bseddon/cfe04753192087c82766bee583f519aa).  We will 
ask you to agree to the terms in the CLA to assure other users that the code they use is not going to be encumbered by a labyrinth of different license and patent 
liabilities.  You are also urged to review our [code of conduct](CODE_OF_CONDUCT.md).

## Install

The project can be installed by [composer](https://getcomposer.org/).  First make sure the [XPath 2.0](https;//github.com/bseddon/XPath20) project is installed.
Assuming Composer is installed and a shortcut to the program is called 'composer' then the command to install this project is:

```
composer require lyquidity/xbrl-tests:dev-master --prefer-dist
```

Or fork or download the repository.  It will also be necessary to download and install the [XML](https://github.com/bseddon/XBRL) project.

You will then need to download the test suite zip file and unzip them to some location.  In your application you will also need to add 
defines called 'CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION', 'CONFORMANCE_TEST_SUITE_FORMULA_LOCATION', 'CONFORMANCE_TEST_SUITE_XDT_LOCATION',
'CONFORMANCE_TEST_SUITE_XFI_LOCATION' and 'CONFORMANCE_TEST_SUITE_GENERIC_LOCATION' and give them a value which is the location you used to 
unzip the respective conformance test suite zip file.  See the example in the [getting started](#getting-started) section below. 

## Getting started

Assuming you have installed the library using composer then this PHP application will run the tests:

```
<php
require_once __DIR__ . '/vendor/autoload.php';

// Create the various defines
define( 'CONFORMANCE_TEST_SUITE_XBRL_21_LOCATION', '<your unzip location>' );
define( 'CONFORMANCE_TEST_SUITE_XDT_LOCATION', '<your unzip location>' );
define( 'CONFORMANCE_TEST_SUITE_FORMULA_LOCATION', '<your unzip location>' );
define( 'CONFORMANCE_TEST_SUITE_XFI_LOCATION', '<your unzip location>' );
define( 'CONFORMANCE_TEST_SUITE_GENERIC_LOCATION', '<your unzip location>' );

// Run each test suite.  Note that some may run for a considerable time
include __DIR__ . "/vendor/lyquidity/XBRL-tests/conformance-21.php";
include __DIR__ . "/vendor/lyquidity/XBRL-tests/conformance-xdt.php";
include __DIR__ . "/vendor/lyquidity/XBRL-tests/conformance-formulas.php";
include __DIR__ . "/vendor/lyquidity/XBRL-tests/conformance-xfi.php";
include __DIR__ . "/vendor/lyquidity/XBRL-tests/conformance-generics.php";
```
