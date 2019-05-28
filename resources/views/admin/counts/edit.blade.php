@extends('admin.index')



@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <hr class="featurette-divider">
            <p class="lead">Зміна категорії</p>
            {{Form::open(['route'=>['counts.update',$counts->id], 'method'=>'put'])}}

            <div class="form-row">
                <div class="col-2">
                    <label for="colFormLabels" class="col-sm-2 col-form-label" ><p class="lead">Дорослі</p></label>
                </div>
                <div class="col-4">
                    <select name="adult" id="colFormLabels"class="custom-select mr-sm-2" >
                        @for($i = 0; $i < 6; $i++)
                            <option value="{{ $i }}" @if($i == $counts->adult) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col-2">
                    <label for="colFormLabels1" class="col-sm-2 col-form-label" ><p class="lead">Діти</p></label>
                </div>
                <div class="col-4">
                    <select name="children" id="colFormLabels1"class="custom-select mr-sm-2" >
                        @for($i = 0; $i < 6; $i++)
                            <option value="{{ $i }}" @if($i == $counts->children) selected @endif>{{ $i }}</option>
                        @endfor
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
