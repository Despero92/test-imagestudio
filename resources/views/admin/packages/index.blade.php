@extends('admin.layouts.master')

@section('content')

    {!! link_to_route(config('quickadmin.route').'.package.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                <tr>
                    <th>
                        {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                    </th>
                    <th>order</th>
                    <th>title</th>
                    <th>price</th>
                    <th>addition</th>
                    <th>actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($packages as $row)
                    <tr>
                        <td>
                            {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                        </td>
                        <td>{{ $row->order }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->addition }}</td>
                        <td>
                            {!! link_to_route(config('quickadmin.route').'.package.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.package.destroy', $row->id))) !!}
                            {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.stage.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
            <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
    </div>

    <div class="caption admin-page-title">
        <h2>Package Descriptions</h2>
    </div>
    {!! link_to_route(config('quickadmin.route').'.package.description.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                <tr>
                    <th>
                        {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                    </th>
                    <th>order</th>
                    <th>package</th>
                    <th>description</th>
                    <th>actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($descriptions as $row)
                    <tr>
                        <td>
                            {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                        </td>
                        <td>{{ $row->order }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->description }}</td>
                        <td>
                            {!! link_to_route(config('quickadmin.route').'.package.description.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.package.description.destroy', $row->id))) !!}
                            {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.stage.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
            <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
    </div>

@endsection