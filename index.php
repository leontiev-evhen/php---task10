<?php
require_once 'config.php';
spl_autoload_register(function ($class_name) {
    require_once 'libs/'.$class_name . '.php';
});

try
{
    /*     $mysql = (new MySql())
           ->insert('MY_TEST')
           ->values(['key' => 'user11', 'data' => 'test'])
           ->execute();*/

   echo (new Sql())
        ->distinct()
        ->select(['data'])
        ->from('MY_TEST')
        ->join('left', 'MY_TEST2', 'm.key = m2.key')
        ->where(['key' => 'test11-u'])
        ->groupBy('key')
        ->having('MIN(data) < 11')
        ->orderBy('key', 'desk')
        ->limit(2, 3)
        ->execute();

    
/*       $mysql = (new MySql())
       ->update('MY_TEST')
       ->set(['key' => 'test11-u', 'data' => 'test2'])
       ->where(['key' => 'user11'])
       ->execute();
/*
       $mysql = (new MySql())
       ->delete('MY_TEST')
       ->where(['key' => 'user11'])
       ->execute();*/

    /*========= Postgresql ===================*/

/*    $postgresql = (new PostgreSql())
        ->select('PG_TEST', ['data'])
        ->where(['key' => 'user11-2'])
        ->execute();

    /*
       $postgresql =  (new PostgreSql())
       ->insert('PG_TEST')
       ->values(['key' => 'user11-2', 'data' => 'test2'])
       ->execute();
*/
  /*    $postgresql =   (new PostgreSql())
    ->update('PG_TEST')
    ->set(['key' => 'test11-u', 'data' => 'test2'])
    ->where(['key' => 'user11'])
    ->execute();
/*
    $postgresql =  (new PostgreSql())
    ->delete('PG_TEST')
    ->where(['key' => 'user11'])
    ->execute();*/

}
catch (Exception $e)
{
    echo $e->getMessage();
}

require_once 'templates/index.php';

?>
