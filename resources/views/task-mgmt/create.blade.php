@extends('task-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new task</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('task-management.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                            <label for="task_name" class="col-md-4 control-label">Task Name</label>

                            <div class="col-md-6">
                                <input id="task_name" type="text" class="form-control" name="task_name" value="{{ old('task_name') }}" required autofocus>

                                @if ($errors->has('task_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('task_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('task_type') ? ' has-error' : '' }}">
                            <label for="task_type" class="col-md-4 control-label">Task Type</label>

                            <div class="col-md-6">
                                <select name="task_type">
                                <option id="task_type" class="form-control" name="task_type" value="Inactive" required>Inactive</option>
                                <option id="task_type" class="form-control" name="task_type" value="Active" required>Active</option>
                                </select>
                                @if ($errors->has('task_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('task_type') }}</strong>
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
