@extends('layouts.main')
@section('title') Запросить данные - @parent @stop

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Запросить данные </h1>
    </div>
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-6">
                <form method="post" action="{{ route('admin.news.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ваше имя</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                            value="{{ old('name') }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="phone">Номер телефона</label>
                        <input
                            type="text"
                            class="form-control"
                            name="phone"
                            id="phone"
                            value="{{ old('phone') }}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="e-mail">E-mail </label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                        >
                    </textarea>
                    </div>
                    <div class="form-group">
                        <label for="info">Информация о запросе</label>
                        <textarea
                            class="form-control"
                            name="info"
                            id="info"
                            value="{{ old('info') }}"
                        >
                    </textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
