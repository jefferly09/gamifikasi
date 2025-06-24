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
                <tr>
                  <td>1</td>
                  <td>Alice</td>
                  <td>98</td>
                </tr>
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
