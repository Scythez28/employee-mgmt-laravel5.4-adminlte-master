@extends('timesheet-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new timesheet</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('timesheet-management.store') }}">
                        {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('project_code') ? ' has-error' : '' }}">
                            <label for="project_code" class="col-md-4 control-label">Project code</label>

                            <div class="col-md-6">
                                <input id="project_code" type="text" class="form-control" name="project_code" value="{{ old('project_code') }}" required autofocus>

                                @if ($errors->has('project_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('project_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                            <label for="task_name" class="col-md-4 control-label">Task Name</label>
                            <div class="col-md-6">
                                <select class="form-control" name="task_id">
                                    @foreach ($tasks as $task)
                                        <option value="{{$task->id}}">{{$task->task_name}}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div class="form-group{{ $errors->has('remarks') ? ' has-error' : '' }}">
                            <label for="remarks" class="col-md-4 control-label">Remarks</label>

                            <div class="col-md-6">
                                <input id="remarks" type="text" class="form-control" name="remarks" placeholder="comment" value="{{ old('remarks') }}" required autofocus>

                                @if ($errors->has('remarks'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remarks') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('percentage') ? ' has-error' : '' }}">
                            <label for="percentage" class="col-md-4 control-label">%</label>

                            <div class="col-md-2">
                                <input id="percentage" type="text" class="form-control" name="percentage" placeholder="progress" value="{{ old('percentage') }}" required autofocus>

                                @if ($errors->has('percentage'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('percentage') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('monday') ? ' has-error' : '' }}">
                            <label for="monday" class="col-md-4 control-label">Monday</label>

                            <div class="col-md-2">
                                <input id="monday" type="text" class="form-control" name="monday" placeholder="hours" value="{{ old('monday') }}" required autofocus>

                                @if ($errors->has('monday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('monday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('tuesday') ? ' has-error' : '' }}">
                            <label for="tuesday" class="col-md-4 control-label">Tuesday</label>

                            <div class="col-md-2">
                                <input id="tuesday" type="text" class="form-control" name="tuesday" placeholder="hours" value="{{ old('tuesday') }}" required autofocus>

                                @if ($errors->has('tuesday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tuesday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('wednesday') ? ' has-error' : '' }}">
                            <label for="wednesday" class="col-md-4 control-label">Wednesday</label>

                            <div class="col-md-2">
                                <input id="wednesday" type="text" class="form-control" name="wednesday" placeholder="hours" value="{{ old('wednesday') }}" required autofocus>

                                @if ($errors->has('wednesday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('wednesday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group{{ $errors->has('thursday') ? ' has-error' : '' }}">
                            <label for="thursday" class="col-md-4 control-label">Thursday</label>

                            <div class="col-md-2">
                                <input id="thursday" type="text" class="form-control" name="thursday" placeholder="hours" value="{{ old('thursday') }}" required autofocus>

                                @if ($errors->has('thursday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('thursday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('friday') ? ' has-error' : '' }}">
                            <label for="friday" class="col-md-4 control-label">Friday</label>

                            <div class="col-md-2">
                                <input id="friday" type="text" class="form-control" name="friday" placeholder="hours" value="{{ old('friday') }}" required autofocus>

                                @if ($errors->has('friday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('friday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('saturday') ? ' has-error' : '' }}">
                            <label for="saturday" class="col-md-4 control-label">Saturday</label>

                            <div class="col-md-2">
                                <input id="saturday" type="text" class="form-control" name="saturday" placeholder="hours" value="{{ old('saturday') }}" required autofocus>

                                @if ($errors->has('saturday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('saturday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group{{ $errors->has('sunday') ? ' has-error' : '' }}">
                            <label for="sunday" class="col-md-4 control-label">Sunday</label>

                            <div class="col-md-2">
                                <input id="sunday" type="text" class="form-control" name="sunday" placeholder="hours" value="{{ old('sunday') }}" required autofocus>

                                @if ($errors->has('sunday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sunday') }}</strong>
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
