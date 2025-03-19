<link rel="stylesheet" href="{{ asset('/assets/css/layout/modal_login.css') }}">
<script>
    var registerApiUrl = "{{ route('sigup.api') }}";
    var loginApiUrl = "{{ route('login.api') }}";
</script>
<script src="{{ asset('/assets/js/login/auth.js') }}"></script>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-login ">
                <input type="checkbox" id="chk" aria-hidden="true">
                <div class="login">
                    <form id="loginForm" class="auth-form w-100">
                        @csrf
                        <label class="mb-5 mt-4" for="chk" aria-hidden="true">Login</label>
                        <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email" required>
                        <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password" required>
                        <button type="submit" class="button-login">Login</button>
                    </form>
                </div>
                <div class="signup">
                    <form id="registerForm" class="auth-form">
                        @csrf
                        <label class="mb-5" for="chk" aria-hidden="true">Sign up</label>
                        <input type="text" class="form-control mb-3" id="register_name" name="name" placeholder="Name" required>
                        <input type="email" class="form-control mb-3" id="register_email" name="email" placeholder="Email" required>
                        <input type="text" class="form-control mb-3" id="register_phone" name="phone" placeholder="Phone" required>
                        <input type="password" class="form-control mb-3" id="register_password" name="password" placeholder="Password" required>
                        <button type="submit" class="button-login">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
