<x-app-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a class="btn btn-outline-dark btn-sm mb-4 mt-0" href="{{ route('dashboard') }}">{{ __('Back to groups page') }}</a>

            @if ( Session::has('success') )
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @elseif ( Session::has('error') )
                <div class="alert alert-danger">
                    <p>{{ Session::get('danger') }}</p>
                </div>
            @endif

            <div class="col">
                <div class="card h-100">

                    <div class="card-header card-header-divider">
                        <h4 class="fs-5 fw-bold card-title mb-0 pt-1 pb-3">{{ $group->name }}</h4>
                    </div>

                    <div class="list-group list-group-flush">

                        @if ( $group->tasks->count() < 1 )
                            <div class="alert alert-warning">
                                <p>{{ __('No tasks in this group') }}</p>
                            </div>
                        @else

                            @foreach ($group->tasks as $task)
                                @if ( $task->complete == NULL )
                                    <div class="list-group-item d-flex py-3 align-items-center">
                                        <div class="flex-fill ps-4 overflow-hidden">
                                            <a href="{{ route('task.show', $task) }}" style=" position: relative; ">
                                                <div class="fw-bold mb-0 text-truncate" >
                                                    <p style="font-family: 'Noto Kufi Arabic', sans-serif; ">{{ $task->name }}</p>
                                                </div>
                                                <div class="small text-dark mb-1">التكرار - {{ $task->repeats }}</div>
                                                <div class="left" style=" position: absolute; left: -20px; top: 0px; width: 50px; height: 50px; " >
                                                    <img style=" border: 2px solid #eeca66; border-radius: 25%; padding: 5px; "  src="{{ asset('images/waiting.gif') }}" alt="">
                                                </div>
                                            </a>
                                        </div>  
                                    </div>
                                @endif
                            @endforeach


                            @foreach ($group->tasks as $task)
                                @if ( $task->complete != NULL )
                                    <div class="list-group-item d-flex py-3 align-items-center">
                                        <div class="flex-fill ps-4 overflow-hidden">
                                            <a style=" position: relative; cursor: default;">
                                                <div class="fw-bold mb-0 text-truncate" >
                                                    <p style="font-family: 'Noto Kufi Arabic', sans-serif; ">{{ $task->name }}</p>
                                                </div>
                                                <div class="small text-dark mb-1">التكرار - {{ $task->repeats }}</div>
                                                <div class="left" style=" position: absolute; left: -20px; top: 0px; width: 50px; height: 50px; " >
                                                    <img style=" border: 2px solid #56d9ba8c; border-radius: 25%; padding: 5px; "  src="{{ asset('images/finished.gif') }}" alt="">
                                                </div>
                                            </a>
                                        </div>
                                </div>
                                @endif
                            @endforeach

                        @endif
 
                    </div>
                    
                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="btn btn-outline-primary mt-3 mb-3" type="button" data-bs-toggle="modal" data-bs-target="#newTask">
                {{ __('Create new task') }}
            </button>

            <!-- Modal -->
            <div class="modal fade" id="newTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Create new task') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        
                        <form action="{{ route('task.store') }}" method="POST" class="form">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="عنوان المهمة" required>
                            </div>

                            <div class="form-group mt-4">
                                <input class="form-control" type="number" min="1"  name="repeats" placeholder="عدد مرات التكرار" required>
                            </div>

                            <div class="form-group mt-4">
                                <textarea name="task" id="task" class="w-100" rows="5">نص المهمة</textarea>
                            </div>
                            <input type="hidden" name="group_id" value="{{ $group->id }}" required >


                            <div class="form-group mt-2">
                                <button class="btn btn-outline-success" type="submit" >{{ __('Save') }}</button>
                            </div>
                        </form>
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger" data-bs-dismiss="modal" >{{ __('Close') }}</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>