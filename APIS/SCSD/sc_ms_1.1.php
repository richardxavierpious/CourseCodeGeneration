<?php

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
  exit;
}


// Connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "eric_db";

// Establishing the connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$jsonobject = file_get_contents("php://input");
$data = json_decode($jsonobject, true);


$query1 = "SELECT deg_id, code, Programme_ID FROM programme WHERE Programme_Name = '$data[selectedProgram]'";    
$query2 = "SELECT Revision_ID FROM revision ORDER BY Revision_ID DESC LIMIT 1";
$query3 = "SELECT CrsTypeID, CourseType FROM coursetype WHERE CourseTypeName = '$data[selectedCourseType]'";       
$query4 = "SELECT CourseID FROM course ORDER BY CourseID DESC LIMIT 1";

$result1 = mysqli_query($conn, $query1);
$result2 = mysqli_query($conn, $query2);
$result3 = mysqli_query($conn, $query3);
$result4 = mysqli_query($conn, $query4);
    
$row1 = mysqli_fetch_assoc($result1);
$row2 = mysqli_fetch_assoc($result2);
$row3 = mysqli_fetch_assoc($result3);
$row4 = mysqli_fetch_assoc($result4);

$deg_id = intval($row1['deg_id']);
$code = ($row1['code']);
$Programme_ID = ($row1['Programme_ID']);

$Revision_ID = ($row2['Revision_ID']);

$crsTypeID = ($row3['CrsTypeID']);
$CourseType = ($row3['CourseType']);


//Data to be inserted into the table. Course code is obtained after its generation
$courseName	= $data['courseName'];
$selectedDepartment = $data['selectedDepartment'];
$selectedSemester = $data['selectedSemester'];
$selectedSlot = $data['selectedSlot'];
$selectedCourseType	= $data['selectedCourseType'];
$selectedLecture = $data['selectedLecture'];
$selectedPractical = $data['selectedPractical'];
$selectedProgram = $data['selectedProgram'];
$selectedTotalMods = $data['selectedTotalMods'];
$selectedTutorial	= $data['selectedTutorial'];
$selectedWeeklyHours = $data['selectedWeeklyHours'];
$selectedCredit = $data['selectedCredit'];
$courseID = ++$row4['CourseID'];
$pro_id = $code;


if($CourseType =='CO')
{
    //Core - common /group
    //$variable_type = sprintf('%02d', $variable);
    $variable_type = "00";
    
}
else if(($CourseType =='PR')||($CourseType =='E8')){
    //Practical - common
    $variable_type = "22"; 
}
else {
  $query_Maxvalue="SELECT  COALESCE(MAX(CAST(SUBSTRING(coursecode, 11, 2) AS SIGNED)),0) AS MaxVal FROM course as crs LEFT OUTER JOIN `common` as cmn ON crs.CourseID = cmn.CourseID  WHERE SUBSTRING(crs.coursecode, 2, 2) = '$Revision_ID' AND SUBSTRING(crs.coursecode, 8, 2) = '$selectedDepartment' AND crs.CrsTypeID = '$crsTypeID' AND (cmn.ProgrammeID='$Programme_ID' OR crs.prog_id IN ('$Programme_ID',100))";
  $rslt_MaxVal = mysqli_query($conn, $query_Maxvalue);
  $row_Max = mysqli_fetch_assoc($rslt_MaxVal);
  $crsMaxVal = ($row_Max['MaxVal']);
  
  if($crsMaxVal==0){
    
        // rest considered as baskets
        if($CourseType =='D1'){
          //Mandatory MOOC  91,92,.....
          $variable_type = '91'; 
        }
        else if($CourseType =='A1'){
          //S8 MOOC Slot A need to be incorporated here 31,32.....
          $variable_type = '31'; 
        }
        else if($CourseType =='B1'){
              //S8 MOOC Slot B need to be incorporated here 41,42.....
            $variable_type = '41'; 
        }
        else if($CourseType =='K1'){
              //S8 MOOC Slot C need to be incorporated here 51,52.....
            $variable_type = '51'; 
        }
        else if(($CourseType =='F1') || ($CourseType =='I1')) {
          //F1-Honours MOOC basket 1 - 31,32.....
          //I1-Minor MOOC basket 1 - 31,32.....
           $variable_type = '31'; 
        }
        else if(($CourseType =='F2') || ($CourseType =='I2')){
          //F2-Honours MOOC basket 2 - 41,42.....
          //I2-Minor MOOC basket 2 - 41,42.....
          $variable_type = '41'; 
        }
        else if(($CourseType =='F3') || ($CourseType =='I3')){
          //F3-Honours MOOC basket 1 - 51,52.....
          //I3-Minor MOOC basket 1 - 51,52.....
          $variable_type = '51'; 
        }
        else if(($CourseType =='F4') || ($CourseType =='I4')){
          //F4-Honours MOOC basket 1 - 61,62.....
          //I4-Minor MOOC basket 1 - 61,62.....
          $variable_type = '61'; 
        }
        else if(($CourseType =='F5') || ($CourseType =='I5')){
          //F5-Honours MOOC basket 1 - 71,72.....
          //I5-Minor MOOC basket 1 - 71,72.....
          $variable_type = '71'; 
        }
        else{
          //Elective E, Honours H, Minor M, Opem Elective O,Rajagiri Elective R, Practical elective L
          $variable_type = '01'; 
        }
  }
  else {
    $cntr=(int)$crsMaxVal + 1;    
    $variable_type = (string)($cntr);
  }
  if(strlen($variable_type)==1){
    $variable_type = '0' . $variable_type;
   }
}


//Course Code Generation
$coursecode = $deg_id.$Revision_ID.$code."/".$selectedDepartment."9".$variable_type.$selectedSlot;


//Checking for duplicates
$sql = "SELECT CourseCode from course where CourseCode = '$coursecode'";
$sqlresult = mysqli_query($conn, $sql); 
    if (mysqli_num_rows($sqlresult) > 0) {
        $sqlrow = mysqli_fetch_assoc($sqlresult);
        //$code2 = $sqlrow['CourseCode'];
        http_response_code(400);
        echo "Code already exists: "; 
    }
    else {

//Writing the data into the course table
        echo $coursecode;        
        $semCombValue= implode('',$selectedSemester);  
        $pro_id = 101;
        $queryInsert = "INSERT INTO course (CourseID, CourseName, CourseCode,CrsTypeID, CourseSem, Sem_Comb, CourseLecture, CourseTutorial, CoursePractical, CourseTotMod,WklyHrs,CourseCredits, prog_id) VALUES ('$courseID', '$courseName', '$coursecode' ,'$crsTypeID', '9', '$semCombValue',  '$selectedLecture', '$selectedTutorial', '$selectedPractical', '$selectedTotalMods', '$selectedWeeklyHours', '$selectedCredit', '$pro_id')";

        }   
        if (mysqli_query($conn, $queryInsert)) {
            echo "New record created successfully: ".$coursecode;
        } 
        else {
          echo "Error: " . $queryInsert . "<br>" . mysqli_error($conn);
          }

//Writing data into the common table
          foreach ($selectedSemester as $sem) {
              $fix_sem = substr($sem, -1);
              $fix_pgmid = substr($sem, 0, -1);
              $Group=0;
              // Assuming you have appropriate columns in the "common" table to store the Course ID, Programme ID, and Semester
              $queryCommon = "INSERT INTO common (CourseID, ProgrammeID, Semester,Grp) VALUES ('$courseID', '$fix_pgmid', '$fix_sem','$Group')";
              mysqli_query($conn, $queryCommon);
          }
        }       
// Close the connection
$conn->close();
?>
