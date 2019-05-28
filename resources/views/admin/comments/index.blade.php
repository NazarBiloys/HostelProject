@extends('admin.index')

@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Відгуки</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Текст</th>
                            <th>Ім'я автора</th>
                            <th>Почта автора</th>
                            <th>Дія</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>
                                    {{$comment->comment}}
                                </td>
                                <td>
                                    {{$comment->users->name}}
                                </td>
                                <td>
                                    {{$comment->users->email}}
                                </td>

                                <td>
                                    @if($comment->publish == 1)
                                        <a href="{{route('admins.toogle',['id' => $comment->id])}}" class="fa fa-lock"></a>
                                    @else
                                        <a href="{{route('admins.toogle',['id' => $comment->id])}}" class="fa fa-thumbs-o-up"></a>
                                    @endif

                                    {{Form::open(['route'=>['admins.destroy', $comment->id], 'method'=>'delete'])}}
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