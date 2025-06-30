-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 30, 2025 lúc 06:00 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vinyl_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(255) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `cover_image_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `price` int(11) NOT NULL,
  `spotify_album_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `albums`
--

INSERT INTO `albums` (`album_id`, `album_name`, `artist_id`, `genre_id`, `cover_image_url`, `description`, `release_date`, `price`, `spotify_album_id`) VALUES
(1, '19', 2, 6, '19-removebg-preview.png', 'Adele – 19 là album đầu tay của nữ ca sĩ-người viết bài hát người Anh Adele. Album được phát hành vào ngày 28 tháng 1 năm 2008, một tuần sau khi đĩa đơn chủ đạo “Chasing Pavements” ra mắt. Album xuất phát trên UK Albums Chart ở vị trí quán quân ngay trong tuần đầu tiên.\r\n\r\n', '2025-02-25', 500000, '3uftDqGs13LsE1s8nn5XSe'),
(2, '25', 2, 6, '25-removebg-preview.png', '25 là album phòng thu thứ ba của nữ ca sĩ-nhạc sĩ người Anh Adele, phát hành ngày 20 tháng 11 năm 2015 bởi XL Recordings. Sau thành công toàn cầu với album 21, Adele đã cân nhắc việc từ bỏ ngành công nghiệp âm nhạc với thái độ tích cực.', '2025-05-26', 500000, '6TVfiWmo8KtflUAmkK9gGF'),
(3, '30', 2, 6, '30_preview_rev_1.png', '30 là album phòng thu thứ 4 ca sĩ kiêm nhạc sĩ người Anh Adele, được Columbia Records phát hành vào ngày 19 tháng 11 năm 2021. Là album đầu tiên của cô kể từ khi phát hành album 25, 30 xoay quanh cuộc ly hôn, tình mẫu tử, danh tiếng, nỗi đau khổ, sự chấp nhận và hy vọng của Adele.', '2025-05-18', 600000, '21jF5jlMtzo94wbxmJ18aa'),
(4, '1989', 13, 6, '1989-removebg-preview.png', 'Đĩa Than 1989 (Taylor’s Version) là album tái thu âm thứ tư của nữ ca sĩ kiêm nhạc sĩ người Mỹ Taylor Swift, do Republic Records phát hành vào ngày 27 tháng 10 năm 2023. Được tái thu âm từ album phòng thu thứ năm 1989 của cô và là album tái thu âm tiếp theo sau bản tái thu âm cùng năm là Speak Now (Taylor’s Version).', '2025-02-06', 700000, '1o59UpKw81iHR0HPiSkJR0'),
(5, 'A Night At The Vanguard', 6, 5, 'A Night At The Vanguard.webp', 'Kenny Burrell – A Night at the Vanguard là một album trực tiếp của nghệ sĩ guitar Kenny Burrell được thu âm vào năm 1959 tại Village Vanguard và ban đầu được phát hành trên hãng Argo', '2025-07-16', 450000, '0bkOsbyfCfTFCyuESS25C8'),
(6, 'All Aglow Again', 12, 5, 'All Aglow Again.webp', 'Peggy Lee – All Aglow Again ! là một album tổng hợp năm 1960 của Peggy Lee, được sắp xếp bởi Jack Marshall.', '2025-01-24', 400000, '3RXdzJHsQSxpucVGBcsgOP'),
(7, 'Bad', 10, 6, 'Bad.webp', 'Micheal Jackson – Bad là album phòng thu thứ bảy của nghệ sĩ thu âm người Mỹ Michael Jackson, phát hành ngày 31 tháng 8 năm 1987 bởi Epic Records tại Hoa Kỳ và trên toàn cầu bởi CBS Records. Nó được phát hành sau gần 5 năm kể từ album phòng thu trước của Jackson, Thriller.', '2025-06-14', 700000, '3Us57CjssWnHjTUIXBuIeH'),
(8, 'Churches', 9, 6, 'Churches.webp', 'LP – Churches là album phòng thu thứ sáu của ca sĩ kiêm nhạc sĩ người Mỹ LP, được phát hành vào ngày 3 tháng 12 năm 2021, thông qua SOTA / Dine Alone. Nó được sản xuất bởi Mike Del Rio và đồng viết kịch bản bởi Nate Campany. Ban đầu, album được lên kế hoạch phát hành vào tháng 10 năm 2020.', '2025-04-27', 450000, '73yPks0QhGEUpg7jcWHVso'),
(9, 'DAMN', 5, 8, 'DAMN.webp', 'Kendrick Lamar – DAMN  là album phòng thu thứ tư của rapper người Mỹ Kendrick Lamar. Được phát hành vào ngày 14 tháng 4 năm 2017, thông qua Top Dawg Entertainment, Aftermath Entertainment và Interscope Records', '2025-03-28', 400000, '4eLPsYPBmXABThSJ821sqY'),
(10, 'Dangerous', 10, 6, 'Dangerous 2LP.webp', 'Dangerous là album phòng thu thứ tám của nam ca sĩ Michael Jackson. Tác phẩm được Epic Records phát hành vào ngày 26 tháng 11 năm 1991. Tác phẩm được Epic Records phát hành vào ngày 26 tháng 11 năm 1991, hơn bốn năm sau khi Jackson trình làng album trước đó là Bad', '2025-03-27', 800000, '0oX4SealMgNXrvRDhqqOKg'),
(11, 'Fearless', 13, 6, 'Fearless-removebg-preview.png', 'Đĩa Than Fearless (Taylor’s Version) là album phòng thu đầu tiên được thu âm lại của ca sĩ kiêm sáng tác nhạc người Mỹ Taylor Swift. Album được phát hành bởi Republic Records vào ngày 9 tháng 4 năm 2021', '2025-06-16', 600000, '4hDok0OAJd57SGIT8xuWJH'),
(12, 'Fever', 12, 5, 'Fever.webp', 'Peggy Lee là một tài năng xuất chúng, một biểu tượng của nước Mỹ; không chỉ là một ca sĩ có năng lực vượt trội mà còn là một nhà soạn nhạc, một nữ diễn viên được đề cử giải Oscar tập hợp một số ca khúc hay nhất tại đĩa than Fever này.', '2025-05-31', 500000, '16BF4fvjjxlzrdKrUl4k5F'),
(13, 'Geography', 14, 4, 'Geography.webp', 'Geography là album phòng thu đầu tay của nhạc sĩ người Anh Tom Misch. Nó được tự phát hành vào ngày 6 tháng 4 năm 2018 thông qua nhãn hiệu riêng của Misch Beyond the Groove.', '2025-02-13', 450000, '0hDnsNkxpMDZrpBlGjldtW'),
(14, 'GNX', 5, 8, 'GNX.webp', 'GNX là album phòng thu thứ sáu của rapper người Mỹ Kendrick Lamar. Nó được phát hành bất ngờ vào ngày 22 tháng 11 năm 2024, thông qua PGLang và Interscope Records', '2025-07-07', 700000, '0hvT3yIEysuuvkK73vgdcW'),
(15, 'Good Kid, m.A.A.d City', 5, 8, 'Good Kid, m.A.A.d City.webp', 'Kendrick Lamar – Good Kid, m.A.A.d City: A Short Film là album phòng thu thứ hai của rapper người Mỹ Kendrick Lamar. Nó được phát hành vào ngày 22 tháng 10 năm 2012 bởi Top Dawg Entertainment, Aftermath Entertainment và Interscope Records. Album có sự xuất hiện của khách mời Drake, Dr. Dre, Jay Rock, Anna Wise và MC Eiht. Đây là album hãng lớn đầu tiên của Lamar, sau album đầu tiên được phát hành độc lập của anh ấy là Part.80 vào năm 2011 và việc anh ấy ký hợp đồng với Aftermath và Interscope vào năm sau.', '2025-06-24', 400000, '748dZDqSZy6aPXKcI9H80u'),
(16, 'Guitar Forms', 6, 2, 'Guitar_Forms-removebg-preview.png', 'Kenny Burrell – Guitar Forms là một album năm 1965 của Kenny Burrell, với sự dàn dựng của Gil Evans. Dàn nhạc của Evans xuất hiện trên 5 trong số 9 bài hát của album, bao gồm cả bài “Lotus Land” dài gần 9 phút. Ba bản nhạc là số nhạc blues ở dạng nhóm nhỏ và có một buổi biểu diễn solo: “Prelude # 2”.', '2025-04-05', 500000, '6UrGu9u28Qyk3MZ6HkYDvc'),
(17, 'I am > I was', 1, 8, 'i am i was.webp', 'Đĩa Than i am > i was là album phòng thu solo thứ hai của rapper 21 Savage, phát hành vào ngày 21 tháng 12 năm 2018. I Am > I Was có sự góp giọng của J. Cole, City Girls, Offset, Post Malone, Gunna, Lil Baby , Schoolboy Q, Project Pat, Childish Gambino, và Young Nudy, em họ của Savage.', '2025-06-12', 600000, '007DWn799UWvfY1wwZeENR'),
(18, 'KIDS SEE GHOSTS', 7, 8, 'KIDS SEE GHOSTS.webp', 'Kids See Ghosts là album phòng thu đầu tay của bộ đôi hip hop Kids See Ghosts, gồm Kanye West và Kid Cudi. Trước album, West và Cudi có mối quan hệ bền chặt như những người bạn thân và đồng minh âm nhạc kể từ khi gặp nhau vào năm 2008, và bày tỏ mong muốn thu âm một album hợp tác.', '2025-04-18', 600000, '6pwuKxMUkNg673KETsXPUV'),
(19, 'Kind of Blue', 11, 1, 'Kind of Blue.webp', 'Kind of Blue là một album phòng thu của nghệ sĩ kèn trumpet và nhà soạn nhạc jazz người Mỹ Miles Davis. Nó được phát hành vào ngày 17 tháng 8 năm 1959 bởi Columbia Records được coi là một trong những album jazz vĩ đại nhất mọi thời đại.\r\n\r\n', '2025-02-16', 700000, '1weenld61qoidwYuZ1GESA'),
(20, 'Lost on You', 9, 6, 'Lost_on_You__Opaque_Gold_Vinyl_-removebg-preview.png', 'LP – Lost on You là album phòng thu thứ tư của ca sĩ kiêm nhạc sĩ người Mỹ LP. Nó được phát hành vào ngày 9 tháng 12 năm 2016, thông qua Vagrant Records ở Canada và một số nước Châu Âu.', '2025-05-02', 450000, '1PZZJGNY5VDtAQmNqP1f4U'),
(21, 'Love For Sale', 8, 5, 'Love For Sale_preview_rev_1.png', 'Lady Gaga – Love for Sale là album phòng thu hợp tác thứ 2 cũng như cuối cùng của 2 ca sĩ người Mỹ Tony Bennett và Lady Gaga sau Cheek to Cheek. Nó được phát hành ngày 30 tháng 9 năm 2021 dưới dạng băng cassette và ngày 1 tháng 10 dưới các định dạng khác, thông qua Columbia và Interscope Records', '2025-02-15', 650000, '6hBQkPnq5u1BwZncSEDEgs'),
(22, 'Love Lines', 9, 6, 'Love_Lines-removebg-preview.png', 'LP – Love Lines chứa track “Dancing in the Moonlight” được biết đến với giai điệu sôi động và lời bài hát cuốn hút. Đây là bài hát hiếm hoi khiến người nghe không thể ngồi yên một chỗ, thực sự là bài hát thú vị và đáng yêu trong album này.', '2025-03-17', 500000, '6E7FmOKkt2McJF0I411HzL'),
(23, 'Love Sux', 4, 6, 'Love Sux.webp', 'Love Sux là album phòng thu thứ bảy của ca sĩ kiêm sáng tác nhạc người Canada Avril Lavigne, phát hành ngày 25 tháng 2 năm 2022 bởi DTA Records và Elektra Records.', '2025-01-27', 450000, '5pkQpJAHxy9BzwA7E1UWxF'),
(24, 'Man on the Moon The End of Day', 7, 8, 'Man on the Moon The End of Day.webp', 'Kid Cudi – Man on the Moon: The End of Day là album phòng thu đầu tay của rapper người Mỹ Kid Cudi. Nó được phát hành vào ngày 15 tháng 9 năm 2009, thông qua Dream On, GOOD Music và Universal Motown Records', '2025-04-30', 700000, '1OnCqi7IuzjnrOh2ZNvJHd'),
(25, 'Middnight', 13, 6, 'Middnight__Jade_Green_-removebg-preview.png', 'Đĩa Than Middnight (Jade Green) là album phòng thu thứ mười của ca sĩ kiêm sáng tác âm nhạc người Mỹ Taylor Swift được phát hành vào ngày 21 tháng 10 năm 2022, thông qua Republic Records. Album này trở thành cột mốc đánh dấu tác phẩm mới đầu tiên của cô kể từ album phòng thu thứ chín,', '2025-04-05', 450000, '151w1FgRZfnKZA9FEcg9Z3'),
(26, 'Room for Squares', 15, 3, 'Room for Squares.webp', 'John Mayer – Room for Squares là album phòng thu đầu tay của ca sĩ kiêm nhạc sĩ kiêm nghệ sĩ guitar người Mỹ John Mayer, được phát hành lần đầu vào ngày 5 tháng 6 năm 2001 và được phát hành lại vào ngày 18 tháng 9 năm 2001 bởi cả Aware và Columbia Records.', '2025-04-23', 600000, '3yHOaiXecTJVUdn7mApZ48'),
(27, 'SAVAGE MODE II', 1, 8, 'SAVAGE MODE II.webp', 'Đĩa Than Savage Mode II là một album phòng thu hợp tác của rapper 21 Savage và nhà sản xuất thu âm người Mỹ Metro Boomin. Nó được phát hành vào ngày 2 tháng 10 năm 2020 và được xem trước qua một đoạn giới thiệu với lời tường thuật của Morgan Freeman.', '2025-03-09', 450000, '6wTyGUWGCilBFZ837k5aRi'),
(28, 'Sob Rock', 15, 3, 'Sob Rock.webp', 'John Mayer – Sob Rock là album phòng thu thứ tám của ca sĩ kiêm nhạc sĩ người Mỹ John Mayer, được phát hành vào ngày 16 tháng 7 năm 2021, bởi Columbia Records. Đĩa đơn “New Light”, phát hành vào tháng 5 năm 2018, nằm trong album, cũng như hai đĩa đơn từ năm 2019 của Mayer, “I Guess I Just Feel Like” và “Carry Me Away”.', '2025-07-31', 500000, '2JmfwvRDitJlTUoLCkp61z'),
(29, 'The Greatest Hits', 3, 7, 'The Greatest Hits.webp', 'Greatest Hits, được phát hành lại với tên Greatest Hits 1973–1988, là album tổng hợp những bản hit lớn nhất đầu tiên của ban nhạc hard rock người Mỹ Aerosmith, được phát hành bởi Columbia Records vào ngày 11 tháng 11 năm 1980', '2025-01-07', 450000, '5Z3bU10WcD9JOt98mui7DC'),
(30, 'The Search for Everything', 15, 6, 'The Search for Everything.webp', 'John Mayer – The Search for Everything là album phòng thu thứ bảy của ca sĩ kiêm nhạc sĩ người Mỹ John Mayer, được Columbia Records phát hành vào ngày 14 tháng 4 năm 2017.', '2025-02-02', 600000, '0jZFu2tihRJ65iYAo0oOtP'),
(31, 'Thriller', 10, 6, 'Thriller.webp', 'Michael Jackson – Thriller là album phòng thu thứ sáu của ca sĩ kiêm nhạc sĩ sáng tác bài hát người Mỹ Michael Jackson, được phát hành vào ngày 29 tháng 11 năm 1982 bởi Epic Records.', '2025-05-26', 900000, '2ANVost0y2y52ema1E9xAZ'),
(32, 'To Pimp A Butterfly', 5, 8, 'To_Pimp_A_Butterfly-removebg-preview.png', 'Kendrick Lamar – To Pimp A Butterfly là album phòng thu thứ ba của nghệ sĩ hip hop người Mỹ Kendrick Lamar; album được phát hành ngày 16 tháng 3 năm 2015, bởi Top Dawg Entertainment, Aftermath Entertainment, và phân phối qua Interscope Records.', '2025-07-24', 600000, '7ycBtnsMtyVbbwTfJwRjSP'),
(33, 'What Kinda Music', 14, 4, 'What Kinda Music.webp', 'What Kinda Music là một album phòng thu hợp tác của nghệ sĩ guitar kiêm ca sĩ người Anh Tom Misch và tay trống người Anh Yussef Dayes. Nó được phát hành vào ngày 24 tháng 4 năm 2020 thông qua nhãn hiệu Beyond the Groove của Misch và được phân phối thông qua Blue Note Records và Caroline.', '2025-06-13', 600000, '6iOCv7oGL5sGi2aVnRz2BI');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album_discounts`
--

CREATE TABLE `album_discounts` (
  `album_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `artists`
