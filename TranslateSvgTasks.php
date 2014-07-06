<?php

/**
 * Exports messages to their native format with embedded textarea.
 */
class ExportSVGMessagesTask extends ExportMessagesTask {
	protected $id = 'export-as-svg';

	// Override
	protected function preinit() { }

	// No paging should be done
	protected function doPaging() { }

	// Override
	protected function postinit() { }

	public function output() {
		if ( !$this->group instanceof SVGMessageGroup ) {
			$link = Html::element(
				'a',
				array( 'href' => 'http://bugzilla.wikimedia.org' ),
				'bugzilla.wikimedia.org'
			);
			return $this->errorOutput( wfMessage( 'translate-svg-export-unsupported', $link ) );
		}

		/** @var SVGFormatWriter $writer */
		$writer = $this->group->getWriter();
		$ret = $writer->exportToSVG( $this->context->getUser() );
		if ( $ret === true ) {
			global $wgOut;
			$wgOut->redirect( $this->group->getUrl() );
			return true;
		} else {
			// Error output
			return $this->errorOutput( $ret );
		}
	}

	/*
	 * Takes an error message and wraps it nicely, with a header
	 *
	 * @param $content \string Error message, as string
	 */
	protected function errorOutput( $content ) {
		$output = '<h2>' . wfMessage( 'uploadwarning' )->plain() . "</h2>\n" .
		          '<div class="error">' . $content . "</div>\n";
		return $output;
	}
}