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
$stmt = $conn->prepare("SELECT id, file_name, file_type FROM course_material");
$stmt->execute();
$result = $stmt->get_result();
$files = $result->fetch_all(MYSQLI_ASSOC);

echo'<div class="content">
   <div class="card">
   <div class="card-header">
    <h5>Download Materials</h5>
     </div>
<body>
    <table class = "table table-bordered">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';
           ;foreach ($files as $file) {
               echo' <tr>
                    <td>'.$file['file_name'].'</td>
                    <td><a href="../../components/download.php?file_id= '. $file['id'].'">Download</a></td>
                </tr>';
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