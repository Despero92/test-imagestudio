<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
            </div>
        @endif
    </div>
</div>
@if(Route::currentRouteName() == 'admin.stage.edit')

{!! Form::model($row, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'POST', 'route' => array(config('quickadmin.route').'.stage.update', $row->id),'enctype' => 'multipart/form-data')) !!}
{{ method_field('PUT') }}
    <div class="form-group">
        {!! Form::label('title', 'Title', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('title', old('title', $row->title), array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('value', 'Description', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::textarea('value', old('description', $row->value), array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::file('image', array('class'=>'form-control', 'name' => 'image')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('order', 'Order', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::selectRangeWithDefault('order', 1, 20) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
            {!! link_to_route(config('quickadmin.route').'.homepage.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
        </div>
    </div>

{!! Form::close() !!}
@endif

@if(Route::currentRouteName() == 'admin.startup.edit')

    {!! Form::model($row, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'POST', 'route' => array(config('quickadmin.route').'.startup.update', $row->id))) !!}
    {{ method_field('PUT') }}
    <div class="form-group">
        {!! Form::label('value', 'Description', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::textarea('value', old('description', $row->value), array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('order', 'Order', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::selectRangeWithDefault('order', 1, 20) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
            {!! link_to_route(config('quickadmin.route').'.homepage.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endif

@if(Route::currentRouteName() == 'admin.package.edit')

    {!! Form::model($row, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'POST', 'route' => array(config('quickadmin.route').'.package.update', $row->id))) !!}
    {{ method_field('PUT') }}
    <div class="form-group">
        {!! Form::label('title', 'Title', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('title', old('Title'), array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('price', old('Price'), array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('order', 'Order', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::selectRangeWithDefault('order', 1, 20) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
            {!! link_to_route(config('quickadmin.route').'.packages.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endif