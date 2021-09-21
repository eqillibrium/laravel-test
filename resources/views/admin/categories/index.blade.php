@extends('layouts.admin')
@section('title') Список категорий - @parent @stop
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список категорий</h1>
        <a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Добавить категорию</a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название категории</th>
                        <th>Новостей</th>
                        <th>Дата создания</th>
                        <th>Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                        @forelse($categoryList as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }} </td>
                                <td>{{ $category->news_count  }} </td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', ['category' => $category->id])  }}">Ред.</a>
                                    &nbsp;
                                    <a href="">Уд.</a>
                                </td>
                            </tr>
                        @empty
                            <h2>Новостей нет</h2>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
