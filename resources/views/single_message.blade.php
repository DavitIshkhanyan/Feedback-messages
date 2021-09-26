@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Message') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="message_item">
                        <p>{{ $message->sent_date }}</p>
                        <h2>{{ $message->first_name.' '.$message->last_name }}</h2>
                        <p>{{ $message->email }}</p>

                        <h3>{{ $message->message_title }}</h3>
                        <p>{{ $message->message_body }}</p>
                        <div class='buttons'>
                            <form action="/messages/{{$message->id}}" method="post">
                                @csrf
                                @method("DELETE")
                                <input type="submit" value="Delete" class='delete'>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
