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
                        <h4>{{ __('List of users') }}</h4>
                        <p>{{ __('Small changes = big achievements') }}</p>
                    </div>


                    <div class="w-row">

                            <div class="table-responsive text-center" dir="rtl">
                                <table class="table  table-bordered table-striped">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('User name') }}</th>
                                            <th>{{ __('Completed (today)') }}</th>
                                            <th>{{ __('Status') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                            @foreach ($users as $user)

                                            
                                            <tr style="font-size: 18px; line-height: 40px;">
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>
                                                    <a class="text-dark" href="">
                                                        {{ $user->name }}
                                                    </a>
                                                </td>
                                                <td>{{ count($user->complete) }}
                                                </td>
                                            
                                                <td>
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