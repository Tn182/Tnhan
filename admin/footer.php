</div>
</section>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js'></script>
<!-- <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.jshttps://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script> -->
<script src="./css/script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Lấy tất cả các phần tử .has-dropdown
        const dropdowns = document.querySelectorAll(".has-dropdown");

        // Lặp qua mỗi phần tử .has-dropdown và thêm sự kiện click
        dropdowns.forEach(function(dropdown) {
            dropdown.addEventListener("click", function() {
                // Lấy phần tử ul con của phần tử .has-dropdown
                const dropdownList = dropdown.querySelector(".sidebar-dropdown");

                // Kiểm tra xem phần tử ul đã có lớp .active hay không
                const isActive = dropdownList.classList.contains("active");

                // Nếu có lớp .active, thì loại bỏ nó; nếu không có, thêm lớp .active
                if (isActive) {
                    dropdownList.classList.remove("active");
                } else {
                    dropdownList.classList.add("active");
                }
            });
        });
    });
</script>

</body>

</html>