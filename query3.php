<?php
/**
 * Created by PhpStorm.
 * User: kingHenry
 * Date: 6/22/14
 * Time: 5:13 PM
 */

    @require('dbParams.php');

?>

    <title>Average Salary by Department | phpBench</title>

<?php
    @include('headerAndNav.php');
?>


<div class="container">
    <div class="well col-md-3 col-lg-3 col-sm-3">
        <a href="index.php">Top 10 Current Employees</a></br>
        <a href="query2.php">Customer Service Managers</a></br>
        <a href="query3.php">Average Salary by Department</a></br>
        <a href="query4.php">Number of Employees by Department </a></br>



    </div>

    <div class="col-md-9 col-lg-9 col-sm-9">

        <p>Write the query that displays the average salaries of all departments
        in descending order</p>
        <!-- Main component for a primary marketing message or call to action -->
        <table class="table table-bordered table-hover">
            <thead>
            <tr><th>Department Name</th>
                <th>Average Salaries(descending)</th>

            </tr>
            </thead>
            <tbody>
            <?php
            try{
                $sql="select departments.dept_name, avg(salaries.salary) from departments join dept_emp on departments.dept_no=dept_emp.dept_no join salaries on dept_emp.emp_no=salaries.emp_no group by departments.dept_name order by avg(salaries.salary) desc";
                $dbh = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);
                foreach ($dbh->query($sql) as $row)
                {
                    print '<tr> ';
                    print '<td>'.$row['dept_name'] .'</td><td>'. $row['avg(salaries.salary)']. '</tr>';
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
