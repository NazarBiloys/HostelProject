@extends('welcome')



@section('container')
    <section id="container" >
    <div class="container" style="margin-top: 5%; margin-bottom: 5%">

        @guest
            <p class="lead">Для того, щоб залишити відгук, потрібно ввійти</p>
        @else
            <div class="leave-comment"><!--leave comment-->
                <h4>Leave a reply</h4>


                <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-md-12">
    										<textarea class="form-control" rows="6" name="comment"
                                                      placeholder="Write Massage"></textarea>
                        </div>
                    </div>
                    <button class="btn send-btn" style="background-color: black; color: white;">Post Comment</button>
                </form>
            </div><!--end leave comment-->
        @endguest

        @if(!$comments->isEmpty())
            <hr class="featurette-divider">
            @foreach($comments as $comment)
                <div id="comments" class="comments-block">




                    <ul class="list">
                        <li class="comment even thread-even depth-1" id="li-comment-41">

                            <div class="col-md-10 data">
                                <div class="title">
                                    <a href="#">{{$comment->users->name}}</a>
                                    <span class="m_14">{{$comment->created_at->diffForHumans()}}</span></div>
                                <p>	<p>{{$comment->comment}}</p>
                                </p>

                            </div>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                </div>
                <hr class="featurette-divider">
            @endforeach
            {{$comments->links()}}
        @else
            <p class="lead">На даний момент відгуки відсутні</p>
        @endif

    </div>
    </section>
@endsection
