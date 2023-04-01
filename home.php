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
    <!-- Favicons -->
    <link href="src/icon/logo.png" rel="icon">
    <link href="src/icon/logo.png" rel="apple-touch-icon">
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
    <div class="container mt-3" id="tabel">
        <div class="container d-flex justify-content-center">
            <h5>PROJECT MONITORING</h5>
        </div>
        <div class="container bg-white rounded p-3">
            <form class="form-inline" action="home.php" method="get">
                <div class="form-group mb-2">
                    <label for="Pencarian">Searching :</label>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" placeholder="Masukkkan kata yang diinginkan" name="cari" id="cari" value="<?php if (isset($_GET['cari'])) {
                                                                                                                                            echo $_GET['cari'];
                                                                                                                                        } ?>">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>PROJECT NAME</th>
                        <th>CLIENT</th>
                        <th>PROJECT LEADER</th>
                        <th>START DATE</th>
                        <th>END DATE</th>
                        <th>PROGRESS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $batas = 10;
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                    $previous = $halaman - 1;
                    $next = $halaman + 1;

                    $data = mysqli_query($koneksi, "select * from project_monitoring");
                    $jumlah_data = mysqli_num_rows($data);
                    $total_halaman = ceil($jumlah_data / $batas);

                    if (isset($_GET['cari'])) {
                        $cari = $_GET['cari'];
                        $project = mysqli_query($koneksi, "select * from project_monitoring where project_name like '%" . $cari . "%' or client like '%" . $cari . "%' or project_leader_name like '%" . $cari . "%' or project_leader_email like '%" . $cari . "%' or start_date like '%" . $cari . "%' or progress like '%" . $cari . "%' limit $halaman_awal, $batas");
                    } else {
                        $project = mysqli_query($koneksi, "select * from project_monitoring limit $halaman_awal, $batas");
                    }
                    $nomor = $halaman_awal + 1;
                    while ($hslkeg = mysqli_fetch_array($project)) { ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $hslkeg['project_name'] ?></td>
                            <td><?= $hslkeg['client'] ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <img src="src/images/<?= $hslkeg['project_leader_image']; ?>" class="rounded-circle" alt="Learder Images" width="50" height="50">
                                    </div>
                                    <div class="col-sm-5">
                                        <?= $hslkeg['project_leader_name'] ?><br>
                                        <?= $hslkeg['project_leader_email'] ?>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php
                                $start_date = date('d M Y', strtotime($hslkeg['start_date']));
                                echo $start_date;
                                ?>
                            </td>
                            <td>
                                <?php
                                $end_date = date('d M Y', strtotime($hslkeg['end_date']));
                                echo $end_date;
                                ?>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <?php
                                        if ($hslkeg['progress'] == 100) { ?>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: <?= $hslkeg['progress'] ?>%" aria-valuenow="<?= $hslkeg['progress'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: <?= $hslkeg['progress'] ?>%" aria-valuenow="<?= $hslkeg['progress'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <p><?= $hslkeg['progress'] ?>%</p>
                                    </div>
                                </div>


                            </td>
                            <td>
                                <a href="./config/delete.php?id=<?= $hslkeg['id_project'] ?>" class="btn bg-danger text-white btn-sm"><i class="bi bi-trash-fill"></i></a>
                                <a href="form_edit.php?id=<?= $hslkeg['id_project'] ?>" class="btn bg-success text-white btn-sm"><i class="bi bi-pencil-fill"></i></a>
                            </td>
                        </tr>

                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" <?php if ($halaman > 1) {
                                                    echo "href='?halaman=$previous'";
                                                } ?>>Previous</a>
                    </li>
                    <?php
                    for ($x = 1; $x <= $total_halaman; $x++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                    echo "href='?halaman=$next'";
                                                } ?>>Next</a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    <br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>