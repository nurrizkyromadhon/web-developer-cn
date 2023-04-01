<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Nur Rizky Romadhon</title>
</head>

<body style="background-color: #B9E9FC;">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <img src="src/icon/logo.png" alt="..." height="36">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah Data</a>
                    </li>
                </ul>
                <span class="navbar-text mx-4">
                    TES INTERNSHIP CAREEER NETWORK DIVISI WEB DEVELOPER
                </span>
                <span class="navbar-text">
                    <a href="config/logout.php" class="btn bg-danger text-white btn-sm"><i class="bi bi-box-arrow-in-right"></i> Logout</a>
                </span>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-3" id="form">
        <h2>Edit Project Monitoring</h2>
        <?php
        $id_project = $_GET['id'];
        $no = 1;
        $project = mysqli_query($koneksi, "SELECT * FROM project_monitoring where id_project='$id_project'");
        $hslqry = mysqli_fetch_array($project);
        ?>
        <form action="config/edit.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?= $hslqry['id_project']; ?>" name="id_project">
            <div class="form-group">
                <label for="pn">Project Name :</label>
                <input type="text" class="form-control" id="project_name" placeholder="Masukkan Project Name" name="project_name" value="<?= $hslqry['project_name']; ?>" required>
            </div><br>
            <div class="form-group">
                <label for="client">Client :</label>
                <input type="text" class="form-control" id="client" placeholder="Masukkan Nama Client" name="client" value="<?= $hslqry['client']; ?>" required>
            </div><br>
            <div class="form-group">
                <label for="pln">Project Leader Name :</label>
                <input type="text" class="form-control" id="project_leader_name" placeholder="Masukkan Project Leader Name" name="project_leader_name" value="<?= $hslqry['project_leader_name']; ?>" required>
            </div><br>
            <div class="form-group">
                <label for="email">Project Leader Email :</label>
                <input type="email" class="form-control" id="project_leader_email" placeholder="Masukkan Project Leader Email" name="project_leader_email" value="<?= $hslqry['project_leader_email']; ?>" required>
            </div><br>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input class="form-control" type="file" name="uploadfile" value="<?= $hslqry['project_leader_image']; ?>" />
            </div><br>
            <div class="form-group">
                <label for="start">Start Date :</label>
                <input type="date" class="form-control" id="start_date" placeholder="Masukkan Nama Client" name="start_date" value="<?= $hslqry['start_date']; ?>" required>
            </div><br>
            <div class="form-group">
                <label for="end">End Date :</label>
                <input type="date" class="form-control" id="end_date" placeholder="Masukkan Nama Client" name="end_date" value="<?= $hslqry['end_date']; ?>" required>
            </div><br>
            <div class="form-group">
                <label for="progress">Progress :</label>
                <select class="form-control" id="progress" name="progress">
                    <option><?= $hslqry['progress']; ?></option>
                    <?php
                    for ($i = 1; $i <= 100; $i++) {  ?>
                        <option><?= $i ?></option>
                    <?php }
                    ?>
                </select>
            </div><br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>