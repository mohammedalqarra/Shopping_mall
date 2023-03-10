@extends('site.master')

@section('title', 'success proccess | ' . config('app.name'))

@section('content')
<div class="page-wrapper">
    <div class="cart shopping">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="block">
                        <div class="alert alert-success">
                            <p>Payment proccess done successfully</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
    setTimeout(() => {
        windoe.location.href = '/';
    }, 3000);
</script>
@stop
