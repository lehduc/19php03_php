-- SELECT * FROM categories;
-- Lấy ra danh sách sản phẩm mà tên có chứa chữ "o", thuộc danh mục "Basses", sắp xếp giảm dần theo tên
SELECT productName, categoryName
FROM products, categories
WHERE productName LIKE '%o%' AND categoryName = "Basses"
ORDER BY productName DESC