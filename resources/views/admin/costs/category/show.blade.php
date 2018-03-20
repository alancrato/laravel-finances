@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Informações da categoria</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{route('categories.create')}}" class="btn btn-outline-dark" title="Nova Categoria">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{route('categories.index')}}" class="btn btn-outline-dark" title="Listar Categorias">
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
                        <th scope="col">Updated Last</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>
                            <a href="{{route('categories.edit', ['$category' => $category->id])}}" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            |
                            <a href="{{ route('categories.destroy',['category' => $category->id]) }}"
                               onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"><i class="far fa-trash-alt" title="Excluir"></i></a>
                            <form id="form-delete"style="display: none" action="{{ route('categories.destroy',['category' => $category->id]) }}" method="post">
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
