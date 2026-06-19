<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên - HR Portal</title>
    
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="../../index.html">
                <img src="../../images/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
                HR Portal Admin
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Quản lý nhân viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Chấm công</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Thống kê</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="text-light me-3">Xin chào, <strong>Admin</strong></span>
                    <a href="../auth/login.php" class="btn btn-sm btn-outline-danger">Đăng xuất</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container-fluid px-4 my-4">
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold text-dark mb-0">Danh Sách Nhân Viên</h3>
            
            <button type="button" class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                + Thêm Nhân Viên Mới
            </button>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center" style="width: 50px;">ID</th>
                                <th scope="col">Họ và Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số Điện Thoại</th>
                                <th scope="col">Phòng Ban</th>
                                <th scope="col">Mức Lương (VNĐ)</th>
                                <th scope="col" class="text-center" style="width: 150px;">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center fw-bold">1</td>
                                <td>Nguyễn Văn A</td>
                                <td>nva@congty.com</td>
                                <td>0901234567</td>
                                <td><span class="badge bg-info text-dark">Phòng IT</span></td>
                                <td>15,000,000</td>
                                <td class="text-center">
                                    <a href="update.php?id=1" class="btn btn-sm btn-warning">Sửa</a>
                                    <a href="delete.php?id=1" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?');">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center fw-bold">2</td>
                                <td>Trần Thị B</td>
                                <td>ttb@congty.com</td>
                                <td>0987654321</td>
                                <td><span class="badge bg-success">Nhân sự</span></td>
                                <td>12,000,000</td>
                                <td class="text-center">
                                    <a href="update.php?id=2" class="btn btn-sm btn-warning">Sửa</a>
                                    <a href="delete.php?id=2" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?');">Xóa</a>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white py-3">
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-sm justify-content-end mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">Trước</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">Sau</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                
                <form id="addEmployeeForm" action="create.php" method="POST">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title fw-bold" id="addEmployeeModalLabel">Thêm Nhân Viên Mới</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                        <div id="formErrorMsg" class="alert alert-danger d-none" role="alert"></div>

                        <div class="mb-3">
                            <label for="empName" class="form-label">Họ và Tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="empName" name="ho_ten" placeholder="Nhập họ tên đầy đủ">
                        </div>
                        
                        <div class="mb-3">
                            <label for="empEmail" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="empEmail" name="email" placeholder="ví dụ: nva@gmail.com">
                        </div>
                        
                        <div class="mb-3">
                            <label for="empPhone" class="form-label">Số Điện Thoại <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="empPhone" name="sdt" placeholder="Nhập 10 chữ số">
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="empDept" class="form-label">Phòng Ban</label>
                                <select class="form-select" id="empDept" name="phong_ban_id">
                                    <option value="" selected disabled>-- Chọn phòng --</option>
                                    <option value="1">Phòng IT</option>
                                    <option value="2">Hành chính Nhân sự</option>
                                    <option value="3">Phòng Kế toán</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="empSalary" class="form-label">Mức Lương (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="empSalary" name="muc_luong" placeholder="Nhập số tiền">
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary">Lưu Nhân Viên</button>
                    </div>
                </form>
                </div>
        </div>
    </div>

    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../js/validation.js"></script>
</body>
</html>