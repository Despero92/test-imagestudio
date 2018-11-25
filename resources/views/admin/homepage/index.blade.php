@extends('admin.layouts.master')

@section('content')

    <div class="portlet box clearfix">
        <div class="portlet-title">
            <div class="caption admin-page-title">
                <h2>Launch content</h2>
            </div>
        </div>
        <div class="portlet-body">
            {!! Form::open(array('route' => 'update.launch', 'id' => 'update-launch',)) !!}
            <div class="form-group">
                {!! Form::label('launch-content', 'Launch Content', array('class'=>'col-md-3 col-sm-2 control-label')) !!}
                <div class="col-md-10 col-sm-10 col-sm-offset-1">
                    @if(!empty($launchContent))
                        {!! Form::textarea('launch-content', $launchContent->value, array('class'=>'form-control')) !!}
                    @else
                        {!! Form::textarea('launch-content', '', array('class'=>'form-control')) !!}
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-1">
                    {!! Form::submit( 'update' , array('class' => 'btn btn-primary')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="portlet box clearfix">
        <div class="portlet-title">
            <div class="caption admin-page-title">
                <h2>Instagram content</h2>
            </div>
        </div>
        <div class="portlet-body">
            {!! Form::open(array('route' => 'update.inst', 'id' => 'update-inst','class' => 'ckeditor',)) !!}
            <div class="form-group">
                {!! Form::label('instagram-content', 'Instagram Content', array('class'=>'col-md-3 col-sm-2 control-label')) !!}
                <div class="col-md-10 col-sm-10 col-sm-offset-1">
                        @if(!empty($instagramContent))
                            {!! Form::textarea('instagram-content', $instagramContent->value, array('class'=>'form-control ckeditor')) !!}
                        @else
                            {!! Form::textarea('instagram-content', '', array('class'=>'form-control ckeditor')) !!}
                        @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-1">
                    {!! Form::submit( 'update' , array('class' => 'btn btn-primary')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="caption admin-page-title">
        <h2>Stages</h2>
    </div>
    {!! link_to_route(config('quickadmin.route').'.stage.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}
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
                        <th>description</th>
                        <th>image</th>
                        <th>actions</th>
                    </tr>
                </thead>

                <tbody>
                @foreach ($stages as $row)
                    <tr>
                        <td>
                            {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                        </td>
                        <td>{{ $row->order }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->value }}</td>
                        <td>{{ $row->file_name }}</td>
                        <td>
                            {!! link_to_route(config('quickadmin.route').'.stage.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.stage.destroy', $row->id))) !!}
                            {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--<div class="row">--}}
                {{--<div class="col-xs-12">--}}
                    {{--<button class="btn btn-danger" id="delete">--}}
                        {{--{{ trans('quickadmin::templates.templates-view_index-delete_checked') }}--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            <?php 
                /*
                * @todo поменять роутер на stage.massDelete, добавить роутер и написать для него action
                */
            ?>
            {!! Form::open(['route' => config('quickadmin.route').'.stage.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
            <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
    </div>

    <div class="caption admin-page-title">
        <h2>Startup</h2>
    </div>
    {!! link_to_route(config('quickadmin.route').'.startup.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}
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
                    <th>description</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($startupList as $row)
                    <tr>
                        <td>
                            {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                        </td>
                        <td>{{ $row->order }}</td>
                        <td>{{ $row->value }}</td>
                        <td>
                            {!! link_to_route(config('quickadmin.route').'.startup.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.startup.destroy', $row->id))) !!}
                            {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--<div class="row">--}}
            {{--<div class="col-xs-12">--}}
            {{--<button class="btn btn-danger" id="delete">--}}
            {{--{{ trans('quickadmin::templates.templates-view_index-delete_checked') }}--}}
            {{--</button>--}}
            {{--</div>--}}
            {{--</div>--}}
            <?php
            /*
            * @todo поменять роутер на stage.massDelete, добавить роутер и написать для него action
            */
            ?>
            {!! Form::open(['route' => config('quickadmin.route').'.stage.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
            <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                console.log(123);
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@endsection