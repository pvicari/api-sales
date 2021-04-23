@extends('templates.template')

@section('content')
    <h1 class="text-center mt-2">Cadastrar Venda</h1>

    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="/api/venda">
            @csrf
            <br>
            <select class="form-control" name="vendedor_id" id="vendedor_id">
                <option value="">Vendedor</option>
                @foreach($vendedores as $vendedor)
                    <option value="{{ $vendedor->id }}">{{$vendedor->nome}}</option>                
                @endforeach
            </select>
            <br>
            <input class="form-control" type="text" name="valor" id="valor" placeholder="Valor">
            <br>
            <input class="btn btn-primary" type="submit" value="Cadastra">
        </form>
    </div>
@endsection