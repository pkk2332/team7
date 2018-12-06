            @if(Session::has('msg'))
               <div class="alert {{session('type')}} alert-dismissible fade show" role="alert">
			  <h5>{{session('msg')}}</h5> 
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
               @endif
