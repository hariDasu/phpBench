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
    $sql="select employees.first_name, employees.last_name, salaries.salary,salaries.to_date from employees join salaries on employees.emp_no=salaries.emp_no where salaries.to_date='9999-01-01' order by salaries.salary desc limit 10";
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);
    foreach ($dbh->query($sql) as $row)
    {
        print $row['first_name'] .' - '. $row['last_name'].' - '. $row['salary'].' - '. $row['to_date'] . '<br />';
    }
    }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }



?>