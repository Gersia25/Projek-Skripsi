@extends('layouts.app')

@section('title')
    Format Raport
@endsection


@section('content')
    @include('layouts.alert')
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Format Raport</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Format Raport</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
               
                @foreach ($format as $item)
                    
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->nama_format }}</td>
                  <td>
                    <a href="{{ url('format-raport-1/'.$item->id_format) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Format 1</a>
                    <a href="{{ url('format-raport-2/'.$item->id_format) }}" class="btn btn-success"><i class="fa fa-eye"></i> Format 2</a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection