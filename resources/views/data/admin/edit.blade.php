@extends('layouts.app')

@section('title')
 Edit Data Admin
@endsection

@section('content')
@include('layouts.alert')
    <div class="box">
        <div class="box-header">
            <h3>Edit Data Admin</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('data-admin/'.encrypt($data->id)) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Nama Admin</label>
                    <input placeholder="Masukan Nama" value="{{ $data->name }}" type="text" required class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input placeholder="Masukan Email" value="{{ $data->email }}" type="text" required class="form-control" name="email">
                </div>
                <hr>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input placeholder="Masukan Password Baru" type="text" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('data-admin') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
