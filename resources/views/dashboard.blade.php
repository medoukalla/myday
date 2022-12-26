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
                        <h4>{{ __('List of groups') }}</h4>
                        <p>{{ __('Small changes = big achievements') }}</p>
                    </div>


                    <div class="w-row">

                            <div class="table-responsive text-center" dir="rtl">
                                <table class="table  table-bordered table-striped">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Groups') }}</th>
                                            <th>{{ __('Tasks / Acheived') }}</th>
                                            <th>{{ __('Status') }}</th>
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

                        
                        <button class="btn btn-outline-primary mb-3 mt-3" type="button" data-bs-toggle="modal" data-bs-target="#newGroup" >
                            {{ __('Create new group') }}
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="newGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ __('Create new group') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    
                                    
                                    <form action="{{ route('group.store') }}" method="POST" class="form">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="name" placeholder="إسم المجموعة" required>
                                        </div>
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

            </div>
        </div>
    </div>
</x-app-layout>