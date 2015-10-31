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
              <img src="{{URL::to($promoPopup['photo'])}}" alt="{{$promoPopup['product']}}">
			  @endif
            </div>
          </div>
          <div class="col-sm-6">
			<h3>{{$promoPopup['label'] or ''}}</h3>
            <p>{{$promoPopup['product']}}</p>
			<a href="{{URL::route('site.product.buy',array('lang'=> Request::segment(1),'slug'=>$promoPopup['slug']))}}" class="btn btn-primary">{{trans('product.buy')}}</a>
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