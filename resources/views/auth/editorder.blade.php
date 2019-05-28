@extends('../welcome')


@section('container')

    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            {!! Form::open(['route'=>['orders.update', $order->id]]) !!}
            <input type="hidden" value="{{$order->users_id}}" name="users_id">
            <input type="hidden" value="{{$order->rooms_id}}" name="rooms_id">
            <hr class="featurette-divider">
            <p class="lead">Редагування замовлення</p>
        <div class="form-row">
            <div class="col-4">
                <label for="colFormLabel111" class="col-sm-2 col-form-label" ><p class="lead">Заїзд</p></label>
            </div>
            <div class="col-4">
                <label for="colFormLabel1111" class="col-sm-2 col-form-label" ><p class="lead">Виїзд</p></label>
            </div>
        </div>

        <div class="form-row">
            <div class="col-4">
                <input value="{{$order->from}}" type="date" id="colFormLabel111" name="from" class="form-control"  min="<?php echo date('Y-m-d')?>" max="<?php $str = strtotime(date('Y-m-d')); echo date('Y-m-d',strtotime('+2 month',$str)) ?>" >
            </div>
            <div class="col-4">
                <input value="{{$order->to}}" type="date" id="colFormLabel1111" name="to" class="form-control" min="<?php echo date('Y-m-d')?>" max="<?php $str = strtotime(date('Y-m-d')); echo date('Y-m-d',strtotime('+2 month',$str)) ?>" >
            </div>
        </div>

        <div class="form-row" style="margin-top:2%; ">
            <div class="col-2">
                <button class="btn btn-primary" type="submit">Змінити</button>
            </div>
        </div>
            {!!Form::close()!!}
        </div>
    </section>
@endsection