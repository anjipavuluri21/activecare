-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 10:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `activecare_adminmenu`
--

CREATE TABLE `activecare_adminmenu` (
  `id` int(11) NOT NULL,
  `menuname` varchar(225) NOT NULL,
  `corder` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecare_adminmenu`
--

INSERT INTO `activecare_adminmenu` (`id`, `menuname`, `corder`, `status`) VALUES
(1, 'Home page content management', 1, 1),
(2, 'Image mgmt', 2, 0),
(3, 'Manage Banners', 3, 1),
(4, 'Manage Books', 4, 1),
(5, 'Orders', 5, 1),
(6, 'Manage Offers', 6, 0),
(7, 'Manage Events', 7, 0),
(8, 'Manage testimonials', 8, 0),
(10, 'Manage Users', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_adminsubmenu`
--

CREATE TABLE `activecare_adminsubmenu` (
  `id` int(11) NOT NULL,
  `adminmenuid` int(11) NOT NULL,
  `submenuname` varchar(225) NOT NULL,
  `link` varchar(225) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecare_adminsubmenu`
--

INSERT INTO `activecare_adminsubmenu` (`id`, `adminmenuid`, `submenuname`, `link`, `status`) VALUES
(1, 1, 'Physiotherapy Center', 'physiotherapy.php', 1),
(4, 3, 'Banners', 'banners.php', 1),
(5, 4, 'Books', 'books.php', 1),
(6, 5, 'View orders', 'orders.php', 1),
(7, 6, 'Offers', '', 1),
(8, 7, 'Events', '', 1),
(9, 8, 'testimonials', '', 1),
(11, 2, 'images', 'images.php', 1),
(12, 1, 'Our Services', 'services.php', 1),
(13, 1, 'Our Team', 'ourteam.php\r\n', 1),
(14, 10, 'Users', 'users.php', 1),
(16, 5, 'Home Programs Requests', 'home_program.php', 1),
(17, 5, 'Active X Group Order', 'active_group.php', 1),
(18, 1, 'Join Us', 'join_us.php', 1),
(19, 1, 'Testimonials', 'testimonials.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_adminuser`
--

CREATE TABLE `activecare_adminuser` (
  `id` int(11) NOT NULL,
  `firstname` varchar(225) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(225) CHARACTER SET utf8 NOT NULL,
  `username` varchar(225) CHARACTER SET utf8 NOT NULL,
  `password` varchar(225) NOT NULL,
  `secretcode` varchar(225) NOT NULL,
  `email` varchar(225) CHARACTER SET utf8 NOT NULL,
  `userype` int(11) NOT NULL,
  `lastseen` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `profilepic` varchar(225) NOT NULL,
  `country` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecare_adminuser`
--

INSERT INTO `activecare_adminuser` (`id`, `firstname`, `lastname`, `username`, `password`, `secretcode`, `email`, `userype`, `lastseen`, `status`, `profilepic`, `country`) VALUES
(1, 'activecareadmin', '', 'activecareadmin', '827ccb0eea8a706c4c34a16891f84e7b', '123456', 'admin@gmail.com', 1, '0000-00-00 00:00:00', 1, 'bargain11606539692.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_banners`
--

CREATE TABLE `activecare_banners` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(255) NOT NULL,
  `thumbimg1` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_banners`
--

INSERT INTO `activecare_banners` (`id`, `title`, `content`, `thumbimg1`, `status`) VALUES
(1, 'banner1', 'testing ', 'active-care-banners-1606910631.jpg', 1),
(2, 'banner2', 'testing ', 'active-care-banners-1606910648.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_cart`
--

CREATE TABLE `activecare_cart` (
  `id` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `guest_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_cart`
--

INSERT INTO `activecare_cart` (`id`, `prodid`, `userid`, `status`, `guest_id`) VALUES
(11, 3, 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `activecare_complete_purchase_order`
--

CREATE TABLE `activecare_complete_purchase_order` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `family_name` varchar(225) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `interenational_number` varchar(500) NOT NULL,
  `group_type` varchar(250) NOT NULL,
  `group_number` varchar(50) NOT NULL,
  `title` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `region` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_complete_purchase_order`
--

INSERT INTO `activecare_complete_purchase_order` (`id`, `first_name`, `family_name`, `email`, `mobile`, `interenational_number`, `group_type`, `group_number`, `title`, `country`, `region`, `status`) VALUES
(1, 'anji', 'pavuluri', 'anji@gmail.com', '09876543210', '', 'اليومية', '1', 'testing', 'India', 'telangana', 1),
(2, 'pavuluri', 'master', 'design-master@gmail.com', '09876543210', '09876543210', 'اليومية', '3', 'testing', 'India', 'telangana', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_customers`
--

CREATE TABLE `activecare_customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(225) CHARACTER SET utf8 NOT NULL,
  `email` varchar(225) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(225) CHARACTER SET utf8 NOT NULL,
  `password` varchar(225) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  `secretcode` varchar(225) CHARACTER SET utf8 NOT NULL,
  `registereddate` datetime NOT NULL,
  `customertype` int(11) NOT NULL COMMENT '1-guest;2-registereduser',
  `first_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecare_customers`
--

INSERT INTO `activecare_customers` (`id`, `fullname`, `email`, `mobile`, `password`, `status`, `secretcode`, `registereddate`, `customertype`, `first_name`) VALUES
(1, 'pavuluri', 'anji@gmail.com', '09876543210', '123', 0, '', '0000-00-00 00:00:00', 0, 'anji'),
(2, 'anji', 'anji@gmail.com', '9014675474', '123456', 1, '123456', '2020-11-26 00:00:00', 1, ''),
(3, 'master', 'design-master@gmail.com', '1234567890', '12345', 0, '', '0000-00-00 00:00:00', 0, 'design'),
(4, '', '', '', '', 0, '', '0000-00-00 00:00:00', 0, ''),
(5, 'naga', 'pavuluri@gmail.com', '9876541230', '1234', 0, '', '0000-00-00 00:00:00', 0, 'pavuluri');

-- --------------------------------------------------------

--
-- Table structure for table `activecare_deliverystatus`
--

CREATE TABLE `activecare_deliverystatus` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecare_deliverystatus`
--

INSERT INTO `activecare_deliverystatus` (`id`, `title`, `status`) VALUES
(1, 'Order Confirmed', 1),
(2, 'In Process', 1),
(3, 'Out for Delivery', 1),
(4, 'Delivered', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_e_book_request`
--

CREATE TABLE `activecare_e_book_request` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `interenational_number` varchar(50) NOT NULL,
  `program_type` varchar(100) NOT NULL,
  `program_no` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_e_book_request`
--

INSERT INTO `activecare_e_book_request` (`id`, `first_name`, `surname`, `email`, `mobile`, `interenational_number`, `program_type`, `program_no`, `status`) VALUES
(1, 'anji', 'pavuluri', 'anji@gmail.com', '09876543210', '', 'البرنامج اليومي', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_feedbacks`
--

CREATE TABLE `activecare_feedbacks` (
  `id` int(11) NOT NULL,
  `name` varchar(225) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(225) CHARACTER SET utf8 NOT NULL,
  `email` varchar(225) NOT NULL,
  `comments` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecare_feedbacks`
--

INSERT INTO `activecare_feedbacks` (`id`, `name`, `mobile`, `email`, `comments`, `date`) VALUES
(1, 'anji', '9014675474', 'anji@design-master.com', 'testing only', '2020-11-29 05:03:44');

-- --------------------------------------------------------

--
-- Table structure for table `activecare_homepageheader`
--

CREATE TABLE `activecare_homepageheader` (
  `id` int(11) NOT NULL,
  `title1` varchar(200) NOT NULL,
  `title2` varchar(250) NOT NULL,
  `captionar` varchar(2000) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_homepageheader`
--

INSERT INTO `activecare_homepageheader` (`id`, `title1`, `title2`, `captionar`, `image`) VALUES
(1, 'مرحبا بك في', 'مركز اكتف للعلاج الطبيعي', 'رسالتنا هي \"توفير علاج فعال ، يحقق حاجه المريض ، مثبت علميا ويقدم من خلال اخصائيين أكفاء في العلاج الطبيعي <br><br>\r\n\r\nمركز اكتف للعلاج الطبيعي هو مركز متخصص في التأهيل المتكامل للاصابات التي تعيق الحركة والناتجه عن العمود الفقري او الجهاز العصبي كالشلل النصفي او الدماغي على سبيل المثال ، يوفر المركز خدماته من خلال اخصائيين مؤهلين في هذا المجال ومرخصين من وزارة الصحة الكويتية، في مركزنا نحن نوفر لكم المجال لتشاركونا أهدافكم العلاجية مع فريق متكامل في الخبرة العلمية والعملية،علاجنا في آكتف يتركز على عاملين من عوامل النجاح العلاجي وهما الكفاءة والفاعلية ، بحيث تستطيع ان تصل الى اى من اهدافك العلاجية من خلال علاج اسباب الإصابة وليس اثارها فقط.\r\n\r\n', 'active-care-home-1606614036.png'),
(2, 'إعادة تأهيل العمود الفقري', '', 'الجراحة ليست الحل الأول لآلام الظهر, يتضمن العلاج الطبيعي على عدة تدخلات لتهدئة الامك و لتقوية عضلاتك ويتيح لك الفرصه لعمل تمارين تجعلك تشعر بالراحه .\r\n', 'active-care-home-1606614353.png'),
(3, 'anji', '', 'anji', 'active-care-home-1606381089.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `activecare_newrequests`
--

CREATE TABLE `activecare_newrequests` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `country_code` int(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `file` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_newrequests`
--

INSERT INTO `activecare_newrequests` (`id`, `first_name`, `last_name`, `position`, `email`, `country_code`, `mobile`, `file`, `status`) VALUES
(1, 'Sxsasx', '', 'Please Select', '', 0, '', 'uploads/resumes/ChatLog Meet Now 2019_09_12 09_03.rtf', 0),
(2, 'ghfd', '', 'Please Select', '', 0, '', 'uploads/resumes/ChatLog Meet Now 2019_09_12 09_03.rtf', 0),
(3, 'anji', 'pavuluri', 'Admin Staff', 'anji@gmail.com', 0, '09876543210', 'uploads/resumes/1607850082_ChatLog Meet Now 2019_09_12 09_03.rtf', 0),
(4, 'naga', 'aasas', 'Other', 'anji@gmail.com', 91, '09876543210', 'uploads/resumes/1607852305_ChatLog Meet Now 2019_09_06 00_19.rtf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_orders`
--

CREATE TABLE `activecare_orders` (
  `id` int(11) NOT NULL,
  `orderid` varchar(225) NOT NULL,
  `cartid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `prodname` varchar(225) CHARACTER SET utf8 NOT NULL,
  `product_price` varchar(225) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-cart;2-paid,3-failed',
  `remarks` text CHARACTER SET utf8 NOT NULL,
  `paystatus` int(11) NOT NULL COMMENT '2-paid,3-failed',
  `orderstatus` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `paymentdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `billaddress` int(11) NOT NULL,
  `shipaddress` int(11) NOT NULL,
  `tax` varchar(225) NOT NULL,
  `shipping` varchar(225) NOT NULL,
  `payment_type` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1:online,0:cod'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecare_orders`
--

INSERT INTO `activecare_orders` (`id`, `orderid`, `cartid`, `customerid`, `prodid`, `prodname`, `product_price`, `quantity`, `status`, `remarks`, `paystatus`, `orderstatus`, `date`, `paymentdate`, `billaddress`, `shipaddress`, `tax`, `shipping`, `payment_type`) VALUES
(2, 'active_care_5fdb7e1f5d97f', 0, 2, 3, 'book', '200', 0, 2, '', 2, 0, '0000-00-00 00:00:00', '2020-12-17 15:49:51', 0, 0, '', '', '0'),
(3, 'active_care_5fdb8147eddd0', 0, 2, 3, 'book', '200', 0, 2, '', 2, 0, '0000-00-00 00:00:00', '2020-12-17 16:03:19', 0, 0, '', '', '0'),
(4, 'active_care_5fdb8147eddd0', 0, 2, 2, 'anji', '30', 0, 2, '', 2, 0, '0000-00-00 00:00:00', '2020-12-17 16:03:20', 0, 0, '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `activecare_ourteam`
--

CREATE TABLE `activecare_ourteam` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(255) NOT NULL,
  `thumbimg1` varchar(225) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_ourteam`
--

INSERT INTO `activecare_ourteam` (`id`, `title`, `content`, `thumbimg1`, `name`, `status`) VALUES
(1, 'فريقنا', 'لقد تم تشـكيل فريقنا بكفاءة من قبل نخبة من المتخصصين في العاج الطبيعي.. نحن نقدم لهم تدريبـً مكثفـً يـدفعهـم باستمرار إلى أن يكونوا في طليعة مجالهم؛ ألننا نعتقد أن قوة الفريق هي قوة كل عضو فيه.', 'active-care-ourteam-1606974971.png', 'سامانثا ميشال', 1),
(2, '', '', 'active-care-ourteam-1606975091.png', 'محمد حسين', 1),
(3, '', '', 'active-care-ourteam-1606975127.png', 'إليزابيث إكس', 1),
(4, '', '', 'active-care-ourteam-1606975165.png', 'إليزابيث', 1),
(5, '', '', 'active-care-ourteam-1606975195.png', 'كاميلا انطون', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_payments`
--

CREATE TABLE `activecare_payments` (
  `id` int(11) NOT NULL,
  `InvoiceId` varchar(225) NOT NULL,
  `InvoiceReference` varchar(225) NOT NULL,
  `CreatedDate` varchar(225) NOT NULL,
  `ExpireDate` varchar(225) NOT NULL,
  `InvoiceValue` varchar(225) NOT NULL,
  `Comments` text NOT NULL,
  `CustomerName` varchar(225) NOT NULL,
  `CustomerMobile` varchar(225) NOT NULL,
  `CustomerEmail` varchar(225) NOT NULL,
  `TransactionDate` varchar(225) NOT NULL,
  `PaymentGateway` varchar(225) NOT NULL,
  `ReferenceId` varchar(225) NOT NULL,
  `TrackId` varchar(225) NOT NULL,
  `TransactionId` varchar(225) NOT NULL,
  `PaymentId` varchar(225) NOT NULL,
  `AuthorizationId` varchar(225) NOT NULL,
  `OrderId` varchar(225) NOT NULL,
  `TransactionStatus` varchar(225) NOT NULL COMMENT '1-unpaid;2-paid;3-failed',
  `Error` varchar(225) NOT NULL,
  `PaidCurrency` varchar(225) NOT NULL,
  `PaidCurrencyValue` varchar(225) NOT NULL,
  `TransationValue` varchar(225) NOT NULL,
  `CustomerServiceCharge` varchar(225) NOT NULL,
  `DueValue` varchar(225) NOT NULL,
  `Currency` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecare_payments`
--

INSERT INTO `activecare_payments` (`id`, `InvoiceId`, `InvoiceReference`, `CreatedDate`, `ExpireDate`, `InvoiceValue`, `Comments`, `CustomerName`, `CustomerMobile`, `CustomerEmail`, `TransactionDate`, `PaymentGateway`, `ReferenceId`, `TrackId`, `TransactionId`, `PaymentId`, `AuthorizationId`, `OrderId`, `TransactionStatus`, `Error`, `PaidCurrency`, `PaidCurrencyValue`, `TransationValue`, `CustomerServiceCharge`, `DueValue`, `Currency`) VALUES
(0, '2', 'anji', '29-11-2020', '29-11-2020', '500rupees', 'testng', 'anji', '9014675474', 'anji@design-master.com', '29-11-2020', '', '', '', '', '', '', '', 'paid', '', '500', '500', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `activecare_prodimages`
--

CREATE TABLE `activecare_prodimages` (
  `id` int(11) NOT NULL,
  `prodid` int(11) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `activecare_products`
--

CREATE TABLE `activecare_products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `thumimage1` varchar(255) NOT NULL,
  `thumimage2` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_products`
--

INSERT INTO `activecare_products` (`id`, `title`, `price`, `content`, `thumimage1`, `thumimage2`, `status`) VALUES
(1, 'test', '11', 'testing ', 'active-care-home-1606823517.jpg', 'active-care-home-1606823517.pdf', 1),
(2, 'anji', '30', 'tesing purpose only', 'active-care-home-1608100657.jpg', 'active-care-home-1608100657.pdf', 1),
(3, 'book', '200', 'this is book number 2', 'active-care-home-1608100469.png', 'active-care-home-1608100469.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_services`
--

CREATE TABLE `activecare_services` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `thumbimg2` varchar(225) NOT NULL,
  `service_title` varchar(50) NOT NULL,
  `thumbimg1` varchar(225) NOT NULL,
  `background_image` varchar(500) NOT NULL,
  `color_code` varchar(50) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_services`
--

INSERT INTO `activecare_services` (`id`, `title`, `content`, `thumbimg2`, `service_title`, `thumbimg1`, `background_image`, `color_code`, `status`) VALUES
(1, 'إعادة تأهيل العمود الفقري', 'الجراحة ليست الحل الأول لآلام الظهر, يتضمن العلاج الطبيعي على عدة تدخلات لتهدئة الامك و لتقوية عضلاتك ويتيح لك الفرصه لعمل تمارين تجعلك تشعر بالراحه .', '../uploads/services/active-care-services-1607498381.png', 'إعادة تأهيل العمود الفقري\r\n', '../uploads/services/active-care-services-1607498381.svg', '', '', 1),
(2, 'صحة المرأة', 'من الطبيعى جدا أن يكون لديكِ آلام أثناء وبعد الحمل .. لا داعي للقلق <br> مع بعض التمارين العللاجيه المستمره أثناء فترة حملك ، سنساعدك على أن تصبحي بكامل لياقتك البدنيه مما يتيح لكِ ولادة سهله للمره الثانية والثالثة بأمر الله.', '../uploads/services/active-care-services-1607911393.png', 'صحة المرأة\r\n\r\n', '../uploads/services/active-care-services-1607911393.svg', '../uploads/services/active-care-services-1607911394.png', '', 1),
(3, 'إعادة تأهيل بعد العمليات', 'اصبحت الجراحات من الأمور المنتشره والطبيعيه في هذه الأيام ، وخاصة جراحة تغيير المفاصل وغيرها.. دور العلاج الطبيعي هو تأهيل المريض لذلك النوع من الجراحات قبل العمليه و بعدها عن طريق وضع برنامج علاجي لإعادة التوازن بين عضلات الجسم.', '../uploads/services/active-care-services-1607498623.png', 'إعادة التأهيل بعد الجراحة', '../uploads/services/active-care-services-1607498623.svg', '', '', 1),
(4, 'وقائي', 'Active Care is an innovative home care company established by Dr. Wael Al-Asaq, our aim is to provide the full physical therapy rehab experience within the comfort of our clients, selected setting. We believe that together we can reach your full potential.', '../uploads/services/active-care-services-1607498772.png', 'وقائي', '../uploads/services/active-care-services-1607498772.svg', '', '', 1),
(5, 'إعادة تأهيل الجهاز العصبي', 'الهدف من إعادة التأهيل العصبي هو مساعدتك على العودة الى أعلى مستوى من الوضائف اليومية والاستقلالية الممكنة ، مع إحداث تغيير في حالتك البدنية و النفسية. ', '../uploads/services/active-care-services-1607498871.png', 'إعادة تأهيل الجهاز العصبي', '../uploads/services/active-care-services-1607498870.svg', '', '', 1),
(6, 'الإصابات الرياضية', 'الحياه مليئه بالمغامره والتحديات ، والتدريب المستمر على التحفيز قد يعرضك للإصابه ، لكن مع العلاج الطبيعي لن تحد الإصابه من عزيمتك... فهدفنا ليس تحسين أداءك فقط .. بل تأهيلك للفوز على كل التحديات.', '../uploads/services/active-care-services-1607498932.png', 'الإصابات الرياضية', '../uploads/services/active-care-services-1607498932.svg', '', '', 1),
(7, 'صحة األطفال', 'طفلك فريد من نوعه واحتياجاته تختلف عن أي طفل آخر.. عندما نضع برنامجاً تأهيلياً نضعه وفقاً لشخصيته المميزه.', '../uploads/services/active-care-services-1607915483.png', 'صحة األطفال', '../uploads/services/active-care-services-1607915200.svg', '../uploads/services/active-care-services-1607915514.png', '#6d3bf7', 1),
(8, 'طب الشيخوخة', 'مع تقدم السن تقل الحركه و تضعف العضلات ، وقد يواجه المسن الصعوبه في القيام بأبسط مهام يومه... لتفادي هذه المشكله نضع برنامج علاجي لتقوية العضلات ورفع مستوى الاتزان ، مما يساعده على الحفاظ على لياقته وشبابه.', '../uploads/services/active-care-services-1607499145.png', 'طب الشيخوخة', '../uploads/services/active-care-services-1607499145.svg', '../uploads/services/active-care-services-1607915581.png', '', 1),
(9, 'المعالجة المائية', '', '../uploads/services/active-care-services-1607499232.png', 'المعالجة المائية', '../uploads/services/active-care-services-1607499232.svg', '', '', 1),
(10, 'الرعايه المنزليه', '', '../uploads/services/active-care-services-1607499288.png', 'الرعايه المنزليه', '../uploads/services/active-care-services-1607499288.svg', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_testimonials`
--

CREATE TABLE `activecare_testimonials` (
  `id` int(11) NOT NULL,
  `given_by` varchar(150) NOT NULL,
  `testimonial` text NOT NULL,
  `updated_date` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activecare_testimonials`
--

INSERT INTO `activecare_testimonials` (`id`, `given_by`, `testimonial`, `updated_date`, `status`) VALUES
(0, 'nouraaienzi', 'Before I’ve started attending these chiropractic services and sessions, my migraines were just driving me crazy every day. But as soon as my visits here became regular, in a matter of few weeks I was healed! ', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `activecare_usermenulist`
--

CREATE TABLE `activecare_usermenulist` (
  `id` int(11) NOT NULL,
  `adminmenuid` int(11) NOT NULL,
  `menusubmenurel` int(11) NOT NULL,
  `adminsubmenuid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activecare_usermenulist`
--

INSERT INTO `activecare_usermenulist` (`id`, `adminmenuid`, `menusubmenurel`, `adminsubmenuid`, `userid`, `status`) VALUES
(1, 1, 1, 1, 1, 1),
(7, 0, 0, 3, 1, 1),
(8, 3, 3, 4, 1, 1),
(9, 4, 4, 5, 1, 1),
(10, 5, 5, 6, 1, 1),
(11, 6, 6, 7, 1, 1),
(12, 7, 7, 8, 1, 1),
(13, 8, 8, 9, 1, 1),
(16, 2, 2, 11, 1, 1),
(17, 1, 1, 12, 1, 1),
(18, 1, 1, 13, 1, 1),
(19, 10, 10, 14, 1, 1),
(21, 5, 5, 16, 1, 1),
(22, 5, 5, 17, 1, 1),
(23, 1, 1, 18, 1, 1),
(24, 1, 1, 19, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activecare_adminmenu`
--
ALTER TABLE `activecare_adminmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_adminsubmenu`
--
ALTER TABLE `activecare_adminsubmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_adminuser`
--
ALTER TABLE `activecare_adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_banners`
--
ALTER TABLE `activecare_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_cart`
--
ALTER TABLE `activecare_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodf` (`prodid`);

--
-- Indexes for table `activecare_complete_purchase_order`
--
ALTER TABLE `activecare_complete_purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_customers`
--
ALTER TABLE `activecare_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_e_book_request`
--
ALTER TABLE `activecare_e_book_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_feedbacks`
--
ALTER TABLE `activecare_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_homepageheader`
--
ALTER TABLE `activecare_homepageheader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_newrequests`
--
ALTER TABLE `activecare_newrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_orders`
--
ALTER TABLE `activecare_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_ourteam`
--
ALTER TABLE `activecare_ourteam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_payments`
--
ALTER TABLE `activecare_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_products`
--
ALTER TABLE `activecare_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_services`
--
ALTER TABLE `activecare_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activecare_usermenulist`
--
ALTER TABLE `activecare_usermenulist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activecare_adminmenu`
--
ALTER TABLE `activecare_adminmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `activecare_adminsubmenu`
--
ALTER TABLE `activecare_adminsubmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `activecare_banners`
--
ALTER TABLE `activecare_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activecare_cart`
--
ALTER TABLE `activecare_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `activecare_complete_purchase_order`
--
ALTER TABLE `activecare_complete_purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `activecare_customers`
--
ALTER TABLE `activecare_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `activecare_e_book_request`
--
ALTER TABLE `activecare_e_book_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activecare_homepageheader`
--
ALTER TABLE `activecare_homepageheader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activecare_newrequests`
--
ALTER TABLE `activecare_newrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `activecare_orders`
--
ALTER TABLE `activecare_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `activecare_ourteam`
--
ALTER TABLE `activecare_ourteam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `activecare_products`
--
ALTER TABLE `activecare_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `activecare_services`
--
ALTER TABLE `activecare_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `activecare_usermenulist`
--
ALTER TABLE `activecare_usermenulist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activecare_cart`
--
ALTER TABLE `activecare_cart`
  ADD CONSTRAINT `prodf` FOREIGN KEY (`prodid`) REFERENCES `activecare_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
