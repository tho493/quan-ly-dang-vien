# Tài liệu triển khai hệ thống quản lý đảng viên

## Tổng quan

Hệ thống đã được nâng cấp với các tính năng quản lý đảng viên, chi bộ và nghiệp vụ đảng theo yêu cầu.

## Các tính năng đã triển khai

### 1. Cấu trúc Database

Đã tạo các bảng mới trong file `database/migration_add_features.sql`:

- **hosodang_muc**: Danh mục 7 mục hồ sơ đảng viên
- **hosodang_files_muc**: File hồ sơ theo từng mục và năm
- **hosodang_nam**: Hồ sơ theo năm (phiếu bổ sung lý lịch, kiểm điểm cuối năm, xác nhận cư trú)
- **hosodang_duyet**: Bảng duyệt hồ sơ (kết nạp, chuyển chính thức, chuyển sinh hoạt, xóa tên)
- **thongbao_nhacviec**: Thông báo nhắc việc
- **dangbo_xeploai**: Xếp loại đảng bộ
- **hosodang_theodoi**: Theo dõi đảng viên (nhận xét của người theo dõi)

Các trường mới đã thêm vào bảng `hosodang`:
- LoaiDangVien (GV, VC, SV)
- TrangThaiDang (chinhthuc, dubi)
- DaCapTheDang
- NgayRaTruong

Các trường mới đã thêm vào bảng `chibo`:
- PhoBiThu
- XepLoai
- KhenThuong

### 2. Giao diện quản trị (3 menu chính)

#### Menu 1: Quản lý chi bộ, đảng viên
- **Controller**: `admin/controllers/quanlychibo/index.php`
- **View**: `admin/views/quanlychibo/index.php`
- Hiển thị 16 chi bộ với thống kê:
  - Tổng số đảng viên
  - Chính thức / Dự bị
  - GV / Viên chức / SV
- Danh sách đảng viên đang sinh hoạt
- Đánh dấu đảng viên thiếu hồ sơ (màu vàng/đỏ)
- Click vào đảng viên để xem chi tiết hồ sơ

#### Menu 2: Nghiệp vụ đảng
- **Controller**: `admin/controllers/nghiepvu/index.php`
- **View**: `admin/views/nghiepvu/index.php`
- **Action duyệt**: `admin/controllers/nghiepvu/duyet.php`
- Các chức năng:
  - Duyệt hồ sơ kết nạp đảng
  - Duyệt hồ sơ chuyển chính thức
  - Duyệt hồ sơ chuyển sinh hoạt (hỗ trợ chuyển trong cùng đảng bộ)
  - Duyệt hồ sơ xóa tên
  - Xếp loại đảng bộ (upload file quyết định khen thưởng)

#### Menu 3: Văn bản
- Quản lý văn bản mẫu (chia 7 mục)
- Văn bản cấp trên (Trung ương, Thành ủy, Phường)
- Văn bản nội bộ (chứa cả thông báo)

### 3. Hồ sơ đảng viên chi tiết

- **Controller**: `admin/controllers/hosodang/info.php` (đã cập nhật)
- **View**: `admin/views/hosodang/info_table.php` (đã cập nhật)
- Hiển thị 7 mục hồ sơ:
  1. Lý lịch đảng viên
  2. Đơn xin vào Đảng
  3. Bản tự khai lý lịch
  4. Giấy khai sinh
  5. Bằng tốt nghiệp
  6. Chứng minh nhân dân/Căn cước công dân
  7. Giấy chứng nhận sức khỏe
- Mục thiếu hồ sơ được đánh dấu màu đỏ
- Quản lý hồ sơ theo năm:
  - Phiếu bổ sung lý lịch
  - Kiểm điểm cuối năm
  - Xác nhận cư trú
- Upload file theo từng mục: `admin/controllers/hosodang/uploadmuc.php`

### 4. Hệ thống thông báo nhắc việc

