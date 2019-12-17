-- Lấy ra danh sách sản phẩm có giá lơn hơn 300, đăng năm 2014, giới
-- hạn lấy 4 sản phẩm và sắp xếp theo giảm giá giảm dần
SELECT productName,listPrice,dateAdded
FROM products 
WHERE  dateAdded LIKE  '2014%' AND listPrice > 300 
ORDER BY listPrice DESC
LIMIT 0 , 4