/* AS name la dung ten gia. tao truong moi theo minh dat*/
SELECT productID, productName AS name, listPrice AS price
FROM products
WHERE listPrice < 450
/* order by la sap sep theo thu tu tang dan */
ORDER BY listPrice;

SELECT productID, productName name, listPrice price
FROM products
WHERE listPrice < 450
ORDER BY listPrice;

SELECT productID AS "ID", productName AS "Product Name", listPrice AS "Price"
FROM products
WHERE listPrice < 450
ORDER BY listPrice;