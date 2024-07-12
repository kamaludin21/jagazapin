<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Pengaduan</title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
    }

    h1,
    h2 {
      text-align: center;
    }

    p {
      margin: 0 0 10px;
    }

    .section {
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <h1>Laporan Pengaduan</h1>
  <div class="section">
    <h2>Detail Pengaduan</h2>
    <p><strong>Token:</strong> {{ $complaint->token }}</p>
    <p><strong>Judul:</strong> {{ $complaint->title }}</p>
    <p><strong>Deskripsi:</strong> {{ $complaint->description }}</p>
    <p><strong>Tanggal:</strong> {{ $complaint->date }}</p>
    <p><strong>Lokasi:</strong> {{ $complaint->location }}</p>
  </div>
  <div class="section">
    <h2>Pelapor</h2>
    <p><strong>Nama:</strong> {{ $reporter->name }}</p>
    <p><strong>No. Telepon:</strong> {{ $reporter->phone_number }}</p>
    <p><strong>Email:</strong> {{ $reporter->email }}</p>
    <p><strong>Alamat:</strong> {{ $reporter->address }}</p>
  </div>
  <div class="section">
    <h2>Terlapor</h2>
    <p><strong>Nama:</strong> {{ $suspect->name }}</p>
    <p><strong>No. Telepon:</strong> {{ $suspect->phone_number }}</p>
    <p><strong>Email:</strong> {{ $suspect->email }}</p>
    <p><strong>Alamat:</strong> {{ $suspect->address }}</p>
  </div>
</body>

</html>
