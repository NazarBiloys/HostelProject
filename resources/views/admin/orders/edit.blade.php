@extends('admin.index')



@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <hr class="featurette-divider">
            <p class="lead">Зміна категорії</p>
            {{Form::open(['route'=>['order.update',$order->id], 'method'=>'put'])}}
            <input type="hidden" value="{{$order->users_id}}" name="users_id">


            <div class="form-row" style="margin-top: 2%;">
                <div class="col-2">
                    <label for="colFormLabels1" class="col-sm-2 col-form-label" ><p class="lead">Кімната</p></label>
                </div>
                <div class="col-4">
                    <select name="rooms_id" id="colFormLabels1"class="custom-select mr-sm-2" >
                        @foreach($rooms as $room)
                            @if($room->id == $order->rooms_id)
                                <option value="{{$room->id}}" style="background-image:url({{asset($room->getImage())}});" selected>{{$room->id}}</option>
                            @else
                                <option value="{{$room->id}}" style="background-image:url({{asset($room->getImage())}});">{{$room->id}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-4">
                    <input type="date" id="colFormLabel111" name="from" class="form-control"  min="<?php echo date('Y-m-d')?>" max="<?php $str = strtotime(date('Y-m-d')); echo date('Y-m-d',strtotime('+2 month',$str)) ?>" value="{{$order->from}}">
                </div>
                <div class="col-4">
                    <input type="date" id="colFormLabel1111" name="to" class="form-control" min="<?php echo date('Y-m-d')?>" max="<?php $str = strtotime(date('Y-m-d')); echo date('Y-m-d',strtotime('+2 month',$str)) ?>" value="{{$order->to}}">
                </div>
            </div>


            <div class="form-row" style="margin-top: 2%;">
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Змінити</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </section>
@endsection
