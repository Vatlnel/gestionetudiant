@extends('layout')

@section('content')
<h2>Connexion Admin</h2>

<form method="POST" action="{{ route('admin.login') }}">
    @csrf

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Mot de passe</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-primary">Se connecter</button>
</form>
@endsection