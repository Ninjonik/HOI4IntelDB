@extends('adminlte::page')

@section('title', 'Chat')

@section('content_header')
    <h1>Chat</h1>
@stop

@section('content')
    <div class="card direct-chat">
        <div class="card-header">
            <span class="card-text float-right">
                <i class="fas fa-globe"> Currently online:</i>
                <div class="card-tools" id="avatars">

                </div>
            </span>
        </div>
        <div class="card-body">
            <div class="direct-chat-messages" id="listMessage">
                @foreach ($chats as $chat)
                <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-left">{{ $chat["user"]["name"] }}</span>
                        <span class="direct-chat-timestamp float-right">{{ $chat["updated_at"] }}</span>
                    </div>
                    <img class="direct-chat-img" src="{{ $chat["user"]["profile_photo_path"] }}" alt=".">
                    <div class="direct-chat-text">
                        {{ $chat["message"] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <form id="form">
                <div class="input-group">
                    <input type="text" placeholder="Type Message ..." class="form-control" id="input-message">
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
    @vite("resources/js/staff_chat.js")
@stop
