<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Leaderboard Nilai</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}" />
</head>

<body>

  <div class="container py-5">
    <div class="card shadow leaderboard-card mx-auto">
      <div class="card-header bg-primary text-white text-center rounded-top">
        <h3 class="mb-0"><i class="bi bi-trophy-fill"></i> Leaderboard Nilai Siswa</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover  align-middle text-center">
            <thead class="table-light">
              <tr>
                <th>Peringkat</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nilai</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @php
                $number = 1;
                $badges = ['bi-award-fill text-warning', 'bi-award-fill text-secondary', 'bi-award-fill text-warning'];
                $status = ['Luar Biasa', 'Sangat Baik', 'Sangat Baik'];
              @endphp
              @foreach ($scores as $score)
                <tr class="table-ranking-1">
                  <td>
                    @php
                      if (isset($badges[$number - 1])) {
                          echo '<i class="' . $badges[$number - 1] . ' fs-5"></i>';
                      } else {
                          echo $number;
                      }
                    @endphp
                  </td>
                  <td>{{ $score->student->name }}</td>
                  <td>{{ $score->student->classroom }}</td>
                  <td><span class="badge bg-success fs-6">{{ $score->total_score }}</span></td>
                  <td>
                    @php
                      if (isset($status[$number - 1])) {
                          echo '<span class="text-success fw-bold">' . $status[$number - 1] . '</span>';
                      } else {
                          echo 'Baik';
                      }
                    @endphp
                  </td>
                </tr>
                @php
                  $number++;
                @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="text-center mt-4">
      <a href="{{route("room.homepage")}}" class="btn btn-secondary">
        <i class="bi bi-arrow-left-circle"></i> Kembali
      </a>
    </div>
  </div>

</body>
