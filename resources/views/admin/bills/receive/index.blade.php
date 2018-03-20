@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Contas a Pagar</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{route('receive.create')}}" class="btn btn-outline-dark" title="Nova Conta">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <br/><br/>
            <div class="col-md-12">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
            </div>
            <br/><br/>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data Receita</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Atualizado em:</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($receives as $receive)
                    <tr>
                        <th scope="row">{{$receive->id}}</th>
                        <td>{{$receive->name}}</td>
                        <td>R$ {{$receive->value}}</td>
                        <td>{{$receive->date_launch}}</td>
                        <td>{{$receive->category->name}}</td>
                        <td>{{$receive->updated_at}}</td>
                        <td>
                            <a href="{{route('receive.show', ['receive' => $receive->id])}}" title="Ver">
                                <i class="fas fa-envelope-open"></i>
                            </a>
                            |
                            <a href="{{route('receive.edit', ['receive' => $receive->id])}}" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            |
                            <a href="{{route('receive.show', ['receive' => $receive->id])}}" title="Excluir">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection