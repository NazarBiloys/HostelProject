@extends('admin.index')

@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Кімнати</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.create')}}" class="btn btn-success">Додати</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наявність</th>
                            <th>Кількість дорослих</th>
                            <th>Кількість дітей</th>
                            <th>Статус кімнати</th>
                            <th>Wi-fi</th>
                            <th>TV</th>
                            <th>Large bed</th>
                            <th>Small bed</th>
                            <th>Кондиціонер</th>
                            <th>Ціна</th>
                            <th>Фото</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{$room->id}}</td>
                                <td>
                                    @if($room->is == 1)
                                        <span class="fa fa-check"></span>
                                        @else
                                        <span class="fa fa-ban"></span>
                                        @endif
                                </td>
                                <td>
                                    {{$room->count('adult')}}
                                </td>
                                <td>
                                    {{$room->count('children')}}
                                </td>
                                <td>
                                    {{$room->states->state}}
                                </td>
                               <td>
                                   @if($room->wifi == 1)
                                       <span class="fa fa-check"></span>
                                   @else
                                       <span class="fa fa-ban"></span>
                                   @endif
                               </td>
                                <td>
                                    @if($room->tv == 1)
                                        <span class="fa fa-check"></span>
                                    @else
                                        <span class="fa fa-ban"></span>
                                        @endif
                                </td>
                                <td>
                                    {{$room->beds['large']}}
                                </td>
                                <td>
                                    {{$room->beds['small']}}
                                </td>
                                <td>
                                    @if($room->air_conditioning === 1)
                                        <span class="fa fa-check"></span>
                                    @else
                                        <span class="fa fa-ban"></span>
                                        @endif
                                </td>
                                <td>
                                    {{$room->price}}
                                </td>
                                <td>
                                    <img src="{{$room->getImage()}}" alt="" width="100">
                                </td>
                                <td><a href="{{route('admin.edit', $room->id)}}" class="fa fa-pencil"></a>

                                    {{Form::open(['route'=>['admin.destroy', $room->id], 'method'=>'delete'])}}
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