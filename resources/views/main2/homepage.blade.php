<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      height: 100%;
      margin: 0;
      background-image: url("{{ asset('assets/img/tam.png') }}");
      /* Ganti dengan path gambar yang sesuai */
      background-size: cover;
      /* Agar gambar memenuhi seluruh layar */
      background-position: center;
      /* Posisi gambar di tengah */
      background-repeat: no-repeat;
    }

    .full-center {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .menu-box {
      background-color: rgba(255, 246, 219, 0.3);
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      text-align: center;
      min-width: 350px;
    }

    .menu-title {
      font-weight: bold;
      font-size: 1.8rem;
      margin-bottom: 30px;
      color: #4d3319;
    }

    .btn-menu {
      background-color: #fdf6e3;
      border: 2px solid #8b5e3c;
      color: #3e2b1e;
      font-weight: bold;
      width: 100%;
      padding: 18px;
      margin: 10px 0;
      font-size: 1.2rem;
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .btn-menu:hover {
      background-color: #ffe9b3;
      transform: scale(1.03);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>

<body>

  <div class="full-center">
    <div class="menu-box">
      <div class="menu-title">Petualangan Nusantara</div>
      <button onclick="window.location.href='{{ route('room.difficulty') }}'" class="btn btn-menu">Mulai
        Petualangan</button>
      <button onclick="window.location.href='{{ route('room.profile') }}'" class="btn btn-menu">Profil Saya</button>
      <button onclick="window.location.href='{{ route('room.leaderboard') }}'" class="btn btn-menu">Leaderboard</button>
    </div>

</body>

</html>
