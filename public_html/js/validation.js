document.addEventListener("DOMContentLoaded", function () {
    // Lấy form thêm nhân viên
    const addEmployeeForm = document.getElementById("addEmployeeForm");
    
    // Lấy cái hộp thông báo lỗi để ẩn/hiện
    const errorMsgBox = document.getElementById("formErrorMsg");

    if (addEmployeeForm) {
        addEmployeeForm.addEventListener("submit", function (e) {
            // Ngăn chặn form gửi đi ngay lập tức để kiểm tra lỗi trước
            e.preventDefault();

            // Lấy giá trị từ các ô nhập liệu
            const name = document.getElementById("empName").value.trim();
            const email = document.getElementById("empEmail").value.trim();
            const phone = document.getElementById("empPhone").value.trim();
            const dept = document.getElementById("empDept").value;
            const salary = document.getElementById("empSalary").value.trim();

            let errors = []; // Mảng chứa các lỗi

            // 1. Kiểm tra Họ Tên
            if (name === "") {
                errors.push("Vui lòng nhập họ và tên.");
            }

            // 2. Kiểm tra Email (Dùng Regex cơ bản)
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === "") {
                errors.push("Vui lòng nhập email.");
            } else if (!emailPattern.test(email)) {
                errors.push("Định dạng email không hợp lệ.");
            }

            // 3. Kiểm tra Số điện thoại (Chỉ nhận 10 chữ số)
            const phonePattern = /^[0-9]{10}$/;
            if (phone === "") {
                errors.push("Vui lòng nhập số điện thoại.");
            } else if (!phonePattern.test(phone)) {
                errors.push("Số điện thoại phải bao gồm đúng 10 chữ số.");
            }

            // 4. Kiểm tra Phòng ban
            if (dept === "" || dept === null) {
                errors.push("Vui lòng chọn phòng ban.");
            }

            // 5. Kiểm tra Mức lương
            if (salary === "") {
                errors.push("Vui lòng nhập mức lương.");
            } else if (isNaN(salary) || Number(salary) <= 0) {
                errors.push("Mức lương phải là một số lớn hơn 0.");
            }

            // XỬ LÝ HIỂN THỊ LỖI HOẶC GỬI FORM
            if (errors.length > 0) {
                // Nếu có lỗi: Hiển thị hộp thông báo màu đỏ
                errorMsgBox.innerHTML = "<strong>Lỗi:</strong><br>" + errors.join("<br>");
                errorMsgBox.classList.remove("d-none"); // Bỏ class ẩn đi
            } else {
                // Nếu không có lỗi: Giấu hộp thông báo và cho phép gửi form
                errorMsgBox.classList.add("d-none");
                
                // Hiển thị thông báo (Có thể bỏ đi lúc ráp code thực tế)
                alert("Dữ liệu hợp lệ! Bắt đầu gửi lên server...");
                
                // Trực tiếp Submit form đi (Tạm thời nó sẽ báo lỗi 404 do chưa code file create.php)
                this.submit();
            }
        });
    }
});