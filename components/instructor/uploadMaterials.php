<?php
include '../../auth/connection.php';
$message ="";
if (isset($_FILES['material_file'])) {
    $file = $_FILES['material_file']; 
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTmpPath = $file['tmp_name'];
    $title = $_POST['title'];
    $material_type = $_POST['material_type'];
    $fileContent = file_get_contents($fileTmpPath);
    $stmt = $conn->prepare("INSERT INTO course_material (cource_title, material_type, file_name, file_type, file_content) VALUES (?, ?, ?, ?, ?)"); 
    $stmt->bind_param("sssss", $title, $material_type, $fileName, $fileType, $fileContent); 
    if($stmt->execute()){
        $message = "File uploaded successfully.";
    }else{
        $message = "No file uploaded.";
    }
    $stmt->close();
}
?>
<div class="content-wrapper">
    <div class="content-inner">
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
                <div class="d-flex">
                    <div class="breadcrumb mt-2">
                        <a href="" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <span class="breadcrumb-item active">Add Material</span>
                    </div>
                    <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
                </div>

            </div>
        </div>
        <div class="container p-2">
            <div class="row justify-content-center m-3 mt-2">
                <div class="col-12">
             
                <div class="card">
                    <div class="card-header">
                            <h3>Add Material</h3>
                            <h6><?php echo $message; ?></h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-sm-12 form-group-floating mb-3">
                                        <div class="position-relative mb-10">
                                            <input type="text" class="form-control form-control-outline" placeholder="Material Title" required
                                            name="title">
                                            <label class="label-floating">Enter Material Title</label>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-12 form-group-floating mb-3">
                                        <div class="position-relative mb-10">
                                            <input type="text" class="form-control form-control-outline" placeholder="Material Type" required
                                            name="material_type">
                                            <label class="label-floating">Enter Material Type</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 form-group-floating mb-3">
                                        <div class="position-relative mb-10">
                                            <input type="file" class="form-control form-control-outline" placeholder="Upload" required
                                            name="material_file">
                                            <label class="label-floating">Upload</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-10 mt-10 ml-30">
                                        <div class="row justify-content-center">
                                            <input type="submit" value="Upload"
                                                    class="btn btn-dark btn-theme-colored"
                                                    data-loading-text="Please wait..." />
                                        </div>
                                       

                                    </div>

                                </div>
                        </form>

                    </div>
                </div>
            </div>   
</div>