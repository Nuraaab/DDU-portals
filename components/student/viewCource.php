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
$result = mysqli_query($conn, "SELECT * FROM courses");
if (mysqli_num_rows($result) > 0) {
    echo' <div class="content">';
    echo' <div class="card">';
    echo' <div class="card-header">
    <h5>Course List</h5>
     </div>
    <table class="table datatable-button-html5-columns">
            <thead>
                <tr>
                    <th >#</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Duration</th>
                    <th>Pre- Request</th>
                    <th>Credit</th>
                </tr>
            </thead>
            <tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <th>' . $row['id'] . '</th>
                <td>' . $row['course_code'] . '</td>
                <td>' . $row['course_name'] . '</td>
                <td>' . $row['duration'] . '</td>
                <td>' . $row['prerequisites'] . '</td>
                <td>' . $row['credits'] . '</td>
              </tr>';
    }
    echo '</tbody>
          </table> 
          </div>
          </div>';
} else {
    echo '<div class="content mt-5">';
    echo '<div class="card">
            <div class="card-body">
            <p>No results found</p>
            </div>
        </div>
        </div>';
}
mysqli_close($conn);
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
