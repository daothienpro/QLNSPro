document.addEventListener("DOMContentLoaded", function() {
    // Gọi hàm load dữ liệu khi trang vừa tải xong
    loadXMLDoc();
});

function loadXMLDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            renderXMLToTable(this);
        }
    };
    // Trỏ đúng đường dẫn tới file XML
    xhttp.open("GET", "pages/xml_data/phong_ban.xml", true);
    xhttp.send();
}

function renderXMLToTable(xml) {
    var xmlDoc = xml.responseXML;
    // Lấy danh sách các thẻ <phong_ban>
    var phongBanList = xmlDoc.getElementsByTagName("phong_ban");
    
    // Khởi tạo cấu trúc bảng Bootstrap
    var tableHTML = `
        <table class="table table-bordered table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Mã Phòng</th>
                    <th>Tên Phòng Ban</th>
                    <th>Trưởng Phòng</th>
                    <th>Số Nhân Sự</th>
                </tr>
            </thead>
            <tbody>
    `;
    
    // Duyệt qua từng node và dùng các hàm DOM (getAttribute, childNodes)
    for (var i = 0; i < phongBanList.length; i++) {
        var node = phongBanList[i];
        var id = node.getAttribute("id");
        var tenPhong = node.getElementsByTagName("ten_phong")[0].childNodes[0].nodeValue;
        var truongPhong = node.getElementsByTagName("truong_phong")[0].childNodes[0].nodeValue;
        var soLuong = node.getElementsByTagName("so_luong_nv")[0].childNodes[0].nodeValue;
        
        tableHTML += `
            <tr>
                <td><strong>${id}</strong></td>
                <td>${tenPhong}</td>
                <td>${truongPhong}</td>
                <td><span class="badge bg-primary rounded-pill">${soLuong}</span></td>
            </tr>
        `;
    }
    
    tableHTML += "</tbody></table>";
    
    // Đổ dữ liệu vào container (bạn có thể tạo một <div id="xml-table-container"></div> ở index.html hoặc trang nào muốn hiển thị)
    var container = document.getElementById("xml-table-container");
    if(container) {
        container.innerHTML = tableHTML;
    }
}