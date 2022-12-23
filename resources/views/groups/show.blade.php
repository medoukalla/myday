<x-app-layout>
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
                                <a href="{{ route('task.show', $task) }}">
                                    <div class="fw-bold mb-0 text-truncate"><b>{{ $task->name }}</b></div>
                                    <div class="small text-dark mb-1">التكرار - {{ $task->repeats }}</div>
                                    <div class="progress progress-sm">
                                        <div style="width: 74%;" class="progress-bar bg-konkon"></div>
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