@extends('layouts.app')

@section('content')
    <div class="container panel-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{trans('messages.add_task')}}</div>
                        <div class="card-body">
                            @include('common.errors')

                            <form action="{{route('tasks.store')}}" method="POST" class="form-horizontal">
                                @csrf

                                <div class="form-group">
                                    <label for="task-name" class="col-sm-3 control-label">{{trans('messages.task')}}</label>

                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="task-name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> {{trans('messages.add_task')}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($tasks) > 0)
        <div class="panel panel-default container">
            <div class="panel-heading">
                {{trans('messages.current_task')}}
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>{{trans('messages.task')}}</th>
                    <th>&nbsp;</th>
                    </thead>

                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                                <button class="delete-task-btn btn btn-danger" data-task-id="{{$task->id}}" data-csrf-token="{{csrf_token()}}">{{trans('messages.delete')}}</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="{{mix('/js/tasks/list.js')}}"></script>
    @endif
@endsection
