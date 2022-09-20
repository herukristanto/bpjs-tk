-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: job_portal
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_company` int NOT NULL,
  `id_category` int NOT NULL,
  `id_type` tinyint NOT NULL,
  `id_disability` tinyint(1) NOT NULL,
  `id_location` tinyint NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `date_in` date NOT NULL,
  `date_close` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (1,1,0,1,1,1,'Software Engineer (Backend)','Develop Rest APIs\r\n\r\nProvide expertise in the use of restful web services and unit testing frameworks\r\n\r\nAnalyze data, application errors, and general environmental / infrastructure problems\r\n\r\nPerformance optimization and problem diagnosis\r\nKualifikasi Minimum\r\nMinimum 2 years experience in a Backend Development\r\nStrong experience with RESTful APIâ€™s and Microservices development\r\nSkilled in frameworks such as Laravel, Codeigniter, NodeJs, ExpressJS\r\nSkilled in database such as MySQL, MongoDB, Elastic\r\nKnowledge in developing software using agile methodologies\r\nExperience in the successful delivery of project documentation using Gitlab and versioning tools such as Git\r\nFamiliar with Golang or Python is a plus\r\nWilling to learn & adapt to different technologies\r\nFasilitas dan Tunjangan\r\nFlexitime\r\nFlexitime\r\nWork from Home\r\nWork from Home\r\nMaternity & Paternity Leave\r\nMaternity & Paternity Leave\r\nMedical, Prescription, Dental, or Vision Plans\r\nMedical, Prescription, Dental, or Vision Plans\r\nLAIN-LAIN\r\nWork from anywhere - work from home if you\'d like, or in our office in NeoSoho (West Jakarta)\r\n\r\nLaptop for work\r\n\r\nBPJS Kesehatan & TK\r\n\r\nMedical Reimbursement (include Dental & Optical)\r\n\r\nOvertime allowance\r\n\r\nSkill Development allowance\r\n\r\nEmployee Loan up to 3x salary\r\n\r\nKeahlian yang diperlukan\r\nPHP\r\nNode.js\r\nCodeigniter\r\nExpress.js\r\nLaravel\r\nMySQL','2022-04-03','2022-04-09','2022-04-03 03:03:53','2022-04-03 03:03:53'),(2,1,0,1,1,1,'Machine Learning Engineer','Design & implement ML/DL solutions and integrate them with various Big Data platforms and architectures.\r\nCreating and Maintain Machine Learning pipelines that are scale-able, robust, and ready for production.\r\nCollaborate with domain experts, software developers, and data scientists.\r\nTroubleshoot ML/DL model issues, including recommendations for retrain, re-validate, and improvements/optimization.\r\nRealize Continuous Integration (CI) and Continuous Deployment (CD) pipelines within ML/DL platforms.\r\nKualifikasi Minimum\r\nRequirements:\r\n\r\n3 years of hands-on experience in building ML models deployed into real-world business applications or research.\r\nGood understanding of Machine Learning / Deep learning framework such as Jupyter Notebook, Anaconda, Tensorflow, Keras, Scikit-Learn, PyTorch, MXNet, etc.\r\nExperience working with cloud services platform (AWS or GCP) to build ML/DL pipelines; training (GPU CUDA), evaluating (Tensorboard), deploying (SageMaker, Docker container).\r\nProficiency with Python, R and basic libraries for machine learning such as scikit-learn and pandas\r\nStrong working knowledge of ML/DL algorithms (classification, regression, clustering, hyperparameter tuning, etc).\r\nExperience in model compression or quantization for on-edge-device inference\r\nProficiency with Open CV\r\nExperience with Image Processing/Computer Vision\r\nWe will also factor in relevant certifications (e.g., AWS, Coursera)\r\nExperience with Continuous Integration and Continuous Delivery(CI/CD)','2022-04-03','2022-04-09','2022-04-03 03:03:53','2022-04-03 03:03:53');
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-14  0:02:40
