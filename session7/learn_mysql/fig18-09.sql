SELECT firstName, lastName, orderDate
FROM customers 
/* ket hop nhieu bang voi nhau dung join*/
   INNER JOIN orders 
      ON customers.customerID = orders.customerID
ORDER BY orderDate