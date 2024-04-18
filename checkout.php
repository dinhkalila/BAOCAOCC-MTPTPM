<?php
include_once 'app/views/share/header.php';
?>

<div class="container">
    <h2 class="my-4">Thông tin thanh toán</h2>
    <form action="/chieu2/order/processOrder" method="post">
        <div class="form-group">
            <label for="hoTen">Họ tên:</label>
            <input type="text" class="form-control" name="hoTen" required>
        </div>
        <div class="form-group">
            <label for="sdt">Số điện thoại:</label>
            <input type="tel" class="form-control" name="sdt" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label for="diaChi">Địa chỉ nhận hàng:</label>
            <input type="text" class="form-control" name="diaChi" required>
        </div>
        <div class="form-group">
            <label for="ghiChu">Ghi chú đơn hàng:</label>
            <textarea class="form-control" name="ghiChu" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="phuongThucThanhToan">Phương thức thanh toán:</label>
            <select class="form-control" name="phuongThucThanhToan" required>
                <option value="COD">COD</option>
                <option value="Bank transfer">Bank transfer</option>
                <option value="PayPal">PayPal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thanh toán</button>
    </form>
</div>

<?php include_once 'app/views/share/footer.php'; ?>
