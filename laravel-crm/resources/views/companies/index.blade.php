@extends('admin_template')

@section('content')
<h1 class="page-header">
    <div class="pull-right">
    @can('create', new App\Company)
        {{ link_to_route('companies.create', trans('company.create'), [], ['class' => 'btn btn-success']) }}
    @endcan
    </div>
    {{ trans('company.list') }}
    <small>{{ trans('app.total') }} : {{ $companies->total() }} {{ trans('company.company') }}</small>
</h1>
<table class="table table-companies">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Website</th>
            <th class="text-center">Address</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
@endsection
