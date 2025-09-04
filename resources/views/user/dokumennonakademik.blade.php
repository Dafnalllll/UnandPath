<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/nonakademik.css') }}" />
  <title>UnandPath || Dokumen Non Akademik</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
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
        <h2>Upload Sertifikat</h2>
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="drop-area" onclick="document.getElementById('fileElemSertif').click()">
            <p>Tarik file Sertifikat ke sini atau klik untuk memilih</p>
            <input type="file" name="file" id="fileElemSertif" hidden />
            <label for="fileElemSertif" class="upload-btn">Pilih Sertifikat</label>
            <div id="linkSertif"></div>
            <div class="success-msg" id="successMsg">File berhasil diupload!</div>
          </div>

          <input type="hidden" name="category_id" value="{{ $categories->where('name', 'non-akademik')->first()->id ?? '' }}">

          <button type="submit" class="upload-btn" style="margin-top: 15px;">Upload</button>
        </form>
      </section>
    </main>
  </div>

  <script src="{{ asset('js/upload.js') }}"></script>
</body>
</html>
