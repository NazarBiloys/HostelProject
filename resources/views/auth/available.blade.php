@extends('../welcome')



@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">

           @foreach($rooms as $room)
               @foreach($room as $rom)
                <hr class="featurette-divider">
                <div class="row featurette">
                    <div class="col-md-7">
                        <p class="lead">Стан кімнати: {{$rom->states->state}}<br>
                        <p class="lead">Ціна кімнати за одну добу: {{$rom->price}}<br>
                        <p class="lead">Зручності кімнати:
                        </p>
                        @if($rom->wifi == 1)
                            <img src="{{asset('images/wifi.png')}}" id="wifi" alt="wi-fi" title="wi-fi">
                            @endif
                        @if($rom->tv == 1)
                            <img src="{{asset('images/TV.png')}}" id="pool" alt="TV" title="TV">
                            @endif
                        @if($rom->tv == 1)
                            <img src="{{asset('images/air.png')}}" alt="Ait-condition" title="Air-condition">
                        @endif
                            <img src="{{asset('images/swimmingpool.png')}}" alt="Swiming-pool" title="swimimg-pool">
                            <img src="{{asset('images/restaurant.png')}}" alt="restaurant" title="restaurant">
                            <img src="{{asset('images/parking.png')}}" alt="parking" title="parking"> <br>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="{{$rom->getImage()}}" alt="Generic placeholder image">
                    </div>
                    {!! Form::open(array('route' => array('goorder',$user_id,$rom->id,$from,$to)))!!}
                    <div class="form-row" style="margin-top: 4%;">
                        <div class="col-2">
                            <button class="btn btn-primary" type="submit">Забронювати</button>
                        </div>
                    </div>
                    {!! Form::close()!!}
                </div>
                   @endforeach
               @endforeach

        </div>
    </section>
@endsection
