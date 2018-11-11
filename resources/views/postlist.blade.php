@extends('layouts.app')
@section('css')
<style type="text/css">
@media only screen and (max-width : 767px) {
    .box {
        height: auto !important;
    }
    .panel-footer {
      position: absolute;
      padding: 0 auto;
      bottom: 0;
    }
}
.thumbnail img {
    height:250px;
    width:100%;
}
.panel-heading h3 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: normal;
    width: 75%;
    padding-top: 8px;
}
.desc{
  -ms-word-break: break-all;
  word-break: break-all;
  /* Non standard for webkit */
  word-break: break-word;
  -webkit-hyphens: auto;
  -moz-hyphens: auto;
  hyphens: auto;
}
</style>
@endsection
@section('js')
<script src="{{asset('js/jquery.matchHeight-min.js')}}"></script>
<script>
$(function() {
    $(".btnsumbit").attr("disabled", false);
    $('.box').matchHeight();
    $('.cap').matchHeight();
});
</script>
@endsection
@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>
                      <div class="panel-body">
                          <div class="list-group">
                              <a href="/home" class="list-group-item">Halaman Utama</a>
                              <a href="/wblog/listpost" class="list-group-item">Kelola Post</a>
                              <a href="/wblog/listcat" class="list-group-item">Kelola Kategori</a>
                              <a href="/users" class="list-group-item">Lihat Daftar Pengguna</a>
                          </div>
                        </div>
                  </div>
  </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title pull-left">
                  Daftar Post
                </h3>
                <a href="/wblog/write" class="btn btn-sm btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah Posting</a>
                  <div class="clearfix"></div></div>
                <div class="panel-body">
                  <div class="row">
                    @if(is_null($blog))
                    <div class="col-sm-6 col-md-4">
                    Tidak ada post satupun. Mulai menulis!
                    </div>
                    @else
                    @foreach($blog as $data)
                    <div class="col-sm-6 col-md-4">
        <div class="thumbnail box">
          <div class="caption cap">
            <h3><a href="/posts/{{$data->title_coll}}">{{$data->title}}</a></h3>
            <p>Kategori: {{$data->categoryname}}</p>
            <p>Author: {{$data->name}}</p>
            <p>Tanggal Kirim: {{ Carbon\Carbon::parse($data->created_at)->formatLocalized('%A, %d %B %Y %H:%I:%S')}}</p>
            <p class="desc" id="post">{{strip_tags($data->postbody)}}</p>
          </div>
            <p class="text-center"><a href="/wblog/editpost/{{$data->title_coll}}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus{{$loop->iteration}}"><i class="glyphicon glyphicon-remove"></i> Hapus</button></p>
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
