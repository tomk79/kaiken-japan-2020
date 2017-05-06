<?php
if( !extension_loaded( 'mbstring' ) ){
	trigger_error('mbstring not loaded.');
}
if( is_callable('mb_internal_encoding') ){
	mb_internal_encoding('UTF-8');
}
@ini_set( 'default_charset' , 'UTF-8' );

require_once(__DIR__.'/../vendor/autoload.php');

$diffdir = new tomk79\diffdir(
	__DIR__.'/showa_kenpo/',
	__DIR__.'/jimin_draft_20120427/',
	array( // options
		'output'=>__DIR__.'/diff_report/', // -o
		'strip_crlf'=>true, // --strip-crlf
		'verbose'=>true // -v
	)
);
if( $diffdir->is_error() ){
	print 'ERROR.'."\n";
	var_dump( $diffdir->get_errors() );
}else{
	print 'success.'."\n";
	print ''."\n";
	print 'see: '.$diffdir->get_output_dir()."\n";
}
