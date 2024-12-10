CREATE TABLE loai_hoa (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    ten_hoa VARCHAR(255) NOT NULL,    
    mo_ta TEXT NOT NULL,               
    link_anh VARCHAR(255) NOT NULL     
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO loai_hoa (ten_hoa, mo_ta, link_anh) 
VALUES 
('hoa đỗ quyên', 'Hoa đỗ quyên là loài hoa tượng trưng cho sự dịu dàng và quyến rũ, thường xuất hiện vào mùa xuân. Cánh hoa mềm mại với nhiều màu sắc rực rỡ như hồng, trắng, đỏ hoặc tím. Loài hoa này thường được trồng làm cảnh và mang ý nghĩa may mắn, thịnh vượng', '../images/doquyen.jpg'),
('hoa hải dương', 'Hoa hải đường là biểu tượng của phú quý và đoàn tụ, phổ biến trong những ngày Tết Việt Nam. Loài hoa này có cánh lớn, màu sắc nổi bật như đỏ, hồng, và đôi khi có viền vàng. Hải đường thường được ưa chuộng để trang trí vì vẻ đẹp rực rỡ và ý nghĩa tốt lành.', '../images/haiduong.jpg'),
('hoa mai', 'Hoa mai là biểu tượng mùa xuân tại Việt Nam, đặc biệt ở miền Nam, thường nở vào dịp Tết. Với sắc vàng rực rỡ, hoa mai đại diện cho tài lộc, sự thịnh vượng và niềm vui. Cây mai có sức sống mãnh liệt, thích hợp với khí hậu ấm áp, nắng nhiều.', '../images/mai.jpg'),
('hoa tường vy', 'Hoa tường vy là loài hoa mảnh mai nhưng mang vẻ đẹp tinh tế, tượng trưng cho sự thuần khiết và tình yêu tuổi trẻ. Cánh hoa nhỏ nhắn, xếp thành từng chùm, thường có màu hồng nhạt hoặc đỏ nhạt. Tường vy thường được trồng làm cảnh và tạo không gian thơ mộng trong vườn nhà.', '../images/mai.jpg');
