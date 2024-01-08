function register() {
    // Xử lý đăng ký, gửi dữ liệu đăng ký đến máy chủ
    alert("Đăng ký thành công!");
}

function login() {
    // Xử lý đăng nhập, gửi dữ liệu đăng nhập đến máy chủ
    alert("Đăng nhập thành công!");
}
function redirectToLogin() {
    window.location.href = "login_register.html";
}
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click' , ()=>{
    container.classList.add("active");
});

loginBtn.addEventListener('click' , ()=>{
    container.classList.remove("active");
});

    function redirectToLogin() {
        window.location.href = "login_register.html";
    }