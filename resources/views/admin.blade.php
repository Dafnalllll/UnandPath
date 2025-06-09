<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <link rel="icon" href="https://img.icons8.com/ios-filled/50/000000/book.png" type="image/png" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="css/admin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <title>UnandPath | Admin</title>
</head>
<body>

 
    <!-- Tambahkan class 'expanded' agar main-content tidak terdorong -->
    <main class="main-content" id="mainContent">
      <div class="profile">👤 Admin</div>
      <section class="cards">
        <div class="card">
          <h3>Kegiatan Akademik</h3>
          <p>kegiatan</p>
        </div>
        <div class="card">
          <h3>Kegiatan Non-Akademik</h3>
          <p>kegiatan</p>
        </div>
        <div class="card">
          <h3>Mahasiswa</h3>
          <p></p>      
        </div>
      </section>
      
      <!-- Tambahan dari HTML dashboard sebelumnya -->
      <section class="activity-table">
        <h2>Daftar Kegiatan Mahasiswa</h2>
        <table>
          <thead>
            <tr>
              <th>Nama</th>
              <th>Jenis Kegiatan</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Verifikasi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="activity-list">
            <!-- Baris akan diisi oleh JavaScript -->
          </tbody>
        </table>
        <button class="add-button">Tambah Data</button>
      </section>

    </main>
  </div>

  <script src="js/admin.js"></script>
</body>
</html>
