<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <link rel="stylesheet" href="{{ asset('build/assets/styles.css') }}">
                <div class="container">
                    <div class="title-wrap-centre">
                        <h2>لائحة المهام</h2>
                    </div>


                    <div class="w-row">
                        @foreach ($groups as $group)
                            <div class="column w-col w-col-4 mb-3 mt-3">
                                <div class="content-card">
                                    <a href="{{ route('group.show', $group) }}" title="{{ $group->name }}" >
                                        <img src="{{ asset('images/'.$group->image) }}" alt="" class="step-image" style="max-width: 120px">
                                        <div class="content-wrapper">
                                            <h5 class="text_green">{{ $group->name }}</h5>
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