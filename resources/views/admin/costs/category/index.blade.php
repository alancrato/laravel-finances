@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Gestão de Categorias de Centro de Custos</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{route('categories.create')}}" class="btn btn-outline-dark" title="Nova Categoria">
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
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                        <td>
                            <a href="{{route('categories.show', ['category' => $category->id])}}" title="Ver">
                                <i class="fas fa-envelope-open"></i>
                            </a>
                            |
                            <a href="{{route('categories.edit', ['category' => $category->id])}}" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            |
                            <a href="{{route('categories.show', ['category' => $category->id])}}" title="Excluir">
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