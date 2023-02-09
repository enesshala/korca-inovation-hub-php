<?php 
include "inc/head.php";
$query = $conn->prepare("SELECT * FROM users WHERE user_status = 1");
$query->execute(); 
$users = $query->fetchAll();


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
          <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Admin Tables</h1>
    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Profiel Pic</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Profiel Pic</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($users as $user): ?>
                                        <tr>
                                            <td><?php echo $user['user_id'] ?></td>
                                            <td><?php echo $user['username'] ?></td>
                                            <td><?php echo $user['user_name'] ?></td>
                                            <td><?php echo $user['user_surname'] ?></td>
                                            <td><?php echo $user['user_email'] ?></td>
                                            <td><img width="50px" class="rounded-circle border border-4 border-primary " title="<?php echo $user['username'] ?>" src="uploads/<?php echo $user['user_pic'] ?>" alt="<?php echo $user['username'] ?>"></td>
                                            <td><?php echo $user['user_status'] ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-circle" href="edit_user.php?id=<?php echo $user['user_id'] ?>"><i class="fa-solid fa-user-pen"></i></a>
                                                <a class="btn btn-danger btn-circle" href="delete_user.php?id=<?php echo $user['user_id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
          
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
      <?php include "inc/footer.php" ?>