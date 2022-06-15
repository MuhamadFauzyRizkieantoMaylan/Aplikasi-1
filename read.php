<?php
session_start();
if (isset($_SESSION['btnlogin'])) {

    include "php/read.php";
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <title>Read Page</title>
    </head>

    <body>
        <div class="container-fluid">
            <div class="box w-100"><br>
                
                <img src="gambar/zenilogin.png" alt="Logo_Pusdikzi" style="display:block; margin:auto"/>
        
                <h4 class="display-4 text-center">Data Siswa/i PSG di Pusat Pendidikan Zeni</h4>
                <hr><br>

                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['success']; ?>
                    </div>

                <?php } ?>
                <?php if (mysqli_num_rows($result)) { ?>
                    <div class="table-wrapper">
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Pembimbing</th>
                                    <th scope="col">Sekolah</th>
                                    <th scope="col">Staff</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Tanggal Keluar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $rows['name'] ?></td>
                                        <td><?php echo $rows['email']; ?></td>
                                        <td><?php echo $rows['pembimbing']; ?></td>
                                        <td><?php echo $rows['sekolah']; ?></td>
                                        <td><?php echo $rows['staff']; ?></td>
                                        <td><?php echo $rows['tgl_masuk']; ?></td>
                                        <td><?php echo $rows['tgl_keluar']; ?></td>
                                        <td>
                                            <a href="update.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a><br>

                                            <a href="php/delete.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <script>
                                $(document).ready(function() {
                                    $('#example').DataTable();
                                });
                            </script>
                        </table>
                    </div><br>
                <?php } ?>
                <div class="link-left">
                    <a href="index.php" class="btn btn-primary" >Create</a>&ensp;
                    <a href="logout.php" class="btn btn-warning" >
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </body>

    </html>


<?php } else {
    header("location: login.php");
    exit;
} ?>