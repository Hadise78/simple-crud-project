@extends('layouts.master')

@section('title','صفحه اصلی')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left m-3">
                <h2>مینی پروژه اضافه کردن پست جدید</h2>
            </div>
            <div class="pull-right d-flex m-2">
                <a class="btn btn-success" href="{{ route('post.create')}}"> پست جدید </a>
            </div>
        </div>
    </div>

@if($message=Session::get('success'))

<div class="alert alert-success">

<h3>   {{$message}}       </h3>

</div>
@endif


    <table class="table table-bordered">
        <tr>
            <th>شماره</th>
            <th>عنوان</th>
            <th>توضیحات</th>
            <th>نام نویسنده</th>
            <th>تاریخ انتشار</th>
            <th>عملیات</th>
        </tr>

        @foreach($posts as $post)

        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->user->fullName}}</td>
            <td>{{$post->created_at}}</td>
            <td style="width: 250px" class="pt-4 pr-4">
                <form action="{{ route('post.destroy',$post->id)}}" method="POST">
                    @csrf
                    <a class="btn btn-info" href="{{ route('post.show',$post->id)}}">نمایش</a>
                    <a class="btn btn-primary" href="{{  route('post.edit',$post->id)}}">ویرایش</a>
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </td>
        </tr>

    @endforeach

    </table>

@endsection
