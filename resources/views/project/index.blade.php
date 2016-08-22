@extends('layout.blog.main')

@section('meta-title', 'Portfolio')
@section('meta-subtitle', 'My work so far')
@section('meta-description', 'All my work')
@section('meta-url', URL::route('portfolio'))

@section('styles')
    <style>
        span.coma:last-child {
            display: none;
        }
        .carousel-inner img{
            width: 100%;
        }
    </style>
@stop

@section('content')

    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a href="#{{$project->slug}}" class="portfolio-link" data-toggle="modal">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="{{ $project->image }}" class="img-responsive" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4>
                                {{ $project->title }}
                            </h4>
                            <p class="text-muted">
                                @foreach ($project->categories as $category)
                                    {{ $category->name }}<span class="coma">,</span>
                                @endforeach
                            </p>
                        </div>
                    </div>

                    {{-- MODAL --}}
                    <div class="portfolio-modal modal fade" id="{{$project->slug}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-content">
                            <div class="close-modal" data-dismiss="modal">
                                <div class="lr">
                                    <div class="rl">
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-2">
                                        <div class="modal-body">
                                            <!-- Project Details Go Here -->
                                            <h2>
                                                {{ $project->title }}
                                            </h2>
                                            <p class="item-intro text-muted">
                                                {{ $project->sub_title }}
                                                <small>
                                                    <i class="fa fa-external-link"></i>
                                                    {!! link_to($project->link, $project->link, ['target'=>'_blank']) !!}
                                                </small>
                                            </p>

                                            <div id="Portfolio_Slider{{$project->id}}" class="carousel slide" data-ride="carousel">
                                                <!-- Indicators -->
                                                <ol class="carousel-indicators">
                                                    <?php $i=0; ?>
                                                    @foreach ($project->images as $key => $image)
                                                        <li data-target="#Portfolio_Slider{{$project->id}}" data-slide-to="{{$key}}" class="@if ($i==0) active @endif"></li>
                                                        <?php $i++ ?>
                                                    @endforeach
                                                </ol>

                                                <!-- Wrapper for slides -->
                                                <div class="carousel-inner" role="listbox">
                                                    <?php $i=0; ?>
                                                    @foreach ($project->images as $key => $image)
                                                        <div class="item @if ($i==0) active @endif">
                                                            <?php $i++ ?>
                                                            <img src="{{$image->image}}" alt="{{$project->title}}">
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Controls -->
                                                <a class="left carousel-control" href="#Portfolio_Slider{{$project->id}}" role="button" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="right carousel-control" href="#Portfolio_Slider{{$project->id}}" role="button" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>

                                            {!! $project->description !!}

                                            <ul class="list-inline">
                                                <li>Date: {{ date('M Y', strtotime($project->date)) }}</li>
                                                <li>Client: {{ $project->client }}</li>
                                                <li>
                                                    Category:
                                                    @foreach ($project->categories as $category)
                                                        {{ $category->name }}<span class="coma">,</span>
                                                    @endforeach
                                                </li>
                                            </ul>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@stop
