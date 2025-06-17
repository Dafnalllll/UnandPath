<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="https://img.icons8.com/ios-filled/50/000000/book.png" type="image/png" />
    <title>Unand Path | Tambah Kegiatan</title>
    <link rel="stylesheet" href="css/data.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <!-- Tombol Toggle Sidebar -->
  <button class="toggle-btn" id="toggleSidebarBtn">
    <i class="fas fa-bars"></i>
  </button>

  <div class="dashboard">
    <aside class="sidebar closed" id="sidebar">
      <h2>UnandPath</h2>
      <ul>
        <li><a href="/dashboard"><i class="fas fa-graduation-cap"></i> Dashboard</a></li>
        <li><a href="/laporanskpi"><i class="fas fa-file-alt"></i> Laporan SKPI</a></li>
        <li><a href="/persetujuanadmin"><i class="fas fa-user-check"></i> Persetujuan</a></li>
        <li>
          <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="logout-button">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </form>
        </li>
      </ul>
    </aside>

    <main class="main-content expanded" id="mainContent">
      <div class="profile">👤 {{ Auth::user()->name ?? 'Mahasiswa' }}</div>
      <section class="upload-section">
        <form action="{{ route('activities.store') }}" method="POST">
          @csrf
      
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <input type="hidden" name="category_id" value="{{ request()->get('category', 1) }}">

      
          <div class="form-group">
              <label for="title">Judul Kegiatan</label>
              <input type="text" id="title" name="title" required>
          </div>
      
          <div class="form-group">
              <label for="description">Deskripsi</label>
              <textarea id="description" name="description" required></textarea>
          </div>
      
          <div class="form-group">
              <label for="date">Tanggal</label>
              <input type="date" id="date" name="date" required>
          </div>
      
          <button type="submit">Simpan</button>
      </form>
      </section>
    </main>
  </div>

  <script src="js/tambahkegiatan.js"></script>
</body>
</html>
