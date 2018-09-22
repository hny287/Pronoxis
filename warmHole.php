<?php

	

	// cross-site scripting affected functions
	// parameter = 0 means, all parameters will be traced
	$NAME_XSS = 'Cross-Site Scripting';
	$XSSWarmhole = array(
		'echo'							=> array(array(0), $F_SECURING_XSS), 
		'print'							=> array(array(1), $F_SECURING_XSS),
		'print_r'						=> array(array(1), $F_SECURING_XSS),
		'exit'							=> array(array(1), $F_SECURING_XSS),
		'die'							=> array(array(1), $F_SECURING_XSS),
		'printf'						=> array(array(0), $F_SECURING_XSS),
		'vprintf'						=> array(array(0), $F_SECURING_XSS),
		'trigger_error'					=> array(array(1), $F_SECURING_XSS),
		'user_error'					=> array(array(1), $F_SECURING_XSS),
		'odbc_result_all'				=> array(array(2), $F_SECURING_XSS),
		'ovrimos_result_all'			=> array(array(2), $F_SECURING_XSS),
		'ifx_htmltbl_result'			=> array(array(2), $F_SECURING_XSS)
	);
	
	// HTTP header injections
	$NAME_HTTP_HEADER = 'HTTP Response Splitting';
    $HTTPWarmhole = array(
		'header' 						=> array(array(1), array())
	);
	
	// session fixation
	$NAME_SESSION_FIXATION = 'Session Fixation';
    $checkSessionFixation = array(
		'setcookie' 					=> array(array(2), array()),
		'setrawcookie' 					=> array(array(2), array()),
		'session_id' 					=> array(array(1), array())
	);
	
	// code evaluating functions  => (parameters to scan, securing functions)
	// example parameter array(1,3) will trace only first and third parameter 
	$NAME_CODE = 'Code Execution';
	$CodeExecutionWarmhole = array(
		'assert' 						=> array(array(1), array()),
		'create_function' 				=> array(array(1,2), array()),
		'eval' 							=> array(array(1), array()),
		'mb_ereg_replace'				=> array(array(1,2), $F_SECURING_PREG),
		'mb_eregi_replace'				=> array(array(1,2), $F_SECURING_PREG),
		'preg_filter'					=> array(array(1,2), $F_SECURING_PREG),
		'preg_replace'					=> array(array(1,2), $F_SECURING_PREG),
		'preg_replace_callback'			=> array(array(1), $F_SECURING_PREG),
	);
	
	// reflection injection
	$NAME_REFLECTION = 'Reflection Injection';
	$reflectionWarmhole = array(
		'event_buffer_new'				=> array(array(2,3,4), array()),		
		'event_set'						=> array(array(4), array()),
		'iterator_apply'				=> array(array(2), array()),
		'forward_static_call'			=> array(array(1), array()),
		'forward_static_call_array'		=> array(array(1), array()),
		'call_user_func'				=> array(array(1), array()),
		'call_user_func_array'			=> array(array(1), array()),		
		'array_diff_uassoc'				=> array(array(3), array()),
		'array_diff_ukey'				=> array(array(3), array()),
		'array_filter'					=> array(array(2), array()),
		'array_intersect_uassoc'		=> array(array(3), array()),
		'array_intersect_ukey'			=> array(array(3), array()),
		'array_map'						=> array(array(1), array()),
		'array_reduce'					=> array(array(2), array()),
		'array_udiff'					=> array(array(3), array()),
		'array_udiff_assoc'				=> array(array(3), array()),
		'array_udiff_uassoc'			=> array(array(3,4), array()),
		'array_uintersect'				=> array(array(3), array()),
		'array_uintersect_assoc'		=> array(array(3), array()),
		'array_uintersect_uassoc'		=> array(array(3,4), array()),		
		'array_walk'					=> array(array(2), array()),
		'array_walk_recursive'			=> array(array(2), array()),
		'assert_options'				=> array(array(2), array()),
		'ob_start'						=> array(array(1), array()),
		'register_shutdown_function'	=> array(array(1), array()),
		'register_tick_function'		=> array(array(1), array()),
		'runkit_method_add'				=> array(array(1,2,3,4), array()),
		'runkit_method_copy'			=> array(array(1,2,3), array()),
		'runkit_method_redefine'		=> array(array(1,2,3,4), array()),	
		'runkit_method_rename'			=> array(array(1,2,3), array()),
		'runkit_function_add'			=> array(array(1,2,3), array()),
		'runkit_function_copy'			=> array(array(1,2), array()),
		'runkit_function_redefine'		=> array(array(1,2,3), array()),
		'runkit_function_rename'		=> array(array(1,2), array()),
		'session_set_save_handler'		=> array(array(1,2,3,4,5), array()),
		'set_error_handler'				=> array(array(1), array()),
		'set_exception_handler'			=> array(array(1), array()),
		'spl_autoload'					=> array(array(1), array()),	
		'spl_autoload_register'			=> array(array(1), array()),
		'sqlite_create_aggregate'		=> array(array(2,3,4), array()), 
		'sqlite_create_function'		=> array(array(2,3), array()), 
		'stream_wrapper_register'		=> array(array(2), array()), 
		'uasort'						=> array(array(2), array()),
		'uksort'						=> array(array(2), array()),
		'usort'							=> array(array(2), array()),
		'yaml_parse'					=> array(array(4), array()),
		'yaml_parse_file'				=> array(array(4), array()),
		'yaml_parse_url'				=> array(array(4), array()),
		'eio_busy'						=> array(array(3), array()),
		'eio_chmod'						=> array(array(4), array()),
		'eio_chown'						=> array(array(5), array()),
		'eio_close'						=> array(array(3), array()),
		'eio_custom'					=> array(array(1,2), array()),
		'eio_dup2'						=> array(array(4), array()),
		'eio_fallocate'					=> array(array(6), array()),
		'eio_fchmod'					=> array(array(4), array()),
		'eio_fchown'					=> array(array(5), array()),
		'eio_fdatasync'					=> array(array(3), array()),
		'eio_fstat'						=> array(array(3), array()),
		'eio_fstatvfs'					=> array(array(3), array()),
		'preg_replace_callback'			=> array(array(2), array()),
		'dotnet_load'					=> array(array(1), array()),
	);
	
	// file inclusion functions => (parameters to scan, securing functions)
	$NAME_FILE_INCLUDE = 'File Inclusion';
	$fileWarmhole = array(
		'include' 						=> array(array(1), $F_SECURING_FILE),
		'include_once' 					=> array(array(1), $F_SECURING_FILE),
		'parsekit_compile_file'			=> array(array(1), $F_SECURING_FILE),
		'php_check_syntax' 				=> array(array(1), $F_SECURING_FILE),	
		'require' 						=> array(array(1), $F_SECURING_FILE),
		'require_once' 					=> array(array(1), $F_SECURING_FILE),
		'runkit_import'					=> array(array(1), $F_SECURING_FILE),
		'set_include_path' 				=> array(array(1), $F_SECURING_FILE),
		'virtual' 						=> array(array(1), $F_SECURING_FILE)		
	);

	// file affecting functions  => (parameters to scan, securing functions)
	// file handler functions like fopen() are added as parameter 
	// for functions that use them like fread() and fwrite()
	$NAME_FILE_READ = 'File Disclosure';
	$fileDisclosureWarmhole = array(
		'bzread'						=> array(array(1), $F_SECURING_FILE), 
		'bzflush'						=> array(array(1), $F_SECURING_FILE), 
		'dio_read'						=> array(array(1), $F_SECURING_FILE),   
		'eio_readdir'					=> array(array(1), $F_SECURING_FILE),  
		'fdf_open'						=> array(array(1), $F_SECURING_FILE), 
		'file'							=> array(array(1), $F_SECURING_FILE), 
		'file_get_contents'				=> array(array(1), $F_SECURING_FILE),  
		'finfo_file'					=> array(array(1,2), array()), 
		'fflush'						=> array(array(1), $F_SECURING_FILE),
		'fgetc'							=> array(array(1), $F_SECURING_FILE),
		'fgetcsv'						=> array(array(1), $F_SECURING_FILE),
		'fgets'							=> array(array(1), $F_SECURING_FILE),
		'fgetss'						=> array(array(1), $F_SECURING_FILE),
		'fread'							=> array(array(1), $F_SECURING_FILE), 
		'fpassthru'						=> array(array(1,2), array()), 
		'fscanf'						=> array(array(1), $F_SECURING_FILE), 
		'ftok'							=> array(array(1), $F_SECURING_FILE),
		'get_meta_tags'					=> array(array(1), $F_SECURING_FILE), 
		'glob'							=> array(array(1), array()), 
		'gzfile'						=> array(array(1), $F_SECURING_FILE), 
		'gzgetc'						=> array(array(1), $F_SECURING_FILE),
		'gzgets'						=> array(array(1), $F_SECURING_FILE), 
		'gzgetss'						=> array(array(1), $F_SECURING_FILE), 
		'gzread'						=> array(array(1), $F_SECURING_FILE),  
		'gzpassthru'					=> array(array(1), $F_SECURING_FILE), 
		'highlight_file'				=> array(array(1), $F_SECURING_FILE),  
		'imagecreatefrompng'			=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromjpg'			=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromgif'			=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromgd2'			=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromgd2part'		=> array(array(1), $F_SECURING_FILE), 
		'imagecreatefromgd'				=> array(array(1), $F_SECURING_FILE),  
		'opendir'						=> array(array(1), $F_SECURING_FILE),  
		'parse_ini_file' 				=> array(array(1), $F_SECURING_FILE),	
		'php_strip_whitespace'			=> array(array(1), $F_SECURING_FILE),	
		'readfile'						=> array(array(1), $F_SECURING_FILE), 
		'readgzfile'					=> array(array(1), $F_SECURING_FILE), 
		'readlink'						=> array(array(1), $F_SECURING_FILE),		
		//'stat'						=> array(array(1), array()),
		'scandir'						=> array(array(1), $F_SECURING_FILE),
		'show_source'					=> array(array(1), $F_SECURING_FILE),
		'simplexml_load_file'			=> array(array(1), $F_SECURING_FILE),
		'stream_get_contents'			=> array(array(1), $F_SECURING_FILE),
		'stream_get_line'				=> array(array(1), $F_SECURING_FILE),
		'xdiff_file_bdiff'				=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_bpatch'				=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_diff_binary'		=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_diff'				=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_merge3'				=> array(array(1,2,3), $F_SECURING_FILE),
		'xdiff_file_patch_binary'		=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_patch'				=> array(array(1,2), $F_SECURING_FILE),
		'xdiff_file_rabdiff'			=> array(array(1,2), $F_SECURING_FILE),
		'yaml_parse_file'				=> array(array(1), $F_SECURING_FILE),
		'zip_open'						=> array(array(1), $F_SECURING_FILE)
	);
	
	// file or file system affecting functions
	$NAME_FILE_AFFECT = 'File Manipulation';
	$fileManipWarmhole = array(
		'bzwrite'						=> array(array(2), array()),
		'chmod'							=> array(array(1), $F_SECURING_FILE),
		'chgrp'							=> array(array(1), $F_SECURING_FILE),
		'chown'							=> array(array(1), $F_SECURING_FILE),
		'copy'							=> array(array(1), array()),
		'dio_write'						=> array(array(1,2), array()),	
		'eio_chmod'						=> array(array(1), $F_SECURING_FILE),
		'eio_chown'						=> array(array(1), $F_SECURING_FILE),
		'eio_mkdir'						=> array(array(1), $F_SECURING_FILE),
		'eio_mknod'						=> array(array(1), $F_SECURING_FILE),
		'eio_rmdir'						=> array(array(1), $F_SECURING_FILE),
		'eio_write'						=> array(array(1,2), array()),
		'eio_unlink'					=> array(array(1), $F_SECURING_FILE),
		'error_log'						=> array(array(3), $F_SECURING_FILE),
		'event_buffer_write'			=> array(array(2), array()),
		'file_put_contents'				=> array(array(1,2), $F_SECURING_FILE),
		'fputcsv'						=> array(array(1,2), $F_SECURING_FILE),
		'fputs'							=> array(array(1,2), $F_SECURING_FILE),	
		'fprintf'						=> array(array(0), array()),	
		'ftruncate'						=> array(array(1), $F_SECURING_FILE),
		'fwrite'						=> array(array(1,2), $F_SECURING_FILE),		
		'gzwrite'						=> array(array(1,2), array()),
		'gzputs'						=> array(array(1,2), array()),
		'loadXML'						=> array(array(1), array()),
		'mkdir'							=> array(array(1), array()),
		'move_uploaded_file'			=> array(array(1,2), $F_SECURING_FILE),	
		'posix_mknod'					=> array(array(1), $F_SECURING_FILE),
		'recode_file'					=> array(array(2,3), $F_SECURING_FILE),	
		'rename'						=> array(array(1,2), $F_SECURING_FILE),
		'rmdir'							=> array(array(1), $F_SECURING_FILE),	
		'shmop_write'					=> array(array(2), array()),
		'touch'							=> array(array(1), $F_SECURING_FILE),
		'unlink'						=> array(array(1), $F_SECURING_FILE),
		'vfprintf'						=> array(array(0), array()),	
		'xdiff_file_bdiff'				=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_bpatch'				=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_diff_binary'		=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_diff'				=> array(array(3), $F_SECURING_FILE),	
		'xdiff_file_merge3'				=> array(array(4), $F_SECURING_FILE),
		'xdiff_file_patch_binary'		=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_patch'				=> array(array(3), $F_SECURING_FILE),
		'xdiff_file_rabdiff'			=> array(array(3), $F_SECURING_FILE),
		'yaml_emit_file'				=> array(array(1,2), $F_SECURING_FILE),
	);

	// OS Command executing functions => (parameters to scan, securing functions)
	$NAME_EXEC = 'Command Execution';
	$cmdWarmhole = array(
		'backticks'						=> array(array(1), $F_SECURING_SYSTEM), # transformed during parsing
		'exec'							=> array(array(1), $F_SECURING_SYSTEM),
		'expect_popen'					=> array(array(1), $F_SECURING_SYSTEM),
		'passthru'						=> array(array(1), $F_SECURING_SYSTEM),
		'pcntl_exec'					=> array(array(1), $F_SECURING_SYSTEM),
		'popen'							=> array(array(1), $F_SECURING_SYSTEM),
		'proc_open'						=> array(array(1), $F_SECURING_SYSTEM),
		'shell_exec'					=> array(array(1), $F_SECURING_SYSTEM),
		'system'						=> array(array(1), $F_SECURING_SYSTEM),
		'mail'							=> array(array(5), array()), // http://esec-pentest.sogeti.com/web/using-mail-remote-code-execution
		'mb_send_mail'					=> array(array(5), array()),
		'w32api_invoke_function'		=> array(array(1), array()),
		'w32api_register_function'		=> array(array(2), array()),
	);

	// SQL executing functions => (parameters to scan, securing functions)
	$NAME_DATABASE = 'SQL Injection';
	$sqlWarmhole = array(
	// Abstraction Layers
		'dba_open',				
		'dba_popen',					
		'dba_insert',					
		'dba_fetch',					
		'dba_delete',					
		'dbx_query',					 
		'odbc_do',					
		'odbc_exec',					
		'odbc_execute',					
	// Vendor Specific	
		'db2_exec',						
		'db2_execute',					
		'fbsql_db_query',				
		'fbsql_query',				 
		'ibase_query',				 
		'ibase_execute',				 
		'ifx_query'	,				 
		'ifx_do',				
		'ingres_query',				
		'ingres_execute',				
		'ingres_unbuffered_query',		
		'msql_db_query',	 
		'msql_query',				
		'msql',					 
		'mssql_query',					 
		'mssql_execute',					
		'mysql_db_query',				  
		'mysql_query',				 
		'mysql_unbuffered_query',		 
		'mysqli_stmt_execute',		
		'mysqli_query',			
		'mysqli_real_query',				
		'mysqli_master_query',			
		'oci_execute',			
		'ociexecute',					
		'ovrimos_exec',					
		'ovrimos_execute',				
		'ora_do',				
		'ora_exec',					
		'pg_query',						
		'pg_send_query',					
		'pg_send_query_params',			
		'pg_send_prepare',		
		'pg_prepare',				
		'sqlite_open',					
		'sqlite_popen',					
		'sqlite_array_query',			
		'arrayQuery',			
		'singleQuery',					
		'sqlite_query',				
		'sqlite_exec',				
		'sqlite_single_query',			
		'sqlite_unbuffered_query',		
		'sybase_query',		
		'sybase_unbuffered_query'		
	);
	
	// xpath injection
	$NAME_XPATH = 'XPath Injection';
	$xpathWarmhole = array(
		'xpath_eval'					=> array(array(2), $F_SECURING_XPATH),	
		'xpath_eval_expression'			=> array(array(2), $F_SECURING_XPATH),		
		'xptr_eval'						=> array(array(2), $F_SECURING_XPATH)
	);
	
	// ldap injection
	$NAME_LDAP = 'LDAP Injection';
	$ldapWarmhole = array(
		'ldap_add'						=> array(array(2,3), $F_SECURING_LDAP),
		'ldap_delete'					=> array(array(2), $F_SECURING_LDAP),
		'ldap_list'						=> array(array(3), $F_SECURING_LDAP),
		'ldap_read'						=> array(array(3), $F_SECURING_LDAP),
		'ldap_search'					=> array(array(3), $F_SECURING_LDAP)
	);	
		
	// connection handling functions
	$NAME_CONNECT = 'Protocol Injection';
    $protocalWarmhole = array(
		'curl_setopt'					=> array(array(2,3), array()),
		'curl_setopt_array' 			=> array(array(2), array()),
		'cyrus_query' 					=> array(array(2), array()),
		'error_log'						=> array(array(3), array()),
		'fsockopen'						=> array(array(1), array()), 
		'ftp_chmod' 					=> array(array(2,3), array()),
		'ftp_exec'						=> array(array(2), array()), 
		'ftp_delete' 					=> array(array(2), array()), 
		'ftp_fget' 						=> array(array(3), array()), 
		'ftp_get'						=> array(array(2,3), array()), 
		'ftp_nlist' 					=> array(array(2), array()), 
		'ftp_nb_fget' 					=> array(array(3), array()), 
		'ftp_nb_get' 					=> array(array(2,3), array()), 
		'ftp_nb_put'					=> array(array(2), array()), 
		'ftp_put'						=> array(array(2,3), array()), 
		'get_headers'					=> array(array(1), array()),
		'imap_open'						=> array(array(1), array()),  
		'imap_mail'						=> array(array(1), array()),
		'mail' 							=> array(array(1,4), array()), 
		'mb_send_mail'					=> array(array(1,4), array()), 
		'ldap_connect'					=> array(array(1), array()),
		'msession_connect'				=> array(array(1), array()),
		'pfsockopen'					=> array(array(1), array()),   
		'session_register'				=> array(array(0), array()),  
		'socket_bind'					=> array(array(2), array()),  
		'socket_connect'				=> array(array(2), array()),  
		'socket_send'					=> array(array(2), array()), 
		'socket_write'					=> array(array(2), array()),  
		'stream_socket_client'			=> array(array(1), array()),  
		'stream_socket_server'			=> array(array(1), array()),
		'printer_open'					=> array(array(1), array())
	);
	
	// other critical functions
	$NAME_OTHER = 'Possible Flow Control'; // :X
	$possibleWarmhole = array(
		'dl' 							=> array(array(1), array()),	
		'ereg'							=> array(array(2), array()), # nullbyte injection affected		
		'eregi'							=> array(array(2), array()), # nullbyte injection affected			
		'ini_set' 						=> array(array(1,2), array()),
		'ini_restore'					=> array(array(1), array()),
		'runkit_constant_redefine'		=> array(array(1,2), array()),
		'runkit_method_rename'			=> array(array(1,2,3), array()),
		'sleep'							=> array(array(1), array()),
		'usleep'						=> array(array(1), array()),
		'extract'						=> array(array(1), array()),
		'mb_parse_str'					=> array(array(1), array()),
		'parse_str'						=> array(array(1), array()),
		'putenv'						=> array(array(1), array()),
		'set_include_path'				=> array(array(1), array()),
		'apache_setenv'					=> array(array(1,2), array()),	
		'define'						=> array(array(1), array()),
		'is_a'							=> array(array(1), array()) // calls __autoload()
	);
	
	// property oriented programming with unserialize
	$NAME_POP = 'PHP Object Injection';
	$PhpWarmhole = array(
		'unserialize'					=> array(array(1), array()), // calls gadgets
		'yaml_parse'					=> array(array(1), array())	 // calls unserialize
	);
	
	// XML
	//simplexml_load_string
	
	
	# interruption vulnerabilities
	# trim(), rtrim(), ltrim(), explode(), strchr(), strstr(), substr(), chunk_split(), strtok(), addcslashes(), str_repeat() htmlentities() htmlspecialchars(), unset()

?>	