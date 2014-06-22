<?php
/**
 * Created by PhpStorm.
 * User: kingHenry
 * Date: 6/22/14
 * Time: 2:06 PM
 */

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql dbName ***/
$dbName='employees';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'lDSSJ1Sp2y';

try{
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);
    echo 'Connected to database';
    }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }



?>