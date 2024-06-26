@extends('layouts.app2')

@section('content')
<div class="container mx-auto py-4">
        <h1 class="text-3xl mb-4 font-bold">Todo-List</h1>

        <div class="flex justify-center mb-4">
            <a href="{{ route('todo-list') }}" class="bg-stone-500 text-white p-2 rounded mx-2">All</a>
            <a href="{{ route('todo-list', ['priority' => 'Low']) }}" class="bg-teal-500 text-white p-2 rounded mx-2">Low</a>
            <a href="{{ route('todo-list', ['priority' => 'Medium']) }}" class="bg-yellow-500 text-white p-2 rounded mx-2">Medium</a>
            <a href="{{ route('todo-list', ['priority' => 'High']) }}" class="bg-red-500 text-white p-2 rounded mx-2">High</a>
        </div>

        <ul class="w-full">
            @foreach($tasks as $task)
                <li class="mb-2">
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-xl font-semibold">{{ $task->name }}</h2>
                        <p>{{ $task->description }}</p>
                        <p>Due: {{ $task->due_date }}</p>
                        <p>
                            Priority: 
                            <span class="px-2 py-1 rounded 
                                @if($task->priority == 'Low') bg-green-200 text-green-800
                                @elseif($task->priority == 'Medium') bg-yellow-200 text-yellow-800
                                @elseif($task->priority == 'High') bg-red-200 text-red-800
                                @endif">
                                {{ $task->priority }}
                            </span>
                        </p>
                        <div class="flex justify-end mt-2">
                            <a href="{{ route('tasks.show', $task->id) }}" class="bg-lime-500 text-white p-2 rounded mx-2">View</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded">Delete</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
