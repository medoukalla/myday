<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="display: none;">
                <link rel="stylesheet" href="{{ asset('build/assets/styles.css') }}">
                <div class="container">
                    <div class="title-wrap-centre">
                        <h4>{{ $group->name }}</h4>
                    </div>

                    <label for="">حاول أكثر لنيل أجر أكبر</label>
                    <div class="progress" >
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                            role="progressbar" 
                            aria-label="Animated striped example" 
                            aria-valuenow="100" 
                            aria-valuemin="0" 
                            aria-valuemax="100" 
                            style="width: 80%">
                        </div>
                    </div>

                    <div class="w-row">
                        @foreach ($tasks as $task)
                            <div class="column w-col w-col-4 mb-3 mt-3">
                                <div class="content-card">
                                    <a href="{{ route('task.show', $task) }}" title="{{ $task->name }}" >
                                        <img src="{{ asset('images/'.$task->image) }}" alt="" class="step-image" style="max-width: 120px">
                                        <div class="content-wrapper">
                                            <h5 class="text_green">{{ $task->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                      
                    </div>

                </div>

            </div>

            <!-- This script got from frontendfreecode.com -->

            <div class="col">
                <div class="card h-100">
                    <div class="card-header card-header-divider">
                        <h4 class="fs-5 fw-bold card-title mb-0">{{ $group->name }}</h4>
                    </div>
                    <div class="list-group list-group-flush">
                        @foreach ($tasks as $task)
                            
                        <div class="list-group-item d-flex py-3 align-items-center">

                            <div class="flex-fill ps-4 overflow-hidden">
                                <a href="">
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