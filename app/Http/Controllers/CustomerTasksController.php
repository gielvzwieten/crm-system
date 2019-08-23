<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Customer;

class CustomerTasksController extends Controller
{
    public function update(Task $task)
    {
        request()->has('completed') ? $task->complete() : $task->incomplete();
        return back();
    }

    public function store(Customer $customer)
    {
        $attributes = request()->validate([
            'description' => ['required', 'min:3', 'max:255'],
            'due_date' => ['date_format:Y-m-d', 'after:yesterday']
        ]);
        $customer->addTask($attributes);

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}
