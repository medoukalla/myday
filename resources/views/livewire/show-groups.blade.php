<div>
    <div class="w-row" >

        <div class="table-responsive text-center" dir="rtl">
            <table class="table  table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>{{ __('Groups') }}</th>
                        <th>{{ __('Tasks / Acheived') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Delete') }}</th>
                    </tr>
                </thead>
                <tbody>

                    <div>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

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
                            <td>
                                <button wire:click="delete_group({{ $group->id }})" onclick="if ( confirm('هل أنت متأكد من مسح هاته المجموعة ؟') )" class="btn btn-outline-danger">
                                    <b>X</b>
                                </button>
                            </td>
                        </tr>

                    @endforeach

                    
                </tbody>
            </table>
        </div>


        <div class="row mb-5">
            <div class="col-12">
                <b>إضافة مجموعة جديدة : </b> <br>
                @error('status')
                    {{ $message }}
                @enderror
            </div>
            <div class="col-6">
                <input type="text" class="form-control" placeholder="إسم المجموعة" wire:model.lazy='title'>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6 mb-5">
                <button class="btn btn-outline-success" wire:click.prevent="add_group" >{{ __('Create new group') }}</button>
            </div>
        </div>

    
        
        
        <div class="d-none">

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
                            
                            
                            <form method="POST" class="form">
                            
                                <div class="form-group">
                                    <input class="form-control" wire:model.defer="title" type="text" name="name" placeholder="إسم المجموعة" required>
                                </div>
                                <div class="form-group mt-2">
                                    <button class="btn btn-outline-success"  wire:click.prevent="add_group" >{{ __('Save') }}</button>
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
