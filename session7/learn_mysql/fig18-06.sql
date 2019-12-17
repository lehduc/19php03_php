SELECT orderID, orderDate, shipDate
FROM orders

SELECT orderID, orderDate, shipDate
FROM orders 
WHERE shipDate IS NULL
/* khac voi WHERE shipDate = ''*/

SELECT orderID, orderDate, shipDate
FROM orders 
WHERE shipDate IS NOT NULL