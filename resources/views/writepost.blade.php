@extends('layouts.app')
@section('js')
<script src="{{asset('procke/ckeditor.js')}}"></script>
<script src="{{ asset('procke/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
<script>hljs.initHighlightingOnLoad();</script>

<script>
   var postbody = document.getElementById("konten");
     CKEDITOR.replace(postbody,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>
@endsection
@section('css')
<link href="{{ asset('procke/plugins/codesnippet/lib/highlight/styles/default.css') }}" rel="stylesheet">
<style type="text/css">
#cke_konten, #cke_1_top, #cke_top {
    width: auto !important;
}
</style>
@endsection
@section('content')
<div class="container">
    <div class="row">
      <div class="col-xs-3 col-sm-3 col-md-3">
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
        <div class="col-xs-9 col-sm-9 col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Post Compose</div>

                <div class="panel-body">
                  <form class="form-horizontal" enctype="multipart/form-data" action="/wblog/write" method="POST">
                     {{ csrf_field() }}

                     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                       <div class="col-xs-8 col-sm-8 col-md-8">
                             <label for="title" class="control-label">Judul Post</label>
                             <input type="text" name="title" class="form-control" placeholder="Judul Posting" />
                             @if ($errors->has('title'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('title') }}</strong>
                                 </span>
                             @endif
                           </div>
                           <div class="col-xs-4 col-sm-4 col-md-4">
                                   <label for="title" class="control-label">Kategori</label>
                                   <div class="input-group">
                                   <select class="form-control" name="kategori">
                                     <option value="none" disabled selected>Pilih Kategori</option>
                                     @if($getcat!='')
                                     @foreach($getcat as $cat)
                                     <option value="{{$cat->idcategory}}">{{$cat->categoryname}}</option>
                                     @endforeach
                                     @else
                                    <option value="tes">Tidak ada Kategori</option>
                                     @endif
                                   </select>
                                   @if ($errors->has('kategori'))
                                     <span class="help-block">
                                       <strong>{{ $errors->first('kategori') }}</strong>
                                     </span>
                                   @endif

                                  <div class="input-group-btn">
                                      <button class="btn btn-default" type="button" tabindex="-1" title="Tambah Kategori" data-toggle="modal" data-target="#modalAddCat">
                                        <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                      </button>
                                 </div>
                                 </div>
                                 </div>
                               </div>


                      <div class="form-group{{ $errors->has('postbody') ? ' has-error' : '' }}">
                      <div class="col-md-12">
                      <textarea id="konten" class="form-control" name="postbody" rows="12" cols="50"></textarea>
                             @if ($errors->has('postbody'))
                             <span class="help-block">
                              <strong>{{ $errors->first('postbody') }}</strong>
                              </span>
                              @endif
                      </div>
                      </div>

                      <div class="form-group">
                             <div class="col-md-12">
                                 <button type="submit" class="btn btn-primary">
                                     Submit
                                 </button>
                                 <input type="hidden" name="_token" value="{{ Session::token() }}">
                             </div>
                         </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAddCat" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Kategori</h4>
                                  </div>
                                  <form action="addcat" method="POST">
                                  <div class="modal-body">
                                  {{csrf_field()}}
                                          <input type="text" name="cat" class="form-control" placeholder="Kategori" />
                                          @if ($errors->has('category'))
                                              <span class="help-block">
                                                  <strong>{{ $errors->first('category') }}</strong>
                                              </span>
                                          @endif
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Urungkan</button> <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                                  </div>
                                </form>
                                </div>
                              </div>
                            </div>

@endsection
