<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interactive Quiz</title>
  <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
  <div class="quiz-container" id="quiz">
    <div class="quiz-header">
      <h2>Interactive Quiz</h2>
      <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
          aria-valuemax="100"></div>
      </div>
    </div>
    <div id="question-container">
      <p class="question" id="question"></p>
      <div class="options" id="options"></div>
    </div>
    <label id="timer"></label>

  </div>
  <script>
    const questions = {!! json_encode($questions) !!};
    const quizUrl = "{{ route('room.quiz') }}";
    const csrfToken = "{{ csrf_token() }}";
    const homePage = "{{ route('room.homepage') }}";
    const duration = {{ $duration }};
  </script>
  <script src="{{ asset('assets/script.js') }}"></script>
</body>

</html>
