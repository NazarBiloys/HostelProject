@extends('admin.index')



@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <hr class="featurette-divider">
            <p class="lead">Добавилення кімнати</p>
            {{Form::open([
		'route'	=> 'admin.store',
		'files'	=>	true
	        ])}}

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is" value="1" checked>
                <label class="form-check-label" for="exampleCheck1">Наявність кімнати</label>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck11" name="wifi" value="1">
                <label class="form-check-label" for="exampleCheck11">Wi-fi</label>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck111" name="tv" value="1">
                <label class="form-check-label" for="exampleCheck111">Наявність TV</label>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1111" name="air_conditioning" value="1">
                <label class="form-check-label" for="exampleCheck1111">Наявність кондиціонера</label>
            </div>


            <div class="form-group">
                <label for="exampleInputFile">Лицевая картинка</label>
                <input type="file" id="exampleInputFile" name="photo">
            </div>

            <div class="form-row" style="margin-top: 2%;">
                <div class="col-2">
                    <label for="colFormLabels1" class="col-sm-2 col-form-label" ><p class="lead">Тип кроватей в кінматі</p></label>
                </div>
                <div class="col-4">
                    <select name="beds_id" id="colFormLabels1"class="custom-select mr-sm-2" >
                        @foreach($beds as $bed)
                            <option value="{{$bed->id}}">@if($bed->large == 1){{$bed->large}} велика кровать @else {{$bed->large}} великі кроваті @endif та @if($bed->small == 1){{$bed->small}} мала кровать @else {{$bed->small}} малих кроватей @endif</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row" style="margin-top: 2%;">
                <div class="col-2">
                    <label for="colFormLabels1" class="col-sm-2 col-form-label" ><p class="lead">Стан кімнати</p></label>
                </div>
                <div class="col-4">
                    <select name="states_id" id="colFormLabels1"class="custom-select mr-sm-2" >
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->state}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                @foreach($counts as $count)
                <div class="col-1">
                    <label for="colFormLabels" class="col-sm-2 col-form-label" ><p class="lead">@if($count->adult == 1) {{$count->adult}} дорослий @else {{$count->adult}} дорослих @endif та @if($count->children == 0){{$count->children}} дітей @elseif ($count->children == 1) {{$count->children}} дитина @else {{$count->children}} дитини @endif</p></label>
                </div>
                <div class="col-1">
                    <input type="checkbox" id="colFormLabels" class="form-control" name="counts[]" value="{{$count->id}}">
                </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="exampleInputFile1">Ціна</label>
                <input type="number" id="exampleInputFile1" name="price" value="{{old('price')}}">
            </div>


            <div class="form-row">
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">добавити</button>
                </div>
            </div>

            {{Form::close()}}

        </div>
    </section>
    @endsection
