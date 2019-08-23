@extends('layouts.app')
@section('content')
    <h1>Customers Overview List {{ auth()->user()->name }}</h1>



    <table class="table mt-5">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Task Completion Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customers as $customer)
                <tr>
                    <td><a href="/customers/{{ $customer->id }}"> {{ $customer->firstname . " " . $customer->lastname }} </a></td>
                    <td> {{ $customer->email }} </td>
                    <td> @if($customer->tasks->count())
                            {{ $customer->tasks->sortBy('due_date')->first()->due_date }}
                        @endif
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>

        <div class="mt-5">
            <a href="/customers/create"><button class="btn-primary">Add new customer &#43;</button></a>
        </div>


@endsection