@extends('admin.index')



@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <hr class="featurette-divider">
            <p class="lead">Зміна категорії</p>
            {{Form::open(['route'=>['bed.update',$bed->id], 'method'=>'put'])}}

            <div class="form-row">
                <div class="col-2">
                    <label for="colFormLabels" class="col-sm-2 col-form-label" ><p class="lead">К-ть великих кроватей</p></label>
                </div>
                <div class="col-4">
                    <select name="large" id="colFormLabels"class="custom-select mr-sm-2" >
                        {!! $large !!}
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-2">
                    <label for="colFormLabels1" class="col-sm-2 col-form-label" ><p class="lead">К-ть малих кроватей</p></label>
                </div>
                <div class="col-4">
                    <select name="small" id="colFormLabels1"class="custom-select mr-sm-2" >
                        {!! $small !!}
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Змінити</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </section>
@endsection
