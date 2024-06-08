<?php
include '../auth/connection.php';
$fileId = $_GET['file_id'];

// Fetch file data from the database based on file ID
$stmt = $conn->prepare("SELECT file_name, file_type, file_content FROM course_material WHERE id = ?");
$stmt->bind_param("i", $fileId); // Assuming the file ID is an integer
$stmt->execute();
$stmt->store_result();

// Check if a row was fetched
if ($stmt->num_rows == 1) {
  $stmt->bind_result($fileName, $fileType, $fileContent);
  $stmt->fetch();
  
  // Set appropriate headers
  header('Content-Type: ' . $fileType);
  header('Content-Disposition: attachment; filename="' . $fileName . '"');
  
  // Output the file content
  echo $fileContent;
  exit;
} else {
  echo "File not found.";
}
?>