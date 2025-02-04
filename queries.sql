-- 1. Retrieve the top 5 customers with the highest total spending:
SELECT o.user_id, SUM(o.total_amount) AS total_spending
FROM orders o
GROUP BY o.user_id
ORDER BY total_spending DESC
LIMIT 5;

-- 2. Get the total revenue for the current month:
SELECT SUM(total_amount) AS total_revenue
FROM orders
WHERE YEAR(created_at) = YEAR(CURDATE()) 
AND MONTH(created_at) = MONTH(CURDATE());

-- 3. List the most sold products:
SELECT oi.product_id, SUM(oi.quantity) AS total_sold
FROM order_items oi
INNER JOIN orders o ON oi.order_id = o.id
GROUP BY oi.product_id
ORDER BY total_sold DESC;
