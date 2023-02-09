<?php include "inc/head.php"; 

$userId = $_GET['id'];

$query = $conn->prepare("SELECT * FROM users WHERE user_id = :id");
$query->bindParam('id', $userId);
$query->execute(); 
$user = $query->fetch();

?>
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <?php include "inc/sidebar.php"; ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <?php include "inc/topbar.php"; ?>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container card text-center p-4">
            <h1 class>Edit User</h1>
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <img src="uploads/<?php echo $user['user_pic']; ?>" width="250px" alt="">
                <input type="hidden"  name="id" value="<?php echo $user['user_id']; ?>">
                <input type="file"  name="fileToUpload" id="fileToUpload">
                <input type="submit" name="submit" value="change profile pictuer">
            </form>
            <form method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $user['username'] ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $user['user_name'] ?>"> 
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Surname" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $user['user_surname'] ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $user['user_email'] ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Status" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $user['user_status'] ?>">
                </div>
                <input type="submit" name="submit_editUser" value="Edit" class="btn btn-primary">
                <a href="admins.php" name="submit_editUser" value="Edit" class="btn btn-danger">Cancel</a>
            </form>
          </div>
          
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
      <?php include "inc/footer.php" ?>
