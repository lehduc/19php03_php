
SELECT productID, productName, listPrice,dateAdded
FROM products
WHERE dateAdded LIKE '2014-07%' AND listPrice > 300
ORDER BY listPrice DESC;