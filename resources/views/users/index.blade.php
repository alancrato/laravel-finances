@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Gestão de Usuários</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{  route('users.create') }}" class="btn btn-outline-dark" title="Novo Usuário">
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
                    <th scope="col">First</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                    <tr>
                        <th scope="row">{{$us->id}}</th>
                        <td>{{$us->first_name}}</td>
                        <td>{{$us->last_name}}</td>
                        <td>{{$us->email}}</td>
                        <td>
                            <a href="{{route('users.show', ['us' => $us->id])}}" title="Ver">
                                <i class="fas fa-envelope-open"></i>
                            </a>
                            |
                            <a href="{{route('users.edit', ['us' => $us->id])}}" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            |
                            <a href="{{route('users.show', ['us' => $us->id])}}" title="Excluir">
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