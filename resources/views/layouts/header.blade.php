<header class="">
<div class="logo">
    @if(Auth::user() == null || !Auth::user()->isAdmin())
    <a href="/">Перлина</a>
    @else
        <a href="/admin">Перлина</a>
    @endif
    <span>Готель & сауна & ресторан</span>
</div>
<div id="cssmenu" class="align-center">
    <ul>
        @if(Auth::user() == null || !Auth::user()->isAdmin())
            <li class="nav-item"><a href="/"><span>Головна сторінка</span></a></li>
            <li class="has-sub"><a href="/services"><span>Послуги</span></a>
                <ul>
                    <li class="has-sub"><a class="dropdown-item" href="/sauna" id="drop" style="color: seashell"><span>Сауна</span></a>
                    </li>
                    <li class="has-sub"><a class="dropdown-item" href="/restaurant" id="drop" style="color: seashell"><span>Ресторан</span></a>
                    </li>
                    <li class="has-sub"><a class="dropdown-item" href="/pool" id="drop" style="color: seashell"><span>Басейн</span></a>
                    </li>
                    <li class="has-sub"><a class="dropdown-item" href="/parking" id="drop" style="color: seashell"><span>Парковка</span></a>
                    </li>
                </ul>
            </li>
            <li><a href="/comments"><span>Відгуки</span></a></li>
            <li class="last"><a href="/info"><span>Контакти</span></a></li>
            <li class="last"><a href="/inform/room"><span>Ціна та номери</span></a></li>
        @else
            <li><a href="/room"><span>Кімнати</span></a></li>
            <li><a href="/counts"><span>Добавити категорію к-ті людей в кімнаті</span></a></li>
            <li><a href="/state"><span></span>Добавити стан кімнати</a></li>
            <li><a href="/bed"><span></span>Добавити категорію типа ліжка</a></li>
            <li><a href="/show/order"><span>Замовлення</span></a></li>
            <li><a href="/admins/comment"><span>Відгуки</span></a></li>
        @endif
        @guest
            <li><a href="/bron"><span>Бронювання</span></a></li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Ввійти</a>
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">Зареєструватись</a>
                @endif
            </li>
        @else
                @if(Auth::user() == null || !Auth::user()->isAdmin())
            <li><a href="/brons"><span>Бронювання</span></a></li>
                @else

                    @endif
            <li class="has-sub">

                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul>
                    @if(!Auth::user()->isAdmin())
                    <li class="has-sub">

                        <a class="dropdown-item" href="{{ route('orders') }}" id="drop" style="color: seashell">
                            <span>Мої замовлення</span>
                        </a>



                    </li>
                    @endif

                    <li class="has-sub">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  id="drop" style="color: seashell">
                        Вийти
                    </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    </li>


                </ul>
            </li>
        @endguest
    </ul>

</div>
</header>