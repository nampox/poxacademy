<link rel="stylesheet" href="{{ asset('/assets/css/layout/modal_login.css') }}">

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Đăng nhập</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Đăng nhập -->
                <form id="loginForm" class="auth-form">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
                </form>

                <!-- Form Đăng ký (ẩn ban đầu) -->
                <form id="registerForm" class="auth-form d-none">
                    @csrf
                    <div class="mb-3">
                        <label for="register_name" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control" id="register_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="register_email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="register_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="register_phone" class="form-label">phone:</label>
                        <input type="number" class="form-control" id="register_phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="register_password" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control" id="register_password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Đăng ký</button>
                </form>

                <div id="loginError" class="text-danger mt-2"></div>

                <!-- Nút chuyển đổi giữa Đăng nhập & Đăng ký -->
                <div class="text-center mt-3">
                    <button id="toggleAuth" class="btn btn-link">Tạo tài khoản</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('toggleAuth').addEventListener('click', function () {
        document.getElementById('loginForm').classList.toggle('d-none');
        document.getElementById('registerForm').classList.toggle('d-none');

        let modalTitle = document.getElementById('modalTitle');
        let toggleButton = document.getElementById('toggleAuth');

        if (document.getElementById('registerForm').classList.contains('d-none')) {
            modalTitle.innerText = "Đăng nhập";
            toggleButton.innerText = "Tạo tài khoản";
        } else {
            modalTitle.innerText = "Đăng ký tài khoản";
            toggleButton.innerText = "Quay lại đăng nhập";
        }
    });
    $(document).ready(function () {
        $("#registerForm").on("submit", function (e) {
            e.preventDefault();
            registerUser();
        });
        $("#loginForm").on("submit", function (e) {
            e.preventDefault();
            loginUser();
        });
    });
    function registerUser() {
        let formData = new FormData($("#registerForm")[0]);

        $.ajax({
            url: "{{ route('sigup.api') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {
                showFlashMessage('error', '❌  Something went wrong.');
            },
            error: function (xhr) {
                let errors = xhr.responseJSON?.errors;
                if (errors) {
                    let errorMsg = Object.values(errors).flat().join("\n");
                    alert("Lỗi: " + errorMsg);
                } else {
                    alert("Có lỗi xảy ra, vui lòng thử lại!");
                }
            }
        });
    }
    function loginUser() {
        let formData = new FormData($("#loginForm")[0]);

        $.ajax({
            url: "{{ route('login.api') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function (response) {
                showFlashMessage('error', '❌  Something went wrong.');
            },
        });
    }
</script>

