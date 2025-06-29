<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pilih Level</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>
  <div class="container text-center">
    <h2 class="mb-4">Pilih Level</h2>
    <div class="row justify-content-center g-4">

      @foreach ($levels as $level)
        @if ($roomAnswers->where('level', $level)->count() > 0)
          <div class="col-md-4">
            <div class="card p-3">
              <div class="level-title mb-3">Level {{ $level }} <br/>(Sudah Selesai)</div>
              <button class="btn btn-outline-secondary btn-difficulty" disabled>Level Sudah Selesai</button>
            </div>
          </div>
        @else
          <div class="col-md-4">
            <div class="card p-3">
              <div class="level-title mb-3">Level {{ $level }}</div>
              @foreach ($difficulties as $difficulty)
                <button
                  class="btn {{ $difficulty->name == 'Mudah' ? 'btn-outline-success' : 'btn-outline-danger' }} btn-difficulty"
                  onclick="window.location.href='{{ route('room.difficulty.chose', ['level' => $level, 'difficulty_id' => $difficulty->id]) }}'">{{ $difficulty->name }}</button>
              @endforeach
            </div>
          </div>
        @endif
      @endforeach

      <!-- Level 3 -->
      {{-- <div class="col-md-4">
        <div class="card p-3">
          <div class="level-title mb-3">Level 3</div>
          <button class="btn btn-outline-success btn-difficulty" onclick="selectLevel(3, 'mudah')">Mudah</button>
          <button class="btn btn-outline-danger btn-difficulty" onclick="selectLevel(3, 'sulit')">Sulit</button>
        </div>
      </div> --}}

    </div>
  </div>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
