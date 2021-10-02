
<div>
    <h3>Привет, {{ Auth::user()->name }}</h3>
    <img src="{{ Auth::user()->avatar }}" alt="">
    <p>{{ Auth::user()->avatar }}</p>
    <a href="{{ route('logout') }}">Выйти</a>
</div>
