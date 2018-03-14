@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Criar nova categoria de centro de custo</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{route('categories.index')}}" class="btn btn-outline-dark" title="Listar Categorias">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                </div>
            </div>
            <br/><br/>
            <div class="col-md-12">
                @include('form._form_errors')
                <form method="post" action="{{route('categories.store')}}">
                    @include('admin.costs.category._form')
                    <button type="submit" class="btn btn-primary">Cadastrar Categoria</button>
                </form>
            </div>
        </div>
    </div>
@endsection