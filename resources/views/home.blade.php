@extends('layouts.app')

@section('content')
<style>
    label{
        margin: 5px;    
    }
    button{
        margin: 5px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Propuesta') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form id="seleccion_cliente" class="form" action="#">
                            <div class="row">
                                <label for="cliente"> Seleccione Cliente </label> 
                                <select class="form-control">
                                    <option id=""> Seleccione Cliente </option>
                                    <option id="1"> Cliente 1 </option>
                                    <option id="2"> Cliente 2 </option>
                                </select>
                                <label class="form-check-label">
                                    <input type="checkbox" class="checkbox"> Ingresar como cliente nuevo <i class="input-helper"></i>
                                </label>  
                            </div>   
                            <div class="row">      
                                <button class="btn btn-group btn-success">Enviar datos</button>                         
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
