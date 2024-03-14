{{-- <div class="container mt-5 mb-5 hero-simple" >
    <div class="row">
        <div class="col-md-6 my-auto"><img type="img" data-type="image" src="https://res.cloudinary.com/gridbox/image/upload/v1619262070/images/wfh_10_mtskao.svg" alt=""
                class="mt-4 mt-md-0 img-fluid" /></div>
        <div class="col-md-6">
            <h1 data-type="header" class="display-4">Your Awesome Product
            </h1>
            <p data-type="paragraph" data-config-id="description" class="lead text-muted mb-4">Something short and leading about the collection below—its contents, the creator, etc. Make it
                short and sweet, but not too short so folks don’t simply skip over it entirely.
            </p><a href="#" id="io1e3" class="btn btn-primary me-2">Sign up for free</a><a href="#" id="i7gsd" class="btn btn-link">Learn more</a>
        </div>
    </div>
</div>
<div class="row"></div> --}}
<!-- Slider AREA -->
<div class="slider-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3">	
                <div class="slider-left">
                    <h2>GIỚI THIỆU SẢN PHẨM</h2>
                    <div id="owl-slider-left" class="owl-carousel">
                        {{-- STAR OFFER --}}
                        @if(!empty($offer))
                        @foreach ($offer as $item)
                        <div class="slider-left-carousel">
                            <div class="slider-left-product">
                                <a href="{{route('showProductDetailById',['id'=>$item->id])}}"><img src="{{asset('')}}{{$item->pro_avatar}}" alt="product"></a>
                                <div class="slider-product-button">
                                    <p class="add-chart"><a href="{{route('showProductDetailById',['id'=>$item->id])}}">Add To Cart</a></p>
                                </div>
                            </div>
                            <p class="view-details"><a href="{{route('showProductDetailById',['id'=>$item->id])}}">View details</a></p>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="slider-left-carousel">
                            <div class="slider-left-product">
                                <a href="#"><img src="{{asset('img/product/chacua.webp')}}" alt="product"></a>
                                <div class="slider-product-button">
                                    <p class="add-chart"><a href="#">Add To Cart</a></p>
                                </div>
                            </div>
                            <p class="view-details"><a href="#">View details</a></p>
                        </div> --}}
                        {{-- END OFFER --}}
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9">
                <!-- Main Slider -->
                <div class="main-slider">
                    <div class="slider">
                        <div id="mainSlider" class="nivoSlider slider-image">
                            <img src="{{asset('img/product/banner01.jpg')}}" alt="main slider" title="#htmlcaption1"/>
                            <!--<img src="{{asset('img/product/banner09.png')}}" alt="main slider" title="#htmlcaption2"/>-->
                        </div>
                        <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
                            <div class="slider-progress"></div>									
                            <div class="slide-text">
                                <div class="middle-text">
                                    <div class="cap-title wow slideInRight" data-wow-duration=".9s" data-wow-delay="0s">
                                        <h2></h2>
                                    </div>
                                    <div class="cap-dec wow slideInRight" data-wow-duration="1.1s" data-wow-delay="0s">
                                        <!--<p>Save Up to</p>-->
                                        <!--<h1>35% Off</h1>-->
                                    </div>	
                                    <div class="cap-readmore animated bounceIn" data-wow-duration="1.5s" data-wow-delay=".5s">
                                        <!--<a href="#">View details</a>-->
                                    </div>	
                                </div>	
                            </div>
                            {{-- <div class="slide-image">
                                <img class="wow slideInUp"  data-wow-duration="1.5s" data-wow-delay="0s" src="img/slider/si1.png" alt="slider caption" />
                            </div> --}}
                        </div>
                        <div id="htmlcaption2" class="nivo-html-caption slider-caption-2">
                            <div class="slider-progress"></div>					
                            <div class="slide-text">
                                <div class="middle-text">
                                    <div class="cap-title wow slideInRight" data-wow-duration=".9s" data-wow-delay="0s">
                                        <!--<h2>New Collection</h2>-->
                                    </div>
                                    <div class="cap-dec wow slideInRight" data-wow-duration="1.1s" data-wow-delay="0s">
                                        <!--<p>Save Up to</p>-->
                                        <!--<h1>37% Off</h1>-->
                                    </div>	
                                    <div class="cap-readmore animated bounceIn" data-wow-duration="1.5s" data-wow-delay=".5s">
                                        <!--<a href="#">Shop Now</a>-->
                                    </div>	
                                </div>	
                            </div>
                            {{-- <div class="slide-image slide2-image">
                                <img class="wow slideInUp"  data-wow-duration="1.5s" data-wow-delay="0s" src="{{asset('img/product/chacua.webp')}}" alt="slider caption" />
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>