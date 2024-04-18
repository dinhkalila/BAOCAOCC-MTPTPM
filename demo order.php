<?php
class InvoiceController {
    public function createInvoice($customerName, $cart) {
        // Kết nối đến cơ sở dữ liệu
        $pdo = new PDO("mysql:host=localhost;dbname=your_database;charset=utf8mb4", "username", "password");
        
        try {
            // Bắt đầu giao dịch
            $pdo->beginTransaction();

            // Tính tổng số tiền của hóa đơn
            $totalAmount = 0;
            foreach ($cart as $item) {
                $totalAmount += $item['quantity'] * $item['price'];
            }

            // Thêm hóa đơn vào bảng invoices
            $stmt = $pdo->prepare("INSERT INTO invoices (customer_name, total_amount, created_at) VALUES (?, ?, NOW())");
            $stmt->execute([$customerName, $totalAmount]);
            $invoiceId = $pdo->lastInsertId();

            // Thêm chi tiết hóa đơn vào bảng invoice_details
            $stmt = $pdo->prepare("INSERT INTO invoice_details (invoice_id, product_id, quantity, unit_price, total_price) VALUES (?, ?, ?, ?, ?)");
            foreach ($cart as $item) {
                $productId = $item['id'];
                $quantity = $item['quantity'];
                $unitPrice = $item['price'];
                $totalPrice = $quantity * $unitPrice;

                $stmt->execute([$invoiceId, $productId, $quantity, $unitPrice, $totalPrice]);
            }

            // Commit giao dịch
            $pdo->commit();

            // Xóa giỏ hàng sau khi đã tạo hóa đơn thành công
            unset($_SESSION['cart']);

            echo "Hóa đơn đã được tạo thành công!";
        } catch (PDOException $e) {
            // Nếu có lỗi xảy ra, rollback giao dịch
            $pdo->rollBack();
            echo "Có lỗi xảy ra khi tạo hóa đơn: " . $e->getMessage();
        }
    }
}
?>
