<?php require 'function/koneksi.php';

// PAKET
$sql = "SELECT * FROM paket";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Alam | Arung Jeram Sungai Asahan</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <!-- mycss -->
    <link rel="stylesheet" href="dist/css/style.css">
</head>

<body>
    <!-- nav -->
    <?php include 'element/navbar.php'; ?>
    <!-- end nav -->

    <!-- jumbotron -->
    <div class="jumbo text-center text-bg-dark">
        <div class="container">
            <h1 class="display-4 text-warning">Arung Jeram Sungai Asahan</h1>
            <p class="lead">Selamat Datang di Wisata Alam <span class="fw-bold">Arung Jeram Sungai Asahan</span>.</p>
            <p>Berpusat di Kecamatan Bandar Pulau di Kabupaten Asahan, Provinsi Sumatera Utara dengan aliran 22 Kilometer dari aliran adrenalin yang tak berujung.</p>
            <div class="row">
                <form action="" class="col-lg-6 mx-auto pt-2 d-flex gap-2">
                    <input type="search" class="form-control" id="search" placeholder="Cari paket wisata..." aria-describedby="search">
                    <button class="btn btn-warning" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->

    <!-- tentang -->
    <div class="container my-5" id="tentang">
        <div class="row d-flex align-items-center gap-5">
            <div class="col-lg-5">
                <img src="dist/images/tentang.jpg" alt="Tentang" class="img-fluid object-fit-cover rounded-5 shadow-lg">
            </div>
            <div class="col-lg-6">
                <h1>Mengenal Wisata Alam <span class="text-primary">Arung Jeram Sungai Asahan</span> Lebih Dekat</h1>
                <p class="lead">Arung Jeram Sungai Asahan berada di Kecamatan Bandar Pulau, Kabupaten Asahan, Sumatera Utara. Arung jeram ini disebut-sebut menjadi arung jeram terbaik dan terekstrim ketiga di dunia.</p>
                <p>Mengalir dari Danau Toba, melewati Bendungan Sigura-gura hingga lembah-lembah pegunungan Bukit Barisan, Sungai Asahan menjadi sungai yang besar di Sumatera Utara denga segala keindahan alamnya. Dengan kedalaman rata-rata 5 meter, , karakteristik sungai yang canggih dan derasnya arus telah membentuk perjalanan yang memiliki tingkat kesulitan kelas 4-5 (dalam skala 1 sampai 6).</p>
                <p>Arung jeram Sungai Asahan merupakan aliran 22 Kilometer dari aliran adrenalin yang tak berujung, dimulai tepat di depan bendungan Sigura-gura di Tangga desa dan berakhir di kota Bandar Pulau yang muara sungai. Arung jeram Sungai Asahan juga disebut-sebut sebagai arung jeram terbaik <span class="text-primary">ke-3 di dunia</span>, setingkat di bawah Zambesi di Afrika dan Sungai Colorado di Amerika Serikat.</p>
            </div>
        </div>
    </div>
    <!-- end tentang -->

    <!-- paket -->

    <div class="container my-5" id="paket">
        <h1>Paket Wisata <span class="text-primary">Arung Jeram Sungai Asahan</span></h1>
        <div class="row pt-3 d-flex flex-wrap justify-content-center mx-auto">
            <div class="col-12 col-md-8">
                <div class="row">
                    <?php
                    while ($paket = mysqli_fetch_assoc($result)) :
                    ?>
                        <div class="col-md-5 mt-3">
                            <a href="form-pemesanan.php?paket=<?= $paket['nama_paket'] ?>" class="link-offset-2 link-underline link-underline-opacity-0">
                                <div class="card bg-body-secondary shadow-lg" style="width: 18rem;">
                                    <img src="dist/images/<?= $paket['image'] ?>" height="200" class="card-img-top" alt="<?= $paket['image'] ?>">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold text-primary text-capitalize">Paket <?= $paket['nama_paket'] ?></h5>
                                        <p class="card-text text-dark"><?= $paket['deskripsi'] ?></p>
                                        <p class="fw-bold text-dark">Harga : Rp <?= number_format($paket['harga_paket'], 0, ',', '.') ?></p>
                                        <a href="form-pemesanan.php?paket=<?= $paket['nama_paket'] ?>" class="btn btn-primary">Pilih Paket</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-12 col-md-4 mx-auto mt-3">
                <div>
                    <iframe width="350" height="200" class="rounded-3 shadow-sm" src="https://www.youtube.com/embed/5vwz10-NcN4?si=zfnKIFXgNM5R2dN9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div>
                    <iframe width="350" height="200" class="rounded-3 shadow-sm" src="https://www.youtube.com/embed/l01s-LpUyqw?si=VcyK3b1ub2uILbgu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- end paket -->

    <!-- lokasi -->
    <div class="container my-5" id="lokasi">
        <h1 class="text-center text-secondary">Lokasi Wisata</h1>

        <div class="row mt-3">
            <div class="col-md-7 mx-auto">
                <iframe class="mx-auto w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.833055886697!2d99.34161717434866!3d2.5610956564872804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3032051804598f75%3A0x7dac4cddcc7f86ac!2sArung%20Jeram%20Sungai%20Asahan%20(Asahan%20River%20Rafting)!5e0!3m2!1sid!2sid!4v1722057369789!5m2!1sid!2sid" width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-5 mt-5">
                <p class="lead">Jalan Lintas Sigura - Gura, Parhitean Meranti Utara, Pintu Pohan hingga Bandar Pulau Kab. Asahan Sumatera Utara</p>
            </div>
        </div>
    </div>
    <!-- lokasi -->

    <?php include 'element/footer.php'; ?>

    <script src="dist/js/bootstrap.js"></script>
</body>

</html>