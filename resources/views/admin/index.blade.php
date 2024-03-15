<x-app-layout>
    <h2>I'm admin</h2>
    <div>
        @can('task_create')
            <x-button><a href="{{route('tasks.create')}}">Add task</a></x-button>
        @endcan
    </div>
    <div>
        @can('tasks_edit')
            <x-button><a href="{{route('tasks.edit', $task)}}">Edit</a></x-button>
        @endcan
    </div>
    <div>
        @can('tasks_delete')
            <x-button><a href="{{route('tasks.destroy', $task)}}">Delete</a></x-button>
        @endcan
    </div>
</x-app-layout>
