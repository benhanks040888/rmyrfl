<div class="modal modal-promo fade" id="promoModal" tabindex="-1" role="dialog" aria-labelledby="promoModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="js-promo-popup-close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> Close</button>
        <h4 class="modal-title" id="promoModalLabel">Promotion</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <div class="product-image">
			  @if(isset($promoPopup['photo']))
              <img src="{{URL::to($promoPopup['photo'])}}" alt="{{$promoPopup['title']}}">
			  @endif
            </div>
          </div>
          <div class="col-sm-6">
			<h3>{{$promoPopup['title'] or ''}}</h3>
            
			{{$promoPopup['content']}}
			
            <p class="text-muted">Isi dulu nama & alamat email Anda:</p>

            <form action="{{URL::route('site.promo.submit',array('lang'=> Request::segment(1)))}}" method="POST">
			  {{Form::token()}}
			  <input type="hidden" name="url_source" value="{{URL::current()}}"/>
              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nama" required>
              </div>

              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
              </div>
			  <div class="form-group">
			  {{ Form::captcha() }}
			   </div>
              <input type="submit" value="Submit" class="btn btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
	$('#promoModal').modal('show');
	$('#js-promo-popup-close').click(function(){
		$.post( "{{URL::route('site.promo.dismiss',array('lang'=> Request::segment(1)))}}", function( data ) {
		  return false;
		});
	});
</script>