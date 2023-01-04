@extends('adminlte::page')

@section('title', 'Chat')

@section('content_header')
    <h1>Chat</h1>
@stop

@section('content')
    <div class="card direct-chat direct-chat-primary">
        <div class="card-header">
            <span class="card-text float-right">
                <i class="fas fa-globe"> Currently online:</i>
                <div class="card-tools" id="avatars">

                </div>
            </span>
        </div>
        <div class="card-body">
            <div class="direct-chat-messages" id="listMessage">
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
