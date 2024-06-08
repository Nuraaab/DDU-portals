
<?php
include '../../auth/connection.php';
$studentEmail = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$studentEmail'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
	$username = $row['username'];
}
if($username !== NULL){
    $distinct_years_semesters_query = "SELECT DISTINCT academic_year, semester, student_id FROM student_result WHERE student_id = '" . $_SESSION['username'] . "' ORDER BY academic_year, semester";
    $distinct_years_semesters_result = mysqli_query($conn, $distinct_years_semesters_query);
    $current_year = "";
    $current_semester = "";
    if(mysqli_num_rows($distinct_years_semesters_result) ==0){
            echo '<div class="content mt-5">';
            echo '<div class="card">
                    <div class="card-body">
                    <p>No results found</p>
                    </div>
                </div>
                </div>';
    }
    while ($year_semester_row = mysqli_fetch_assoc($distinct_years_semesters_result)) {
        $academic_year = $year_semester_row['academic_year'];
        $semester = $year_semester_row['semester'];
        $id = $year_semester_row['student_id'];
    
        if ($current_year != $academic_year || $current_semester != $semester) {
           echo' <div class="content">';
           echo' <div class="card">';
               echo' <div class="card-header">
               <h5>Academic Year: ' . $academic_year . ' Semester: ' . $semester . '</h5>
                </div>';
            echo '<table class="table datatable-button-html5-columns">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Credit Hour</th>
                            <th>Credit Point</th>
                            <th>Letter Grade</th>
                            <th>Number Grade</th>
                        </tr>
                    </thead>
                    <tbody>';
        }
    
        $result_query = "SELECT * FROM student_result WHERE student_id = '" . $_SESSION['username'] . "' AND academic_year = '$academic_year' AND semester = '$semester'";
        $result_result = mysqli_query($conn, $result_query);
    
        if (mysqli_num_rows($result_result) > 0) {
            $total_credit_points = 0;
            $total_result = 0;
            $grade = "";
            $numberGrade = "";
    
            while ($row = mysqli_fetch_assoc($result_result)) {
                if ($row['result'] <= 100 && $row['result'] >= 90) {
                    $grade = "A+";
                    $numberGrade = "4.0";
                } else if ($row['result'] < 90 && $row['result'] >= 85) {
                    $grade = "A";
                    $numberGrade = "4.0";
                } else if ($row['result'] < 85 && $row['result'] >= 80) {
                    $grade = "A-";
                    $numberGrade = "3.75";
                } else if ($row['result'] < 80 && $row['result'] >= 75) {
                    $grade = "B+";
                    $numberGrade = "3.5";
                } else if ($row['result'] < 75 && $row['result'] >= 70) {
                    $grade = "B";
                    $numberGrade = "3.0";
                } else if ($row['result'] < 70 && $row['result'] >= 65) {
                    $grade = "B-";
                    $numberGrade = "2.75";
                } else if ($row['result'] < 65 && $row['result'] >= 60) {
                    $grade = "C+";
                    $numberGrade = "2.5";
                } else if ($row['result'] < 60 && $row['result'] >= 55) {
                    $grade = "C";
                    $numberGrade = "2.0";
                } else if ($row['result'] < 55 && $row['result'] >= 50) {
                    $grade = "C-";
                    $numberGrade = "1.75";
                } else if ($row['result'] < 50 && $row['result'] >= 45) {
                    $grade = "D";
                    $numberGrade = "1.0";
                } else {
                    $grade = "0.0";
                }
    
                $total_credit_points += $row['credit_point'];
                $total_result += $row['credit_point'] * $numberGrade;
               $commulative = $total_result/$total_credit_points;
                echo '<tr>
                        <td>' . $row['course_name'] . '</td>
                        <td>' . $row['course_code'] . '</td>
                        <td>' . $row['credit_hour'] . '</td>
                        <td>' . $row['credit_point'] . '</td>
                        <td>' . $grade . '</td>
                        <td>' . $numberGrade . '</td>
                        
                    </tr>';
            }
    
    
        } else {
            echo '<div class="content mt-5">';
        echo '<div class="card">
                <div class="card-body">
                <p>No results found</p>
                </div>
            </div>
            </div>';
        }
    
            echo '</tbody>
            
                </table>
                <div class="card-header">
            <h5>GPA: ' . $commulative .'</h5>
            </div>
                </div>
                </div>';
    
        $current_year = $academic_year;
        $current_semester = $semester;
    }
}else{
    echo '<div class="content mt-5">
    <div class="card">
            <div class="card-body">
            <p>You are not approved! Please try latter.</p>
            </div>
        </div>
        </div>';
}

?>