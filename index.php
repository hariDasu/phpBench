<?php

/**
 * Created by PhpStorm.
 * User: kingHenry
 * Date: 6/22/14
 * Time: 2:06 PM
 */

@require('dbParams.php');

?>


    <title>Top 10 Current Employees | phpBench</title>

<?php
@include('headerAndNav.php');
?>

    <div class="col-md-9 col-lg-9 col-sm-9">

    <p>Write the query to display the names of the top 10 highest paid employees that are currently employed.

        The date used for current employees is: 9999-01-01</p>
    <!-- Main component for a primary marketing message or call to action -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr><th>First Name</th>
                <th>Last Name</th>
                <th>Salary</th>
                <th>To Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try{
                $sql="select employees.first_name, employees.last_name, salaries.salary,salaries.to_date from employees join salaries on employees.emp_no=salaries.emp_no where salaries.to_date='9999-01-01' order by salaries.salary desc limit 10";
                $dbh = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);
                foreach ($dbh->query($sql) as $row)
                {
                    print '<tr> ';
                    print '<td>'.$row['first_name'] .'</td><td>'. $row['last_name'].' </td><td> '. $row['salary'].' </td><td>'. $row['to_date']. '</tr>';
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
