@extends('container')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-category">Daftar Soal</h5>
                    <h4 class="card-title">Tabel Soal Pilihan Ganda</h4>
                    <a href="form_question">
                        <button class="btn btn-success btn-sm btn-icon">
                            <i class="now-ui-icons ui-1_simple-add"></i>
                        </button>
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Opsi A</th>
                                <th>Opsi B</th>
                                <th>Opsi C</th>
                                <th>Jawaban Benar</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $index => $q)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $q->question }}</td>
                                    <td>{{ $q->answer_a }}</td>
                                    <td>{{ $q->answer_b }}</td>
                                    <td>{{ $q->answer_c }}</td>
                                    <td>{{ $q->right_answer }}</td>
                                    <td>{{ $q->level }}</td>
                                    <td>
                                        <a href="{{ route('questions.edit', $q->id) }}"><button
                                                class="btn btn-warning btn-sm btn-icon">
                                                <i class="now-ui-icons ui-1_settings-gear-63"></i>
                                            </button></a>
                                        <form action="{{ route('questions.destroy', $q->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Yakin ingin menghapus soal ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm btn-icon">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
