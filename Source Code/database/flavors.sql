

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




-- database: `flavors`
--
  CREATE DATABASE IF NOT EXISTS `flavors`;
  USE `flavors`;
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `id_cart` int(11) NOT NULL,
  `code_cart` int(10) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `time_cart` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO  `tbl_cart` (`id_cart`, `code_cart`, `id_customer`, `time_cart`) VALUES
(104, 5484, 13, '2022-10-11 08:29:20'),
(105, 8579, 13, '2022-10-11 08:29:34'),
(106, 7686, 13, '2022-10-11 08:29:59'),
(107, 1831, 13, '2022-10-11 08:33:16'),
(108, 3006, 13, '2022-10-11 08:33:32'),
(109, 4295, 13, '2022-10-11 08:34:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_details`
--

CREATE TABLE IF NOT EXISTS `tbl_cart_details` (
  `id_cart_details` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `code_cart` int(10) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `id_cart`, `code_cart`, `id_product`, `quantity`) VALUES
(300, 104, 5484, 96, 1),
(301, 104, 5484, 91, 2),
(302, 105, 8579, 90, 3),
(303, 106, 7686, 88, 3),
(304, 106, 7686, 89, 3),
(305, 107, 1831, 94, 1),
(306, 109, 4295, 94, 3),
(307, 109, 4295, 93, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(100) NOT NULL,
  `oder_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO  `tbl_category` (`id_category`, `name_category`, `oder_category`) VALUES
(19, 'Làm Bánh Nấu Chè', 1),
(20, 'Nguyên Liệu Cơ Bản', 2),
(21, 'Nguyên Liệu Bột', 3),
(22, 'Nguyên Liệu Nước Mắm', 4),
(23, 'Nguyên Liệu Thảo Dược', 5),
(24, 'Nguyên Liệu Nấu Phở', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `name_customer` varchar(100) NOT NULL,
  `username_customer` varchar(100) NOT NULL,
  `password_customer` varchar(50) NOT NULL,
  `phone_customer` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email_customer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `name_customer`, `username_customer`, `password_customer`, `phone_customer`, `address`, `email_customer`) VALUES
(13, 'test1', 'test1', '25d55ad283aa400af464c76d713c07ad', '0919196014', '54 le thanh nghị', 'test1@gmail.com'),
(14, 'test2', 'test2', '25d55ad283aa400af464c76d713c07ad', '0123456789', '54 le thanh nghi', 'test2@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_image` varchar(1000) NOT NULL,
  `id_category` int(50) NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `name_product`, `product_code`, `product_price`, `product_image`, `id_category`, `product_description`) VALUES
(62, 'Bơ (1kg) ', 'KT1', 50000, '1665465962_bơ.jfif', 19, 'Bơ là một loại cây cận nhiệt đới có nguồn gốc từ México và Trung Mỹ, được phân loại thực vật có hoa, hai lá mầm, họ Lauraceae. Con người biết ăn trái cây bơ từ xưa, bằng chứng là người ta tìm thấy bình nước hình trái bơ tại đô thành Chan Chan trước thời đại Inca.'),
(63, 'Bột canh Hảo Hảo', 'KT2', 30000, '1665466030_bot-canh-hao-hao.jfif', 20, 'Muối chấm chua cay Hảo Hảo chính hãng danh mục Đặc sản Việt Nam mới nhất, uy tín, giao hàng cả nước.'),
(64, 'Bột nêm Knorr', 'KT3', 20000, '1665466160_botnem.jfif', 20, 'Hạt nêm Knorr là thương hiệu chuyên cung cấp hạt nêm nổi tiếng toàn thế giới. Hạt nêm thịt thăn, xương ống, tủy Knorr gói 900g sản xuất từ bột thịt thăn, ...'),
(65, 'Dầu thực vật', 'KT4', 50000, '1665466253_dau-an.jpg', 20, 'Dầu ăn được tinh lọc từ nguồn gốc thực vật hoặc động vật, tồn tại ở thể lỏng và có tính chất là nhờn khi tiếp xúc với niêm mạc da trong môi trường bình thường. Có khá nhiều loại dầu được xếp vào loại dầu ăn được gồm: dầu ô liu, dầu cọ, dầu nành, dầu canola, dầu hạt bí ngô, dầu bắp, dầu hạt hướng dương, dầu cây rum, dầu lạc, dầu hạt nho, dầu vừng, dầu argan và dầu cám gạo, mỡ lợn/heo, bơ sữa bò trâu. Nhiều loại dầu ăn cũng được dùng để nấu ăn và bôi trơn.&lt;br&gt;\r\n\r\nThuật ngữ &quot;dầu thực vật&quot; được sử dụng trên nhãn của sản phẩm dầu ăn để chỉ một hỗn hợp dầu trộn lại với nhau gồm dầu cọ, bắp, dầu nành và dầu hoa hướng dương.&lt;br&gt;\r\n\r\nDầu thường được khử mùi bằng cách nhúng vào hỗn hợp hương liệu thực phẩm chẳng hạn như thảo mộc tươi, tiêu, gừng trong một khoảng thời gian nhất định. Tuy nhiên, phải thật cẩn thận khi trữ dầu đã khử mùi để chống phát sinh Clostridium botulinum (một loại vi khuẩn sản sinh ra chất độc có thể gây ngộ độc tiêu hóa).'),
(66, 'Dầu hào', 'KT5', 25000, '1665466316_dau-hao.jfif', 20, 'Dầu hào là gia vị không thể thiếu khi vào bếp, nhưng không phải ai cũng biết ... nước xốt gia vị và phát triển nó trở thành thương hiệu nổi tiếng thế giới.'),
(67, 'Đinh Hương', 'KT6', 63000, '1665466396_dinh-huong.jpg', 23, 'Là một loại gia vị nấu ăn có mùi thơm nồng nàn, đinh hương được sử dụng trong việc chế biến món ăn để kích thích vị giác người dùng. Ngoài ra, với hàm lượng chất dinh dưỡng cao, đinh hương cũng được dùng như một thực phẩm bổ trợ cho việc phòng và chữa bệnh.&lt;br&gt;\r\n\r\nViệc sử dụng đinh hương như một loại gia vị trong việc chế biến món ăn đã có rất lâu ở nhiều quốc gia Châu Á như Indonesia, Ấn Độ, Sri Lanka,... Ở Việt Nam, đinh hương còn là một trong những gia vị không thể thiếu để tạo ra món phở truyền thống nổi tiếng trên toàn thế giới và nhiều món ăn khác.'),
(68, 'Hành khô (1kg)', 'KT7', 33000, '1665466480_hanh-kho.jfif', 20, 'Hành khô hay còn gọi là củ hành tím, là một loại củ được trồng rộng rãi trên khắp thế giới. Ở Việt Nam, củ hành khô thường có lớp vỏ màu vàng nâu đặc trưng. Tuy nhiên, hành khô còn có thể có màu hồng và màu tím. Trong đó, loại hành khô có màu hồng là loại có mùi vị mạnh nhất, giòn hơn các loại còn lại và rất được yêu thích trong các món xốt của người Pháp.'),
(69, 'Hoa Hồi (100gram)', 'KT8', 100000, '1665466600_hoi.jfif', 23, ' Hoa hồi là một trong những loại gia vị cực phẩm mà các đầu bếp nổi tiếng luôn ưa chuộng sử dụng trong các món ăn. Sử dụng hoa hồi trong các món ăn một cách khéo léo sẽ giúp nâng tầm món ăn lên một hương vị hoàn toàn mới. Để có thể sử dụng hết toàn bộ những hương vị tinh tế của hoa hồi, các đầu bếp thường rang hoa hồi rồi mới sử dụng để tẩm ướp hoặc dùng trong các món canh, súp, cà ri hay các món hầm giúp kích thích vị giác, ăn ngon miệng hơn.'),
(70, 'Mắm ruốc(chai 500ml)', 'KT9', 44000, '1665466688_mam-ruoc.jfif', 22, '                    Mắm ruốc: được chọn từ ruốc tươi, to con đem xào sơ với một ít muối hạt. Để vài giờ cho ruốc ngấm muối rồi rải đều ra nong nia, sân xi măng thật sạch, phơi tãi chừng một giờ rồi cho vào cối đá quết thật nhuyễn với muối trắng mịn theo công thức 3 ruốc 1 muối. Xong, cho ra rổ rá, bên dưới có thau, chậu, xoong, nồi hứng nước ruốc rong xuống. Dặt dẽ cho bằng, rắc thêm một lớp mỏng muối bột, đậy vải, ni lông cho kín kẻo ruồi muỗi đẻ vào.&lt;br&gt;\r\n\r\nĐể chừng mươi ngày, mắm lên men chua, thấy ruốc từ màu tím bầm chuyển sang màu đỏ tươi và dậy mùi thơm là mắm đã chín, ăn được. Muốn ruốc thật thơm ngon cần thêm gia vị. Gia vị chủ yếu của mắm ruốc là gừng, riềng giã nhỏ, vắt một ít nước chanh là vừa. Mắm ruốc để ăn không với cơm cũng ngon. Muốn chấm rau, cho thêm ít nước sôi hoặc nước cơm cho loãng ra là có một thứ nước chấm rất đặc trưng của vùng biển.                '),
(71, 'Mắm Tôm(chai-1l)', 'KT9', 33497, '1665466773_mam-tom.jfif', 22, '                     Mắm tôm                                                   '),
(72, 'Mật ong Việt ', 'Kt10', 25000, '1665467012_mat-ong-viet-600ml-400x600.jpg', 19, ''),
(73, 'Mì Chính', 'Kt11', 35000, '1665467034_mi-chinh.jfif', 20, ''),
(74, 'nước mắm Chin-su', 'KT12', 30000, '1665467062_nước mắm.jfif', 22, ''),
(75, 'Muối', 'KT13', 5000, '1665467085_muối.jfif', 19, ''),
(76, 'Ngũ vị Hương', 'KT14', 2000, '1665467129_ngu-vi-huong.jfif', 24, ''),
(77, 'Nguyệt quế', 'KT15', 35000, '1665467160_nguyet-que.jfif', 23, ''),
(78, 'Ớt Tươi(100gram)', 'KT16', 15000, '1665467218_ot.jfif', 20, ''),
(79, 'Quế (100gram)', 'KT17', 43000, '1665467253_que.jfif', 23, ''),
(80, 'Siro bạc hà', 'KT18', 42000, '1665467291_siro-goldenfarm-bac-ha-520ml.jpg', 23, ''),
(81, 'Thảo quả', 'KT19', 33000, '1665467319_thao-qua.jpg', 23, ''),
(82, 'Tiêu đen', 'KT20', 12000, '1665467361_tieu-den.jfif', 23, ''),
(83, 'Tỏi(500gram)', 'KT21', 20000, '1665467395_toi.jpg', 20, ''),
(84, 'Xả(500gram)', 'KT22', 20000, '1665467431_xa.jfif', 24, ''),
(85, 'Bột Báng', 'KT23', 10000, '1665467680_bột báng.jfif', 19, 'Bột báng là loại bột được làm từ củ của khoai mì, có dạng hạt tròn, màu trắng đục. Khi nấu chín thì sẽ chuyển sang màu trắng trong, ăn hơi dai. Trong các công thức để nấu ăn như các món chè, món bánh,... Người ta thường sử dụng bột báng để tạo độ sánh, độ kết dính đồng thời tạo cảm giác thích thú khi nhai'),
(86, 'Bột Năng (400g)', 'KT24', 12000, '1665467761_bot_nang.jpeg', 21, ''),
(87, 'Cùi Bưởi(500g)', 'KT25', 15000, '1665467833_cui_buoi.png', 19, ''),
(88, 'Đường Thốt Nốt', 'KT26', 18000, '1665467883_duong_thot_not.png', 19, ''),
(89, 'Nước Cốt Dừa', 'KT27', 23000, '1665467927_nuoc_cot_dua.jpg', 19, ''),
(90, 'Bột Gạo', 'KT28', 17000, '1665467998_bot_gao.jfif', 21, ''),
(91, 'Bột Ngô( bột bắp )', 'KT29', 8000, '1665468066_bot_ngo.jfif', 21, ''),
(92, 'Bột Chiên Giòn', 'KT30', 7000, '1665468147_bot_chien_gion.jfif', 21, ''),
(93, 'Bột Chiên Xù', 'KT31', 7000, '1665468198_bot_chien_xu.jfif', 21, ''),
(94, 'Hạt Nêm Phở Bò', 'KT32', 10000, '1665468335_hat_nem_pho.jfif', 24, ''),
(95, 'Gia Vị Nấu Phở Bò', 'KT33', 20000, '1665468414_gia-vi-nau-pho-bo.jpg', 24, ''),
(96, 'Gia Vị Nấu Phở Gà', 'KT34', 15000, '1665468477_gia_vi_nau_pho_ga.jfif', 24, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `customer_cart` (`id_customer`);

--
-- Chỉ mục cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`),
  ADD KEY `code_cart` (`code_cart`),
  ADD KEY `product_cart_details` (`id_product`),
  ADD KEY `cart_cart_details` (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `category_product` (`id_category`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `customer_cart` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id_customer`);

--
-- Các ràng buộc cho bảng `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD CONSTRAINT `cart_cart_details` FOREIGN KEY (`id_cart`) REFERENCES `tbl_cart` (`id_cart`),
  ADD CONSTRAINT `product_cart_details` FOREIGN KEY (`id_product`) REFERENCES `tbl_product` (`id_product`);

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `category_product` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
