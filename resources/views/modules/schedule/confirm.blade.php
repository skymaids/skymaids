<!-- Template -->
@extends('layouts.confirm')

<!-- Abre seção de título -->
@section('pageTitle')
    Confirm Service
@endsection

<!-- Abre seção de descrição -->
@section('pageDescription')
    The Sky Maids has a scheduled service in your residence / business.
@endsection

<!-- Abre seção de conteúdo -->
@section('content')

    <!-- Abrir Form -->
    {!! Form::open(array(
            'url'           => '/confirm',
            'id'            => 'formConfirm',
            'method'        => 'POST',
            'role'          => 'form',
            'autocomplete'  => 'off',
        ))
    !!}

    <!-- Token Form -->
    {{ Form::token() }}


        <h4 class="example-title">Who</h4>
        <p class="form-control-static">{{ $who }}</p>
        <br />
        <h4 class="example-title">Where</h4>
        <p class="form-control-static">{{ $where }}</p>
        <br />
        <h4 class="example-title">When</h4>
        <p class="form-control-static">{{ $when }}*</p>
        <br />
        <div class="form-group form-material" data-plugin="formMaterial">
            <h4 class="example-title">Obs</h4>
            <textarea class="form-control empty" id="textarea" name="textarea" rows="3"></textarea>
        </div>
        <input type="hidden" name="idSchedule" id="idSchedule" value="{{ $id }}" />
        <input type="hidden" name="type" id="type" value="1" />
        <input type="hidden" name="who" id="who" value="{{ $who }}" />
        <input type="hidden" name="when" id="when" value="{{ $when }}" />

        <button type="button" onclick="confirm()" class="btn btn-primary btn-block">Confirm</button>
        <button type="button" onclick="cancel()" class="btn btn-danger btn-block">Cancel</button>

        <h6 style="padding-top: 10px">* Appointment time window 1 hour for more or less</h6>
    <!-- Fechar Form -->
    {!! Form::close() !!}

<!-- Fecha seção do template -->
    <!-- Scripts -->
    <script type="application/javascript">

        function confirm(){
            document.getElementById('type').value = 1;
            document.getElementById("formConfirm").submit();
        }

        function cancel(){
            document.getElementById('type').value = 0;
            document.getElementById("formConfirm").submit();
        }
    </script>
@endsection