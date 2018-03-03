<?php
    include('include/header.php');
    include('include/sidebar.php');
    include('data/student_model.php');
    include('data/data_model.php');
    include('../config.php');
    $id = $_GET['id'];
    $student = $student->getstudentbyid($id);
?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>STUDENT SUBJECT</small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="studentlist.php">Students</a>
                    </li>
                    <li class="active">
                        Student Subject
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <?php while($row = mysqli_fetch_array($student)): ?>
                <h4>Student ID : <?php echo $row['studid']; ?></h4>
                <h4>Name : <?php echo $row['fname'].' '.$row['lname']; ?></h4>
                <?php endwhile; ?>
                <hr />
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th class="text-center">Section</th>
                            <th class="text-center">Semester</th>
                            <th class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
    $r1 = mysqli_query($con,"select * from studentsubject where studid=$id");
    while($row = mysqli_fetch_array($r1)):
        $r2 = mysqli_query($con,'select * from class where id='.$row['classid'].'');
        while($rows = mysqli_fetch_array($r2)):
            $r3 = mysqli_query($con,'select * from teacher where id='.$rows['teacher'].'');
            $teacher = null;
            if($r3){
                 $teacher = mysqli_fetch_array($r3);
                $teacher = $teacher['fname'].' '.$teacher['lname'];
            }?>
           
            
                        <tr>
                            <td><?php echo $rows['subject']; ?></td>
                            <td><?php echo $teacher ?></td>
                            <td class="text-center"><?php echo $rows['section']; ?></td>
                            <td class="text-center"><?php echo $rows['sem']; ?></td>
                            <td class="text-center"><a href="data/student_model.php?q=removesubject&studid=<?php echo $id;?>&classid=<?php echo $rows['id']; ?>"><i class="fa fa-times-circle text-danger fa-2x confirmation"></i></a></td>
                        </tr>
                    
            
        <?php endwhile;
    endwhile;
?>
                    </tbody>
                </table>    
            </div>
            </div>
        </div>
       


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->    
<?php include('include/footer.php');