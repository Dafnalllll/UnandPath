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

<main class="main-content" id="mainContent">
  <div class="profile">👤 Admin</div>
  <form action="{{ route('logout') }}" method="POST" style="display:inline;">
    @csrf
    <button type="submit" class="logout-button">
      <i class="fas fa-sign-out-alt"></i> Logout
    </button>
  </form>

  <section class="cards">
    <div class="card">
      <h3>Kegiatan Akademik</h3>
      <p>{{ $activities->where('category.id', 'akademik')->count() }} </p>
    </div>
    <div class="card">
      <h3>Kegiatan Non-Akademik</h3>
      <p>{{ $activities->where('category.id', 'nonakademik')->count() }} </p>
    </div>
    <div class="card">
      <h3>Mahasiswa</h3>
      <p>{{ $jumlahMahasiswa }}</p>
    </div>
  </section>

  <section class="activity-table">
    <h2>Daftar Kegiatan Mahasiswa</h2>
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Jenis Kegiatan</th>
          <th>Judul</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($activities as $activity)
          <tr>
            <td>{{ $activity->user->name ?? '-' }}</td>
            <td>{{ $activity->category->name ?? '-' }}</td>
            <td>{{ $activity->title }}</td>
            <td>{{ \Carbon\Carbon::parse($activity->date)->format('d-m-Y') }}</td>
            <td>{{ ucfirst($activity->status) }}</td>
            <td>
              <form action="{{ route('activities.update', $activity->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit" name="status" value="disetujui" class="action-btn">✅</button>
                <button type="submit" name="status" value="ditolak" class="action-btn">❌</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </section>
</main>

<script src="js/admin.js"></script>
</body>
</html>
