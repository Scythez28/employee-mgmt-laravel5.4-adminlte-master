@extends('nptask-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new NP task</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('nptask-management.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nptask_name') ? ' has-error' : '' }}">
                            <label for="nptask_name" class="col-md-4 control-label">Task Name</label>

                            <div class="col-md-6">
                                <input id="task_name" type="text" class="form-control" name="nptask_name" value="{{ old('nptask_name') }}" required autofocus>

                                @if ($errors->has('nptask_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nptask_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nptask_type') ? ' has-error' : '' }}">
                            <label for="nptask_type" class="col-md-4 control-label">NP Task Type</label>

                            <div class="col-md-6">
                                <select name="nptask_type">
                                <option id="nptask_type" class="form-control" name="nptask_type" value="Inactive" required>Inactive</option>
                                <option id="nptask_type" class="form-control" name="nptask_type" value="Active" required>Active</option>
                                </select>
                                @if ($errors->has('nptask_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nptask_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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
