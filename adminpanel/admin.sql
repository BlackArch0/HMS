-- Disable foreign key constraints
SET FOREIGN_KEY_CHECKS = 0;

-- Update rooms table
UPDATE rooms SET room_id = room_id + (SELECT MAX(room_id) FROM invoices);

-- Update food_items table
UPDATE food_items SET id = id + (SELECT MAX(id) FROM rooms);

-- Update order_ table
UPDATE order_ SET order_id = order_id + (SELECT MAX(order_id) FROM food_items);

-- Update order_items table
UPDATE order_items SET id = id + (SELECT MAX(id) FROM order_);

-- Update payments table
UPDATE payments SET id = id + (SELECT MAX(id) FROM order_);

-- Update feedback table
UPDATE feedback SET id = id + (SELECT MAX(id) FROM payments);

-- Update cart table
UPDATE cart SET id = id + (SELECT MAX(id) FROM feedback);

-- Update users table
UPDATE users SET id = id + (SELECT MAX(id) FROM cart);

-- Update invoices table
UPDATE invoices SET room_id = room_id + (SELECT MAX(room_id) FROM users);

-- Enable foreign key constraints
SET FOREIGN_KEY_CHECKS = 1;
