

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `applied_post` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `post_by` int(11) NOT NULL,
  `applied_by` int(11) NOT NULL,
  `applied_to` int(11) NOT NULL,
  `applied_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_ck` varchar(3) NOT NULL DEFAULT 'no',
  `tutor_ck` varchar(3) NOT NULL DEFAULT 'no',
  `tutor_cf` tinyint(4) NOT NULL DEFAULT 0,
  `tution_cf` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `postby_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  `class` text NOT NULL,
  `medium` varchar(20) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `location` text NOT NULL,
  `p_university` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deadline` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



INSERT INTO `post` (`id`, `postby_id`, `subject`, `class`, `medium`, `salary`, `location`, `p_university`, `post_time`, `deadline`) VALUES
(12, 15, 'Computer Science', 'University Level', 'English', '10000-15000', 'Bangalore', 'CMRIT', '2025-03-10 09:46:41', '2025-04-12');

CREATE TABLE `tutor` (
  `id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `inst_name` varchar(150) NOT NULL,
  `prefer_sub` text NOT NULL,
  `class` text NOT NULL,
  `medium` text NOT NULL,
  `prefer_location` text NOT NULL,
  `salary` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL DEFAULT '',
  `pass` varchar(50) NOT NULL,
  `confirmcode` varchar(7) NOT NULL,
  `activation` varchar(3) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL,
  `user_pic` text DEFAULT NULL,
  `last_logout` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `online` varchar(5) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    amount INT NOT NULL,
    status VARCHAR(50) NOT NULL DEFAULT 'Pending',
    payment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `applied_post`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `applied_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;


ALTER TABLE `tutor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;


ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;


