<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Players in current lobby</h3>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap" id="data">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Discord ID</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Rating</th>
                        <th>Joined</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>7847848974784</th>
                            <th>Ninjonik</th>
                            <th>Soviet Union</th>
                            <th>100%</th>
                            <th>25.6.2023 15:47</th>
                            <th>
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>

@section('js')
    @vite("resources/js/lobby.js")
@stop






