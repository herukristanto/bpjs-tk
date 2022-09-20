-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 12:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

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
(1, 1, 1, 1, 1, 'Software Engineer (Backend)', 'Develop Rest APIs\r\n\r\nProvide expertise in the use of restful web services and unit testing frameworks\r\n\r\nAnalyze data, application errors, and general environmental / infrastructure problems\r\n\r\nPerformance optimization and problem diagnosis\r\nKualifikasi Minimum\r\nMinimum 2 years experience in a Backend Development\r\nStrong experience with RESTful API’s and Microservices development\r\nSkilled in frameworks such as Laravel, Codeigniter, NodeJs, ExpressJS\r\nSkilled in database such as MySQL, MongoDB, Elastic\r\nKnowledge in developing software using agile methodologies\r\nExperience in the successful delivery of project documentation using Gitlab and versioning tools such as Git\r\nFamiliar with Golang or Python is a plus\r\nWilling to learn & adapt to different technologies\r\nFasilitas dan Tunjangan\r\nFlexitime\r\nFlexitime\r\nWork from Home\r\nWork from Home\r\nMaternity & Paternity Leave\r\nMaternity & Paternity Leave\r\nMedical, Prescription, Dental, or Vision Plans\r\nMedical, Prescription, Dental, or Vision Plans\r\nLAIN-LAIN\r\nWork from anywhere - work from home if you\'d like, or in our office in NeoSoho (West Jakarta)\r\n\r\nLaptop for work\r\n\r\nBPJS Kesehatan & TK\r\n\r\nMedical Reimbursement (include Dental & Optical)\r\n\r\nOvertime allowance\r\n\r\nSkill Development allowance\r\n\r\nEmployee Loan up to 3x salary\r\n\r\nKeahlian yang diperlukan\r\nPHP\r\nNode.js\r\nCodeigniter\r\nExpress.js\r\nLaravel\r\nMySQL', '2022-04-03', '2022-04-09', '2022-04-03 10:03:53', '2022-04-03 10:03:53'),
(2, 1, 1, 1, 1, 'Machine Learning Engineer', 'Design & implement ML/DL solutions and integrate them with various Big Data platforms and architectures.\r\nCreating and Maintain Machine Learning pipelines that are scale-able, robust, and ready for production.\r\nCollaborate with domain experts, software developers, and data scientists.\r\nTroubleshoot ML/DL model issues, including recommendations for retrain, re-validate, and improvements/optimization.\r\nRealize Continuous Integration (CI) and Continuous Deployment (CD) pipelines within ML/DL platforms.\r\nKualifikasi Minimum\r\nRequirements:\r\n\r\n3 years of hands-on experience in building ML models deployed into real-world business applications or research.\r\nGood understanding of Machine Learning / Deep learning framework such as Jupyter Notebook, Anaconda, Tensorflow, Keras, Scikit-Learn, PyTorch, MXNet, etc.\r\nExperience working with cloud services platform (AWS or GCP) to build ML/DL pipelines; training (GPU CUDA), evaluating (Tensorboard), deploying (SageMaker, Docker container).\r\nProficiency with Python, R and basic libraries for machine learning such as scikit-learn and pandas\r\nStrong working knowledge of ML/DL algorithms (classification, regression, clustering, hyperparameter tuning, etc).\r\nExperience in model compression or quantization for on-edge-device inference\r\nProficiency with Open CV\r\nExperience with Image Processing/Computer Vision\r\nWe will also factor in relevant certifications (e.g., AWS, Coursera)\r\nExperience with Continuous Integration and Continuous Delivery(CI/CD)', '2022-04-03', '2022-04-09', '2022-04-03 10:03:53', '2022-04-03 10:03:53');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
