<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Registrasi Siswa SD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/form_style.css') }}">
</head>

<body class="body">
  <div class="overlay">
    <div class="form-container">
      <h2 class="text-center mb-4 colorful-title">📝 Daftar Siswa Baru</h2>
      <form action="{{route("room.index")}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="name" name="name" required />
        </div>
        <div class="mb-3">
          @if ($errors->has("attendance_number"))
            <div class="alert alert-danger">
              {{ $errors->first("attendance_number") }}
            </div>
          @endif
          <label for="attendance_number" class="form-label">Nomor Absen</label>
          <input type="number" class="form-control" id="attendance_number" name="attendance_number" required />
        </div>
        <div class="mb-3">
          <label for="classroom" class="form-label">Kelas</label>
          <input type="text" class="form-control" id="classroom" name="classroom" required />
        </div>
        <div class="mb-3">
          <label for="gender" class="form-label">Jenis Kelamin</label>
          <select class="form-select" id="sex" name="sex" required>
            <option value="">-- Pilih --</option>
            <option value="M">Laki-laki</option>
            <option value="F">Perempuan</option>
          </select>
        </div>
        <button type="submit" class="btn btn-success w-100 fw-bold">
          🚀 Daftar Sekarang
        </button>
      </form>
    </div>
  </div>
</body>
