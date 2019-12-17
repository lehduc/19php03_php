-- Lấy ra tên thành phố mà khách hàng đã mua sản phẩm "Yamaha FG700S"
SELECT city,customerID,categoryID
FROM addresses, customers, products 
/* ket hop nhieu bang voi nhau dung join*/
WHERE products = 'Yamaha FG700S'
