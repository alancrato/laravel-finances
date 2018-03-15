@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-left">
                    <h4>Informações do usuário</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-outline-dark" title="Novo Usuário">
                        <i class="fas fa-plus"></i>
                    </a>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-dark" title="Listar Usuários">
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
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        |
                        <a href="{{ route('users.destroy',['user' => $user->id]) }}"
                           onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete').submit();}"><i class="far fa-trash-alt" title="Excluir"></i></a>
                        <form id="form-delete"style="display: none" action="{{ route('users.destroy',['user' => $user->id]) }}" method="post">
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
