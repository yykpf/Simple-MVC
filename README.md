mymvc 基于Composer的轻量级PHP应用框架
=======================================
- 基于composer的包管理器
- 路由规则灵活，可随意自定义路由规则
- 包含默认路由：controller/model/arg1/arg2...
- 轻量级的ORM ，轻松实现CRUD
- 轻量而强大的模版引擎，安全过滤各种有...
- 配置文件就是PHP数组，基本无配置
- 数据库迁移采用migration，so easy！


基本使用
---------------------------------
 1. composer create-project yykpf/Simple-MVC  mymvc
 2. 编辑 Apache下的httpd-vhost.conf文件，添加如下内容：

 **注意以下的目录改成自己对应的本地目录！**

     ```apache

    <Directory "D:/demos/myMVC/app/web">
         Options Indexes FollowSymLinks Includes ExecCGI
         AllowOverride All
         Require all granted
     </Directory>

     <VirtualHost *:80>
         ServerAdmin webmaster@my.com
         DocumentRoot "D:/demos/myMVC/app/web"
         ServerName my.mvc.com
         ErrorLog "logs/my.mvc.com.com-error.log"
         CustomLog "logs/my.mvc.com-access.log" common
     </VirtualHost>
 ```

3. 启动Apache和MySQL
4. 在MySQL中创建一个数据库mydb，用户名：mymvc， 密码：123456。
当然了，如果本地已经有能用的数据库，那么可以去修改config/db.php中的配置即可。
普通配置文件config/base.php。

 **注意：mymvc这个用户需要有全部的数据库操作权限！**

5. 命令行模式
    在console目录下执行 php console.php console-migrate 生成需要的数据库(默认todo)
    console-migrate 对应 MigrateCommand.php文件下的 $name
6. 访问：http://my.mvc.com/todo/index  可以执行CRUD的各种操作。


补充
---------------------------------
1. 系统自带默认路由，一般情况不需要去配置路由，自定义路由请查看config目录下的routes.php的示例。
 配置参考 <http://altorouter.com/usage/mapping-routes.html>
2. 模版引擎参考 <https://latte.nette.org/>
3. ORM的使用参考 <https://github.com/lox/pheasant>
4. console命令参考 <https://github.com/inhere/php-console>
