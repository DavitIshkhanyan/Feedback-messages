@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All messages') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($messages as $message)
                        <div class="message_item">
                            <p>{{ $message->sent_date }}</p>
                            <h2>{{ $message->first_name.' '.$message->last_name }}</h2>
                            <p>{{ $message->email }}</p>

                            <h3>{{ $message->message_title }}</h3>
                            <p>{{ substr($message->message_body, 0, 600).(strlen($message->message_body) > 600 ? '...' : '') }}</p>
                            <div class='buttons'>
                                <a href="/messages/{{$message->id}}" class='view'>View</a>
                                <form action="/messages/{{$message->id}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" value="Delete" class='delete'>
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
