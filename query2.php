<?php
/**
 * Created by PhpStorm.
 * User: kingHenry
 * Date: 6/22/14
 * Time: 4:12 PM

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql dbName ***/
$dbName='employees';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'lDSSJ1Sp2y';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Customer Service Managers | phpBench</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">phpBench</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#contact">Contact</a></li>

            </ul>

        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">
    <div class="well col-md-3 col-lg-3 col-sm-3">
        <a href="index.php">Top 10 Current Employees</a></br>
        <a href="query2.php">Customer Service Managers</a></br>
        <a href="index.php">Top 10 Current Employees</a></br>
        <a href="index.php">Top 10 Current Employees</a></br>
        <a href="index.php">Top 10 Current Employees</a></br>
        <a href="index.php">Top 10 Current Employees</a></br>
        <a href="index.php">Top 10 Current Employees</a></br>
        <a href="index.php">Top 10 Current Employees</a></br>
        <a href="index.php">Top 10 Current Employees</a>


    </div>

    <div class="col-md-9 col-lg-9 col-sm-9">

        <p>Write the query that displays the names of people that have worked as
            department managers in the customer service department.  Who are the they?</p>
        <!-- Main component for a primary marketing message or call to action -->
        <table class="table table-bordered table-hover">
            <thead>
            <tr><th>First Name</th>
                <th>Last Name</th>
                <th>Department Name</th>
                <th>From Date</th>
                <th>To Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            try{
                $sql="select employees.first_name, employees.last_name, departments.dept_name, dept_manager.from_date, dept_manager.to_date from employees join dept_manager on employees.emp_no=dept_manager.emp_no join departments on dept_manager.dept_no=departments.dept_no where departments.dept_name='Customer Service'";
                $dbh = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);
                foreach ($dbh->query($sql) as $row)
                {
                    print '<tr> ';
                    print '<td>'.$row['first_name'] .'</td><td>'. $row['last_name'].'</td><td>'. $row['dept_name']. '</td><td> '. $row['from_date'].' </td><td>'. $row['to_date']. '</tr>';
                }
                /*** close the database connection ***/
                $dbh = null;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }

            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js></script>
</body>
</html>
