@extends('admin_template')

@section('title', trans('company.detail'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Details</h3></div>
            @if ($company->logo && is_file(public_path('storage/'.$company->logo)))
                <div class="panel-body">
                    {{ Html::image('storage/'.$company->logo, $company->name, ['style' => 'width:20%']) }}
                </div>
            @endif

            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <td class="col-xs-4">Name</td>
                        <td>{{ $company->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $company->email }}</td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td>{{ $company->website }}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $company->address }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="panel-footer">
                @can('update', $company)
                  {{ link_to_route('companies.edit', trans('company.edit'), [$company], ['class' => 'btn btn-warning', 'id' => 'edit-company-'.$company->id]) }}
                @endcan
                {{ link_to_route('companies.index', trans('company.back_to_index'), [], ['class' => 'btn btn-default']) }}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        @if(Request::has('action'))
        @include('employees.forms')
        @endif
        <div class="panel panel-default">
            <table class="table table-condensed table-companies-view">
             <thead>
                 <tr>
                     <th class="text-center">ID</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach($employees as $key => $employee)
                 <tr>
                     <td class="text-center">{{ $employees->firstItem() + $key }}</td>
                     <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                     <td>{{ $employee->email }}</td>
                     <td>{{ $employee->phone }}</td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
            <div class="panel-body">{{ $employees->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
