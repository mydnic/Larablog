@extends('admin.layout')

@section('meta-title', 'Social Links')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Social Links
                <a href="{{ route('admin.social.create') }}" class="btn btn-primary">
                    Add new
                </a>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover" id="TableLinks">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Icon</th>
                        <th>Link</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $link)
                        <tr>
                            <td>
                                <a href="{{ route('admin.social.edit', $link->id) }}">
                                    {{ $link->title }}
                                </a>
                            </td>
                            <td>
                                {{ $link->icon }}
                            </td>
                            <td>
                                {{ $link->url }}
                            </td>
                            <td>{{ $link->created_at->format('Y-m-d \a\t H:i:s') }}</td>
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
            $('#TableLinks').dataTable({
                "order": [[ 3, "desc" ]]
            });
        });
    </script>
@stop
