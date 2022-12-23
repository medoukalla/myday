<x-app-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="col">
                <div class="card h-100">

                    <div class="card-header card-header-divider">
                        <h4 class="fs-5 fw-bold card-title mb-0">{{ $group->name }}</h4>
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach ($group->tasks as $task)
                            
                            <div class="list-group-item d-flex py-3 align-items-center">

                                <div class="flex-fill ps-4 overflow-hidden">
                                    <a href="{{ route('task.show', $task) }}" style=" position: relative; ">
                                        <div class="fw-bold mb-0 text-truncate" ><p style="font-family: 'Noto Kufi Arabic', sans-serif; ">{{ $task->name }}</p></div>
                                        <div class="small text-dark mb-1">التكرار - {{ $task->repeats }}</div>
                                        
                                        <div class="left" style=" position: absolute; left: -20px; top: 0px; width: 50px; height: 50px; " >
                                            <img style=" border: 2px solid #56d9ba8c; border-radius: 25%; padding: 5px; "  src="{{ asset('images/finished.gif') }}" alt="">
                                        </div>
                                    </a>
                                </div>

                            </div>

                        @endforeach

                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>