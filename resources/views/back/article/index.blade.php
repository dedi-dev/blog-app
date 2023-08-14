@extends('back.layout.template')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
@section('title', 'List Articles - Admin')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Articles</h1>
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
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <table class="table table-striped table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Views</th>
                    <th>Publish Date</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</main>
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#dataTable', {
        processing: true,
        serverside: true,
        ajax: '{{url()->current()}}',
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'desc',
                name: 'desc'
            },
            {
                data: 'category',
                name: 'category'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'views',
                name: 'views'
            },
            {
                data: 'publish_date',
                name: 'publish_date'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    });
</script>
@endpush