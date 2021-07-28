@extends('frontend.main')
@section('section')

<div class="layout_padding-2">
    <div class="container">
        @foreach($product_dets as $product_det)
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="img_box">
                    <figure><img src="{{ asset('storage/' . $product_det['image'] ) }}" alt="#" /></figure>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 product_detail_side">
                <div class="abotext_box">
                    <div class="product-heading">
                        <h2>{{ $product_det['name'] }}</h2>
                    </div>
                    <div class="product-detail-side">
                        <span><del>${{ $product_det['price'] }}</del></span><span
                            class="new-price">${{ $product_det['price2'] }}</span>
                        <span class="rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        </span>
                        <span class="review">(5 customer review)</span>
                    </div>
                    <div class="detail-contant">
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu
                            libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend
                            leo.
                            <br><span class="stock">2 in stock</span>
                        </p>
                        <form class="cart" method="post" action="/store">
                        @csrf
                            <div class="quantity">
                                <input step="1" min="1" max="5" name="quantity" value="1" title="Qty"
                                    class="input-text qty text" size="4" type="number">
                                <input name="product_id" type="text" value="{{ $product_det['id'] }}" hidden>
                                <input name="product_name" type="text" value="{{ $product_det['name'] }}" hidden>
                                <input name="product_price" type="text" value="{{ $product_det['price'] }}" hidden>
                            </div>
                            <button type="submit" class="bt_main">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="tab_bar_section">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab"
                                    href="#description">Description</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#reviews">Reviews ({{ count($comments) }})</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="description" class="tab-pane active">
                                <div class="product_desc">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac elementum
                                        elit. Morbi eu arcu ipsum. Aliquam lobortis accumsan quam ac convallis. Fusce
                                        elit mauris, aliquet at odio vel, convallis vehicula nisi. Morbi vitae porttitor
                                        dolor. Integer eget metus sem. Nam venenatis mauris vel leo pulvinar, id rutrum
                                        dui varius. Nunc ac varius quam, non convallis magna. Donec suscipit commodo
                                        dapibus.
                                        <br>
                                        <br>Vestibulum et ullamcorper ligula. Morbi bibendum tempor rutrum. Pelle tesque
                                        auctor purus id molestie ornare.Donec eu lobortis risus. Pellentesque sed
                                        aliquam lorem. Praesent pulvinar lorem vel mauris ultrices posuere. Phasellus
                                        elit ex, gravida a semper ut, venenatis vitae diam. Nullam eget leo massa.
                                        Aenean eu consequat arcu, vitae scelerisque quam. Suspendisse risus turpis,
                                        pharetra a finibus vitae, lobortis et mi.
                                    </p>
                                </div>
                            </div>
                            <div id="reviews" class="tab-pane fade">
                                <div class="product_review">
                                <p hidden >{{ $t=0 }}</p>
                                    @foreach( $comments as $comment )
                                    <h3>Reviews ({{ $t+=1 }})</h3>
                                    <div class="commant-text row">
                                        <div class="col-lg-2 col-md-2 col-sm-4">
                                            <div class="profile">
                                                <img class="img-responsive" src="{{asset( 'images/lllll.png' )}}" alt="#">
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                            <h5>Ravi</h5>
                                            <p><span class="c_date">{{ $comment['created_at']->format('d-m-Y') }}</span> | <span><a rel="nofollow"
                                                        class="comment-reply-link" href="#">Reply</a></span></p>
                                            <span class="rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                            </span>
                                            <p class="msg">{{ $comment['comment'] }}</p>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="full review_bt_section">
                                                <div class="float-right">
                                                    <a class="bt_main" data-toggle="collapse" href="#collapseExample"
                                                        role="button" aria-expanded="false"
                                                        aria-controls="collapseExample">Leave a Review</a>
                                                </div>
                                            </div>
                                            <div class="full">
                                                <div id="collapseExample" class="full collapse commant_box">
                                                    <form action="/comment" method="post">
                                                        @csrf
                                                        <textarea class="form-control animated" cols="50"
                                                            id="new-review" name="comment"
                                                            placeholder="Enter your review here..."
                                                            required=""></textarea>
                                                        <input hidden name="product_id" value="{{ $product_det->id }}">
                                                        <div class="full_bt center">
                                                            <button class="bt_main" type="submit">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
