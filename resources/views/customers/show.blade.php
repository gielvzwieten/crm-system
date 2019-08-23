@extends('layouts.app')

@section('content')

    {{--UPDATE MESSAGE--}}
        @if(session('updatemessage'))
            <h5 class="alert-success p-2">{{ session('updatemessage') }}</h5>
        @endif

    {{--Contact Card--}}
    <div class="card" style="width: 28rem;">
        <div class="card-body">
            <h4 class="card-title">@if($customer->gender === 1) Mister @elseif($customer->gender === 0)Miss @endif  {{ $customer->firstname . " " . $customer->lastname }}</h4>
            <h5 class="card-subtitle mb-2 text-muted">{{ $customer->email }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $customer->address . " " . $customer->housenumber }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">{{ $customer->city . " " . $customer->postalcode }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">{{ $customer->phonenumber }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">{{ $customer->mobile }}</h6>

            <div class="row justify-content-md-start mt-4">
                <a href="{{ $customer->id }}/edit"><button class="btn-group-lg btn-success">Edit Contact</button></a>
                <form method="POST" action="/customers/{{ $customer->id }}">
                    @method('DELETE')
                    @csrf
                    <button class="btn-danger ml-5" type="submit">Delete Contact</button>
                </form>
            </div>
        </div>
    </div>

{{--TASKS--}}

    @if ($customer->tasks->count())
        <div class="card mt-5 p-2">
        <h1 class="">Tasks</h1>
        <table class="table mt-1">
            <thead class="thead-dark">
            <tr>
                <th>Task Description</th>
                <th>Due Date</th>
                <th>Completion Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($customer->tasks as $task)
                <tr>
                    <td>{{ $task->description }}</td>

                    <td> {{ $task->due_date }} </td>

                    <td class="row">
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @method('PATCH')
                            @csrf
                            <label for="{{ $task->id }}">
                                <input type="checkbox" name="completed" id="{{ $task->id }}" onChange="this.form.submit()" {{ $task->completed ? 'checked' : "" }}>

                            </label>
                        </form>
                        @if($task->completed)
                            <form class="ml-5" method="POST" action="/tasks/{{ $task->id }}">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="close" aria-label="Close">
                                    <span class="text-danger font-weight-bold" aria-hidden="true">&times;</span>
                                </button>

                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
        </div>
    @endif


    {{--Add new task--}}
    <div class="card mt-5 p-2 mb-5">
        <h1>Add a New Task</h1>
        <form method="POST" action="/customers/{{ $customer->id }}/tasks">
            @csrf

            <div class="form-group">
                <label for="description">Task Description *</label><br>
                <textarea name="description" id="description" cols="50" rows="3" placeholder="Task Description">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date *</label>
                <input type="text" class="form-control" name="due_date" id="due_date" placeholder="yyyy-mm-dd"
                       value="{{ old('due_date') }}" class=" {{ $errors->has('due_date') ? 'border border-danger' : '' }}"
                >
            </div>



            {{--<div>--}}
                {{--<label for="due_date">Contact moment</label>--}}
                {{--<input type="text" name="due_date" id="due_date" placeholder="yyyy-mm-dd">--}}

                {{--<label for="description">Task description</label>--}}
                {{--<input type="text" name="description" id="description">--}}
            {{--</div>--}}
            <button class="btn-primary" type="submit">Add Task</button>
        </form>
    </div>

    @include('layouts.errors')

@endsection

