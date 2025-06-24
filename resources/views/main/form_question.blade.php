@extends('container')
@section('title')
  <?= $title ?>
@endsection

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-category">Input Soal</h5>
          <h4 class="card-title">Form Soal Pilihan Ganda (A-C)</h4>
        </div>
        @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
          <form action="{{ route('questions.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="question">Pertanyaan</label>
              <input type="text" name="question" class="form-control" id="question" placeholder="Masukkan pertanyaan">
            </div>
            <div class="form-group">
              <label for="optionA">Opsi A</label>
              <input type="text" name="answer_a" class="form-control" id="optionA" placeholder="Masukkan opsi A">
            </div>
            <div class="form-group">
              <label for="optionB">Opsi B</label>
              <input type="text" name="answer_b" class="form-control" id="optionB" placeholder="Masukkan opsi B">
            </div>
            <div class="form-group">
              <label for="optionC">Opsi C</label>
              <input type="text" name="answer_c" class="form-control" id="optionC" placeholder="Masukkan opsi C">
            </div>
            <div class="form-group">
              <label for="correctAnswer">Jawaban Benar</label>
              <select name="right_answer" class="form-control" id="correctAnswer">
                <option value="">Pilih jawaban benar</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
              </select>
            </div>
            <div class="form-group">
              <label for="level">Level</label>
              <select name="level" class="form-control" id="correctAnswer">
                <option value="">Pilih level soal</option>
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan Soal</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
