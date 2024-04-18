<?php

class OrderController {
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }
    // Phương thức để hiển thị trang thông tin đặt hàng
    public function showCheckoutPage() {
        include_once 'app/views/order/checkout.php';
    }

    // Phương thức để xử lý thông tin đặt hàng
    public function processOrder() {
        // Kiểm tra xem người dùng đã gửi dữ liệu POST chưa
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra tính hợp lệ của dữ liệu (ví dụ: kiểm tra các trường có được điền không)
            if (isset($_POST['hoTen']) && isset($_POST['email']) && isset($_POST['sdt']) && isset($_POST['diaChi']) && isset($_POST['ghiChu']) && isset($_POST['phuongThucThanhToan'])) {
                // Lưu thông tin đơn hàng vào cơ sở dữ liệu
                $order_id = $this->saveOrder($_POST['hoTen'], $_POST['email'], $_POST['sdt'], $_POST['diaChi'], $_POST['ghiChu'], $_POST['phuongThucThanhToan']);
                
                if ($order_id) {
                    // Chuyển hướng người dùng đến trang xác nhận
                    header('Location: /chieu2/order/confirmation');
                    exit;
                } else {
                    // Xử lý lỗi nếu có
                    echo "Đã xảy ra lỗi khi lưu đơn hàng vào cơ sở dữ liệu!";
                }
            } else {
                // Hiển thị thông báo lỗi nếu dữ liệu không hợp lệ
                echo "Vui lòng điền đầy đủ thông tin!";
            }
        }
    }
    
    public function confirmation() {
        // Hiển thị trang xác nhận bằng cách render view tương ứng
        include_once 'app/views/order/confirmation.php';
    }
    
    // Phương thức để lưu đơn hàng vào cơ sở dữ liệu
    private function saveOrder($name, $email) {
        // Sử dụng kết nối PDO đã được khai báo trong constructor
        $sql = "INSERT INTO orders (user_id, total_amount, status) VALUES (:user_id, :total_amount, :status)";
    
        // Lấy ID người dùng từ bảng account dựa trên email
        $query = "SELECT id FROM account WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user) {
            // Nếu người dùng tồn tại, tiến hành thêm đơn hàng
            $user_id = $user['id'];
            $total_amount = 100; // Giá trị tổng số tiền của đơn hàng (giả sử)
            $status = 'pending'; // Trạng thái đơn hàng
            
            // Thực hiện truy vấn thêm đơn hàng
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->bindParam(':total_amount', $total_amount, PDO::PARAM_STR);
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $result = $stmt->execute();
            
            if ($result) {
                // Trả về ID của đơn hàng được tạo
                return $this->db->lastInsertId();
            } else {
                // Trả về false nếu có lỗi
                return false;
            }
        } else {
            // Trả về false nếu không tìm thấy người dùng
            return false;
        }
    }
    
    
    
    
}    

?>
