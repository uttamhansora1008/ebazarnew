<!DOCTYPE html>
<html>
@include('frontend.header')
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="{{url('home')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>

		</ol>
	</div>
</div>
<div class="products">
	<div class="container">
            <div class="col-md-4 products-left">
                <div class="new-products animated wow slideInUp" data-wow-delay=".5s">
                    <h3>New Products</h3>
                    <div class="new-products-grids">
                        <div class="new-products-grid">
                            <div class="new-products-grid-left">
                                <a href="{{url('home')}}"><img src="{{ asset('storage/image/6.jpg') }}" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="new-products-grid-right">
                                <h4>yellow gown</h4>
                                <div class="rating">
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                    <p> <span class="item_price">2000</span></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="new-products-grid">
                            <div class="new-products-grid-left">
                                <a href="welcome"><img src="{{ asset('storage/image/26.jpg') }}" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="new-products-grid-right">
                                <h4>zari silk saree</h4>
                                <div class="rating">
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                    <p> <span class="item_price">900</span></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="new-products-grid">
                            <div class="new-products-grid-left">
                                <a href="/welcome"><img src="{{ asset('storage/image/11.jpg') }}" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="new-products-grid-right">
                                <h4>Top lengha</h4>
                                <div class="rating">
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="{{ asset('storage/image/2.png') }}" alt=" " class="img-responsive">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                    <p> <span class="item_price">1500</span></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="men-position animated wow slideInUp" data-wow-delay=".5s">
                    <a href="{{url('home')}}"><img src="{{ asset('storage/image/27.jpg') }}" alt=" " class="img-responsive" /></a>

                </div>
            </div>

		<div class="col-md-8 products-right">
			<div class="products-right-grid">
				<div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
					<div class="sorting">
						<select id="country" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null">Default sorting</option>
							<option value="null">Sort by popularity</option>
							<option value="null">Sort by average rating</option>
							<option value="null">Sort by price</option>
						</select>
					</div>
					<div class="sorting-left">
						<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null">Item on page 9</option>
							<option value="null">Item on page 18</option>
							<option value="null">Item on page 32</option>
							<option value="null">All</option>
						</select>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
					<img src="{{asset('storage/image/18.jpg')}}" alt=" " class="img-responsive" />
					<div class="products-right-grids-position1">
						<h4>2022 New Collection</h4>
						<p>Temporibus autem quibusdam et aut officiis debitis aut rerum
							necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae
							non recusandae.</p>
					</div>
				</div>
			</div>

			<div class="products-right-grids-bottom">
				@foreach($subcategory as $item)
				<div class="col-md-4 products-right-grids-bottom-grid">
					<div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
							<a href="single.html" class="product-image"><img src="{{$item->image}}" height="300px" width="300px" alt=" " class="img-responsive"></a>
							<div class="new-collections-grid1-image-pos products-right-grids-pos">
								<a href="{{url('/product-by-cat/'. $item->id)}}">Quick View</a>
							</div>
							<div class="new-collections-grid1-right products-right-grids-pos-right">
								<div class="rating">
									<div class="rating-left">
										<img src="{{asset('frontend/images/2.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{asset('frontend/images/2.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{asset('frontend/images/2.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{asset('frontend/images/1.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{asset('frontend/images/1.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
						<h4><a href="single.html">{{$item->name}}</a></h4>

						<div class="simpleCart_shelfItem products-right-grid1-add-cart">


							</p>
						</div>
					</div>
				</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
			<nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
				<ul class="pagination paging">
					<li>
						<a href="#" aria-label="Previous">
						   <span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
						<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>

		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //breadcrumbs -->
@include('frontend.footer')

</body>

</html>
