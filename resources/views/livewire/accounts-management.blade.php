<div>
    {{-- Be like water. --}}

    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="card-title">
                            <h5>Admin Accounts</h5>
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">New</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-border table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if (auth()->user()->id === $user->id)
                                @continue
                            @endif
                            <tr>
                                <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <button wire:click="deleteAccount({{ $user->id }})" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit='newAccount'>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">New Account</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @error('lastname')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @error('firstname')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="lastname" class="form-label">Lastname</label>
                            <input type="text" class="form-control" id="lastname" placeholder="Last Name"
                                wire:model='lastname'>
                            @error('lastname')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Firstname</label>
                            <input type="text" class="form-control" id="firstname" placeholder="First Name"
                                wire:model='firstname'>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email"
                                wire:model='email'>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" placeholder="Default Password"
                                wire:model='password'>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
