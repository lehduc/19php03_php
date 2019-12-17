 -- Lấy ra danh sách sản phẩm mà khách hàng sử dụng gmail để mua
---
SELECT productName, emailAddress
FROM customers, products
WHERE emailAddress IS NOT NULL