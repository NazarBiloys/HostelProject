@extends('welcome')

@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            {!! Form::open(['route' => 'sort']) !!}
            <div class="form-row">
                <div class="col-4">
                    <label for="colFormLabels" class="col-sm-2 col-form-label" ><p class="lead">Сортування за</p></label>
                </div>
                <div class="col-4">
                    <select name="sort" id="colFormLabels"class="custom-select mr-sm-2" >
                        <option value="ServiceController@sortroom"><p>Всі</p></option>
                        <option value="ServiceController@price">За ціною</option>
                        <option value="ServiceController@available">Вільні номери</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Вибрати</button>
                </div>
            </div>
            {!! Form::close() !!}
                @foreach($rooms as $room)
                    <hr class="featurette-divider">
                    <div class="row featurette">
                        <div class="col-md-7">
                            <p class="lead">Стан кімнати: {{$room->states->state}}<br>
                            <p class="lead">Ціна кімнати за одну добу: {{$room->price}}<br>
                            <p class="lead">Зручності кімнати:
                            </p>
                            @if($room->wifi == 1)
                                <img src="{{asset('images/wifi.png')}}" id="wifi" alt="wi-fi" title="wi-fi">
                            @endif
                            @if($room->tv == 1)
                                <img src="{{asset('images/TV.png')}}" id="pool" alt="TV" title="TV">
                            @endif
                            @if($room->tv == 1)
                                <img src="{{asset('images/air.png')}}" alt="Ait-condition" title="Air-condition">
                            @endif
                            <img src="{{asset('images/swimmingpool.png')}}" alt="Swiming-pool" title="swimimg-pool">
                            <img src="{{asset('images/restaurant.png')}}" alt="restaurant" title="restaurant">
                            <img src="{{asset('images/parking.png')}}" alt="parking" title="parking"> <br>
                        </div>
                        <div class="col-md-5">
                            <img class="featurette-image img-fluid mx-auto" src="{{asset($room->getImage())}}" alt="Generic placeholder image">
                        </div>
                    </div>
                @endforeach

        </div>
    </section>
@endsection
