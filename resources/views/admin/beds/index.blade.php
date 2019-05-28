@extends('admin.index')

@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Категорії кроватей</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('bed.create')}}" class="btn btn-success">Додати</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>К-ть великих кроватей</th>
                            <th>К-ть маленьких кроватей</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($beds as $bed)
                            <tr>
                                <td>{{$bed->id}}</td>
                                <td>{{$bed->large}}</td>
                                <td>{{$bed->small}}</td>

                                <td><a href="{{route('bed.edit', $bed->id)}}" class="fa fa-pencil"></a>

                                    {{Form::open(['route'=>['bed.destroy', $bed->id], 'method'=>'delete'])}}
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