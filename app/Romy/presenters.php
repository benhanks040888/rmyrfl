<?php

View::composer('_partials.free-gift-modal', function ($view)
{
  $promo = getPromoPopupData(Request::segment(1));
  $view->with('promoPopup', $promo);
});