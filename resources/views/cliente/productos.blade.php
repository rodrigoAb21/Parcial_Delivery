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
                            <li><a href="{{asset('productos/hamburguesas')}}">Hamburguesas</a></li>
                            <li><a href="{{asset('productos/combos')}}" >Combos</a></li>
                            <li><a href="{{asset('productos/bebidas')}}" >Bebidas</a></li>
                            <li><a href="{{asset('productos/complementos')}}" >Complementos</a></li>
                        </ul>
                    </div>

                    <div class="shipping text-center"><!--shipping-->
                        <img src="{{asset('images/home/anuncio_lateral.jpg')}}" class="img-responsive" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="category-tab"><!--category-tab-->
                    <div class="tab-content">
                        @foreach($producto as $prod)
                            <div class="tab-pane fade active in" id="tshirt" >
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('img/productos/'.$prod -> imagen)}}" class="img-responsive img-thumbnail" alt="{{$prod -> nombre}}" >
                                                <h2>Bs. {{$prod -> precio}}</h2>
                                                <p>{{$prod -> nombre}}</p>
                                                <a href="{{asset('#')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Añadir al carrito</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!--/category-tab-->
                {{$producto -> render()}}
            </div>

        </div>
    </div>
</section>

@endsection 