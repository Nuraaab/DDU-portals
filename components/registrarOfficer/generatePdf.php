<?php
include '../../fpdf/fpdf.php';
include '../../auth/connection.php';
$pdf = new FPDF('p', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(71,10,'',0,0);
$pdf->Cell(71,10,'Slip Report',0,0);
$pdf->Cell(59,10,'',0,1);

if(isset($_POST['submit'])){
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(30,10,'Student Name:',0,0);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(35, 10, $_POST["name"], 0, 0);
    $pdf->Cell(59,10,'',0,1);

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(30,10,'Department:',0,0);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(35, 10, $_POST["department"], 0, 0);
    $pdf->Cell(59,10,'',0,1);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(40, 10, 'Course Code', 1, 0, 'C');
    $pdf->Cell(70, 10, 'Course Name', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Credit Point', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Credit Hour', 1, 1, 'C');
    
    $department = $_POST['department'];
    $sql = "SELECT c.*, d.dept_name AS department_name
        FROM courses c
        INNER JOIN department d ON c.department_id = d.id
        WHERE d.dept_name = '$department'";
    $result = mysqli_query($conn, $sql); 
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(40, 10, $row['course_code'], 1, 0, 'C');
        $pdf->Cell(70, 10, $row['course_name'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['credits'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['duration'], 1, 1, 'C');
    }
    $pdf->Output('course_list.pdf', 'I');
}



$pdf->output();
?>