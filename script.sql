

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` VARCHAR(6) NOT NULL CHECK (`gender` IN ('Male', 'Female','Other')),
  `DOB` DATE NOT NULL,
   PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;





