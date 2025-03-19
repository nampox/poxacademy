document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#registerForm").addEventListener("submit", function (e) {
        e.preventDefault();
        registerUser();
    });

    document.querySelector("#loginForm").addEventListener("submit", function (e) {
        e.preventDefault();
        loginUser();
    });
});
let isProcessing = false;

function registerUser() {
    if (isProcessing) return;
    isProcessing = true;

    let formData = new FormData(document.querySelector("#registerForm"));

    fetch(registerApiUrl, {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showFlashMessage('success', 'Đăng ký thành công.');
                location.reload();
            } else {
                showFlashMessage('error', '❌ Đăng ký thất bại.');
            }
        })
        .catch(error => {
            console.error("Lỗi:", error);
            alert("Có lỗi xảy ra, vui lòng thử lại!");
        })
        .finally(() => {
            isProcessing = false;
        });
}

function loginUser() {
    if (isProcessing) return;
    isProcessing = true;

    let formData = new FormData(document.querySelector("#loginForm"));

    fetch(loginApiUrl, {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showFlashMessage('success', 'Đăng nhập thành công.');
                location.reload();
            } else {
                showFlashMessage('error', '❌ Đăng nhập thất bại.');
            }
        })
        .catch(error => {
            console.error("Lỗi:", error);
            alert("Có lỗi xảy ra, vui lòng thử lại!");
        })
        .finally(() => {
            isProcessing = false;
        });
}
