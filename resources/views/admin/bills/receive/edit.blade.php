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
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Nome" value="{{old('name',$receives->name)}}">
                        <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select class="form-control" name="category_id" value="{{$receives->category->id}}">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$receives->category->id == $category->id ? 'selected="selected"':''}}>{{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_launch">Data Receita</label>
                        <input type="date" class="form-control" id="date_launch" name="date_launch" aria-describedby="nameHelp" placeholder="Data Receita" value="{{old('date_launch',$receives->date_launch)}}">
                        <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="value">Valor</label>
                        <input type="text" class="form-control" id="value" name="value" aria-describedby="nameHelp" placeholder="Valor" value="{{old('value',$receives->value)}}">
                        <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar Receita</button>
                </form>
            </div>
        </div>
    </div>
@endsection