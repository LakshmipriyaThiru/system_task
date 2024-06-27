CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `sex` enum('Male','Female','Other') NOT NULL,
  `marital_status` enum('Single','Married','Divorced') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) NOT NULL
) ;



CREATE TABLE `salaries` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `salary_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);


ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `salaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);
COMMIT;

