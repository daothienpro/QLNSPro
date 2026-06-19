import os

def create_new_project_structure():
    print("🚀 Bắt đầu khởi tạo cấu trúc dự án mới 100%...\n")

    # Định nghĩa cấu trúc thư mục và các file bên trong
    structure = {
        "public_html": [
            "index.html"
        ],
        "public_html/css": [
            "styles.css"
        ],
        "public_html/js": [
            "validation.js",
            "xml_loader.js"
        ],
        "public_html/images": [], # Thư mục rỗng chờ thả ảnh
        "public_html/database": [
            "database.sql"
        ],
        "public_html/pages/auth": [
            "login.php",
            "register.php"
        ],
        "public_html/pages/config": [
            "db.php"
        ],
        "public_html/pages/crud": [
            "create.php",
            "delete.php",
            "index.php",
            "update.php"
        ],
        "public_html/pages/xml_data": [
            "phong_ban.xml",  # Dữ liệu phòng ban (chủ đề nhân sự)
            "schema.dtd"
        ]
    }

    # Duyệt qua từng thư mục và tạo
    for folder_path, files in structure.items():
        # 1. Tạo thư mục
        try:
            os.makedirs(folder_path, exist_ok=True)
            print(f"📁 Đã tạo thư mục: {folder_path}")
        except Exception as e:
            print(f"⚠️ Lỗi tạo thư mục {folder_path}: {e}")
            continue

        # 2. Tạo các file rỗng bên trong thư mục
        for file_name in files:
            file_path = os.path.join(folder_path, file_name)
            # Chỉ tạo mới nếu file chưa tồn tại để tránh ghi đè nhầm
            if not os.path.exists(file_path):
                try:
                    with open(file_path, 'w', encoding='utf-8') as f:
                        pass # Tạo file rỗng
                    print(f"   📄 Đã tạo file: {file_name}")
                except Exception as e:
                    print(f"   ⚠️ Lỗi tạo file {file_name}: {e}")
            else:
                print(f"   ℹ️ File đã tồn tại: {file_name}")

    print("\n🎉 Hoàn tất! Cấu trúc dự án mới đã sẵn sàng.")

if __name__ == "__main__":
    create_new_project_structure()