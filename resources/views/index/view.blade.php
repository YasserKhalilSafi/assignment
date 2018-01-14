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
              padding-bottom: 20px;
              list-style-type: none;
              width: 500px;
              margin: auto;
            }
            .searchDev {
                width: 35%;
                margin: 0 auto;
                background-color: #fff;
                padding-right: 5px;
            }
            label {
                display: block; /* add this */
                padding-top: 10px;
            }
            input[type=text], input[type=number],input[type=date] {
                height: 1.5rem;
                width: 100%;
            }
            input[type=submit] {
              width: 100%;
              border-top:   2px solid;
              border-left:    2px solid ;
              border-right:   2px solid ;
              border-bottom:    2px solid ;
              padding:    10px 20px ;
              font-size:    14px ;
              background-color: #008BFF;
              font-weight:    bold;
              margin-top:10px ;
               margin-bottom:30px ;
            }
        </style>
    </head>
    <body>
        <div>
            <div class="searchDev">
                <h2>Find Offers:</h2>
                {!! Form::open(['url' => 'find']) !!}
                    <label>Destination Name</label>
                    {{ Form::text('destinationName')}}
                    <label>Region Ids</label>
                    {{ Form::text('regionIds')}}
                    <label>Minimum Trip Start Date</label>
                    {{Form::date('minTripStart', null,['class' => 'form-control'])}}
                    <label>Maximum Trip Start Date</label>
                    {{Form::date('maxTripStart', null,['class' => 'form-control'])}}
                    <label>Length Of Stay</label>
                    {{ Form::number('lengthOfStay','',['min'=>0])}}
                    <label>Minimum Guest Rating</label>
                    {{ Form::number('minGuestRating','',['min'=>0,'max'=>5])}}
                    <label>Maximum Guest Rating</label>
                    {{ Form::number('maxGuestRating','',['min'=>0,'max'=>5])}}
                    {{ Form::submit('Search!') }}
                {!! Form::close() !!}
            </div>
            @if ($offers)
                <ul>
                    <div class="offerTitle">
                      <h2>
                          @if (isset($search)) Search Offers @else Avilable Offers @endif
                      </h2>
                    </div>
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






