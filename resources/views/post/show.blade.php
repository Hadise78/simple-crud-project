@extends('layouts.master')

@section('title','نمایش پست')

@section('content')


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> نمایش پست </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index')}}"> بازگشت</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>عنوان:</strong>
              {{ $post->title }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>توضیحات:</strong>
              {{ $post->body }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>نویسنده:</strong>
             {{ $post->user->fullName}}
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>عکس:</strong>
               <img src="" alt="">
            </div>
        </div> -->
    </div>
  
@endsection