--

INSERT INTO `artists` (`artist_id`, `artist_name`, `description`, `image_url`) VALUES
(1, '21 Savage', 'Shéyaa Bin Abraham-Joseph là rapper, nghệ sĩ sáng tác và thu âm nhạc gốc Anh Quốc. Anh hoạt động nghệ thuật ở Atlanta, Georgia. 21 Savage được biết đến lần đầu ở Atlanta qua mixtape The Slaughter Tape năm 2015.', '21_Savage_2018.webp'),
(2, 'Adele', 'Adele Laurie Blue Adkins MBE là một nữ ca sĩ, nhạc sĩ nổi tiếng người Anh. Năm 2006, Adele được đề nghị ký hợp đồng thu âm với hãng thu âm XL Recordings sau khi một người bạn của Adele đăng một bản demo của cô lên Myspace.', 'adele-1-16383330546642026325987.webp'),
(3, 'Aerosmith', 'Aerosmith là một ban nhạc rock đến từ Mỹ, được nhận định là “Ban nhạc Rock ‘n Roll xuất sắc nhất của Mỹ”. Cho đến nay họ đã bán được hơn 150 triệu album trên toàn thế giới, mà riêng tại Mỹ là 66,5 triệu bản', 'aerosmith.webp'),
(4, 'Avil Lavigne', 'Avril Ramona Lavigne (sinh ngày 27 tháng 9 năm 1984), thường được biết đến với tên gọi Avril Lavigne, là một nữ ca sĩ-nhạc sĩ người Canada. Cô sinh ra tại Belleville, Ontario nhưng tuổi thơ cô lại gắn liền với thị trấn nhỏ Napanee. Ở tuổi 15, cô đã được xuất hiện trên sân khấu cùng với Shania Twain; đến năm 16 tuổi, cô ký một hợp đồng thu âm 2 album với hãng ghi âm Arista Records và thu được 2 triệu đô-la. Trong năm 2002, khi cô gần 17 tuổi, Lavigne xâm nhập vào thị trường âm nhạc ra mắt album Let Go. Kề từ khi album đột phá cô đã bán được hơn 40 triệu album và hơn 50 triệu đĩa đơn trên toàn thế giới. Cô được mệnh danh là “nữ hoàng nhạc pop punk”.', 'celebs-photos-older-8-2000-0b9f28e58d6846f5a81dc2f8d40ee840.webp'),
(5, 'Kendrick Lamar', 'Kendrick Lamar Duckworth là rapper người Mỹ, đến từ Compton, California. Lamar khởi nghiệp ca hát dưới nghệ danh K-Dot, phát hành một mixtape gây được chú ý và ký kết với hãng thu âm độc lập tại Carson, Top Dawg Entertainment. Lamar đã được công chúng biết đến sau khi phát hành Overly Dedicated', 'channels4_profile.webp'),
(6, 'Kenny Burrell', 'Kenneth Earl Burrell là một nghệ sĩ guitar jazz người Mỹ được biết đến với công việc của mình trên nhiều hãng nhạc jazz hàng đầu: Prestige, Blue Note, Verve, CTI, Muse và Concord.', 'kenny-burrell.webp'),
(7, 'Kid Cudi', 'Scott Ramon Seguro Mescudi, còn được biết đến với nghệ danh Kid Cudi, là một rapper, ca sĩ, nhạc sĩ, nhà sản xuất thu âm, diễn viên và nhà thiết kế thời trang người Mỹ.', 'Cudder.webp'),
(8, 'Lady Gaga', 'Stefani Joanne Angelina Germanotta, thường được biết đến với nghệ danh Lady Gaga, là một nữ ca sĩ, nhạc sĩ sáng tác bài hát kiêm diễn viên người Mỹ. Cô nổi danh thông qua việc đổi mới hình tượng bản thân và linh hoạt giữa ca hát và diễn xuất trong ngành công nghiệp giải trí.', 'lady-gaga-2019-2000-ecde0348cd054105b8eeca7abdd2e8cb.webp'),
(9, 'LP', 'Laura Pergolizzi, được biết đến với nghệ danh LP, là một ca sĩ, nhạc sĩ và nhạc sĩ người Mỹ. LP đã phát hành bảy album và ba EP. LP đã viết bài hát cho các nghệ sĩ khác bao gồm Cher, Rihanna, Backstreet Boys, Leona Lewis, Mylène Farmer, Céline Dion và Christina Aguilera.', 'uwyr6isrd6fsnaljgpfj.webp'),
(10, ' Michael Jackson', 'Michael Joseph Jackson là một nam ca sĩ, nhạc sĩ, vũ công, nhà sản xuất thu âm kiêm nhà hoạt động thiện nguyện người Mỹ. Với biệt danh “Ông hoàng nhạc pop”, ông được xem là một trong những nhân vật văn hóa quan trọng nhất thế kỷ 20.', '2-17062305715291209504169.webp'),
(11, 'Miles Davis', 'Miles Dewey Davis III là một nhạc sĩ nhạc Jazz người Mỹ, là một trong những người có ảnh hưởng lớn trong thế kỷ 20', '0_0K__yzInslVpEpyc.webp'),
(12, 'Peggy Lee', 'Norma Deloris Egstrom, được biết đến với nghệ danh Peggy Lee, là một ca sĩ, nhạc sĩ và diễn viên nhạc jazz và nhạc nổi tiếng người Mỹ có sự nghiệp kéo dài bảy thập kỷ.', 'ab6761610000517438f87c49982dce41b85d8966.webp'),
(13, 'Taylor Swift', 'Taylor Alison Swift là một nữ ca sĩ kiêm nhạc sĩ sáng tác bài hát người Mỹ. Cô nhận được nhiều sự quan tâm rộng rãi đến từ truyền thông và công chúng cũng như được nhiều ấn phẩm vinh danh là một trong những gương mặt tiêu biểu trong các danh sách hàng đầu', '1-1693385246169701996465.webp'),
(14, 'Tom Misch', 'Thomas Abraham Misch là một nhạc sĩ và nhà sản xuất người Anh. Anh ấy bắt đầu phát hành âm nhạc trên SoundCloud vào năm 2012 và phát hành album phòng thu đầu tay Geography vào năm 2018.', 'misch.webp'),
(15, 'John Mayer', 'John Clayton Mayer là một ca sĩ, nhạc sĩ, nhà sản xuất âm nhạc thể loại pop rock/pop/blues rock người Mỹ. Sinh ra tại Bridgeport, Connecticut và lớn lên tại Fairfield, Connecticut, anh đã theo học tại trường Cao đẳng âm nhạc Berklee ở Boston.', 'JohnMayerin2019.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `added_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `album_id`, `quantity`, `added_at`) VALUES
(8, 10, 25, 1, '2025-06-26 08:53:46'),
(9, 10, 33, 4, '2025-06-26 08:53:46'),
(10, 10, 2, 2, '2025-06-26 08:53:46'),
(11, 10, 21, 1, '2025-06-26 08:53:46'),
(28, 8, 26, 2, '2025-06-29 06:49:07'),
(29, 8, 27, 1, '2025-06-29 06:49:12'),
(37, 11, 32, 1, '2025-06-29 08:11:03'),
(38, 11, 13, 2, '2025-06-29 14:24:08'),
(39, 11, 3, 2, '2025-06-29 14:34:51'),
(40, 11, 2, 1, '2025-06-29 14:37:51'),
(41, 11, 12, 7, '2025-06-29 14:38:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` int(11) NOT NULL,
  `discount_type` enum('percentage','fixed') NOT NULL,
  `discount_value` decimal(10,2) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`, `slug`, `description`, `image_path`) VALUES
(1, 'Blues', 'blue', 'Blues là thể loại nhạc xuất phát từ cộng đồng người Mỹ gốc Phi vào cuối thế kỷ 19, nổi bật với giai điệu sâu lắng, cảm xúc và thường xoay quanh các chủ đề như nỗi buồn, tình yêu, và cuộc sống lao động. Đây là nền tảng quan trọng cho sự phát triển của nhiều thể loại nhạc khác như jazz, rock và soul.', 'blue.webp'),
(2, 'Classic', 'classic', 'Nhạc cổ điển (Classical) là thể loại nhạc nghệ thuật có nguồn gốc từ châu Âu, phát triển mạnh từ thế kỷ 17 đến 19. Nó chú trọng vào cấu trúc, kỹ thuật hòa âm và biểu cảm sâu sắc, thường được biểu diễn bởi dàn nhạc giao hưởng, piano, hoặc các nhạc cụ cổ điển khác.', 'classic.webp'),
(3, 'Country', 'country', 'Country là thể loại nhạc bắt nguồn từ miền Nam nước Mỹ vào đầu thế kỷ 20, kết hợp giữa dân ca, nhạc blues và nhạc đồng quê. Nhạc country thường sử dụng guitar, banjo, fiddle và harmonica, với ca từ gần gũi, kể chuyện về tình yêu, cuộc sống và quê hương.', 'country.webp'),
(4, 'Electronic', 'electronic', 'Electronic là thể loại nhạc sử dụng công nghệ điện tử và thiết bị số để tạo ra âm thanh, phổ biến từ giữa thế kỷ 20. Nhạc electronic đa dạng về phong cách, từ sôi động như EDM, techno, house đến thể nghiệm như ambient và synthwave, thường được chơi trong các câu lạc bộ, lễ hội hoặc không gian nghệ thuật.', 'electronic.webp'),
(5, 'Jazz', 'jazz', 'Jazz là thể loại nhạc ra đời vào đầu thế kỷ 20 tại Mỹ, có nguồn gốc từ cộng đồng người Mỹ gốc Phi. Jazz nổi bật với khả năng ứng biến linh hoạt, nhịp điệu phức tạp và hòa âm sáng tạo. Đây là nền tảng ảnh hưởng đến nhiều thể loại nhạc hiện đại khác như soul, funk và fusion.', 'jazz.webp'),
(6, 'Pop', 'pop', 'Pop là thể loại nhạc đại chúng phổ biến rộng rãi trên toàn thế giới, nổi bật với giai điệu dễ nhớ, cấu trúc đơn giản và tính thương mại cao. Nhạc pop thường tập trung vào chủ đề tình yêu, cuộc sống và cảm xúc, phù hợp với nhiều lứa tuổi và dễ tiếp cận với khán giả đại chúng.', 'pop.webp'),
(7, 'Rock', 'rock', 'Rock là thể loại nhạc phát triển từ những năm 1950 tại Mỹ và Anh, nổi bật với âm thanh mạnh mẽ, nhịp điệu rõ ràng và sự sử dụng nổi bật của guitar điện. Nhạc rock thường mang thông điệp nổi loạn, tự do và cá nhân, với nhiều tiểu thể loại như hard rock, punk rock, alternative rock, và metal.', 'rock.webp'),
(8, 'Rap', 'rap', 'Rap là thể loại nhạc nổi bật với kỹ thuật gieo vần, nhấn nhá và đọc lời trên nền nhạc (beat), thường đề cập đến các vấn đề xã hội, cá nhân hoặc văn hóa đường phố. Xuất phát từ cộng đồng người Mỹ gốc Phi và Latin tại New York vào thập niên 1970, rap là một phần cốt lõi của văn hóa hip hop.', 'rap.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderitems`
--

CREATE TABLE `orderitems` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderitems`
--

INSERT INTO `orderitems` (`order_item_id`, `order_id`, `album_id`, `quantity`, `unit_price`) VALUES
(41, 41, 6, 2, 800000.00),
(42, 42, 13, 2, 900000.00),
(43, 43, 23, 1, 450000.00),
(44, 43, 11, 2, 1200000.00),
(45, 44, 2, 2, 1000000.00),
(46, 45, 31, 2, 1800000.00),
(47, 46, 31, 2, 1800000.00),
(48, 46, 17, 2, 1200000.00),
(49, 46, 11, 1, 600000.00),
(50, 47, 26, 1, 600000.00),
(51, 47, 27, 1, 450000.00),
(52, 48, 26, 1, 600000.00),
(53, 48, 27, 1, 450000.00),
(54, 49, 4, 1, 700000.00),
(55, 49, 5, 1, 450000.00),
(56, 50, 4, 1, 700000.00),
(57, 50, 5, 1, 450000.00),
(58, 51, 32, 1, 600000.00),
(59, 52, 21, 1, 650000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `shipping_address` text DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_status` enum('pending','paid','shipped','completed','cancelled') DEFAULT 'pending',
  `payment_method_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `shipping_fee` decimal(10,2) DEFAULT 0.00,
  `notes` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `shipping_address`, `total_amount`, `order_status`, `payment_method_id`, `transaction_id`, `discount_id`, `shipping_fee`, `notes`, `created_at`, `updated_at`) VALUES
(41, 8, '2025-06-28 13:23:08', 'long an', 800000.00, 'pending', 2, NULL, NULL, 0.00, NULL, '2025-06-28 20:23:08', '2025-06-28 20:23:08'),
(42, 8, '2025-06-28 13:41:33', 'long an', 930000.00, 'completed', 1, NULL, NULL, 30000.00, 'thuan handsome', '2025-06-28 20:41:33', '2025-06-29 13:47:56'),
(43, 8, '2025-06-28 13:44:55', 'long an', 1680000.00, 'completed', 1, NULL, NULL, 30000.00, NULL, '2025-06-28 20:44:55', '2025-06-29 13:48:04'),
(44, 8, '2025-06-28 14:53:14', 'long an', 1000000.00, 'pending', 2, NULL, NULL, 0.00, NULL, '2025-06-28 21:53:14', '2025-06-28 21:53:14'),
(45, 8, '2025-06-29 06:07:56', 'long an', 1800000.00, 'completed', 1, NULL, NULL, 0.00, NULL, '2025-06-29 13:07:56', '2025-06-29 13:47:46'),
(46, 8, '2025-06-29 06:24:14', 'long an', 3630000.00, 'pending', 2, NULL, NULL, 30000.00, NULL, '2025-06-29 13:24:14', '2025-06-29 13:24:14'),
(47, 8, '2025-06-29 06:49:17', 'long an', 1080000.00, 'cancelled', 1, NULL, NULL, 30000.00, NULL, '2025-06-29 13:49:17', '2025-06-29 13:49:20'),
(48, 8, '2025-06-29 06:50:24', 'long an', 1080000.00, 'cancelled', 1, NULL, NULL, 30000.00, NULL, '2025-06-29 13:50:24', '2025-06-29 13:50:27'),
(49, 11, '2025-06-29 07:28:28', 'a', 1180000.00, 'cancelled', 1, NULL, NULL, 30000.00, 'a', '2025-06-29 14:28:28', '2025-06-29 14:28:34'),
(50, 11, '2025-06-29 07:28:48', 'ad', 1180000.00, 'completed', 2, NULL, NULL, 30000.00, 'af', '2025-06-29 14:28:48', '2025-06-29 18:11:20'),
(51, 11, '2025-06-29 07:30:48', 'long an', 630000.00, 'completed', 2, NULL, NULL, 30000.00, 'vafaf', '2025-06-29 14:30:48', '2025-06-29 18:11:43'),
(52, 11, '2025-06-29 08:03:03', 'long an', 650000.00, 'completed', 2, NULL, NULL, 0.00, 'gh', '2025-06-29 15:03:03', '2025-06-29 18:11:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `paymentmethods`
--

CREATE TABLE `paymentmethods` (
  `payment_method_id` int(11) NOT NULL,
  `method_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `paymentmethods`
--

INSERT INTO `paymentmethods` (`payment_method_id`, `method_name`, `description`) VALUES
(1, 'COD', 'Thanh toán khi nhận hàng'),
(3, 'VNPay', 'Thanh toán qua VNPay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `avatar_url` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `registration_date` datetime DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('customer','admin') DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `google_id`, `avatar_url`, `email`, `password`, `full_name`, `registration_date`, `last_login`, `phone`, `address`, `role`, `remember_token`) VALUES
(8, '115361465083411051666', 'https://lh3.googleusercontent.com/a/ACg8ocLf3h8ifeEFcwYOECXSt95RK7nShpzX9ZKiw6l0iURDsCnWvA=s96-c', 'tvminh0091@gmail.com', NULL, 'Tym Iim', '2025-06-25 21:49:24', '2025-06-27 14:30:22', '0912312471', 'long an', 'customer', 'NQfFApZGhKstiy7zPWI311N0xGSaoGSP49WkxDIKSqnhjsUhCMQY6aB1Kdpk'),
(9, '115274834615365086527', 'https://lh3.googleusercontent.com/a/ACg8ocKPWRRVl5nDroHKokMH94RgoypmYIivASP6TbOFjVCXKlbc6Q=s96-c', 'thunminhle123@gmail.com', NULL, 'Thun Le', '2025-06-26 15:21:32', '2025-06-26 08:25:39', NULL, NULL, 'customer', '75FxydXpwbIofQ9ekHv5HVHF2FlDIhu23ekv3z3DP4aUgZ2G4Ylr3gsXiIH3'),
(10, '106286687076247164611', 'https://lh3.googleusercontent.com/a/ACg8ocLGJaMQ46YelKwUvMlSPJADc7AAB4UK8b9r1EjjRyd0dSAtxA=s96-c', 'thuanmih14@gmail.com', NULL, 'Thuận Lê', '2025-06-26 15:53:46', '2025-06-26 08:53:46', NULL, NULL, 'customer', 'nUtdJhLDmhlLywyuYdWPmHop8JYtWR9rheEant47uPWRRUapuzans0DVhSnf'),
(11, '111638771886379711450', 'https://lh3.googleusercontent.com/a/ACg8ocIup2k1XS2RgsnDXKNdNxwUexsInOqCWq3jCJR3Un8WD7U5LET-=s96-c', 'leminhthuannn123@gmail.com', NULL, 'Lê Minh Thuận', '2025-06-29 14:26:48', '2025-06-29 07:51:01', NULL, NULL, 'customer', 'XgAqza4dKgGzxoIAQU0nJpQVcBY6Es171bpWBndA1gYtk28xdajW2pBQXaqL');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Chỉ mục cho bảng `album_discounts`
--
ALTER TABLE `album_discounts`
  ADD PRIMARY KEY (`album_id`,`discount_id`),
  ADD KEY `album_discounts_ibfk_2` (`discount_id`);

--
-- Chỉ mục cho bảng `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Chỉ mục cho bảng `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Chỉ mục cho bảng `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `discount_id` (`discount_id`),
  ADD KEY `payment_method_id` (`payment_method_id`);

--
-- Chỉ mục cho bảng `paymentmethods`
--
ALTER TABLE `paymentmethods`
  ADD PRIMARY KEY (`payment_method_id`),
  ADD UNIQUE KEY `method_name` (`method_name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`),
  ADD CONSTRAINT `albums_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);

--
-- Các ràng buộc cho bảng `album_discounts`
--
ALTER TABLE `album_discounts`
  ADD CONSTRAINT `album_discounts_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`),
  ADD CONSTRAINT `album_discounts_ibfk_2` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`discount_id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `albums` (`album_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
