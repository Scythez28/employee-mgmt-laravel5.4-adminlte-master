@extends('nptask-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update task</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('nptask-management.update', ['id' => $nptask->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group{{ $errors->has('nptask_name') ? ' has-error' : '' }}">
                            <label for="nptask_name" class="col-md-4 control-label">NP Task Name</label>

                            <div class="col-md-6">
                                <input id="nptask_name" type="text" class="form-control" name="nptask_name" value="{{ $nptask->nptask_name }}" required autofocus>

                                @if ($errors->has('nptask_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nptask_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nptask_type') ? ' has-error' : '' }}">
                            <label for="nptask_type" class="col-md-4 control-label">Task Type</label>

                            <div class="col-md-6">
                                 <select type="text" name="nptask_type" value="{{ $nptask->nptask_type }}" required autofocus>
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
                                    Update
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
