-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 07:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_project_i`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_completed_levels`
--

CREATE TABLE `tbl_completed_levels` (
  `completed_level_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `xp_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_completed_levels`
--

INSERT INTO `tbl_completed_levels` (`completed_level_id`, `user_id`, `level_id`, `course_id`, `xp_points`) VALUES
(43, 46, 3, 1, 100),
(44, 46, 4, 1, 100),
(45, 46, 5, 2, 100),
(46, 46, 6, 2, 100),
(47, 43, 3, 1, 100),
(48, 43, 4, 1, 100),
(49, 43, 5, 2, 100),
(50, 43, 6, 2, 100),
(51, 48, 3, 1, 100),
(52, 48, 4, 1, 100),
(53, 53, 5, 2, 100),
(54, 53, 6, 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `desc` varchar(2000) NOT NULL,
  `number_of_levels` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`course_id`, `course_title`, `dimension`, `desc`, `number_of_levels`) VALUES
(1, 'Self-Awareness', 'Empowerment', 'Understanding one\'s thoughts, emotions, and actions to develop personal growth and self-improvement.', 2),
(2, 'Communication', 'Empowerment', 'Ability to convey and exchange ideas, thoughts, and information effectively with others.', 2),
(3, 'Resilience', 'Empowerment', 'Capacity to bounce back, adapt, and recover from challenges, setbacks, and adversity.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_xp`
--

CREATE TABLE `tbl_course_xp` (
  `course_xp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `xp_points` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course_xp`
--

INSERT INTO `tbl_course_xp` (`course_xp_id`, `user_id`, `course_id`, `xp_points`) VALUES
(7, 43, 1, 200),
(8, 43, 2, 200),
(9, 43, 3, 0),
(10, 48, 1, 200),
(11, 48, 2, 0),
(12, 48, 3, 0),
(19, 46, 1, 200),
(20, 46, 2, 200),
(21, 46, 3, 0),
(25, 53, 1, 0),
(26, 53, 2, 200),
(27, 53, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily_xp`
--

CREATE TABLE `tbl_daily_xp` (
  `daily_xp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `daily_xp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_levels`
--

CREATE TABLE `tbl_levels` (
  `level_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `level_title` varchar(255) NOT NULL,
  `xp_requirement` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_levels`
--

INSERT INTO `tbl_levels` (`level_id`, `course_id`, `level_title`, `xp_requirement`) VALUES
(3, 1, 'What is Self-Awareness?', 0),
(4, 1, 'How to practice Self-Awareness', 100),
(5, 2, 'What is Communication?', 0),
(6, 2, 'How to practice Communication', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `question_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `paragraph` text NOT NULL,
  `question_title` text NOT NULL,
  `correct_answer` text NOT NULL,
  `option_1` text DEFAULT NULL,
  `option_2` text DEFAULT NULL,
  `option_3` text DEFAULT NULL,
  `option_4` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`question_id`, `level_id`, `paragraph`, `question_title`, `correct_answer`, `option_1`, `option_2`, `option_3`, `option_4`) VALUES
(11, 3, 'Self-awareness is a fundamental life skill that involves having a deep understanding of oneself, including one\'s thoughts, emotions, strengths, weaknesses, and values. It is the ability to step back and observe oneself objectively, without judgement or bias. Self-awareness plays a crucial role in personal growth, development, and overall well-being.', 'Why is self-awareness considered a fundamental life skill?', 'It allows for objective self-observation without judgement.				', 'It helps in understanding others\' thoughts and emotions.', 'It allows for objective self-observation without judgement.', 'It is crucial for achieving financial success.', 'It enhances physical strength and well-being.'),
(12, 3, 'Having self-awareness allows individuals to recognize and manage their emotions effectively. By understanding their emotional triggers and patterns, they can regulate their reactions, make better decisions, and maintain healthy relationships. Self-awareness also helps in identifying and leveraging personal strengths, which leads to improved confidence and performance in various aspects of life.', 'What are the benefits of having self-awareness?\r\n	', 'All of the above.', 'Managing emotions effectively and making better decisions.	', 'Building healthy relationships.', 'Identifying and leveraging personal strengths. 		', 'All of the above.		'),
(13, 3, 'Self-awareness promotes a realistic assessment of one\'s weaknesses, enabling individuals to identify areas for improvement and actively work on them. It fosters a growth mindset and encourages continuous learning and self-development. Moreover, self-awareness aids in aligning actions and behaviours with personal values and beliefs, promoting authenticity and integrity in one\'s life.				        ', 'How does self-awareness contribute to personal growth and development?\r\n                        ', 'It helps identify areas for improvement and encourages continuous learning.		                    ', 'It helps identify areas for improvement and encourages continuous learning.\r\n\r\n\r\n				        ', 'It enhances physical strength and endurance.				        ', 'It promotes competitiveness and winning at all costs.				        ', 'It discourages self-reflection and introspection.					        '),
(15, 4, 'Reflect on Your Thoughts and Emotions: Take regular moments throughout your day to reflect on your thoughts, feelings, and reactions. Pause and ask yourself why you are feeling a certain way or why you reacted in a particular manner. Explore the underlying beliefs or triggers that may have influenced your response. By examining your thoughts and emotions, you can gain insight into your patterns and gain a deeper understanding of yourself.				', 'What can you gain by reflecting on your thoughts and emotions?	', 'Improved self-awareness and understanding.', 'Improved self-awareness and understanding.', 'Better physical health.			', 'Increased productivity at work.			', 'Enhanced social skills.							'),
(16, 3, 'Engage in Mindfulness Practices: Incorporate mindfulness into your daily routine. Mindfulness involves paying attention to the present moment without judgment. Practice meditation, deep breathing exercises, or mindful activities such as yoga or walking in nature. When you engage in mindfulness, you cultivate a non-judgmental awareness of your thoughts, sensations, and surroundings. This awareness allows you to observe your experiences objectively and helps you become more in tune with yourself.				', 'How can you incorporate mindfulness into your daily routine?				', 'Practice meditation, deep breathing exercises, or mindful activities such as yoga or walking in nature.				', 'Practice meditation, deep breathing exercises, or mindful activities such as yoga or walking in nature.\r\n\r\n\r\n				', 'Engage in rigorous physical exercise.				', 'Watch television or use electronic devices for extended periods.				', 'Ignore your thoughts, sensations, and surroundings.				'),
(17, 5, 'Communication is a vital life skill that influences our interactions, relationships, and overall success. It encompasses the ability to effectively convey ideas, thoughts, and information to others, as well as to actively listen and comprehend the messages received. Effective communication involves not only the words we choose, but also our tone of voice, body language, and non-verbal cues. It fosters understanding, builds trust, resolves conflicts, and promotes collaboration.				', 'What does effective communication involve?', 'All of the above.		', 'Only the words we choose.				', 'Tone of voice and body language.				', 'Non-verbal cues.	', 'All of the above.					'),
(18, 5, 'Active listening is a key component of communication, allowing us to fully understand and empathise with others. It involves giving our full attention, maintaining eye contact, and providing verbal and non-verbal feedback. Clarity and conciseness in communication ensure that our messages are easily understood and prevent misunderstandings. \r\n', 'Which of the following is a key component of active listening?			', 'Providing verbal and non-verbal feedback.				', 'Interrupting the speaker.\r\n					', 'Avoiding eye contact.', 'Providing verbal and non-verbal feedback.', 'Using complex language.'),
(19, 5, 'Furthermore, emotional intelligence plays a crucial role in communication, enabling us to understand and manage our own emotions, as well as the emotions of others. It helps us navigate difficult conversations, show empathy, and build deeper connections with those around us. Adapting our communication style to different audiences and contexts is essential. It involves recognizing and respecting cultural differences, adjusting our language and tone, and being mindful of individual communication preferences.	', 'Which of the following statements is true about emotional intelligence and communication?', 'Emotional intelligence helps us understand and manage our own emotions.', 'Emotional intelligence helps us understand and manage our own emotions.	', 'Emotional intelligence is not important in difficult conversations.			', 'Adapting communication style to different audiences is not necessary', 'Cultural differences should not be taken into consideration in communication.'),
(20, 5, 'Developing strong communication skills empowers us to express ourselves effectively, build meaningful relationships, and succeed in various aspects of life, including personal relationships, professional settings, and social interactions. It is a lifelong journey of learning and refining our communication abilities to foster connection, understanding, and collaboration with others.				', 'Why is developing strong communication skills important?\r\n			', 'All of the above.', 'To express ourselves effectively.	', 'To build meaningful relationships.					', 'To succeed in various aspects of life.', 'All of the above.'),
(21, 6, 'One of the best ways to practice communication is by actively listening. Effective communication involves not only expressing your thoughts but also understanding others. Practice active listening by paying full attention to the person speaking, maintaining eye contact, and avoiding interruptions. Show interest and empathy by nodding, asking clarifying questions, and paraphrasing what the speaker said. By honing your listening skills, you\'ll enhance your ability to understand others and respond appropriately.				', 'Which of the following is a key aspect of active listening?				', 'Paraphrasing what the speaker said.			', 'Interrupting the speaker.				', 'Avoiding eye contact.				', 'Expressing your thoughts clearly.					', 'Paraphrasing what the speaker said.				'),
(22, 6, 'Another crucial aspect of practicing communication is improving your verbal skills. Take opportunities to engage in conversations with different people, whether it\'s at work, social gatherings, or networking events. Practice articulating your thoughts clearly, using appropriate vocabulary, and structuring your sentences. Be mindful of your tone and body language to convey your message effectively. Consider joining public speaking clubs or taking communication courses to build confidence and develop effective speaking skills.\r\n				', 'How can you improve your verbal skills?				', 'Engaging in conversations with different people.			', 'Engaging in conversations with different people.				', 'Reading books on communication.				', 'Practicing writing skills.				', 'Attending networking events.				'),
(23, 6, 'Written communication is also an important aspect to practice. Enhance your writing skills by regularly writing emails, reports, or even journaling. Pay attention to grammar, spelling, and punctuation to ensure your written communication is clear and professional. Take time to revise and edit your writing to improve its clarity and coherence. Engage in online discussions or start a blog to express your thoughts and receive feedback. Developing strong written communication skills will help you convey your ideas accurately and effectively in various contexts.				', 'Which aspects should you pay attention to when enhancing your writing skills?				', 'Grammar, spelling, and punctuation.		', 'Grammar, spelling, and punctuation.				', 'Listening and speaking skills.				', 'Mathematical calculations.				', 'Physical fitness.				');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quizzes`
--

CREATE TABLE `tbl_quizzes` (
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `percentage` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_quizzes`
--

INSERT INTO `tbl_quizzes` (`quiz_id`, `user_id`, `course_id`, `percentage`) VALUES
(15, 46, 1, 100),
(18, 43, 2, 71),
(19, 43, 1, 80),
(20, 48, 1, 80),
(21, 53, 2, 57);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `link` varchar(20) DEFAULT NULL,
  `activation_date` date DEFAULT NULL,
  `xp_points` int(11) NOT NULL DEFAULT 0,
  `last_login_date` date DEFAULT NULL,
  `daily_xp_points` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `first_name`, `last_name`, `gender`, `dob`, `email`, `password`, `role`, `status`, `link`, `activation_date`, `xp_points`, `last_login_date`, `daily_xp_points`) VALUES
(43, 'Terry', 'Tester', 'female', '2001-02-02', 'sesesid809@meogl.com', '$2y$10$/KQT0GQj6aRSZO7ASRsYB.1GyuSIqq59dWHZDK0XRVKNyGL/8MoZK', 'user', '1', '64afb8085eab2', '2023-07-13', 1200, '2023-07-18', 1000),
(46, 'admin', 'admin', 'female', '2001-03-03', 'skillssmart5@gmail.com', '$2y$10$8nFIaIFMZYiB.P568BvtfeyIar5Eutalr4WBZDJUH/h31g1QdI4Z6', 'admin', '1', '64afc6e04192e', '2023-07-13', 1000, '2023-07-18', 1000),
(48, 'Timmy', 'Jones', 'male', '2001-04-05', 'dikifod488@msback.com', '$2y$10$9UuLw/jYd37xK6FsVM22MuHPbpsF4aSfeM8Z7YYLItvcS1.uwWOmC', 'user', '1', '64b0279df3816', '2023-07-13', 400, '2023-07-17', 400),
(53, 'Nicole', 'Jones', 'female', '2001-04-01', 'nicolewasike4@gmail.com', '$2y$10$CA89pb37IeY0z88lwcWn2uy5X6a./IRDBiVYmyLnkXcleemhBrgkW', 'user', '1', '64b62cb5dcc5f', '2023-07-18', 400, '2023-07-18', 400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_completed_levels`
--
ALTER TABLE `tbl_completed_levels`
  ADD PRIMARY KEY (`completed_level_id`),
  ADD KEY `tbl_completed_levels_ibfk_1` (`course_id`),
  ADD KEY `tbl_completed_levels_ibfk_2` (`level_id`),
  ADD KEY `tbl_completed_levels_ibfk_3` (`user_id`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_course_xp`
--
ALTER TABLE `tbl_course_xp`
  ADD PRIMARY KEY (`course_xp_id`),
  ADD KEY `tbl_course_xp_ibfk_1` (`course_id`),
  ADD KEY `tbl_course_xp_ibfk_2` (`user_id`);

--
-- Indexes for table `tbl_daily_xp`
--
ALTER TABLE `tbl_daily_xp`
  ADD PRIMARY KEY (`daily_xp_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_levels`
--
ALTER TABLE `tbl_levels`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `tbl_quizzes`
--
ALTER TABLE `tbl_quizzes`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_completed_levels`
--
ALTER TABLE `tbl_completed_levels`
  MODIFY `completed_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_course_xp`
--
ALTER TABLE `tbl_course_xp`
  MODIFY `course_xp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_daily_xp`
--
ALTER TABLE `tbl_daily_xp`
  MODIFY `daily_xp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_levels`
--
ALTER TABLE `tbl_levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_quizzes`
--
ALTER TABLE `tbl_quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_completed_levels`
--
ALTER TABLE `tbl_completed_levels`
  ADD CONSTRAINT `tbl_completed_levels_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_completed_levels_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `tbl_levels` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_completed_levels_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_course_xp`
--
ALTER TABLE `tbl_course_xp`
  ADD CONSTRAINT `tbl_course_xp_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_course_xp_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_daily_xp`
--
ALTER TABLE `tbl_daily_xp`
  ADD CONSTRAINT `tbl_daily_xp_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_levels`
--
ALTER TABLE `tbl_levels`
  ADD CONSTRAINT `tbl_levels_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD CONSTRAINT `tbl_questions_ibfk_2` FOREIGN KEY (`level_id`) REFERENCES `tbl_levels` (`level_id`);

--
-- Constraints for table `tbl_quizzes`
--
ALTER TABLE `tbl_quizzes`
  ADD CONSTRAINT `tbl_quiz_answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_quiz_answers_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `tbl_courses` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
