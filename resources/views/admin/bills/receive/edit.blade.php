@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Editar Receita</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{route('receive.index')}}" class="btn btn-outline-dark" title="Listar Receitas">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                </div>
            </div>
            <br/><br/>
            <div class="col-md-12">
                @include('form._form_errors')
                <form method="post" action="{{route('receive.update',['receives' => $receives->id])}}">
                    {{method_field('PUT')}}
                    @include('admin.bills.receive._form')
                    <button type="submit" class="btn btn-primary">Atualizar Receita</button>
                </form>
            </div>
        </div>
    </div>
@endsection