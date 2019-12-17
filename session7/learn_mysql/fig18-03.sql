SELECT productID, productName
FROM products
/* limit 3 la lay ra 3 san pham dau tien*/
LIMIT 3;

SELECT productID, productName
FROM products
/* limit lay 3 san pham tu vi tri so 0*/
LIMIT 0 , 3;

SELECT productID, productName
FROM products
/* lay 3 san pham tu vi tri so 1*/
LIMIT 1, 3;
