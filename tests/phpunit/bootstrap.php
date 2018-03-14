<?php

	// Load required classes
	$testsDir = __DIR__ . '/';

	if ( defined( 'MW_PHPUNIT_USE_AUTOLOAD' ) ) {
		// Jenkins run: use Autoload
		$wgAutoloadClasses['TranslateSvgUpload'] = $testsDir . 'TranslateSvgTestCase.php';
		$wgAutoloadClasses['TranslateSvgTestCase'] = $testsDir . 'TranslateSvgTestCase.php';
	} else {
		// Manual invocation: we just need require_once
		require_once $testsDir . 'TranslateSvgTestCase.php';
	}
