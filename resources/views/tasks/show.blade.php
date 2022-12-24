<x-app-layout>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="col">
                <div class="card h-100" >
                    <div class="card-header pt-3 pb-3 card-header-divider">
                        <h4 class="fs-5 fw-bold card-title mb-0">
                            <a href="{{ route('group.show', $task->group) }}" title="{{ __('Back to group') }}">{{ $task->group->name }}</a> - {{ $task->name }}</h4>
                    </div>

                    <div class="list-group list-group-flush p-4" id="task-content">

                        
                        <p class="text-center prevent-select" style="font-size:25px; font-family: 'Noto Kufi Arabic', sans-serif; ">{{ $task->task }}</p>

                        <div dir="ltr" class="circle-singleline prevent-select counter-click" data-route="{{ route('task.finished', $task) }}"><span id="counter" data-value='0' >0</span> <span ><small id="target" data-value="{{ $task->repeats }}">/{{ $task->repeats }}</small></span></div> 
                        
                    </div>

                    <div class="list-group text-center list-group-flush p-4" id="task-done" style="display: none;">
                        <img data-src="{{ asset('images/congrats.gif') }}" src="" style=" width: 200px; margin: 20px auto; " alt="">
                        <h5 style=" color: #4ebf9c; ">{{ __('Task is done') }}</h5>
                    </div>

                </div>

                
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){

            // if counter clicked 
            $("div.counter-click").click(function(){

                // get current counter 
                var counter = $('#counter').data('value');

                // get the counter target 
                var target  = $("#target").data('value');

                // get the route to redirect into it when task is finished 
                var route   = $(this).data('route'); 

                // if counter reach the target 
                if ( counter + 1 < target ) {
                    // add 1 to the current counter 
                    var newCounter = counter + 1;

                    // change the counter value 
                    $('#counter').data('value', newCounter);
                    $('#counter').text(newCounter);
                    
                    
                }else {
                    // hide the couter 
                    $("#task-content").fadeOut(500);
                    // show the congrats div 
                    $("#task-done img").attr('src', $("#task-done img").data('src'));
                    $("#task-done").delay(500).fadeIn(500);

                    // add this tasks into completed table 
                    headers: {
                        var csrf = $(this).data('csrf_content')
                    }
                    $.ajax({
                        type: "get",
                        url: route,
                        success: function(e){
                            var delay = 3000; 
                            setTimeout(function(){ window.location = e.redirect; }, delay);
                        }
                    });

                    
                }

            });

        });
    </script>
</x-app-layout>