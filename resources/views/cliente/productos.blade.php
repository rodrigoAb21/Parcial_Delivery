@extends ('index')
@section ('contenido')


<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="category-tab">
                        <ul class="nav nav-stacked">
                            <li><a href="{{asset('#tshirt')}}" data-toggle="tab">T-Shirt</a></li>
                            <li><a href="{{asset('#blazers')}}" data-toggle="tab">Blazers</a></li>
                            <li><a href="{{asset('#sunglass')}}" data-toggle="tab">Sunglass</a></li>
                            <li><a href="{{asset('#kids')}}" data-toggle="tab">Kids</a></li>
                            <li><a href="{{asset('#poloshirt')}}" data-toggle="tab">Polo shirt</a></li>
                        </ul>
                    </div>

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('images/home/shipping.jpg')}}"  />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">

                <div class="category-tab"><!--category-tab-->
                    <div class="tab-content">


                        <div class="tab-pane fade active in" id="tshirt" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('images/home/gallery1.jpg')}}" alt="" />
                                            <h2>$56</h2>
                                            <p>Easy Polo Black Edition</p>
                                            <a href="{{asset('#')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('images/home/recommend1.jpg')}}" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="{{asset('#')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <a class="left recommended-item-control" href="{{asset('#recommended-item-carousel')}}" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="{{asset('#recommended-item-carousel')}}" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

@endsection 