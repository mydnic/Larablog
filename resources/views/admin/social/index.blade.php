@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Social Links
                <small><a href="{{ URL::route('admin.settings.social.create') }}">Add new</a></small>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="TablePost">
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
                                    {!! link_to_route('admin.settings.social.edit', $link->title, $link->id) !!}
                                </td>
                                <td>
                                    {{ $link->icon }}
                                </td>
                                <td>
                                    {{ $link->url }}
                                </td>
                                <td>{{ date('Y-m-d \a\t H:i:s' , strtotime($link->created_at)) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
