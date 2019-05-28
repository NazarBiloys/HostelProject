@extends('admin.index')



@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <hr class="featurette-divider">
            <p class="lead">Добавилення стану</p>
            {!! Form::open(['route' => 'state.store']) !!}


            <div class="form-row">
                <div class="col-2">
                    <label for="scales1" class="col-sm-2 col-form-label" ><p class="lead">Стан</p></label>
                </div>
                <div class="col-4">
                    <input type="text" id="scales1" name="state" class="form-control" value="{{ old('state') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Додати</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </section>
@endsection
