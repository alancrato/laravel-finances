{{csrf_field()}}
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder="Nome" value="{{old('name',$receives->name)}}">
    <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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