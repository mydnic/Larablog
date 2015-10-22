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
            <table class="table table-striped table-bordered table-hover" id="TablePost">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>
                                {!! link_to_route('admin.page.edit', $page->title, $page->id) !!}
                            </td>
                            <td>
                                @if ($page->status)
                                    Published
                                @else
                                    Draft
                                @endif
                            </td>
                            <td>{{ $page->created_at->format('d/m/Y \a\t H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


@section('scripts')
    <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#TablePost').dataTable();
        });
    </script>
@stop