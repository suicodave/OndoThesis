<?php
    include('../config.php');
    $teacher = new Datateacher();
    if(isset($_GET['q'])){
        $teacher->$_GET['q']();
    }
    class Datateacher {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }
        
         //create logs
        function logs($act){            
            $date = date('m-d-Y h:i:s A');
            echo $q = "insert into log values(null,'$date','$act')";   
            mysqli_query($con,$q);
            return true;
        }
        
        //get all teacher info
        function getteacher($search){
            $q = "select * from teacher where teachid like '%$search%' or fname like '%$search%' or lname like '%$search%' order by lname,fname,teachid";
            $r = mysqli_query($con,$q);
            
            return $r;
        }
        
        //get teacher by ID
        function getteacherbyid($id){
            $q = "select * from teacher where id=$id";
            $r = mysqli_query($con,$q);
            
            return $r;
        }
        //add teacher
        function addteacher(){
            include('../../config.php');
            $teachid = $_POST['teachid'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            
            $q = "insert into teacher values('','$teachid','$fname','$lname')";
            mysqli_query($con,$q);
            
            $name = $fname.' '.$lname;
            $act = "add new teacher $name";
            $this->logs($act);
            
            header('location:../teacherlist.php?r=added');
        }
        
        //update teacher
        function updateteacher(){
            include('../../config.php');
            $id = $_GET['id'];
            $teachid = $_POST['teachid'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $q = "update teacher set teachid='$teachid', fname='$fname', lname='$lname' where id=$id";
            mysqli_query($con,$q);
            
            $name = $fname.' '.$lname;
            $act = "update teacher $name";
            $this->logs($act);
            
            header('location:../teacherlist.php?r=updated');
        }
        
        //remove teacher from class
        function removesubject(){
            include('../../config.php');
            $classid = $_GET['classid'];
            $teachid = $_GET['teachid'];
            mysqli_query($con,"update class set teacher=null where id=$classid");
            header('location:../teacherload.php?id='.$teachid.'');
            
            $tmp = mysqli_query($con,"select * from class where id=$classid");
            $tmp_row = mysqli_fetch_array($tmp);
            $tmp_subject = $tmp_row['subject'];
            $tmp_class = $tmp_row['course'].' '.$tmp_row['year'].'-'.$tmp_row['section'];
            
            $tmp = mysqli_query($con,"select * from teacher where id=$teachid");
            $tmp_row = mysqli_fetch_array($tmp);
            $tmp_teacher = $tmp_row['fname'].' '.$tmp_row['lname'];
            
            $act = "remove teacher $tmp_teacher from class $tmp_class with the subject of $tmp_subject";
            $this->logs($act);
            
        }
        
    }
?>