@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Informações da Despesa</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{route('pay.create')}}" class="btn btn-outline-dark" title="Nova Despesa">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{route('pay.index')}}" class="btn btn-outline-dark" title="Listar Despesas">
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
                    <th scope="col">Data Despesa</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Atualizado em:</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$pay->id}}</th>
                    <td>{{$pay->name}}</td>
                    <td>R$ {{$pay->value}}</td>
                    <td>{{$pay->date_launch}}</td>
                    <td>{{$pay->category->name}}</td>
                    <td>{{$pay->updated_at}}</td>
                    <td>
                        <a href="{{route('pay.edit', ['pay' => $pay->id])}}" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        |
                        <a href="{{ route('pay.destroy',['pay' => $pay->id]) }}"
                           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"><i class="far fa-trash-alt" title="Excluir"></i></a>
                        <form id="form-delete"style="display: none" action="{{ route('pay.destroy',['pay' => $pay->id]) }}" method="post">
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
