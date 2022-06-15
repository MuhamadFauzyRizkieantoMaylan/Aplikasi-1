<?php 
    session_start();

    if (isset($_SESSION['btnlogin'])){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Create Page</title>
</head>

<body>
    <div class="container">
    <form action="php/create.php"            
          method="post">
        <img src="gambar/zenilogin.png" alt="Logo_Pusdikzi" style="display:block; margin:auto"/>
        <h4 class="display-4 text-center">Buat Data </h4><hr><br>
        <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error']; ?>
        </div>
        <?php } ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="name"
                   class="form-control"
                   id="name" 
                   name="name" 
                   value="<?php if(isset($_GET['name']))
                                   echo $_GET['name']; ?>" 
                   placeholder="enter name" >
        </div>
        <div class="mb-3">
            <label for="email" 
                   class="form-label">Email</label>
            <input type="email"
                   class="form-control"
                   id="email" 
                   name="email" 
                   value="<?php if(isset($_GET['email']))
                                   echo $_GET['email']; ?>" 
                   placeholder="enter email" >
        </div>
        <div class="mb-3">
            <label for="pembimbing" 
                   class="form-label">Pembimbing</label>
            <input type="pembimbing"
                   class="form-control"
                   id="pembimbing" 
                   name="pembimbing" 
                   value="<?php if(isset($_GET['pembimbing']))
                                   echo $_GET['pembimbing']; ?>" 
                   placeholder="enter pembimbing" >
        </div>
        <div class="mb-3">
            <label for="sekolah" 
                   class="form-label">Sekolah</label>
            <input type="sekolah"
                   class="form-control"
                   id="sekolah" 
                   name="sekolah" 
                   value="<?php if(isset($_GET['sekolah']))
                                   echo $_GET['sekolah']; ?>" 
                   placeholder="enter sekolah" >
        </div>
        <div class="mb-3">
            <label for="staff" 
                   class="form-label">Staff</label>
            <input type="staff"
                   class="form-control"
                   id="staff" 
                   name="staff" 
                   value="<?php if(isset($_GET['staff']))
                                   echo $_GET['staff']; ?>" 
                   placeholder="enter Staff" >

        </div>
        <div class="mb-3">
            <label for="tgl_masuk" 
                   class="form-label">Tanggal Masuk</label>
            <input type="date"
                   class="form-control"
                   id="tgl_masuk" 
                   name="tgl_masuk" 
                   value="<?php if(isset($_GET['tgl_masuk']))
                                   echo $_GET['tgl_masuk']; ?>" 
                   placeholder="enter Tanggal Masuk" >
        </div>
        <div class="mb-3">
            <label for="tgl_keluar" 
                   class="form-label">Tanggal Keluar</label>
            <input type="date"
                   class="form-control"
                   id="tgl_keluar" 
                   name="tgl_keluar" 
                   value="<?php if(isset($_GET['tgl_keluar']))
                                   echo $_GET['tgl_keluar']; ?>" 
                   placeholder="enter Tanggal Keluar" >
        </div>
        
        <button type="submit"
                class="btn btn-primary"
                name="create">Create</button>
        
          <a href="read.php" class="btn btn-info">View</a>

        <a href="logout.php" class="btn btn-warning">
            	Logout
            </a>
        
    </form>
    </div>
</body>
</html>

<?php }else {
	header("location: login.php");
	exit;
} ?>