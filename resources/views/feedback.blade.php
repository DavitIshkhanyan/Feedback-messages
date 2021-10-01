@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            @if (session('info'))
                <div class="alert alert-success" role="alert">
                    {{ session('info') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Feedback message') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('send.message') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="name">

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message_title" class="col-md-4 col-form-label text-md-right">{{ __('Message Title') }}</label>

                            <div class="col-md-6">
                                <input id="message_title" type="text" class="form-control @error('message_title') is-invalid @enderror" name="message_title" value="{{ old('message_title') }}" required autocomplete="name">

                                @error('message_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="message_title" class="col-md-4 col-form-label text-md-right">{{ __('Your Message') }}</label>

                            <div class="col-md-6">
                                <textarea id="message_body" type="text" class="form-control @error('message_body') is-invalid @enderror" name="message_body" value="{{ old('message_body') }}" required autocomplete="name" rows=8></textarea>

                                @error('message_body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <div class="col-md-6">
                                {!! NoCaptcha::renderJs('eng', false, 'onloadCallback') !!}
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                            <input type="checkbox" id="terms" class="form-control" name="terms" value="1" {{ !old('terms') ?: 'checked' }} />
                            <input type="checkbox" id="terms" name="terms" value="1" {{ !old('terms') ?: 'checked' }} />
                            <label for="terms">Agree with the terms and conditions</label>
                          
                            <div class="col-md-4">
                                @if ($errors->has('terms'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('terms') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    var onloadCallback = function() {
        alert('grecaptcha is ready!');
    }
</script>