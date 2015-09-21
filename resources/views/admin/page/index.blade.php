@extends('layout.admin.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Pages
                <small>
                    {!! link_to_route('admin.page.create', 'Add new') !!}
                </small>
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
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->user->name }}</td>
                                <td>
                                    @if ($page->status)
                                        Published
                                    @else
                                        Draft
                                    @endif
                                </td>
                                <td>{{ date('d/m/Y \a\t H:i:s' , strtotime($page->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop


@section('scripts')
    <script src="//cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#TablePost').dataTable();
        });
    </script>
@stop