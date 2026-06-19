# Dự án Website Tổng hợp (Bootstrap 5 + PHP + MySQL + XML + JS/AJAX)

Thư mục này chứa cấu trúc khung xương (boilerplate) được tạo sẵn cho bài tập cuối môn của nhóm. Các file hiện tại đang được để trống để các thành viên tự lập trình.

## Cấu trúc thư mục chi tiết

- `public_html/`: Thư mục gốc phân phối Web (nơi trỏ Domain hoặc cài đặt Web Root trong XAMPP / IIS).
  - `index.html`: Trang chủ chính (thiết kế bằng Bootstrap 5: Navbar, Carousel, Cards...).
  - `bootstrap/`: Chứa thư viện CSS & JS của Bootstrap 5 (tải local).
  - `css/styles.css`: Chứa CSS tùy biến của dự án.
  - `js/validation.js`: JavaScript để validate dữ liệu form ở phía Client.
  - `js/xml_loader.js`: JavaScript sử dụng AJAX (`XMLHttpRequest`) và XML DOM để nạp dữ liệu từ file XML mà không load lại trang.
  - `images/`: Chứa hình ảnh (Logo nhóm, banner carousel, ảnh sản phẩm/bài viết).

- `pages/`: Thư mục chứa các file PHP xử lý logic phía Server (để bảo mật, tránh bị truy cập trực tiếp từ URL bên ngoài nếu cấu hình Web Server tốt).
  - `config/db.php`: File kết nối cơ sở dữ liệu MySQL.
  - `crud/`: Chứa các trang thêm (`create.php`), đọc (`index.php`), sửa (`update.php`), xóa (`delete.php`) dữ liệu từ cơ sở dữ liệu.
  - `auth/`: Chứa chức năng đăng nhập (`login.php`) và đăng ký (`register.php`).
  - `xml_data/`: Chứa file dữ liệu XML (`catalog.xml`) và file định nghĩa cấu trúc XML (`schema.dtd`).

- `database/`:
  - `database.sql`: File chứa mã SQL để import cấu trúc bảng và dữ liệu mẫu vào MySQL.

## Hướng dẫn cài đặt cơ bản

1. **Cấu hình Web Server**: 
   - Đặt thư mục `public_html` làm thư mục gốc (Document Root) trên Apache (XAMPP) hoặc IIS.
2. **Cơ sở dữ liệu**:
   - Mở phpMyAdmin hoặc công cụ quản lý MySQL khác, tạo một cơ sở dữ liệu mới.
   - Import file `database/database.sql` vào cơ sở dữ liệu vừa tạo.
   - Cập nhật thông tin kết nối (host, username, password, dbname) trong file `pages/config/db.php`.
3. **Chạy thử**:
   - Truy cập địa chỉ `http://localhost/` (hoặc cổng cấu hình tương ứng) để xem trang chủ.
