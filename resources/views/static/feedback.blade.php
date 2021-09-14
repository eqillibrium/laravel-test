@extends('layouts.main')
@section('title') Добавить новость - @parent @stop

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Обратная связь</h1>
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
                    <label for="comment">Комментарий </label>
                    <textarea
                        class="form-control"
                        name="comment"
                        id="comment"
                        value="{{ old('comment') }}"
                    >
                    </textarea>
                </div>
                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
                    </div>
        </div>
    </div>
@endsection
