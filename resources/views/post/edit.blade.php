@extends('layouts.master')

@section('title','ویرایش پست')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ویرایش پست</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index')}}">بازگشت</a>
            </div>
        </div>
    </div>

    @include('layouts.partials.error')

    <form action="{{ route('post.update',$post->id)}}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>عنوان:</strong>
                    <input type="text" name="title" value="{{ $post->title}}" class="form-control" placeholder="">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>توضیحات:</strong>
                    <input type="text" name="body" value="{{ $post->body }}" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>نویسنده:</strong>
                    <select name="user_id" class="form-control">
                    @foreach($users as $user)

                    <option value="{{$user->id}}"> 
                    
                    
                    {{$user->fullName}}    
                        
                
                </option>
                    @endforeach

</select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">ثبت</button>
            </div>
        </div>

    </form>
    
@endsection