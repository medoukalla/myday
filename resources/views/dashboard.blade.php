<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <link rel="stylesheet" href="{{ asset('build/assets/styles.css') }}">
                <div class="container">


                    @if ( Session::has('success') )
                    <div class="alert alert-success">{{ Session::get('success') }}</div>    
                    @elseif ( Session::has('error') )
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    <div class="title-wrap-centre pt-3">
                        <h4>لائحة المهام</h4>
                    </div>


                    <div class="w-row">

                            <div class="table-responsive text-center" dir="rtl">
                                <table class="table  table-bordered table-striped">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>المجموعة</th>
                                            <th>المهام / المنجزة</th>
                                            <th>الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            @foreach ($groups as $group)

                                            
                                            <tr style="font-size: 18px; line-height: 40px;">
                                                <th scope="row">{{ $group->id }}</th>
                                                <td>
                                                    <a class="text-dark" href="{{ route('group.show', $group) }}">
                                                        {{ $group->name }}
                                                    </a>
                                                </td>
                                                <td>{{ count($group->tasks).' / '.count($group->complete) }}</td>
                                            
                                                <td>
                                                    @if ( count( $group->complete ) < count ( $group->tasks ) )
                                                        <div class="left" style="width: 45px; height: 45px; margin: 0 auto;" >
                                                            <a href="{{ route('group.show', $group) }}">
                                                                <img src="{{ asset('images/waiting.gif') }}" alt="">
                                                            </a>
                                                        </div>
                                                    @else 
                                                        <div class="left" style="width: 45px; height: 45px; margin: 0 auto;" >
                                                            <a href="{{ route('group.show', $group) }}">
                                                                <img  src="{{ asset('images/finished.gif') }}" alt="">
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>

                                        @endforeach

                                        
                                    </tbody>
                                </table>
                            </div>
                      
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>