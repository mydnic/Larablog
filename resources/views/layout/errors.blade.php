@if (Session::has('flash_notification.message'))
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @include('flash::message')
            </div>
        </div>
    </div>
@endif
@if ($errors->any())
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif