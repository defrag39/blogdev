@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">Menu</div>
                      <div class="panel-body">
                          <div class="list-group">
                              <a href="wblog/listpost" class="list-group-item">Kelola Post</a>
                              <a href="wblog/listcat" class="list-group-item">Kelola Kategori</a>
                              <a href="/users" class="list-group-item">Lihat Daftar Pengguna</a>
                          </div>
                        </div>
                  </div>
  </div>
        <div class="col-md-5">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
