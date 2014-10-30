@extends('layout.admin.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Pages
            <small><a href="{{ URL::to('admin/page/create') }}">Add new</a></small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="TablePost">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @each('admin.page.single', $pages, 'page', 'admin.page.empty')
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop


@section('scripts')
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#TablePost').dataTable();
        });
    </script>
@stop