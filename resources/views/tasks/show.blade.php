<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="col">
                <div class="card h-100">
                    <div class="card-header card-header-divider">
                        <h4 class="fs-5 fw-bold card-title mb-0">{{ $task->group->name }} - {{ $task->name }}</h4>
                    </div>
                    <div class="list-group list-group-flush">

                        <pre dir="ltr">
                        @php
                            print_r($task->group)
                        @endphp
                        </pre>

                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>