<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="container">


                    <div class="w-row" dir="ltr">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle mt-3 ml-3 " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              {{ __('Quick access') }}
                            </button>
                            <ul class="dropdown-menu " >
                              <li><a class="dropdown-item mb-2 mt-1" dir="rtl" href="{{ route('user.index') }}">{{ __('Users') }}</a></li>
                              <li><a class="dropdown-item mb-2 mt-1" dir="rtl" href="{{ route('dashboard') }}">{{ __('Groups') }}</a></li>
                            </ul>
                          </div>
                    </div>

                    @if ( Session::has('success') )
                    <div class="alert alert-success">{{ Session::get('success') }}</div>    
                    @elseif ( Session::has('error') )
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif

                    <div class="title-wrap-centre pt-3">
                        <h4>{{ $user->name }}</h4>
                        <p>{{ __('List of completed tasks today') }}</p>
                    </div>


                    <div class="w-row">

                            <div class="table-responsive text-center" dir="rtl">
                                <table class="table  table-bordered table-striped">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Repeats') }}</th>
                                            <th>{{ __('Group') }}</th>
                                            <th>{{ __('Time') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($user->complete as $complete)

                                            <tr style="font-size: 18px; line-height: 40px;">
                                                <td >{{ $complete->task->name }}</td>
                                                <td>{{ $complete->task->repeats }}</td>
                                                <td>{{ $complete->group->name }}</td>

                                                <td>
                                                    {{ $complete->created_at->diffForHumans() }}
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


















