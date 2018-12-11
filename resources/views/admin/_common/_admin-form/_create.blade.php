<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_create-add_new') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
            </div>
        @endif
    </div>
</div>
@if(Route::currentRouteName() == 'admin.stage.create')

    {!! Form::open(array('route' => config('quickadmin.route').'.stage.create', 'method' => 'POST', 'id' => 'form-with-validation', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('title', old('title'), array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('value', 'Description', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::textarea('value', old('description'), array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Image', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::file('image', array('class'=>'form-control')) !!}
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
            {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endif

@if(Route::currentRouteName() == 'admin.startup.create')

    {!! Form::open(array('route' => config('quickadmin.route').'.startup.create', 'method' => 'POST', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        {!! Form::label('value', 'Description', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::textarea('value', old('description'), array('class'=>'form-control')) !!}
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
            {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endif

@if(Route::currentRouteName() == 'admin.package.create')

    {!! Form::open(array('route' => config('quickadmin.route').'.package.create', 'method' => 'POST', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

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
        {!! Form::label('addition', 'Addition', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::text('addition', old('Addition'), array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endif

@if(Route::currentRouteName() == 'admin.package.description.create')

    {!! Form::open(array('route' => config('quickadmin.route').'.package.description.create', 'method' => 'POST', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

    <div class="form-group">
        <div class="caption admin-page-title package-title">
            <h4>Packages</h4>
        </div>
        @foreach($packages as $package)
        {!! Form::label('package-'.$package->id, $package->title, array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-1">
            {!! Form::checkbox('package-'.$package->id, $package->id) !!}
        </div>
        {{--<div class="clearfix"></div>--}}
            @endforeach
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::textarea('description', old('Description'), array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('order', 'Order', array('class'=>'col-sm-2 control-label')) !!}
        <div class="col-sm-10">
            {!! Form::selectRangeWithDefault('order', 1, 40) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit( trans('quickadmin::templates.templates-view_create-create') , array('class' => 'btn btn-primary')) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endif