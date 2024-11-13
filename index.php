<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Kepuasan PST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid bg-dark text-white">
      <div class="container">
        <h5 class="italic font-arial uppercase" data-asw-orgfontsize="20" style="font-size: 20px;">BADAN PUSAT STATISTIK</h5>
        <h5 class="italic font-arial uppercase" data-asw-orgfontsize="20" style="font-size: 20px;">DAERAH ISTIMEWA YOGYAKARTA</h5>
        <p class="lead">
          <h2 class="text-center">
          Pelayanan Statistik Terpadu (PST) <br> Survey Kepuasan Pengunjung
          </h2>
        </p>
      </div>
    </div>

    <!---Awal Kontainer-->
    <div class="container">
      <div class="alert alert-primary" role="alert">
        Perhatian, klik ikon untuk memberikan penilaian!
      </div>

      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col d-flex justify-content-center">
            <a href="simpan.php?ket=puas">
              <img src="img/emot hijau.png" class="img-fluid" style="width: 200px">
            </a>
          </div>
          <div class="col d-flex justify-content-center">
          <a href="simpan.php?ket=ragu-ragu">
              <img src="img/emot kuning.png" class="img-fluid" style="width: 200px">
            </a>
          </div>
          <div class="col d-flex justify-content-center">
          <a href="simpan.php?ket=tidak puas">
              <img src="img/emot merah.png" class="img-fluid"style="width: 200px">
            </a>
          </div>
        </div>
      </div>
    </div>
    <!---Awal Kontainer-->
    <div class="container mt-4">
      <h4 class="text-center">Kritik dan Saran</h4>
      <form action="simpan.php" method="post">
        <div class="mb-3">
          <textarea class="form-control" id="saran" name="saran" rows="4" placeholder="Tulis saran Anda di sini..."></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Kirim Saran</button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>