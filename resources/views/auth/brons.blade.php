@extends('../welcome')


@section('container')
    <section id="container" >
        <div class="container" style="margin-top: 5%; margin-bottom: 5%">
            <hr class="featurette-divider">
            <p class="lead">Бронювання</p>
                    <div class="card-body">
                        <form method="POST" action="{{ route('order') }}">
                            {{csrf_field()}}


                            <div class="form-row" style="margin-top: 2%;">
                                <div class="col-2">
                                    <label for="colFormLabels11" class="col-sm-2 col-form-label" ><p class="lead">Кількість дорослих</p></label>
                                </div>

                                <div class="col-1">
                                    <select name="counts_adult" id="colFormLabels11"class="custom-select mr-sm-2" >
                                        @foreach($adults as $adult)
                                            <option value="{{$adult}}">{{$adult}}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="col-2">
                                    <label for="colFormLabels111" class="col-sm-2 col-form-label" ><p class="lead">Кількість дітей</p></label>
                                </div>

                                <div class="col-1">
                                    <select name="counts_children" id="colFormLabels111"class="custom-select mr-sm-2" >
                                        @foreach($childrens as $children)
                                            <option value="{{$children}}">{{$children}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-4">
                                    <label for="colFormLabel111" class="col-sm-2 col-form-label" ><p class="lead">Заїзд</p></label>
                                </div>
                                <div class="col-4">
                                    <label for="colFormLabel1111" class="col-sm-2 col-form-label" ><p class="lead">Виїзд</p></label>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-4">
                                    <input type="date" id="colFormLabel111" name="from" class="form-control"  min="<?php echo date('Y-m-d')?>" max="<?php $str = strtotime(date('Y-m-d')); echo date('Y-m-d',strtotime('+2 month',$str)) ?>" >
                                </div>
                                <div class="col-4">
                                    <input type="date" id="colFormLabel1111" name="to" class="form-control" min="<?php echo date('Y-m-d')?>" max="<?php $str = strtotime(date('Y-m-d')); echo date('Y-m-d',strtotime('+2 month',$str)) ?>" >
                                </div>
                            </div>

                            <div class="form-row" style="margin-top:2%; ">
                                <div class="col-2">
                                    <button class="btn btn-primary" type="submit">Пошук</button>
                                </div>
                            </div>



                        </form>
                    </div>
    </section>
@endsection

