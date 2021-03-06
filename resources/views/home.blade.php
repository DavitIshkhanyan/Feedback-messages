@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You don\'t have an admin role. Plese contact Davit Ishkhanyan to get admin role and permission to see messages.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
