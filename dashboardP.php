<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
     body {
        background-image: url('https://source.unsplash.com/photo-of-library-with-turned-on-lights-sfL_QOnmy00');
         background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    #forem {
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.4); 
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
    }
  </style>
  </head>
  <body>
  <div class="container">
      <div class="row d-flex align-items-center justify-content-center" style="height: 100vh; width: 100%">
        <div class="col-md-6">
          <div class="card border-0 shadow rounded" id="forem">
            <strong class="p-3 text-center">Aplikasi Peminjaman Buku Perpustakaan</strong>
            <div class="alert alert-dark alert-dismissible fade show alert-berhasil d-none text-center" role="alert">
                        Kirim data berhasil! Data sudah masuk ke dalam database aplikasi Kami...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
            <form name="kirim_data" class="row justify-content-center">
            <div class="col-md-4 ms-3 mb-1">
                <label for="kelas" class="form-label">Kelas</label>
                <select class="form-control pilihan" name="kelas">
                  <option value="">Pilih Kelas</option>
                  <option value="XI RPL">XI RPL</option>
                  <option value="XI MM">XI MM</option>
                  <option value="XI TKJ 1">XI TKJ 1</option>
                  <option value="XI TKJ 2">XI TKJ 2</option>
                </select>
                <label for="jdl" class="form-label">Judul Buku</label>
                <input type="text" id="jdl" name="judul" class="form-control" placeholder="Judul Buku" />
              </div>
              <div class="col-md-4 mb-1">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Siswa" />
                <label for="kode" class="form-label">Kode/Label</label>
                <input type="text" id="kode" name="kode" class="form-control" placeholder="Kode/Label" />
              </div>
              <div class="col-md-4">
                <label for="tgl" class="form-label">Tanggal Kembali</label>
                <input type="date" id="tgl" class="form-control" name="tanggal" />
                <input type="checkbox" class="btn-check" name="status" value="Mengembalikan" autocomplete="off" checked>
              </div>
              <div class="p-3 text-center">
                      <button type="button" class="btn btn-danger float-right" onclick="logout()">Logout</button>
                      <a href="dashboard.php" class="btn btn-primary">Meminjam</a>
                        <button type="submit" class="btn btn-success btn-kirim">Kirim data</button>
                        <button class="btn btn-success btn-loading d-none" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                      </button>
                    </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- proses kirim data ke database -->
    <script>
      const scriptURL = 'https://script.google.com/macros/s/AKfycbx_AV6F6fEvEq8iz1Nqucn3NGqLH8SfbfuPAtSIEM0IERRaiwC6zHs8aPgZyXeBTrVD/exec'
      const form = document.forms['kirim_data']
      const btnLoading = document.querySelector('.btn-loading');
      const btnKirim = document.querySelector('.btn-kirim');
      const alertBerhasil = document.querySelector('.alert-berhasil');

      form.addEventListener('submit', e => {
        e.preventDefault();

        btnLoading.classList.toggle('d-none');
        btnKirim.classList.toggle('d-none');

        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
          .then(response => {
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');

            alertBerhasil.classList.toggle('d-none');
            form.reset();

            console.log('Success!', response);
          })
          .catch(error => console.error('Error!', error.message))
      });
    </script>

    <script>
        function logout() {
            console.log("Berhasil logout");
            window.location.href = "index.php";
            history.pushState(null, null, "index.php");
        }
    </script>    
  </body>
</html>