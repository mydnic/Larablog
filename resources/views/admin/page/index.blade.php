@extends('admin.layout')

@section('meta-title', 'Pages')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Pages
                <a href="{{ route('admin.page.create') }}" class="btn btn-primary">
                    Add new
                </a>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-bordered table-hover" id="TablePage">
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
                            <td>
                                {{ $page->created_at->format('Y-m-d \a\t H:i:s') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#TablePage').dataTable({
                "order": [[ 2, "desc" ]]
            });
        });
    </script>
@stop
