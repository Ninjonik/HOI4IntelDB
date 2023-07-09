<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $data->guild_name }} <small>Settings</small></h3>
        </div>

        <form wire:submit.prevent="submit">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" wire:model="guild_name" class="form-control">
                    @error('guild_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" wire:model="guild_desc" class="form-control">
                    @error('guild_desc') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><b class="text-primary">Steam Verification</b> required for reserving countries</label>
                    <input type="checkbox" name="steam_verification" true-value="1" false-value="0" wire:model="steam_verification">
                    @error('steam_verification') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
