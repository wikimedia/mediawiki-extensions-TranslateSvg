<?php
/**
 * Exports messages to their native format with embedded textarea.
 */
class ExportSVGMessagesTask extends ExportMessagesTask {
	protected $id = 'export-as-svg';

	// Override
	protected function preinit() {}

	// No paging should be done.
	protected function doPaging() {}

	// Override
	protected function postinit() {}

	public function output() {
		if ( !$this->group instanceof SVGMessageGroup ) {
			return '';
		}
		$errorContent = $this->group->getWriter()->webExport(); // Redirects on success

		// Error output
		$output = '<h2>' . wfMsgHtml( 'uploadwarning' ) . "</h2>\n" .
			'<div class="error">' . $errorContent . "</div>\n";
		return $output;
	}
}