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
$departmentName = $_SESSION['department'];
$query = "SELECT s.*, u.first_name AS instructor_name, c.course_name AS course_name, d.dept_name AS department_name
          FROM schedule s
          INNER JOIN users u ON s.instructor_id = u.id
          INNER JOIN courses c ON s.course_id = c.id
          INNER JOIN department d ON s.department_id = d.id
          WHERE d.dept_name = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $departmentName);
$stmt->execute();
$result = $stmt->get_result();
$schedule = [];
while ($row = $result->fetch_assoc()) {
    $schedule[] = $row;
}
usort($schedule, function($a, $b) {
    return strtotime($a['start_time']) - strtotime($b['start_time']);
});
$scheduleByDay = [];
foreach ($schedule as $item) {
    $scheduleByDay[$item['day']][] = $item;
}

 echo'<div class="content">
    <div class="card">
    <div class="card-header">
    <h5>Schedule for '.$departmentName.'</h5>
     </div>
    <table class="table datatable-button-html5-columns">
    <thead>
        <tr>
            <th>Day</th>
            <th>Time</th>
            <th>Instructor</th>
            <th>Course</th>
        </tr>
    </thead>
    <tbody>';
     foreach ($scheduleByDay as $day => $items){
                echo'<tr>
                <td rowspan="'.count($items).'">'. $day .'</td>';
                foreach ($items as $index => $item){
                   if ($index > 0){
                   echo' <tr>';
                   } 
                   echo' <td>'. $item['start_time'] .' - '. $item['end_time'] .'</td>
                    <td>'. $item['instructor_name'].'</td>
                    <td>'. $item['course_name'].'</td>';
                    if ($index > 0){
                        echo'</tr>';
                    }
                }
             echo' </tr>';
     } 
   echo' </tbody>
</table>
</div> 
</div>';
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