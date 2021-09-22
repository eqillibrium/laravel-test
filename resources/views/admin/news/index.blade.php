@extends('layouts.admin')
@section('content')
@section('title') Список новостей - @parent @stop

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Список новостей</h1>
    <a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Добавить новость</a>
</div>
<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Категория</th>
                    <th>Заголовок</th>
                    <th>Описание</th>
                    <th>Дата добавления</th>
                    <th>Управление</th>
                </tr>
                </thead>

                <tbody>
                @forelse($newsList as $news)
                    <tr>
                        <td>{{ $news->id }}</td>
                        <td>{{ optional($news->category)->title }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{!! $news->description  !!}</td>
                        <td>{{ $news->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Ред.</a>
                            &nbsp;
                            <button class="btn btn-danger deleteBtn" data-id="{{ $news->id }}" data-token="{{ csrf_token() }}">Х</button>
                        </td>
                    </tr>
                @empty
                    <h2>Новостей нет</h2>
                @endforelse
                </tbody>

            </table>
            {!! $newsList->links() !!}
        </div>
    </div>
</div>
@endsection

<script>
    window.onload = function () {
        document.querySelectorAll('.deleteBtn').forEach( btn => {
            btn.addEventListener('click', async function () {
                try {
                    const data = {
                        id: this.dataset.id,
                        _method: "DELETE",
                        _token: this.dataset.token
                    }
                    const response = await fetch(`news/${data.id}`, {
                        method: "POST",
                        body: JSON.stringify(data),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    const json = await response.json();
                    if(json.status === 'success') {
                        document.location.href = 'news'
                        console.log('redirect')
                    }
                } catch (e) {
                    console.log(e)
                }

            })
        })
    }
</script>
