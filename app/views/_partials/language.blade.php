<div class="btn-group lang-selector">
	<div class="btn-group lang-selector">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if(Request::segment(1)=='en')
		   <img src="{{assets_url('images/flags/en.png')}}" alt="English"> EN <span class="caret"></span>
		@else
			<img src="{{assets_url('images/flags/id.png')}}" alt="Bahasa Indonesia"> ID <span class="caret"></span>
		@endif
		</button>
		<ul class="dropdown-menu">
          <li>
            <a href="{{URL::to(getHereWithLang('id'))}}"><img src="{{assets_url('images/flags/id.png')}}" alt="Bahasa Indonesia"> ID</a>
            
          </li>
          <li>
            <a href="{{URL::to(getHereWithLang('en'))}}"><img src="{{assets_url('images/flags/en.png')}}" alt="English"> EN</a>
          </li>
        </ul>
    </div>
</div>