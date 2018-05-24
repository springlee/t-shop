drop table if exists admin_logs;
create table admin_logs (
  id int(11) primary key auto_increment comment '主键'
) engine = MyISAM charset=utf8mb4 comment '管理员日志表';
ALTER TABLE admin_logs
  ADD admin_id int(11) not null comment '管理员id',
  ADD log_info text comment '操作功能',
  add action varchar(50) comment '控制器-方法',
  add request text comment 'GET和POST数据',
  add ip char(15) comment 'ip',
  add `created_at` timestamp null comment '创建时间',
  add `updated_at` timestamp null comment '更新时间';

drop table if exists admin_users;
create table admin_users (
  id int(11) primary key auto_increment comment '主键',
  username varchar(50) unique not null default '' comment '用户名',
  password varchar(255) not null default '' comment '密码',
  remember_token varchar(100) comment '记住密码token',
  tel varchar(20) comment '手机',
  email varchar(50) comment '邮箱',
  role_ids varchar(100) comment '角色id: 1,2,3',
  is_valid tinyint(1) not null default 1 comment '是否有效',
  is_super tinyint(1) not null default 0 comment '是否超级管理员',
  created_at timestamp null comment '创建时间',
  updated_at timestamp null comment '更新时间',
  deleted_at timestamp null comment '删除时间'
) engine=InnoDB charset=utf8mb4 comment '管理员用户表';

drop table if exists admin_roles;
create table admin_roles (
  id int(11) primary key auto_increment comment '主键',
  name varchar(50) unique not null default '' comment '角色名称',
  permission_ids varchar(255) not null default '' comment '权限id: 3,4,5',
  is_valid tinyint(1) not null default 1 comment '是否有效',
  created_at timestamp null comment '创建时间',
  updated_at timestamp null comment '更新时间',
  deleted_at timestamp null comment '删除时间'
) engine=InnoDB charset=utf8mb4 comment '管理员角色表';

drop table if exists admin_permissions;
create table admin_permissions (
  id int(11) primary key auto_increment comment '主键',
  name varchar(20) not null default '' comment '权限名称',
  permission varchar(50) not null default '' comment '控制器+方法',
  is_valid tinyint(1) not null default 1 comment '是否有效',
  created_at timestamp null comment '创建时间',
  updated_at timestamp null comment '更新时间',
  deleted_at timestamp null comment '删除时间'
) engine=InnoDB charset=utf8mb4 comment '权限表';

drop table if exists users;
create table users (
  id int(11) primary key auto_increment comment '主键',
  username varchar(20) unique not null default '' comment '用户名',
  password varchar(255) not null default '' comment '密码',
  remember_token varchar(100) comment '记住密码token',
  email varchar(100) comment '邮箱',
  tel char(15) comment '手机',
  last_login timestamp comment '最后登录时间',
  last_ip char(15) comment '最后登录ip',
  is_valid tinyint(1) not null default 1 comment '是否有效',
  created_at timestamp null comment '创建时间',
  updated_at timestamp null comment '更新时间',
  deleted_at timestamp null comment '删除时间'
) engine=InnoDB charset=utf8mb4 comment '前台用户表';

drop table if exists system_menus;
create table system_menus (
  id int(11) primary key auto_increment comment '主键',
  name varchar(20) unique not null default '' comment '菜单名',
  route varchar(50) not null default '' comment '路由',
  order_by tinyint(4) not null default 0 comment '排序, 倒序',
  parent_id int(11) not null default 0 comment '父级id',
  level tinyint(1) not null default 1 comment '层级',
  is_valid tinyint(1) not null default 1 comment '是否有效',
  created_at timestamp null comment '创建时间',
  updated_at timestamp null comment '更新时间',
  deleted_at timestamp null comment '删除时间'
) engine=InnoDB charset=utf8mb4 comment '系统菜单表';
