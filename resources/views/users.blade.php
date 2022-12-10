@extends('layouts.app')
@section('content')
    <div class="page-header page-header-small clear-filter" filter-color="orange">
        <div class="page-header-image" data-parallax="true" style="background-image:url('../assets/img/bg8.jpg');">
        </div>
        <div class="container">
            <div class="photo-container">
                <img src="../assets/img/.jpg" alt="">
            </div>
            <h1 class="title">USER WANAGIS</h1>
            <p class="category">Halaman pengaturan pengguna WANAGIS</p>

        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 class="title text-center">Daftar Pengguna WANAGIS</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Since</th>
                                    <th class="text-right">Role</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $items)
                                    <tr>
                                        <td class="text-center">{{ $items->id }}</td>
                                        <td>{{ $items->name }}</td>
                                        <td>{{ $items->email }}</td>
                                        <td>{{ $items->created_at }}</td>
                                        <td class="text-right">{{ $items->role_as }}</td>
                                        <td class="td-actions text-right">
                                            <form method="POST" {{-- action="{{ route('users.edit', $items->id) }}" --}}>
                                                <button type="button" rel="tooltip"
                                                    class="btn btn-success btn-round btn-icon edit-account"
                                                    data-placement="bottom" title="Edit">
                                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('users.destroy', $items->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" rel="tooltip"
                                                    class="btn btn-danger btn-round btn-icon delete-confirm"
                                                    data-placement="bottom" title="Hapus">
                                                    <i class="now-ui-icons ui-1_simple-remove"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
