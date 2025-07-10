--fresh mart
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    image VARCHAR(255),
    price DECIMAL(10, 2),
    rating DECIMAL(2,1),
    category VARCHAR(100),
    badge VARCHAR(50),
    badge_color VARCHAR(20)
);
