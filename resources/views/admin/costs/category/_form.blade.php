{{csrf_field()}}
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Nome" value="{{old('name',$categories->name)}}">
    <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>