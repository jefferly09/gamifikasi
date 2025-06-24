@extends('container')
@section('title')
  <?= $title ?>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">

          <h4 class="card-title">STUDENTS TABLE</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class="text-primary">
                <tr>
                  <th>Attendace Number</th>
                  <th>Nama</th>
                  <th>Gender</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Alice</td>
                  <td>F</td>
                  <td class="text-center"><button class="btn btn-danger btn-sm btn-icon" onclick="deleteUser(1)"
                      title="Hapus"><i class="now-ui-icons ui-1_simple-remove"></i></button></td>
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
