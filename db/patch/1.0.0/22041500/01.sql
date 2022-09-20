-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 05:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `type`
--
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Magang', '2022-04-15 14:58:23', '2022-04-15 14:58:23'),
(2, 'Full-time', '2022-04-15 14:58:23', '2022-04-15 14:58:23'),
(3, 'Part-time', '2022-04-15 14:58:58', '2022-04-15 14:58:58'),
(4, 'Freelance', '2022-04-15 14:58:58', '2022-04-15 14:58:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Table structure for table `job_category`
--
DROP TABLE IF EXISTS `job_category`;
CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 = Aktif, 2 = Non Aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Marketing & Comunication', 1, '2022-04-15 15:11:12', '2022-04-15 15:11:12'),
(2, 'Design & Development', 1, '2022-04-15 15:11:12', '2022-04-15 15:11:12'),
(3, 'Human Research & Development', 1, '2022-04-15 15:12:00', '2022-04-15 15:12:00'),
(4, 'Finance Management', 1, '2022-04-15 15:12:00', '2022-04-15 15:12:00'),
(5, 'Goverment', 1, '2022-04-15 15:12:37', '2022-04-15 15:12:37'),
(6, 'Business & Consulting', 1, '2022-04-15 15:12:37', '2022-04-15 15:12:37'),
(7, 'Customer Support Care', 1, '2022-04-15 15:13:37', '2022-04-15 15:13:37'),
(8, 'Project Management', 1, '2022-04-15 15:13:37', '2022-04-15 15:13:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_type` tinyint(4) NOT NULL,
  `id_disability` varchar(100) NOT NULL,
  `id_provinces` int(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `short_desc` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `date_in` date NOT NULL,
  `date_close` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `id_company`, `id_category`, `id_type`, `id_disability`, `id_provinces`, `title`, `slug`, `short_desc`, `description`, `image`, `date_in`, `date_close`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, '1', 1, 'Software Engineer (Backend)', '', 'Develop Rest APIs Provide expertise in the use of restful web services and unit testing frameworks A Provide expertise in the use of restful web services and unit testing frameworks\n\nAnalyze data, application errors', 'Develop Rest APIs\n\nProvide expertise in the use of restful web services and unit testing frameworks\n\nAnalyze data, application errors, and general environmental / infrastructure problems\n\nPerformance optimization and problem diagnosis\nKualifikasi Minimum\nMinimum 2 years experience in a Backend Development\nStrong experience with RESTful APIâ€™s and Microservices development\nSkilled in frameworks such as Laravel, Codeigniter, NodeJs, ExpressJS\nSkilled in database such as MySQL, MongoDB, Elastic\nKnowledge in developing software using agile methodologies\nExperience in the successful delivery of project documentation using Gitlab and versioning tools such as Git\nFamiliar with Golang or Python is a plus\nWilling to learn & adapt to different technologies\nFasilitas dan Tunjangan\nFlexitime\nFlexitime\nWork from Home\nWork from Home\nMaternity & Paternity Leave\nMaternity & Paternity Leave\nMedical, Prescription, Dental, or Vision Plans\nMedical, Prescription, Dental, or Vision Plans\nLAIN-LAIN\nWork from anywhere - work from home if you\'d like, or in our office in NeoSoho (West Jakarta)\n\nLaptop for work\n\nBPJS Kesehatan & TK\n\nMedical Reimbursement (include Dental & Optical)\n\nOvertime allowance\n\nSkill Development allowance\n\nEmployee Loan up to 3x salary\n\nKeahlian yang diperlukan\nPHP\nNode.js\nCodeigniter\nExpress.js\nLaravel\nMySQL', '', '2022-04-03', '2022-04-09', '2022-04-03 03:03:53', '2022-04-14 16:30:44'),
(2, 1, 0, 1, '1', 1, 'Machine Learning Engineer', '', 'Design & implement ML/DL solutions and integrate them with various Big Data platforms and architectu Maintain Machine Learning pipelines that are scale-able, robust, and ready for production.\nCollaborate with domain experts, software', 'Design & implement ML/DL solutions and integrate them with various Big Data platforms and architectures.\nCreating and Maintain Machine Learning pipelines that are scale-able, robust, and ready for production.\nCollaborate with domain experts, software developers, and data scientists.\nTroubleshoot ML/DL model issues, including recommendations for retrain, re-validate, and improvements/optimization.\nRealize Continuous Integration (CI) and Continuous Deployment (CD) pipelines within ML/DL platforms.\nKualifikasi Minimum\nRequirements:\n\n3 years of hands-on experience in building ML models deployed into real-world business applications or research.\nGood understanding of Machine Learning / Deep learning framework such as Jupyter Notebook, Anaconda, Tensorflow, Keras, Scikit-Learn, PyTorch, MXNet, etc.\nExperience working with cloud services platform (AWS or GCP) to build ML/DL pipelines; training (GPU CUDA), evaluating (Tensorboard), deploying (SageMaker, Docker container).\nProficiency with Python, R and basic libraries for machine learning such as scikit-learn and pandas\nStrong working knowledge of ML/DL algorithms (classification, regression, clustering, hyperparameter tuning, etc).\nExperience in model compression or quantization for on-edge-device inference\nProficiency with Open CV\nExperience with Image Processing/Computer Vision\nWe will also factor in relevant certifications (e.g., AWS, Coursera)\nExperience with Continuous Integration and Continuous Delivery(CI/CD)', '', '2022-04-03', '2022-04-09', '2022-04-03 03:03:53', '2022-04-14 16:31:13'),
(3, 1, 3, 2, '1', 31, 'Staff Administrasi', '-1748215921', '&lt;p&gt;PT INDONESIA INSURANCE BROKERS membuka lowongan untuk posisi Staff Administrasi kesempatan untuk bergabung bersama kami bagi pribadi yang berkompeten, memiliki integritas, Loyalitas dan dedikasi yang tinggi dalam bekerja&lt;/p&gt;\r\n', '&lt;p&gt;menganalisa dan membuat Report yang diminta sesuai dengan bagiannya.&lt;/p&gt;\r\n\r\n&lt;p&gt;2. Menyerahkan laporan tepat waktu dan menyiapkan presentasi/proposal sesuai penugasan&lt;/p&gt;\r\n\r\n&lt;p&gt;3. Tangani informasi sensitif secara rahasia.&lt;/p&gt;\r\n\r\n&lt;p&gt;4. Mengatur Petty Cash.&lt;/p&gt;\r\n\r\n&lt;p&gt;5. Mengelola arsip administrasi.&lt;/p&gt;\r\n\r\n&lt;p&gt;6. Membuat dan memperbarui catatan dan basis data dengan data personalia, keuangan, pajak, dan lainnya.&lt;/p&gt;\r\n\r\n&lt;p&gt;7. Bekerja secara kooperatif, sebagai bagian dari tim untuk memberikan dukungan kesekretariatan dan administrasi yang efisien dan efektif.&lt;/p&gt;\r\n\r\n&lt;p&gt;8. Melakukan tugas klerikel dan administrasi umum untuk mendukung layanan yang diperlukan (misalnya proses pasca, fotokopi, pemindaian).&lt;/p&gt;\r\n\r\n&lt;p&gt;9. Menangani pekerjaan administrative yang berhubungan dengan legal.&lt;/p&gt;\r\n\r\n&lt;p&gt;10. Memasukan data dalam template kontrak.&lt;/p&gt;\r\n\r\n&lt;p&gt;11. Memproses dan menanggapi dengan segera komunikasi yang masuk (pos, telepon, faks, email, tatap muka), pengambilan pesan yang akurat, penyalinan, dan pendistribusian informasi yang diperlukan.&lt;/p&gt;\r\n\r\n&lt;p&gt;12. Mengatur jadwal meeting, pertemuan dan menyiapkan kebutuhan perjalanan pimpinan.&lt;/p&gt;\r\n\r\n&lt;p&gt;13. Menyambut tamu yang datang dan memberikan informasi dan referensi terkait dengan kunjungan, dan melayani pembayaran.&lt;/p&gt;\r\n\r\n&lt;p&gt;14. Bertanggung jawab untuk mengatur pengaturan dan menggunaan ruang kantor, ruang meeting.&lt;/p&gt;\r\n\r\n&lt;p&gt;15. Mengelola persediaan kantor dan melakukan proses pembelian.&lt;/p&gt;\r\n\r\n&lt;p&gt;16. Memastikan pengoperasian peralatan dengan melengkapi persyaratan pemeliharaan preventif; meminta perbaikan; memelihara inventaris peralatan&lt;/p&gt;\r\n', 'images2.png', '2022-04-16', '2022-04-30', '2022-04-15 19:39:42', '2022-04-15 19:40:25'),
(4, 1, 1, 2, 'Disabilitas Daksa,Disabilitas Netra', 31, 'STAFF PRINT DAN CETAK PHOTO', 'staff-print-dan-cetak-photo', '&lt;ol&gt;\r\n &lt;li&gt;Perempuan&lt;/li&gt;\r\n &lt;li&gt;Usia tidak diutamakan&lt;/li&gt;\r\n &lt;li&gt;Pendidikan terakhir minimal SMA/SMK (Semua Jurusan)&lt;/li&gt;\r\n &lt;li&gt;Tidak diutamakan memiliki pengalaman berkerja&lt;/li&gt;\r\n&lt;/ol&gt;\r\n', '&lt;p&gt;Software developer merupakan seseorang yang bertugas untuk membangun serta menciptakan suatu produk. Mereka melakukannya sesuai dengan prinsip-prinsip desain dan implementasi rekayasa perangkat lunak. Software developer seringkali menggunakan bahasa pemrograman yang beragam. Pekerjaan mereka pun memang sangat kompleks dan membutuhkan kemampuan lebih dalam dunia komputer, science, bahkan matematika. Pekerjaan seorang developer akan terus berevolusi seiring berkembangan teknologi yang juga berubah-ubah dengan cepat. Sehingga, seorang developer pun harus sering belajar untuk kemajuan dirinya sendiri&lt;/p&gt;\r\n', '1a5c2b13-befe-43de-8f8d-c54965ee22af.jpg', '2022-04-16', '2022-04-30', '2022-04-15 20:02:43', '2022-04-15 20:02:43'),
(5, 1, 2, 2, 'Disabilitas Rungu Wicara,Disabilitas Mental', 31, 'GRAPHIC DESIGNER INTERN', 'graphic-designer-intern', '&lt;ol&gt;\r\n &lt;li&gt;Laki-laki atau perempuan&lt;/li&gt;\r\n &lt;li&gt;Usia tidak diutamakan&lt;/li&gt;\r\n &lt;li&gt;Pendidikan terakhir minimal D3 (DKV/Art/Design)&lt;/li&gt;\r\n &lt;li&gt;Diutamakan telah memiliki pengalaman berkerja&lt;/li&gt;\r\n&lt;/', '&lt;ol&gt;\r\n &lt;li&gt;Membuat desain media sosial, poster, modul, grafik visual, dan lain-lain.&lt;/li&gt;\r\n &lt;li&gt;Berkoordinasi secara berkala dengan tim.&lt;/li&gt;\r\n &lt;li&gt;Memastikan key visual konten sesuai dengan identitas proyek.&lt;/li&gt;\r\n &lt;li&gt;Membuat desain sampul website untuk setiap artikel dan informasi.&lt;/li&gt;\r\n &lt;li&gt;Membuat ilustrasi dokumen melalui Adobe Photoshop/Adobe Illustrator.&lt;/li&gt;\r\n &lt;li&gt;Melakukan revisi garansi desain selama proyek berlangsung.&lt;/li&gt;\r\n &lt;li&gt;Membuat desain di Canva untuk keperluan template maupun kebutuhan desain yang dapat disunting oleh non desainer.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n', 'images3.png', '2022-04-16', '2022-04-30', '2022-04-15 20:08:23', '2022-04-15 20:08:23'),
(6, 1, 2, 2, 'Disabilitas Daksa,Disabilitas Rungu Wicara', 0, 'GRAPHIC DESIGNER INTERN', 'graphic-designer-intern-2030177089', '&lt;ol&gt;\r\n &lt;li&gt;Laki-laki atau perempuan&lt;/li&gt;\r\n &lt;li&gt;Usia tidak diutamakan&lt;/li&gt;\r\n &lt;li&gt;Pendidikan terakhir minimal D3 (DKV/Art/Design)&lt;/li&gt;\r\n &lt;li&gt;Diutamakan telah memiliki pengalaman berkerja&lt;/li&gt;\r\n&lt;/', '&lt;ol&gt;\r\n &lt;li&gt;Membuat desain media sosial, poster, modul, grafik visual, dan lain-lain.&lt;/li&gt;\r\n &lt;li&gt;Berkoordinasi secara berkala dengan tim.&lt;/li&gt;\r\n &lt;li&gt;Memastikan key visual konten sesuai dengan identitas proyek.&lt;/li&gt;\r\n &lt;li&gt;Membuat desain sampul website untuk setiap artikel dan informasi.&lt;/li&gt;\r\n &lt;li&gt;Membuat ilustrasi dokumen melalui Adobe Photoshop/Adobe Illustrator.&lt;/li&gt;\r\n &lt;li&gt;Melakukan revisi garansi desain selama proyek berlangsung.&lt;/li&gt;\r\n &lt;li&gt;Membuat desain di Canva untuk keperluan template maupun kebutuhan desain yang dapat disunting oleh non desainer.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n', 'images4.png', '2022-04-16', '2022-04-30', '2022-04-15 20:16:10', '2022-04-15 20:16:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

