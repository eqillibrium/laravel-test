@extends('layouts.admin')
@section('content')
@section('title') Список пользователей - @parent @stop

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Список пользователей</h1>
    <a href="{{ route('admin.news.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Добавить пользователя</a>
</div>
<div class="row">
    <div class="col-md-12">
        @include('inc.messages')
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Дата регистрации</th>
                    <th>Админ</th>
                    <th>Управление</th>
                </tr>
                </thead>

                <tbody>
                @forelse($usersList as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <div class="btn adminBtn @if($user->is_admin) btn-success @else btn-primary @endif"
                                 data-id="{{$user->id}}"
                                 data-name="{{$user->name}}"
                                 data-email="{{$user->email}}"
                                 data-is_admin="{{ $user->is_admin }}"
                                 data-token="{{ csrf_token() }}"
                            >
                                @if($user->is_admin) Да @else Нет @endif
                            </div>
                        </td>
                        <td>
                            &nbsp;
                            <button class="btn btn-danger deleteBtn" data-token="{{ csrf_token() }}">Х</button>
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

<script>

    window.onload = function () {
        const adminBtn = document.querySelectorAll('.adminBtn').forEach(el => {
            el.addEventListener('click', async function () {
                try {
                    const data = {
                        id: this.dataset.id,
                        name: this.dataset.name,
                        email: this.dataset.email,
                        is_admin: !Boolean(this.dataset.is_admin),
                        _method: "PATCH",
                        _token: this.dataset.token
                    }
                    const response = await fetch(`users/${data.id}`, {
                        method: "POST",
                        body: JSON.stringify(data),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    const json = await response.json()
                    if(json.status === 'success') {
                        console.log('success')
                        document.location.reload()
                    }
                    console.log(json)
                } catch (e) {
                    console.log(e)
                }
            })
        })
    }

</script>
