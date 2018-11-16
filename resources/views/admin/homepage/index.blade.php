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
                    {!! Form::textarea('launch-content', $launchContent->value, array('class'=>'form-control')) !!}
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

@endsection