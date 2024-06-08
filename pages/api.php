<?php 
include '../auth/connection.php';
$sql = $conn->query("SELECT s.*, u.first_name AS instructor_name, c.course_name AS course_name, d.dept_name AS department_name
FROM schedule s
INNER JOIN users u ON s.instructor_id = u.id
INNER JOIN courses c ON s.course_id = c.id
INNER JOIN department d ON s.department_id = d.id  WHERE d.dept_name='$departmentName' ");
$res =array();
while($row = $sql->fetch_assoc()){
        $res[]=$row;
}
echo json_encode($res);
?> 