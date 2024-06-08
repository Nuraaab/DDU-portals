<?php
include '../auth/connection.php';
if (isset($_FILES['material_file'])) {
    $file = $_FILES['material_file']; 
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpPath = $file['tmp_name'];
    $title = $_POST['title'];
    $department = $_POST['department'];
    $fileContent = file_get_contents($fileTmpPath);
    $stmt = $conn->prepare("INSERT INTO course_material (cource_title, department, file_name, file_type, file_content) VALUES (?, ?, ?, ?, ?)"); 
    $stmt->bind_param("sssss", $title, $department, $fileName, $fileType, $fileContent); 
    $stmt->execute();
    $stmt->close();

    echo "File uploaded successfully.";
} else {
    echo "No file uploaded.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Course Material</title>
</head>
<body>
    <h2>Upload Course Material</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br><br>
        <label for="title">Department:</label>
        <input type="text" name="department" required><br><br>
        <label for="material_file">File:</label>
        <input type="file" name="material_file" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>