@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Criar novo usuário</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{route('users.index')}}" class="btn btn-outline-dark" title="Listar Usuários">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                </div>
            </div>
            <br/><br/>
            <div class="col-md-12">
                @include('form._form_errors')
                <form method="post" action="{{route('users.store')}}">
                    @include('users._form')
                    <button type="submit" class="btn btn-primary">Cadastrar Usuário</button>
                </form>
            </div>
        </div>
    </div>
@endsection