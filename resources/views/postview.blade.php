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
                <div class="panel-heading">{{$view->title}}</div>
                {!! Breadcrumbs::render('posts', $view) !!}
                <div class="panel-body">
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
                  {!!$view->postbody!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
