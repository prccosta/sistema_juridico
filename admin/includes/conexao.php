<?php
define('BD_USER', 'canuteoliveira');
define('BD_PASS', 'gabi29041995');
define('BD_NAME', 'canuteoliveira');

//NOME DO SERVIDOR:  mysql01.canuteoliveiralima.com.br
mysql_connect('localhost', BD_USER, BD_PASS) or trigger_error(mysql_error());
mysql_select_db(BD_NAME) or trigger_error(mysql_error());
?>