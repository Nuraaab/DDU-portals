<?php
include '../../auth/connection.php';
$distinct_years_semesters_query = "SELECT DISTINCT academic_year, semester, student_id FROM student_result WHERE student_id = '" . $_SESSION['id'] . "' ORDER BY academic_year, semester";
$distinct_years_semesters_result = mysqli_query($conn, $distinct_years_semesters_query);
while ($year_semester_row = mysqli_fetch_assoc($distinct_years_semesters_result)) {
    $academic_year = $year_semester_row['academic_year'];
    $semester = $year_semester_row['semester'];
    $id = $year_semester_row['student_id'];
    $result_query = "SELECT * FROM student_result WHERE student_id = '" . $_SESSION['id'] . "' AND academic_year = '$academic_year' AND semester = '$semester'";
    $result_result = mysqli_query($conn, $result_query);
    if (mysqli_num_rows($result_result) > 0) {
        
        $total_credit_points = 0;
        $total_result = 0;
        $grade = "";
        $numberGrade = "";
        while ($row = mysqli_fetch_assoc($result_result)) {
            echo '<div class="col-lg-7">';
            echo '<table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">' .$row['id']. '</th>
                        <th scope="col">Year ' .$academic_year . ' Semester ' . $semester . ' Result</th>
                        <th colspan="3">download Slip</th>
                        
                    </tr>
                </thead>
                <tbody>';
            if($row['result'] <= 100 && $row['result'] >= 90){
                $grade = "A+";
                $numberGrade = "4.0";
            }else if($row['result'] < 90 && $row['result'] >= 85){
                $grade = "A";
                $numberGrade = "4.0";
            }else if($row['result'] < 85 && $row['result'] >= 80){
                $grade = "A-";
                $numberGrade = "3.75";
            }else if($row['result'] < 80 && $row['result'] >= 75){
                $grade = "B+";
                $numberGrade = "3.5";
            }else if($row['result'] < 75 && $row['result'] >= 70){
                $grade = "B";
                $numberGrade = "3.0";
            }else if($row['result'] < 70 && $row['result'] >= 65){
                $grade = "B-";
                $numberGrade = "2.75";
            }else if($row['result'] < 65 && $row['result'] >= 60){
                $grade = "C+";
                $numberGrade = "2.5";
            }else if($row['result'] < 60 && $row['result'] >= 55){
                $grade = "C";
                $numberGrade = "2.0";
            }else if($row['result'] < 55 && $row['result'] >= 50){
                $grade = "C-";
                $numberGrade = "1.75";
            }else if($row['result'] < 50 && $row['result'] >= 45){
                $grade = "D";
                $numberGrade = "1.0";
            }else {
                $grade = "0.0";
            }
            $total_credit_points += $row['credit_point'];
            $total_result += $row['credit_point'] * $numberGrade;
          
        }
        $cumulative_grade = $total_result / $total_credit_points;
        echo '</tbody>
              </table>';
        echo '</div>';
    } else {
        echo '<div class="col-lg-7"><p>No results found for Academic Year: ' . $academic_year . ' Semester: ' . $semester . '</p></div>';
    }
}

mysqli_close($conn);
?>