<?php
class ProductModel {
    private $conn;
    private $table_name = "products";

    public function __construct($db) {
        $this->conn = $db;
    }

    function readAll() {
        $query = "SELECT id, name, description, price, image FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    function createProduct($name, $description, $price, $uploadResult)
    {
        // uploadResult: đường dẫn của file hình 
        // uploadResult = false: lỗi upload hình ảnh
        // Kiểm tra ràng buộc đầu vào
        $errors = [];
        if (empty($name)) {
            $errors['name'] = 'Tên sản phẩm không được để trống';
        }
        if (empty($description)) {
            $errors['description'] = 'Mô tả không được để trống';
        }
        if (!is_numeric($price) || $price < 0) {
            $errors['price'] = 'Giá sản phẩm không hợp lệ';
        }

        if ($uploadResult == false) {
            $errors['image'] = 'Vui lòng chọn hình ảnh hợp lệ!';
        }

        if (count($errors) > 0) {
            return $errors;
        }

        // Truy vấn tạo sản phẩm mới

        $query = "INSERT INTO " . $this->table_name . " (name, description, price, image) VALUES (:name, :description, :price, :image)";
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));
        $price = htmlspecialchars(strip_tags($price));

        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image', $uploadResult);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function getProductById($id){

        $query = "SELECT * FROM " . $this->table_name . " where id = $id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function deleteProductFromDatabase($id)
{
    try {
        // Chuẩn bị truy vấn SQL để xóa sản phẩm từ cơ sở dữ liệu
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        
        // Bind giá trị cho tham số :id
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Thực thi truy vấn
        $stmt->execute();
        
        // Kiểm tra xem có bản ghi nào bị ảnh hưởng bởi truy vấn không
        if ($stmt->rowCount() > 0) {
            // Sản phẩm đã được xóa thành công
            return true;
        } else {
            // Không có sản phẩm nào được xóa (có thể do không tìm thấy sản phẩm với ID tương ứng)
            return false;
        }
    } catch (PDOException $e) {
        // Xử lý ngoại lệ nếu có
        // Ví dụ: ghi log lỗi, hiển thị thông báo cho người dùng, v.v.
        echo "Đã xảy ra lỗi khi xóa sản phẩm: " . $e->getMessage();
        return false;
    }
}


    function updateProduct($id, $name, $description, $price, $uploadResult){

        if ($uploadResult) {
            $query = "UPDATE " . $this->table_name . " SET name=:name, description=:description, price=:price, image=:image WHERE id=:id";
        } else {
            $query = "UPDATE " . $this->table_name . " SET name=:name, description=:description, price=:price WHERE id=:id";
        }

        $stmt = $this->conn->prepare($query);
        // Làm sạch dữ liệu
        $name = htmlspecialchars(strip_tags($name));
        $description = htmlspecialchars(strip_tags($description));
        $price = htmlspecialchars(strip_tags($price));
        // Gán dữ liệu vào câu lệnh
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        if($uploadResult){
            $stmt->bindParam(':image', $uploadResult);
        }
        // Thực thi câu lệnh
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}