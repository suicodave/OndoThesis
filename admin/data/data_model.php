<?php
    $data = new Data();
    if(isset($_GET['q'])){
        $data->$_GET['q']();
    }
    class Data {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }
        
         //create logs
        function logs($act){            
            $date = date('m-d-Y h:i:s A');
            echo $q = "insert into log values(null,'$date','$act')";   
            mysqli_query($q);
            return true;
        }
        
        //get all subjects
        function getsubject($search){
            $q = "select * from subject where code like '%$search%' or title like '%$search%' order by code asc";
            $r = mysqli_query($q);
            
            return $r;
        }
        //get subject by ID
        function getsubjectbyid($id){
            $q = "select * from subject where id=$id";
            $r = mysqli_query($q);
            
            return $r;
        }
        //add subject
        function addsubject(){
            include('../../config.php');
            $code = $_POST['code'];
            $title = $_POST['title'];
            $unit = $_POST['unit'];
            $q = "insert into subject values('','$code','$title','$unit')";
            mysqli_query($q);
            
            $act = "add new subject $code - $title";
            $this->logs($act);
            header('location:../subject.php?r=added');
        }
        
        //update subject
        function updatesubject(){
            include('../../config.php');
            $id = $_GET['id'];
            $code = $_POST['code'];
            $title = $_POST['title'];
            $unit = $_POST['unit'];
            $q = "update subject set code='$code', title='$title',unit=$unit where id=$id";
            mysqli_query($q);
            
            $act = "update subject $code - $title";
            $this->logs($act);
            header('location:../subject.php?r=updated');
        }
        
        //GLOBAL DELETION
        function delete(){
            include('../../config.php');
            $table = $_GET['table'];
            $id = $_GET['id'];
            $q = "delete from $table where id=$id";
            $r = null;
            
            $tmp = mysqli_query("select * from $table where id=$id");
            $tmp_row = mysqli_fetch_array($tmp);
            
            mysqli_query($q);
            
            if($table=='subject'){
                $record = $tmp_row['code'];
                header('location:../subject.php?r=deleted');
                
            }else if($table=='class'){
                 $record = $tmp_row['subject'];
                header('location:../class.php?r=deleted');
               
            }else if($table=='student'){
                $record = $tmp_row['fname'];
                header('location:../studentlist.php?r=deleted');
               
            }else if($table=='teacher'){
               $record = $tmp_row['fname'];
                header('location:../teacherlist.php?r=deleted');
            }else if($table=='userdata'){
                $record = $tmp_row['username'];
                header('location:../users.php?r=deleted');
            }
                    
            $act = "delete $record from $table";
            $this->logs($act);
        }

    }
?>