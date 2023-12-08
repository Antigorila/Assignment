@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Bejelentkezés</div>
          <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="form-group">
                  <label for="email">E-mail cím:</label>
                  <input type="email" name="email" id="email" required>
              </div>
              <div class="form-group">
                  <label for="password">Jelszó:</label>
                  <input type="password" name="password" id="password" required>
              </div>
              <button type="submit">Bejelentkezés</button>
          </form>          
          </div>
        </div>
      </div>
    </div>
</div>

@endsection