@extends('admin.index')



@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <hr class="featurette-divider">
            <p class="lead">Добавилення категорії</p>
            {!! Form::open(['route' => 'counts.store']) !!}

            <div class="form-row">
                <div class="col-2">
                    <label for="colFormLabels" class="col-sm-2 col-form-label" ><p class="lead">Дорослі</p></label>
                </div>
                <div class="col-4">
                    <select name="adult" id="colFormLabels"class="custom-select mr-sm-2" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-2">
                    <label for="colFormLabels1" class="col-sm-2 col-form-label" ><p class="lead">Діти</p></label>
                </div>
                <div class="col-4">
                    <select name="children" id="colFormLabels1"class="custom-select mr-sm-2" >
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
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
