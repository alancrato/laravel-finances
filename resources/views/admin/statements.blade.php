@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Extrato</div>

                    <div class="card-body">
                        <form class="form-inline text-center" method="" action="">
                            <div class="form-group">
                                <label for="date_start">Início</label>
                                <input type="date" class="form-control" id="date_start" name="date_start" aria-describedby="nameHelp" placeholder="DD/MM/YYY" value="">
                            </div>
                            <div class="form-group">
                                <label for="date_end">Término</label>
                                <input type="date" class="form-control" id="date_end" name="date_end" aria-describedby="nameHelp" placeholder="DD/MM/YYY" value="">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <span class="fas fa-search"></span>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
