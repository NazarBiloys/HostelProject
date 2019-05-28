@extends('welcome')


@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <p class="lead">Адреса: вулиця Шпаковича, 5
                        Бар
                        Вінницька область
                        23001</p>
                    <p class="lead">Телефон: +38098312931</p>
                    <p class="lead"><a>Email: perluna@gmail.com</a></p>
                </div>
                <div class="col-md-5" id="map">

                </div>
            </div>

            <hr class="featurette-divider">

            <p class="lead">Відправити литса на почту, в разі винекнення неполадок</p>
            {!! Form::open(['url' => '/send']) !!}


            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ім'я відправника</label>
                    <input type="text" id="colFormLabels1" name="name" class="form-control" value="{{old('name')}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Почта відправника</label>
                    <input type="text" id="colFormLabels1" name="email" class="form-control" value="{{old('e-mail')}}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Повідомлення</label>
                    <textarea name="messages" id="" cols="30" rows="10" class="form-control" >{{old('message')}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Відіслати</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </section>
    @endsection

