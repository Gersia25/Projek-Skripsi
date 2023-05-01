@extends('layouts.app')

@section('title')
 Edit Data User
@endsection

@section('content')
@include('layouts.alert')
    <div class="box">
        <div class="box-header">
            <h3>Edit Data User</h3>
        </div>
        <div class="box-body">
            <form action="{{ url('data-user/'.$data->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input placeholder="Masukan Nama" value="{{ $data->name }}" type="text" required class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input placeholder="Masukan Telepon" value="{{ $data->telepon }}" type="text" required class="form-control" name="telepon">
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
                    
                </div>
            </form>
        </div>
    </div>
@endsection
