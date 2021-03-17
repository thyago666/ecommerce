@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Start Bootstrap Template</title>
</head>

<body>
  <!-- Page Content -->
  <div class="container">
     <div class="row">
      <div class="col-lg-3">
     
     @include('menu');
      </div>
      </div>
  </div>
</body>

</html>
@endsection
