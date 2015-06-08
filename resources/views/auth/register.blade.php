@extends('store.store')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Cadastrar</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" id="cadastro-usuario" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Cadastro Pessoal</label>
                        </div>

						<div class="form-group">
							<label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Nome Completo
                            </label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}" required="true">
							</div>
						</div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>E-Mail
                            </label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required="true">
                            </div>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-4 control-label">CPF</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="text" class="form-control" id="cpf" name="cpf" value="{{ old('cpf') }}">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-4 control-label">Sexo</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<select class="form-control" id="sel1">--}}
                                    {{--<option>Masculino</option>--}}
                                    {{--<option>Feminino</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-4 control-label">Data de Nascimento</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="text" class="form-control" id="nascimento" name="nascimento" value="{{ old('nascimento') }}" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$"/>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <!--
                        http://wbruno.com.br/html/validando-formularios-apenas-com-html5/
                        pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" data
                        pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" telefone
                         -->
                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-4 control-label">Telefone</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"/>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="col-md-4 control-label">Celular</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular') }}" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"/>--}}
                            {{--</div>--}}
                        {{--</div>--}}

						<div class="form-group">
							<label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Password
                            </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" required="true">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Confirmar Password
                            </label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" required="true">
							</div>
						</div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Endereço de Entrega</label>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                CEP
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cep" name="cep" value="{{ old('cep') }}" required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Identificação do Endereço
                            </label>
                            <div class="col-md-6">
                                <select class="form-control" name="nome_endereco" id="nome_endereco">
                                    <option value="1" selected>Apartamento</option>
                                    <option value="2">Casa</option>
                                    <option value="3">Comercial</option>
                                    <option value="4">Outro</option>
                                </select>
                                <input type="text" id="nome_endereco_desc" class="form-control hide" name="nome_endereco_desc" value="{{ old('nome_endereco_desc') }}">
                                <p class="help-block"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Endereço
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="endereco" name="endereco" value="{{ old('endereco') }}" required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Número
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="numero" name="numero" value="{{ old('numero') }}" maxlength="6" required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                Complemento
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="complemento" name="complemento" value="{{ old('complemento') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Bairro
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="bairro" name="bairro" value="{{ old('bairro') }}" required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Cidade
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cidade" name="cidade" value="{{ old('cidade') }}" required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Estado
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control text-uppercase" id="estado" name="estado" value="{{ old('estado') }}" maxlength="2" required="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">
                                <span class="asterisk"><i class="fa fa-asterisk fa-fw"></i></span>
                                Informações de Referência
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="referencia" name="referencia" value="{{ old('referencia') }}" required="true">
                            </div>
                        </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Cadastrar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