- **Controller**: `admin/controllers/thongbao/nhacviec.php`
- **View**: `admin/views/thongbao/nhacviec.php`
- **Cron job**: `cron/check_reminders.php`
- Các loại nhắc:
  - Chuyển sinh hoạt: SV sau 30 ngày ra trường
  - Chuyển chính thức: Sau 1 năm kết nạp
- Hiển thị như báo có thư đến

### 5. Trang người dùng

#### Menu mới đã thêm:
- **Hồ sơ đảng viên**: `website/controllers/hosodangvien/index.php`
  - Đảng viên xem hồ sơ của mình
  - Xem và tải các file hồ sơ
  
- **Biểu mẫu**: `website/controllers/bieumau/index.php`
  - Xem và tải các biểu mẫu
  
- **Links**: 
  - E-Gov: https://egov.saodo.edu.vn
  - Saodo.edu.vn: https://saodo.edu.vn

### 6. Phân quyền

Hệ thống hỗ trợ 3 cấp quyền:

1. **Quyền đảng bộ**: 
   - Full access đến tất cả 3 menu chính
   - Tất cả các nghiệp vụ

2. **Quyền chi bộ** (Bí thư, Phó bí thư):
   - Kết nạp đảng (upload mẫu)
   - Theo dõi đảng viên (upload hồ sơ theo dõi)
   - Chuyển chính thức (upload hồ sơ)
   - Xếp loại đảng viên của chi bộ

3. **Quyền đảng viên**:
   - Xem hồ sơ đảng của mình
   - Xem và tải văn bản, thông báo, biểu mẫu

## Cài đặt

### 1. Chạy migration database

```sql
-- Chạy file database/migration_add_features.sql
-- Lưu ý: Nếu cột đã tồn tại, bỏ qua các lệnh ALTER TABLE tương ứng
```

### 2. Cấu hình cron job

Thêm vào crontab để chạy hàng ngày:

```bash
0 8 * * * /usr/bin/php /path/to/dangvien/cron/check_reminders.php
```

### 3. Cấu hình quyền

Cập nhật bảng `taikhoan` với các permission mới:
- `quanlychibo`: Quản lý chi bộ, đảng viên
- `nghiepvu`: Nghiệp vụ đảng

Ví dụ cho quyền đảng bộ:
```
home, quanlychibo, nghiepvu, chibo, hosodang, khenthuong, kyluat, taikhoan, thongbao, vanban, vanbannhom, xeploai
```

## Lưu ý

1. File upload được lưu trong `public/upload/files/`
2. Cần tạo thư mục `cron/` nếu chưa có
3. Cần cấu hình URL rewriting nếu muốn sử dụng URL thân thiện
4. Các route mới trong `index.php` đã được xử lý để hỗ trợ URL với dấu gạch ngang

## Các file đã tạo/cập nhật

### Controllers mới:
- `admin/controllers/quanlychibo/index.php`
- `admin/controllers/nghiepvu/index.php`
- `admin/controllers/nghiepvu/duyet.php`
- `admin/controllers/hosodang/uploadmuc.php`
- `admin/controllers/thongbao/nhacviec.php`
- `website/controllers/hosodangvien/index.php`
- `website/controllers/bieumau/index.php`

### Views mới:
- `admin/views/quanlychibo/index.php`
- `admin/views/nghiepvu/index.php`
- `admin/views/hosodang/uploadmuc.php`
- `admin/views/thongbao/nhacviec.php`
- `website/views/hosodangvien/index.php`
- `website/views/bieumau/index.php`

### Files cập nhật:
- `admin/views/shared/navbar.php` - Menu 3 cấp
- `admin/controllers/hosodang/info.php` - Thêm dữ liệu hồ sơ
- `admin/views/hosodang/info_table.php` - Hiển thị 7 mục hồ sơ
- `website/views/shared/header.php` - Menu mới
- `index.php` - Routing mới

### Database:
- `database/migration_add_features.sql` - Migration script

### Cron:
- `cron/check_reminders.php` - Script kiểm tra nhắc việc

