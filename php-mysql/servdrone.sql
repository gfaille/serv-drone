create table if not exists `user` (
	`id` int(11) not null,
	`name` varchar(120) not null,
	`mail` varchar(120) not null,
	`pass` varchar(120) not null,
)auto_increment=1;

alter table `users` add primary key (`id`);

alter table `users`
modify `id` int(11) not null auto_increment;
