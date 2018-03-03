<?php
    $student = new Datastudent();
    if(isset($_GET['q'])){
        $function = $_GET['q'];
        $student->$function();
    }
    
    class Datastudent {
        
        function __construct(){
            if(!isset($_SESSION['id'])){
                header('location:../../');   
            }
        }
        
        function getstudentbyclass($classid){
            $q = "select * from studentsubject where classid=$classid";
            $r = mysqli_query($q);
            $student = array();
            if($classid != null){
               while($row = mysqli_fetch_array($r)){
                    $q2 = 'select * from student where id='.$row['studid'].'';  
                    $r2 = mysqli_query($q2);
                    $student[] = mysqli_fetch_array($r2);    
                } 
            }
            return $student;
        }
        
        function getstudentbysearch($classid,$search){
            $q = "select * from student where fname like '%$search%' or lname like '%$search%' or studid like '%$search%'";
            $r = mysqli_query($q);
            $student = array();
            while($row = mysqli_fetch_array($r)){
                $q2 = 'select * from studentsubject where studid='.$row['id'].' and classid='.$classid.'';  
                $r2 = mysqli_query($q2);
                if(mysqli_num_rows($r2) > 0) {
                    $student[] = $row;
                }

            }
            return $student;        
        }
        
        function getstudentgrade($studid,$classid){
            $q = "select * from studentsubject where studid='$studid' and classid='$classid'";
            $r = mysqli_query($q);
            if($row = mysqli_fetch_array($r)){
                $att1 = ($row['att1']) * .10;   
                $att2 = ($row['att2']) * .10;   
                $att3 = ($row['att3']) * .10;
				$att4 = ($row['att4']) * .10;				
                
                $exam1 = ($row['exam1']) * .40;   
                $exam2 = ($row['exam2']) * .40;   
                $exam3 = ($row['exam3']) * .40;
                $exam4 = ($row['exam4']) * .40;				
                
                $quiz1 = ($row['quiz1']) * .10;   
                $quiz2 = ($row['quiz2']) * .10;   
                $quiz3 = ($row['quiz3']) * .10;
				$quiz4 = ($row['quiz4']) * .10;
                
                $project1 = ($row['project1']) * .40;   
                $project2 = ($row['project2']) * .40;   
                $project3 = ($row['project3']) * .40; 
				$project4 = ($row['project4']) * .40; 
                
                $prelim = $att1 + $exam1 + $quiz1 + $project1;
                $midterm = $att2 + $exam2 + $quiz2 + $project2;
				$semifinal = $att3 + $exam3 + $quiz3 + $project3;
                $final = $att4 + $exam4 + $quiz4 + $project4;
                
                $total = ($prelim * .25) + ($midterm * .25) + ($semifinal * .25) + ($final * .25);
                
                $data = array(
                    'eqprelim' => $this->gradeconversion($prelim),
                    'eqmidterm' => $this->gradeconversion($midterm),
					'eqsemifinal' => $this->gradeconversion($semifinal),
                    'eqfinal' => $this->gradeconversion($final),
                    'eqtotal' => $this->gradeconversion($total),
                    'prelim' => round($prelim),
                    'midterm' => round($midterm),
					'semifinal' => round($semifinal),
                    'final' => round($final),
                    'total' => round($total),
                    'att1' => $row['att1'],
                    'att2' => $row['att2'],
                    'att3' => $row['att3'],
					'att4' => $row['att4'],
                    'exam1' => $row['exam1'],
                    'exam2' => $row['exam2'],
                    'exam3' => $row['exam3'],
					'exam4' => $row['exam4'],
                    'quiz1' => $row['quiz1'],
                    'quiz2' => $row['quiz2'],
                    'quiz3' => $row['quiz3'],
					'quiz4' => $row['quiz4'],
                    'project1' => $row['project1'],
                    'project2' => $row['project2'],
                    'project3' => $row['project3'],
					'project4' => $row['project4'],
                );
            }
            
            return $data;
        }
        
        function getstudentbyid($studid){
            $q = "select * from student where id=$studid";   
            $r = mysqli_query($q);
            $data = array();
            $data[] = mysqli_fetch_array($r);
            return $data;
        }
        
        function gradeconversion($grade){
            $grade = round($grade);
            if($grade==0){
                 $data = 0;
            }else{
                switch ($grade) {
                    case $grade > 98:
                         $data = 1.0;
                         break;
					case 98:
                         $data = 1.1;
                         break;
                    case 97:
                         $data = 1.1;
                         break;
					case 96:
                         $data = 1.2;
                         break;
                    case 95:
                         $data = 1.2;
                         break;
					case 94:
                         $data = 1.3;
                         break;	 
                    case 93:
                         $data = 1.3;
                         break;
					case 92:
                         $data = 1.4;
                         break;	 
                    case 91:
                         $data = 1.4;
                         break;
                    case 90:
                         $data = 1.5;
                         break;
                    case 89:
                         $data = 1.6;
                         break;
                    case 88:
                         $data = 1.7;
                         break;
                    case 87:
                         $data = 1.8;
                         break;
                    case 86:
                         $data = 1.9;
                         break;
                    case 85:
                         $data = 2.0;
                         break;
                    case 84:
                         $data = 2.1;
                         break;
                    case 83:
                         $data = 2.2;
                         break;
                    case 82:
                         $data = 2.3;
                         break;
                    case 81:
                         $data = 2.4;
                         break;
                    case 80:
                         $data = 2.5;
                         break;
                    case 79:
                         $data = 2.6;
                         break;
                    case 78:
                         $data = 2.7;
                         break;
                    case 77:
                         $data = 2.8;
                         break;
                    case 76:
                         $data = 2.9;
                         break;
                    case 75:
                         $data = 3.0;
                         break;                

                     default:
                         $data = 5.0;
                }
            }
            return $data;
        }
    }
?>