@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Informações da Receita</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{route('receive.create')}}" class="btn btn-outline-dark" title="Nova Receita">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{route('receive.index')}}" class="btn btn-outline-dark" title="Listar Receitas">
                        <i class="fas fa-clipboard-list"></i>
                    </a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <table class="table">
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
                <tr>
                    <th scope="row">{{$receive->id}}</th>
                    <td>{{$receive->name}}</td>
                    <td>R$ {{$receive->value}}</td>
                    <td>{{$receive->date_launch}}</td>
                    <td>{{$receive->category->name}}</td>
                    <td>{{$receive->updated_at}}</td>
                    <td>
                        <a href="{{route('receive.edit', ['receive' => $receive->id])}}" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        |
                        <a href="{{ route('receive.destroy',['receive' => $receive->id]) }}"
                           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"><i class="far fa-trash-alt" title="Excluir"></i></a>
                        <form id="form-delete"style="display: none" action="{{ route('receive.destroy',['receive' => $receive->id]) }}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
