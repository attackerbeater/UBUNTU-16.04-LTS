@extends('admin_template')

@section('title', trans('company.create'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">{{ trans('company.create') }}</h3></div>
            {!! Form::open(['route' => 'companies.store']) !!}
            <div class="panel-body">
              <div class="form-group required ">
                <label for="name" class="control-label">Company Name</label>&nbsp;
                <input required="required" name="name" type="text" id="name" class="form-control">
              </div>
              <div class="form-group required ">
                <label for="email" class="control-label">Email</label>&nbsp;
                <input required="required" name="email" type="email" id="email" class="form-control">
              </div>
              <div class="form-group ">
                <label for="website" class="control-label">Website</label>&nbsp;
                <input name="website" type="text" id="website" class="form-control">
              </div>
              <div class="form-group ">
                <label for="address" class="control-label">Address</label>&nbsp;
                <textarea rows="3" name="address" cols="50" id="address" class="form-control"></textarea>
              </div>
            </div>
            <div class="panel-footer">
                {!! Form::submit(trans('company.create'), ['class' => 'btn btn-success']) !!}
                {{ link_to_route('companies.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
