<?php
	// This is a comment. Comments are not displayed in the browser //
	$wgHooks['ParserFirstCallInit'][] = 'syntaxHighlightingExtension';
 
	function syntaxHighlightingExtension( &$parser ) {
	    $parser->setHook( 'PLSQL', 'syntaxHighlightingRenderHtml' );
	    return true;
	}
 
	function syntaxHighlightingRenderHtml($input, $args, $parser, $frame){
	    return "<pre class=\"brush:sql\">\n" . $input . "</pre>";
	}
