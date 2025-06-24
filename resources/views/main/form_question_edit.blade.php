@extends('container')

@section('content')
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">Edit Soal</h5>
            <h4 class="card-title">Form Edit Soal Pilihan Ganda (A-C)</h4>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('questions.update', $question->id) }}">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="question">Pertanyaan</label>
                <input type="text" name="question" class="form-control"
                  value="{{ old('question', $question->question) }}">
              </div>
              <div class="form-group">
                <label for="answer_a">Jawaban A</label>
                <input type="text" name="answer_a" class="form-control"
                  value="{{ old('answer_a', $question->answer_a) }}">
              </div>
              <div class="form-group">
                <label for="answer_b">Jawaban B</label>
                <input type="text" name="answer_b" class="form-control"
                  value="{{ old('answer_b', $question->answer_b) }}">
              </div>
              <div class="form-group">
                <label for="answer_c">Jawaban C</label>
                <input type="text" name="answer_c" class="form-control"
                  value="{{ old('answer_c', $question->answer_c) }}">
              </div>
              <div class="form-group">
                <label for="right_answer">Jawaban Benar</label>
                <select class="form-control" name="right_answer">
                  <option value="">Pilih jawaban benar</option>
                  <option value="a" {{ $question->right_answer == 'a' ? 'selected' : '' }}>A</option>
                  <option value="b" {{ $question->right_answer == 'b' ? 'selected' : '' }}>B</option>
                  <option value="c" {{ $question->right_answer == 'c' ? 'selected' : '' }}>C</option>
                </select>
              </div>
              <div class="form-group">
                <label for="level">Level</label>
                <select name="level" class="form-control" id="correctAnswer">
                  <option value="">Pilih level soal</option>
                  <option value="1" {{ $question->level == 1 ? 'selected' : '' }}>1</option>
                  <option value="2" {{ $question->level == 2 ? 'selected' : '' }}>2</option>
                </select>
              </div>
              <button type="submit" class="btn btn-warning mt-3">Perbarui Soal</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
