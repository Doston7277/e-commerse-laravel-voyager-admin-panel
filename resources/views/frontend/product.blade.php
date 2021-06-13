@extends('frontend.main')
@section('section')

<div class="contactus">
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="title">
                    <h2>Our Product</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ourproduct">
  <div class="container">
     <div class="row product_style_3" ">
      <!-- product -->
      @foreach($products as $product)
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
        <div class="full product">
          <div class="product_img">
            <div class="center"> <img src="{{ asset('storage/' . $product['image'] ) }}" alt="#"/>
              <div class="overlay_hover"> <a class="add-bt" href="/product/{{ $product['id'] }}">+ Add to cart</a> </div>
            </div>
          </div>
          <div class="product_detail text_align_center">
            <p class="product_price">${{ $product['price2'] }}<span class="old_price">${{ $product['price'] }}</span></p>
            <p class="product_descr">{{ $product['name'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
      <!-- end product -->

    </div>
  </div>
</div>

@endsection
