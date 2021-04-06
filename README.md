# ft_server

###### <i>Recent Update on 06/04/2021.</i>
Finished the project.\
Waiting to be evaluated.

###### <i>Old Update on 27/03/2021.</i>
Started the project.
Delayed it a little bit to do the AI-900 Certificate.

**** Pictures ****

![GitHub Logo](/extras/images/image1.png)\
![GitHub Logo](/extras/images/image6.png)\
![GitHub Logo](/extras/images/image3.png)\
![GitHub Logo](/extras/images/image4.png)\
![GitHub Logo](/extras/images/image2.png)\
![GitHub Logo](/extras/images/image5.png)

**** Run This Project ****

<pre>
First download the repository. 

On the ft_server folder type 
`sudo bash start.sh`
Wait for it to compile. If you get error :80 port, see how to solve it below.

You can now go to localhost and see the links.
localhost/wordpress
localhost/phpmyadmin

When you're inside the bash you can type `bash /tmp/auto_index.sh on`
or `bash /tmp/auto_index.sh off` to turn the auto_index on or off.
</pre>



**** Info ****

To do this project first you need to learn about docker.\
The link below is a great tutorial about Docker and it's probably the only thing you should read/see about this subject.\
[Docker Tutorial for Beginners - A Full DevOps Course on How to Run Applications in Containers](https://www.youtube.com/watch?v=fqMOX6JJhGo)\

You then need to install LEMP.\
[How to Install LEMP Stack on Debian 10 Buster Server/Desktop](https://www.linuxbabe.com/debian/install-lemp-stack-debian-10-buster)\
[How To Install Linux, Nginx, MariaDB, PHP (LEMP stack) on Debian 10](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mariadb-php-lemp-stack-on-debian-10)\
If you are like me, you'll most likely get stuck on the part "sudo mysql_secure_installation". Skip that part for now.\
You also don't need to worry about ufw.\

SSL\
[Creating a self signed SSL certificate](https://linuxize.com/post/creating-a-self-signed-ssl-certificate/)\

More links below:\
[vvarodi](https://github.com/vvarodi/ft_server)\
[forhjy part 1](https://forhjy.medium.com/how-to-install-lemp-wordpress-on-debian-buster-by-using-dockerfile-1-75ddf3ede861)\
[forhjy part 2](https://forhjy.medium.com/42-ft-server-how-to-install-lemp-wordpress-on-debian-buster-by-using-dockerfile-2-4042adb2ab2c)\


If you try to run on port :80 and you're getting an error that a service is being used you can kill it.\
In Ubuntu you get apache2 running on localhost. To close it type:\
`sudo lsof -nP | grep LISTEN` \
Find the ones in the port :80 and then kill it with\
`sudo kill 1548`\
1548 is an example.
