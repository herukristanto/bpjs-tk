-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 06:31 PM
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
-- Table structure for table `job`
--
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_type` tinyint(4) NOT NULL,
  `id_disability` tinyint(1) NOT NULL,
  `id_location` tinyint(4) NOT NULL,
  `title` varchar(150) NOT NULL,
  `short_desc` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_in` date NOT NULL,
  `date_close` date NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 CREATE TABLE IF NOT EXISTS `ci_sessions` (
    `id` varchar(40) NOT NULL,
    `ip_address` varchar(45) NOT NULL,
    `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
    `data` blob NOT NULL,
    PRIMARY KEY (id),
    KEY `ci_sessions_timestamp` (`timestamp`)
);

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `id_company`, `id_category`, `id_type`, `id_disability`, `id_location`, `title`, `short_desc`, `description`, `date_in`, `date_close`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 1, 1, 'Software Engineer (Backend)', 'Develop Rest APIs Provide expertise in the use of restful web services and unit testing frameworks A Provide expertise in the use of restful web services and unit testing frameworks\n\nAnalyze data, application errors', 'Develop Rest APIs\n\nProvide expertise in the use of restful web services and unit testing frameworks\n\nAnalyze data, application errors, and general environmental / infrastructure problems\n\nPerformance optimization and problem diagnosis\nKualifikasi Minimum\nMinimum 2 years experience in a Backend Development\nStrong experience with RESTful APIâ€™s and Microservices development\nSkilled in frameworks such as Laravel, Codeigniter, NodeJs, ExpressJS\nSkilled in database such as MySQL, MongoDB, Elastic\nKnowledge in developing software using agile methodologies\nExperience in the successful delivery of project documentation using Gitlab and versioning tools such as Git\nFamiliar with Golang or Python is a plus\nWilling to learn & adapt to different technologies\nFasilitas dan Tunjangan\nFlexitime\nFlexitime\nWork from Home\nWork from Home\nMaternity & Paternity Leave\nMaternity & Paternity Leave\nMedical, Prescription, Dental, or Vision Plans\nMedical, Prescription, Dental, or Vision Plans\nLAIN-LAIN\nWork from anywhere - work from home if you\'d like, or in our office in NeoSoho (West Jakarta)\n\nLaptop for work\n\nBPJS Kesehatan & TK\n\nMedical Reimbursement (include Dental & Optical)\n\nOvertime allowance\n\nSkill Development allowance\n\nEmployee Loan up to 3x salary\n\nKeahlian yang diperlukan\nPHP\nNode.js\nCodeigniter\nExpress.js\nLaravel\nMySQL', '2022-04-03', '2022-04-09', '2022-04-03 03:03:53', '2022-04-14 16:30:44'),
(2, 1, 0, 1, 1, 1, 'Machine Learning Engineer', 'Design & implement ML/DL solutions and integrate them with various Big Data platforms and architectu Maintain Machine Learning pipelines that are scale-able, robust, and ready for production.\nCollaborate with domain experts, software', 'Design & implement ML/DL solutions and integrate them with various Big Data platforms and architectures.\nCreating and Maintain Machine Learning pipelines that are scale-able, robust, and ready for production.\nCollaborate with domain experts, software developers, and data scientists.\nTroubleshoot ML/DL model issues, including recommendations for retrain, re-validate, and improvements/optimization.\nRealize Continuous Integration (CI) and Continuous Deployment (CD) pipelines within ML/DL platforms.\nKualifikasi Minimum\nRequirements:\n\n3 years of hands-on experience in building ML models deployed into real-world business applications or research.\nGood understanding of Machine Learning / Deep learning framework such as Jupyter Notebook, Anaconda, Tensorflow, Keras, Scikit-Learn, PyTorch, MXNet, etc.\nExperience working with cloud services platform (AWS or GCP) to build ML/DL pipelines; training (GPU CUDA), evaluating (Tensorboard), deploying (SageMaker, Docker container).\nProficiency with Python, R and basic libraries for machine learning such as scikit-learn and pandas\nStrong working knowledge of ML/DL algorithms (classification, regression, clustering, hyperparameter tuning, etc).\nExperience in model compression or quantization for on-edge-device inference\nProficiency with Open CV\nExperience with Image Processing/Computer Vision\nWe will also factor in relevant certifications (e.g., AWS, Coursera)\nExperience with Continuous Integration and Continuous Delivery(CI/CD)', '2022-04-03', '2022-04-09', '2022-04-03 03:03:53', '2022-04-14 16:31:13');

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

