<?php
/**
 * Created by PhpStorm.
 * User: kingHenry
 * Date: 6/22/14
 * Time: 4:12 PM

/*** mysql hostname ***/

    @require('dbParams.php');
?>

    <title>Customer Service Managers | phpBench</title>

<?php
    @include('headerAndNav.php');
?>

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
