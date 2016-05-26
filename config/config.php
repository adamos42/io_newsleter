<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
$config['module']['newsleter'] = array
(
    'module' => "Newsleter",
    'name' => "Newsleter Module",
    'description' => "Newsleter module, still development! Check the updates on https://github.com/adamos42/io_newsleter",
    'author' => "Ádám Liszkai aka Adamos42 <contact@liszkaiadam.hu>",
    'version' => "0.1.0",
 
    // 'uri' should be the module's folder in lowercase.
    // From 1.0.3, it is not mandatory to set 'uri'.
    
    'uri' => 'io_newsleter',
    'has_admin'=> TRUE,
    'has_frontend'=> TRUE,
);
 
return $config['module']['newsleter'];
