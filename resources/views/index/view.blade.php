<div class="content"><!-- Content Section -->
    <div class="explore-rooms margint30 clearfix"><!-- Explore Rooms Section -->
        <div class="container">
            <div class="row">
                @if( $offers == null )
                    <div class="title-style-2 marginb40 pos-center">
                        <h2> ... SORRY NO RESULTS FOUND! ...</h2>
                        <hr>
                    </div>
                @else
                    @foreach($offers->Hotel as $hotel)
                        <div class="col-lg-4 col-sm-6">
                            <div class="home-room-box" style="margin-bottom: 85px;">
                                <div class="room-image">
                                    <img alt="Room Images" class="img-responsive" style="height: 223px; width: 360px" src="{{$hotel->hotelInfo->hotelImageUrl}}">
                                    <div class="home-room-details">
                                        <h5><a href="#">{{$hotel->hotelInfo->hotelName}}</a></h5>
                                        <div class="pull-left">
                                            <ul>
                                                <li><i class="fa fa-calendar"></i></li>
                                                <li><i class="fa fa-flask"></i></li>
                                                <li><i class="fa fa-umbrella"></i></li>
                                                <li><i class="fa fa-laptop"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="room-details" style="height: 130px;">
                                    <p>{{$hotel->hotelInfo->description}}</p>
                                </div>
                                <div class="room-bottom">
                                    <div class="pull-left"><h4>{{ $hotel->hotelPricingInfo->originalPricePerNight }}$<span class="room-bottom-time">/ Day</span></h4></div>
                                    <div class="pull-right">
                                        <div class="button-style-1">
                                            <a href="#">BOOK NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>