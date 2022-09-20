-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 03:45 AM
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
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `website` varchar(150) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 = Aktif, 2 = Non Aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cryteria_disability`
--

CREATE TABLE `cryteria_disability` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cryteria_disability`
--

INSERT INTO `cryteria_disability` (`id`, `name`, `image`, `created_at`) VALUES
(1, 'Disabilitas Daksa', NULL, '2022-03-30 09:31:08'),
(2, 'Disabilitas Rungu Wicara', NULL, '2022-03-30 09:31:08'),
(3, 'Disabilitas Netra', NULL, '2022-03-30 09:31:08'),
(4, 'Disabilitas Grahita', NULL, '2022-03-30 09:31:08'),
(5, 'Disabilitas Mental', NULL, '2022-03-30 09:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 = Aktif, 2 = Non Aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tidak/Belum Sekolah', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00'),
(2, 'Belum Tamat SD/Sederajat', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00'),
(3, 'Tamat SD/Sederajat', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00'),
(4, 'SLTP/Sederajat', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00'),
(5, 'SLTA/Sederajat', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00'),
(6, 'Diploma I/II', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00'),
(7, 'Akademi/Diploma III/Sarjana Muda', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00'),
(8, 'Diploma IV/Strata I', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00'),
(9, 'Strata II', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00'),
(10, 'Strata III', 1, '2022-03-30 09:26:00', '2022-03-30 09:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_type` tinyint(4) NOT NULL,
  `id_disability` tinyint(1) NOT NULL,
  `id_location` tinyint(4) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `date_in` date NOT NULL,
  `date_close` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `id_company`, `id_type`, `id_disability`, `id_location`, `title`, `description`, `date_in`, `date_close`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'Software Engineer (Backend)', 'Develop Rest APIs\r\n\r\nProvide expertise in the use of restful web services and unit testing frameworks\r\n\r\nAnalyze data, application errors, and general environmental / infrastructure problems\r\n\r\nPerformance optimization and problem diagnosis\r\nKualifikasi Minimum\r\nMinimum 2 years experience in a Backend Development\r\nStrong experience with RESTful API’s and Microservices development\r\nSkilled in frameworks such as Laravel, Codeigniter, NodeJs, ExpressJS\r\nSkilled in database such as MySQL, MongoDB, Elastic\r\nKnowledge in developing software using agile methodologies\r\nExperience in the successful delivery of project documentation using Gitlab and versioning tools such as Git\r\nFamiliar with Golang or Python is a plus\r\nWilling to learn & adapt to different technologies\r\nFasilitas dan Tunjangan\r\nFlexitime\r\nFlexitime\r\nWork from Home\r\nWork from Home\r\nMaternity & Paternity Leave\r\nMaternity & Paternity Leave\r\nMedical, Prescription, Dental, or Vision Plans\r\nMedical, Prescription, Dental, or Vision Plans\r\nLAIN-LAIN\r\nWork from anywhere - work from home if you\'d like, or in our office in NeoSoho (West Jakarta)\r\n\r\nLaptop for work\r\n\r\nBPJS Kesehatan & TK\r\n\r\nMedical Reimbursement (include Dental & Optical)\r\n\r\nOvertime allowance\r\n\r\nSkill Development allowance\r\n\r\nEmployee Loan up to 3x salary\r\n\r\nKeahlian yang diperlukan\r\nPHP\r\nNode.js\r\nCodeigniter\r\nExpress.js\r\nLaravel\r\nMySQL', '2022-04-03', '2022-04-09', '2022-04-03 03:03:53', '2022-04-03 03:03:53'),
(2, 1, 1, 1, 1, 'Machine Learning Engineer', 'Design & implement ML/DL solutions and integrate them with various Big Data platforms and architectures.\r\nCreating and Maintain Machine Learning pipelines that are scale-able, robust, and ready for production.\r\nCollaborate with domain experts, software developers, and data scientists.\r\nTroubleshoot ML/DL model issues, including recommendations for retrain, re-validate, and improvements/optimization.\r\nRealize Continuous Integration (CI) and Continuous Deployment (CD) pipelines within ML/DL platforms.\r\nKualifikasi Minimum\r\nRequirements:\r\n\r\n3 years of hands-on experience in building ML models deployed into real-world business applications or research.\r\nGood understanding of Machine Learning / Deep learning framework such as Jupyter Notebook, Anaconda, Tensorflow, Keras, Scikit-Learn, PyTorch, MXNet, etc.\r\nExperience working with cloud services platform (AWS or GCP) to build ML/DL pipelines; training (GPU CUDA), evaluating (Tensorboard), deploying (SageMaker, Docker container).\r\nProficiency with Python, R and basic libraries for machine learning such as scikit-learn and pandas\r\nStrong working knowledge of ML/DL algorithms (classification, regression, clustering, hyperparameter tuning, etc).\r\nExperience in model compression or quantization for on-edge-device inference\r\nProficiency with Open CV\r\nExperience with Image Processing/Computer Vision\r\nWe will also factor in relevant certifications (e.g., AWS, Coursera)\r\nExperience with Continuous Integration and Continuous Delivery(CI/CD)', '2022-04-03', '2022-04-09', '2022-04-03 03:03:53', '2022-04-03 03:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 = Aktif, 2 = Non Aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 = Aktif, 2 = Non Aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(15) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'admin', 'Admin BPJS Ketenagakerjaan', '2022-03-30 09:17:53'),
(2, 'company', 'Company Hiring', '2022-03-30 16:18:31'),
(3, 'user', 'Job Seeker', '2022-03-30 16:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 = Aktif, 2 = Non Aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `id_role` tinyint(1) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1 = Aktif, 2 = Non Aktif',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `id_role`, `username`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2022-03-30 08:29:25', '2022-03-31 16:11:40'),
(2, 2, 'company', 'company@gmail.com', '93c731f1c3a84ef05cd54d044c379eaa', 1, '2022-04-03 07:43:03', '2022-04-04 01:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `id_cryteria_disability` tinyint(1) NOT NULL,
  `desc` text DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '1 = laki-laki, 2 = permpuan',
  `handphone` int(11) NOT NULL,
  `file_cv` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cryteria_disability`
--
ALTER TABLE `cryteria_disability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cryteria_disability`
--
ALTER TABLE `cryteria_disability`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
