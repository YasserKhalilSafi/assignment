<!doctype html>
    <head>
        <title>Expedia Assignment</title>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .content {
                text-align: center;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            * {margin: 0; padding: 0;}
            div {
              margin: 20px;
            }
            ul {
              padding-top: 50px;
              list-style-type: none;
              width: 500px;
              margin: auto;
            }
            h5 {
              font: bold 13px/1.5 Helvetica, Verdana, sans-serif;
            }
            li img {
              float: left;
              margin: 0 20px 0 0;
            }
            li p {
              font: 200 12px/1.5 Georgia, Times New Roman, serif;
            }
            li {
              padding: 10px;
              overflow: auto;
            }
            li:hover {
              background: #eee;
              cursor: pointer;
            }
            .screenDiv {
              position: fixed;
              top: 50%;
              left: 50%;
              margin-top: -50px;
              margin-left: -100px;
            }
            .offerTitle {
              text-align: center;
              top: 10%;
              left: 50%;
              margin-top: -50px;
              margin-left: -100px;
            }
        </style>
    </head>
    <body>
        <div>
            @if ($offers)
                <ul>
                    <div class="offerTitle"><h2>Avilable Offers</h2></div>
                    @foreach($offers->Hotel as $hotel)
                        <li>
                            <img alt="Offer" src="{{$hotel->hotelInfo->hotelImageUrl}}">
                            <h5>{{$hotel->hotelInfo->hotelName}}</h5>
                            <h5>{{ $hotel->hotelPricingInfo->originalPricePerNight }}$<span>/ Night</span></h5>
                            <h5>Rating : {{ $hotel->hotelInfo->hotelStarRating}}<span>/5</span></h5>
                            <h5>Total Rating : {{ $hotel->hotelInfo->hotelReviewTotal}}</h5>
                            <div class="content">
                                <a href="#">BOOK THIS OFFER</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="screenDiv">
                    <h2>NO RESULTS FOUND</h2>
                </div>
            @endif
        </div>
    </body>
</html>






