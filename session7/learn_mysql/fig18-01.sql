SELECT * FROM products;

SELECT productID, productName, listPrice
FROM products
/*order by sap xep theo gia tang dan*/
ORDER BY listPrice;

SELECT productID, productName, listPrice
FROM products
WHERE listPrice < 450
ORDER BY listPrice;

SELECT productID, productName, listPrice
FROM products
WHERE listPrice < 10;


