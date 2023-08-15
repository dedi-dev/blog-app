@extends('back.layout.template')
@section('title', 'Create Article - Admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Article</h1>
    </div>
    <div class="mt-3">
        <button class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#createCategory">Create</button>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endforeach
        @endif
        <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data" class="mt-2">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="" hidden>Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="img">Image (max 2MB)</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" hidden>Choose Status</option>
                            <option value="0">Private</option>
                            <option value="1">Publish</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="publish_date">Publish Date</label>
                        <input type="date" name="publish_date" id="publish_date" class="form-control">
                    </div>
                </div>
            </div>
            <div class="float-end">
                <input type="submit" value="Save" class="btn btn-primary"/>
            </div>
        </form>
    </div>
</main>
@endsection