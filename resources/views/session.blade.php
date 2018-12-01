            @if(Session::has('msg'))
                <div class="alert {{session('type')}}">
						{{session('msg')}}
               </div>
               @endif
