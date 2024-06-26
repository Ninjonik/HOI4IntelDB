<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $data->guild_name }} <small>Settings</small></h3>
        </div>

        <form wire:submit.prevent="submit">
            <div class="card-body">
                <h2>Basic Settings</h2>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" wire:model="guild_name" class="form-control">
                    @error('guild_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Description (optional)</label>
                    <input type="text" wire:model="guild_desc" class="form-control">
                    @error('guild_desc') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="minimal_age">Minimal account age for joining server (in days)</label>
                    <input type="number" wire:model="minimal_age" class="form-control">
                    @error('minimal_age') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input type="checkbox" name="tts" true-value="1" false-value="0" wire:model="tts">
                    <label for="tts"><b class="text-primary">TTS</b> Use text-to-speech for announcements?</label>
                    @error('tts') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <input type="checkbox" name="automod" true-value="1" false-value="0" wire:model="automod">
                    <label for="automod"><b class="text-primary">AI Automod</b> Enabled AI-powered auto-moderator?</label>
                    @error('automod') <span class="error">{{ $message }}</span> @enderror
                </div>
                <h2>Steam Verification (optional)</h2>
                <div class="form-group">
                    <input type="checkbox" name="steam_verification" true-value="1" false-value="0" wire:model="steam_verification">
                    <label for="steam_verification"><b class="text-primary">Steam Verification</b> required for reserving countries</label>
                    @error('steam_verification') <span class="error">{{ $message }}</span> @enderror
                </div>
                @if($steam_verification)
                    <div class="form-group" wire:ignore>
                        <label for="verify_role" class="col-3">Role that user gets after being verified</label>
                        <select class="select2" data-placeholder="Select a Role" style="width: 100%;" id="verify_role" wire:model="verify_role">
                            @foreach($roles as $role)
                                <option value="{{ $role['role_id'] }}">
                                    {{ $role['role_name'] }}
                                </option>
                            @endforeach
                        </select>

                        @error("verify_role")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                <h2>Custom Channels (optional)</h2>
                <div class="form-group" wire:ignore>
                    <label for="log_channel" class="col-3">Logs Channel</label>
                    <select class="select2" data-placeholder="Select a Channel" style="width: 100%;" id="log_channel" wire:model="log_channel">
                        @foreach($channels as $channel)
                            <option value="{{ $channel['channel_id'] }}">
                                {{ $channel['channel_name'] }}
                            </option>
                        @endforeach
                    </select>

                    @error("log_channel")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" wire:ignore>
                    <label for="wuilting_channel_id" class="col-3">Wuilting Game Channel</label>
                    <select class="select2" data-placeholder="Select a Channel" style="width: 100%;" id="wuilting_channel_id" wire:model="wuilting_channel_id">
                        @foreach($channels as $channel)
                            <option value="{{ $channel['channel_id'] }}">
                                {{ $channel['channel_name'] }}
                            </option>
                        @endforeach
                    </select>

                    @error("wuilting_channel_id")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" wire:ignore>
                    <label for="custom_channel" class="col-3">Channel for creating temporary custom channels</label>
                    <select class="select2" data-placeholder="Select a Channel" style="width: 100%;" id="custom_channel" wire:model="custom_channel">
                        @foreach($voice_channels as $channel)
                            <option value="{{ $channel['channel_id'] }}">
                                {{ $channel['channel_name'] }}
                            </option>
                        @endforeach
                    </select>

                    @error("custom_channel")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" wire:ignore>
                    <label for="custom_channel_2" class="col-3">Channel for creating permanent custom channels</label>
                    <select class="select2" data-placeholder="Select a Channel" style="width: 100%;" id="custom_channel_2" wire:model="custom_channel_2">
                        @foreach($voice_channels as $channel)
                            <option value="{{ $channel['channel_id'] }}">
                                {{ $channel['channel_name'] }}
                            </option>
                        @endforeach
                    </select>

                    @error("custom_channel_2")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $('.select2').select2();

            // Manually trigger Livewire update when select2 value changes
            $('#log_channel').on('change', function() {
                @this.set('log_channel', $(this).val());
            });

            $('#wuilting_channel_id').on('change', function() {
                @this.set('wuilting_channel_id', $(this).val());
            });

            $('#custom_channel').on('change', function() {
                @this.set('custom_channel', $(this).val());
            });

            $('#custom_channel_2').on('change', function() {
                @this.set('custom_channel_2', $(this).val());
            });

            $('#verify_role').on('change', function() {
                @this.set('verify_role', $(this).val());
            });

        });
    </script>

</div>
