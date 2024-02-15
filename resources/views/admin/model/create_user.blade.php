<div class="modal fade " data-bs-theme="dark" id="CreateModel" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="CreateModelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-light" id="CreateModelLabel">Dynamite</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" id="form_creat_user" action="{{ route('create_user') }}">
                        @csrf
                        <div class="md-5">
                            <label for="username" class="form-label text-light">Username</label>
                            <input id="username" placeholder="username "
                                type="text"class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="md-5">
                            <label for="email" class="form-label ">Email</label>
                            <input placeholder="E-mail" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="md-5">
                            <label for="password" class="form-label ">Password </label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                placeholder="password" autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="md-5">
                            <label for="password-confirm" class="form-label ">Password Confirm</label>
                            <input id="password-confirm" type="password" placeholder="Password Confirm"
                                class="form-control"name="password_confirmation" required autocomplete="new-password">

                        </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="creat_user" class="btn btn-success">{{ __('Register') }}</button>

            </div>
            </form>
        </div>
    </div>
</div>
