<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
      <li>
        <a href="{{ URL::route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
      </li>
	  <li><a href="javascript:void(0)"><i class="fa fa-television fa-fw"></i> Corporate Entertainer <span class="fa arrow"></span></a>
		<ul class="nav nav-second-level collapse in">
			<li><a href="{{ URL::route('admin.client',array('url_category'=>'entertainer')) }}"><i class="fa fa-users fa-fw"></i> Clients </a></li>
			<li><a href="{{ URL::route('admin.testimony',array('url_category'=>'entertainer')) }}"><i class="fa fa-commenting-o fa-fw"></i> Testimonials </a></li>
			<li><a href="{{ URL::route('admin.general',array('url_category'=>'entertainer')) }}"><i class="fa fa-clipboard fa-fw"></i> General Info</a></li>
		</ul>
	  </li>
	  <li><a href="javascript:void(0)"><i class="fa fa-bullhorn fa-fw"></i> Corporate Speaker <span class="fa arrow"></span></a>
		<ul class="nav nav-second-level collapse in">
			<li><a href="{{ URL::route('admin.client',array('url_category'=>'speaker')) }}"><i class="fa fa-users fa-fw"></i> Clients </a></li>
			<li><a href="{{ URL::route('admin.testimony',array('url_category'=>'speaker')) }}"><i class="fa fa-commenting-o fa-fw"></i> Testimonials </a></li>
			<li><a href="{{ URL::route('admin.general',array('url_category'=>'speaker')) }}"><i class="fa fa-clipboard fa-fw"></i> General Info</a></li>
		</ul>
	  </li>
	  <li><a href="javascript:void(0)"><i class="fa fa-certificate fa-fw"></i> One on One Coaching & Mentoring <span class="fa arrow"></span></a>
		<ul class="nav nav-second-level collapse in">
			<li><a href="{{ URL::route('admin.client',array('url_category'=>'one-on-one')) }}"><i class="fa fa-users fa-fw"></i> Clients </a></li>
			<li><a href="{{ URL::route('admin.testimony',array('url_category'=>'one-on-one')) }}"><i class="fa fa-commenting-o fa-fw"></i> Testimonials </a></li>
			<li><a href="{{ URL::route('admin.general',array('url_category'=>'one-on-one')) }}"><i class="fa fa-clipboard fa-fw"></i> General Info</a></li>
		</ul>
	  </li>
	  <li><a href="javascript:void(0)"><i class="fa fa-cubes fa-fw"></i> Products <span class="fa arrow"></span></a>
		<ul class="nav nav-second-level collapse in">
			<li><a href="{{ URL::route('admin.product') }}"><i class="fa fa-cubes fa-fw"></i> Product List</a></li>
			<li><a href="{{ URL::route('admin.magic-question') }}"><i class="fa fa-magic fa-fw"></i> Magic Question</a></li>
			<li><a href="{{ URL::route('admin.product-order') }}"><i class="fa fa-file-text-o fa-fw"></i> Product Order</a></li>
			<li><a href="{{ URL::route('admin.promo') }}"><i class="fa fa-gift fa-fw"></i> Popup Promo</a></li>
		</ul>
	  </li>
	  <li><a href="{{ URL::route('admin.imaji') }}"><i class="fa fa-youtube fa-fw"></i> Lintas Imaji</a></li>
	  <li><a href="{{ URL::route('admin.general',array('url_category'=>'general')) }}"><i class="fa fa-clipboard fa-fw"></i> General Info</a></li>
      <li><a href="{{ URL::route('admin.contact-us') }}"><i class="fa fa-file-text-o fa-fw"></i> Contact Us</a></li>
	</ul>
  </div>
</div>