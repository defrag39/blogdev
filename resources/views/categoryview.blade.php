@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>
                      <div class="panel-body">
                          <div class="list-group">
                              <a href="/wblog/listpost" class="list-group-item">Kelola Post</a>
                              <a href="/wblog/listcat" class="list-group-item">Kelola Kategori</a>
                              <a href="/users" class="list-group-item">Lihat Daftar Pengguna</a>
                          </div>
                        </div>
                  </div>
  </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Category: </div>

                <div class="panel-body">
                  <div class="row">
                    @if(is_null($category))
                    <div class="col-sm-6 col-md-4">
                    Tidak ada post dalam kategori ini.
                    </div>
                    @else
                    @foreach($category as $data)
                    <div class="col-sm-6 col-md-4">
        <div class="thumbnail box">
          <div class="caption cap">
            <h3><a href="/posts/{{$data->title_coll}}">{{$data->title}}</a></h3>            
            <p class="desc" id="post">{{strip_tags($data->postbody)}}</p>
          </div>
            <p class="text-center"><a href="/posts/{{$data->title_coll}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Lihat Post</a></p>
        </div>
        </div>
                    @endforeach
                    @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
