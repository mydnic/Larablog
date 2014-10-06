@extends('layout.admin.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Posts</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @each('admin.post.single', $posts, 'post', 'admin.post.empty')
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@stop


@section('scripts')
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
@stop