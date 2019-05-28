@extends('admin.index')

@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Замовлення</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ім'я замовника</th>
                            <th>Почта замовника</th>
                            <th>ID кімнати</th>
                            <th>Фото кімнати</th>
                            <th>Замовлення від</th>
                            <th>Замовлення до</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$order->id}}
                                </td>
                                <td>
                                    {{$order->users->name}}
                                </td>
                                <td>
                                    {{$order->users->email}}
                                </td>
                                <td>
                                    {{$order->rooms->id}}
                                </td>
                                <td>
                                    <img src="{{asset($order->rooms->getImage())}}" alt="Фото кімнати" width="100">
                                </td>
                                <td>
                                    {{$order->from}}
                                </td>
                                <td>
                                    {{$order->to}}
                                </td>
                                <td><a href="{{route('order.edit', $order->id)}}" class="fa fa-pencil"></a>

                                    {{Form::open(['route'=>['order.destroy', $order->id], 'method'=>'delete'])}}
                                    <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                                        <i class="fa fa-remove"></i>
                                    </button>

                                    {{Form::close()}}

                                </td>
                            </tr>
                        @endforeach


                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </section>

@endsection
