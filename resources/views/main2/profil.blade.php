<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
  <style>
    .profile-card {
      max-width: 500px;
      margin: 50px auto;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      padding: 30px;
    }

    .profile-card h3 {
      margin-bottom: 20px;
    }

    .profile-img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body style="background-image: url('{{ asset('assets/img/tam.png') }}'); background-size: cover; background-position: center;">
  <div class="container">
    <div class="profile-card text-center">

      <h3>Nama Lengkap: <strong>{{ $student->name }}</strong></h3>
      <p>Nomor Absen: <strong>{{ $student->attendance_number }}</strong></p>
      <p>Kelas: <strong>{{ $student->classroom }}</strong></p>
      {{-- <p>skor: 300</p> --}}
      {{-- <p>Tanggal Lahir: 15 Mei 2005</p> --}}
      <p>Jenis Kelamin: {{ $student->sex == "M" ? "Laki-laki" : "Perempuan"}}</p>
      {{-- <p>Alamat: Jl. Merdeka No. 123, Jakarta</p> --}}
    </div>
    <div class="text-center mt-4">
      <a href="{{ route('room.homepage') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left-circle"></i> Kembali
      </a>
    </div>
  </div>
</body>
