@extends('adminlte::page')

@section('title', 'Settings')

@section('content_header')
    <h1>Settings</h1>
@stop

@section('content')
	@include('includes.messages')
    <div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Settings</h3>
					</div>
					<div class="box-body">
						{{ Form::open() }}
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										{{ Form::label('name', 'Username') }}
										{{ Form::text('name', auth()->user()->name, ['class' => 'form-control', 'readonly']) }}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										{{ Form::label('email', 'Email address') }}
										{{ Form::text('email', auth()->user()->email, ['class' => 'form-control', 'readonly']) }}
									</div>
								</div>
							</div>

							<a href="/settings/edit" class="btn btn-default pull-right">Edit</a>

						{{ Form::close() }}
					</div>
				</div>
			</div>
    </div>
    <div class="row">
			<div class="col-sm-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Your company</h3>
					</div>
					<div class="box-body">
						{{ Form::open(['action' => 'SettingsController@updateCompanyInformation', 'method' => 'post']) }}
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										{{ Form::label('company_name', 'Company name') }}
										{{ Form::text('company_name', get_setting('company_name'), ['class' => 'form-control']) }}
									</div>
								</div>
							</div>

              <div class="row">
                <div class="col-sm-9">
                  <div class="form-group">
                    {{ Form::label('street', 'Street') }}
                    {{ Form::text('street', get_setting('street'), ['class' => 'form-control']) }}
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    {{ Form::label('house_number', 'House number') }}
                    {{ Form::text('house_number', get_setting('house_number'), ['class' => 'form-control']) }}
                  </div>
                </div>
              </div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										{{ Form::label('contact_phone', 'Contact phone number') }}
										{{ Form::text('contact_phone', get_setting('contact_phone'), ['class' => 'form-control']) }}
									</div>
								</div>
                <div class="col-sm-6">
                  <div class="form-group">
                    {{ Form::label('contact_email', 'Contact email address') }}
                    {{ Form::email('contact_email', get_setting('contact_email'), ['class' => 'form-control']) }}
                  </div>
                </div>
							</div>

              <div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										{{ Form::label('state_province_county', 'State / Province / County') }}
										{{ Form::text('state_province_county', get_setting('state_province_county'), ['class' => 'form-control']) }}
									</div>
								</div>
                <div class="col-sm-6">
                  <div class="form-group">
                    {{ Form::label('country', 'Country') }}
                    {{ Form::text('country', get_setting('country'), ['class' => 'form-control']) }}
                  </div>
                </div>
							</div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    {{ Form::label('postal', 'Postal / zip code') }}
                    {{ Form::text('postal', get_setting('postal'), ['class' => 'form-control']) }}
                  </div>
                </div>
              </div>


							{{ Form::submit('Save changes', ['class' => 'btn btn-default pull-right']) }}

						{{ Form::close() }}
					</div>
				</div>
			</div>
@stop

@section('js')
	<script src="{{asset('js/render_datatables.js')}}" charset="utf-8"></script>
@endsection
