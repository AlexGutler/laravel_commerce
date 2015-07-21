@extends('app')

@section('content')
    {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('estado', 'Estados:') !!}
            {!! Form::select('estado', $estados, ['class' => 'form-control ']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('cidade', 'Cidades:') !!}
            {!! Form::select('cidade', [], ['class' => 'form-control ']) !!}
        </div>
    {!! Form::close() !!}
@endsection

@section('post-script')
    <script type="text/javascript">
        $('select[name=estado]').on('change click load propertychange keyup',function () {
            var idEstado = $(this).val();

            if (idEstado > 0)
            {
                $.get('/get-cidades/' + idEstado, function (cidades) {
                    $('select[name=cidade]').empty();
                    $.each(cidades, function (key, value) {
                        $('select[name=cidade]').append('<option value=' + value.id + '>' + value.nome + '</option>');
                    });
                });
            } else {
                $('select[name=cidade]').empty();
            }
        });
    </script>
@endsection

{{--<select>--}}
    {{--<option selected disabled>Please select one option</option>--}}
    {{--@foreach($users as $user)--}}
        {{--<option value="{{ $user->id }}">{{ $user->name }}</option>--}}
    {{--@endforeach--}}
{{--</select>--}}