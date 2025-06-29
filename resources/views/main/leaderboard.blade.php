@extends('container')
@section('title')
  <?= $title ?>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h4 class="card-title">LEADERBOARD</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="text-primary">
                <tr>
                  <th>Peringkat</th>
                  <th>Nama</th>
                  <th>Skor</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $number = 1;
                @endphp
                @foreach ($scores as $score)
                  <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $score->student->name }}</td>
                    <td>{{ $score->total_score }}</td>
                  </tr>
                @endforeach
            </table>
          </div>
        </div>
      </div>
      <script>
        function deleteUser(id) {
          if (confirm('Yakin ingin menghapus user ID: ' + id + '?')) {
            alert('Data dihapus (simulasi).');
          }
        }
      </script>
    </div>
  </div>
@endsection
