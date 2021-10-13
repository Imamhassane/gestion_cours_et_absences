<?php 
//define("WEB_ROUTE" , "http://niassimamhassane.alwaysdata.net/");
define("WEB_ROUTE" , "http://localhost:8000/");

define('ROUTE_DIR', str_replace ('public', '' , $_SERVER['DOCUMENT_ROOT']));
define("USER_DB" , 'root' );
define("PASSWORD_DB" , 'alvinniass' );
define("HOST_BD" , 'localhost');
define("CHAINE_DE_CONNEXION" , 'mysql:dbname=cours_et_absences;host='.HOST_BD );
/* define("USER_DB" , '237498_g_absence' );
define("PASSWORD_DB" , 'alvinniass' );
define("HOST_BD" , 'mysql-niassimamhassane.alwaysdata.net');
define("CHAINE_DE_CONNEXION" , 'mysql:dbname=niassimamhassane_absences;host='.HOST_BD ); */
define("per_page_record" , 5);
?>
