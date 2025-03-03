@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Regístrate en el Webinar de Emprendimiento</h1>
    <form action="{{ route('landing.register') }}" method="POST">
        @csrf
        <input type="text" name="first_name" placeholder="Tu Nombre" required>
        <input type="text" name="last_name" placeholder="Tus Apellidos" required>
        <input type="email" name="email" placeholder="Tu Email" required>
        <input type="tel" name="phone" placeholder="Tu numero de celular" required>
        <select name="stage" required>
            <option value="Tengo un emprendimiento">Tengo un emprendimiento</option>
            <option value="Tengo una idea">Tengo una idea</option>
            <option value="No tengo una idea">No tengo una idea</option>
        </select>
        <button type="submit">Registrarme</button>
    </form>
</div>
@endsection
