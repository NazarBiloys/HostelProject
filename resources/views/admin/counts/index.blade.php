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
                        <a href="{{route('counts.create')}}" class="btn btn-success">Додати</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Кількість дорослих</th>
                            <th>Кількість дітей</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($counts as $count)
                            <tr>
                                <td>{{$count->id}}</td>
                                <td>
                                   {{$count->adult}}
                                </td>
                                <td>
                                    {{$count->children}}
                                </td>

                                <td><a href="{{route('counts.edit', $count->id)}}" class="fa fa-pencil"></a>

                                    {{Form::open(['route'=>['counts.destroy', $count->id], 'method'=>'delete'])}}
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