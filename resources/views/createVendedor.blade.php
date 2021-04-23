@extends('templates.template')

@section('content')
    <h1 class="text-center mt-2">Cadastrar Vendedor</h1>

    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="/api/vendedor">
            @csrf
            <br>
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome">
            <br>
            <input class="form-control" type="email" name="email" id="email" placeholder="Email">
            <br>
            <input class="btn btn-primary" type="submit" value="Cadastra">
        </form>
    </div>
@endsection