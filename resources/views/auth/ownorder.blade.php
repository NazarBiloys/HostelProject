@extends('../welcome')



@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">

            @foreach($orders as $order)
                <hr class="featurette-divider">
                <div class="row featurette">
                    <div class="col-md-7">
                        <p class="lead">Стан кімнати: {{$order->rooms->states->state}}<br>
                        <p class="lead">Ціна кімнати за одну добу: {{$order->rooms->price}}<br>
                        <p class="lead">Ваше замовлення від {{$order->from}} до {{$order->to}}</p>
                        <p class="lead">Зручності кімнати:
                        </p>
                        @if($order->rooms->wifi == 1)
                            <img src="{{asset('images/wifi.png')}}" id="wifi" alt="wi-fi" title="wi-fi">
                        @endif
                        @if($order->rooms->tv == 1)
                            <img src="{{asset('images/TV.png')}}" id="pool" alt="TV" title="TV">
                        @endif
                        @if($order->rooms->tv == 1)
                            <img src="{{asset('images/air.png')}}" alt="Ait-condition" title="Air-condition">
                        @endif
                        <img src="{{asset('images/swimmingpool.png')}}" alt="Swiming-pool" title="swimimg-pool">
                        <img src="{{asset('images/restaurant.png')}}" alt="restaurant" title="restaurant">
                        <img src="{{asset('images/parking.png')}}" alt="parking" title="parking"> <br>

                        <div class="row featurette">
                            <div class="col-md-3">
                                <a href="{{ route('orders.edit', ['id' => $order->id]) }}">
                                    <button type="submit"  style="background-color: black; color: white">
                                        <div class="row featurette">
                                            <div class="col-md-2">
                                                <i class="fa fa-pencil"></i>
                                            </div>
                                            <div class="col-md-2">
                                                <p class="info">Редагувати</p>
                                            </div>
                                        </div>
                                    </button>
                                </a>
                            </div>


                            <div class="col-md-3">
                        {!!Form::open(['route'=>['orders.destroy', $order->id], 'method'=>'delete'])!!}
                        <button onclick="return confirm('are you sure?')" type="submit" class="delete" style="background-color: black; color: white">
                            <div class="row featurette">
                                <div class="col-md-2">
                                    <i class="fa fa-remove"></i>
                                </div>
                                <div class="col-md-2">
                                    <p class="info">Відмінити</p>
                            </div>
                            </div>
                        </button>
                                {!! Form::close()!!}
                            </div>



                        </div>
                    </div>
                    <div class="col-md-5">
                        <img class="featurette-image img-fluid mx-auto" src="{{asset($order->rooms->getImage())}}" alt="Фото номера">
                    </div>

                </div>
            @endforeach

        </div>
    </section>
@endsection
