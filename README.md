![GitHub Logo](/extras/images/Success.png)
###### <i>Recent Update on 29/04/2021.</i>
• Got evaluated.

###### <i>Old Update on 06/04/2021.</i>
• Finished the project.\
• Waiting to be evaluated.

###### <i>Old Update on 27/03/2021.</i>
• Started the project.
• Delayed it a little bit to do the AI-900 Certificate.

## Subject

You can find the subject of this project [here.](https://github.com/Olbrien/42Lisboa-lvl_2_ft_server/blob/main/extras/lvl_2_ft_server.pdf)

![GitHub Logo](/extras/images/image1.png)\
![GitHub Logo](/extras/images/image6.png)\
![GitHub Logo](/extras/images/image3.png)\
![GitHub Logo](/extras/images/image4.png)\
![GitHub Logo](/extras/images/image2.png)\
![GitHub Logo](/extras/images/image5.png)

## How to run:

First download the repository. 

On the ft_server folder type\
`sudo bash start.sh`\
Wait for it to compile. If you get error :80 port, see how to solve it below.

You can now go to localhost and see the links.\
localhost/wordpress\
localhost/phpmyadmin

When you're inside the bash you can type `bash /tmp/auto_index.sh on`\
or `bash /tmp/auto_index.sh off` to turn the auto_index on or off.

## Info

To do this project first you need to learn about docker.\
The link below is a great tutorial about Docker and it's probably the only thing you should see about this subject.\
[Docker Tutorial for Beginners - A Full DevOps Course on How to Run Applications in Containers](https://www.youtube.com/watch?v=fqMOX6JJhGo)

You then need to install LEMP.\
[How to Install LEMP Stack on Debian 10 Buster Server/Desktop](https://www.linuxbabe.com/debian/install-lemp-stack-debian-10-buster)\
[How To Install Linux, Nginx, MariaDB, PHP (LEMP stack) on Debian 10](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mariadb-php-lemp-stack-on-debian-10)\
If you are like me, you'll most likely get stuck on the part "sudo mysql_secure_installation". Skip that part for now.\
You also don't need to worry about ufw.

SSL\
[Creating a self signed SSL certificate](https://linuxize.com/post/creating-a-self-signed-ssl-certificate/)

More links below:\
[vvarodi](https://github.com/vvarodi/ft_server)\
[forhjy part 1](https://forhjy.medium.com/how-to-install-lemp-wordpress-on-debian-buster-by-using-dockerfile-1-75ddf3ede861)\
[forhjy part 2](https://forhjy.medium.com/42-ft-server-how-to-install-lemp-wordpress-on-debian-buster-by-using-dockerfile-2-4042adb2ab2c)


If you try to run on port :80 and you're getting an error that a service is being used you can kill it.\
In Ubuntu you get apache2 running on localhost. To close it type:\
`sudo lsof -nP | grep LISTEN` \
Find the ones in the port :80 and then kill it with\
`sudo kill 1548`\
1548 is an example.

## Research

<pre>

Images come from https://hub.docker.com/

Comandos:

All commands must be run with 'sudo'.

docker run "name"	- Starts an instance of an image on the docker host. If the image
                    doesn't exist it will download.

docker pull "name" - Downloads the image but it doesn't run.

docker ps - Shows all images that are running and some basic informations about them.
            PS (Process Status).

docker ps -a - Shows all images that are running even the ones that have stopped.
		      --all	works as well.

docker inspect "name"	- Shows in detail the container in a JSON file.

docker stop "name" - Stops the image that it's running. To find the name of the image
                    you want to stop type "docker ps".

docker start "name"	- Starts an image that you stopped.

docker restart "name" -  Restarts a running image.

docker rm "name" - Removes an image permanently from the container.

docker images	- Shows a list of installed images.

docker rmi "name"	- Removes permanently an image from the host.

docker exec "name" "command" - Executs the commands in the image. For example 
            if you have an ubuntu image you can do "sudo docker exec "ubuntu-name" ls"


--name - Changes the name of the image so it isn't a random name.  
				 "sudo docker run -name ola-mundo fhsinchy/hello-dock"

-d - This makes the container work in the background.
    You can see it working from "docker ps".
    You can also use --detatch
		Example: "sudo docker run -d kodekloud/simple-webapp"

tag ":"	- Running with different versions.
					"sudo docker run redis" runs the latest verison.
					"sudo docker run redis:4.0" runs the 4.0 version.


Run -STDIN

-i - Interactive mode. If you run "sudo docker run kodekloud/simple-prompt-docker" 
    it appears a message saying "Hello and Welcome" but you can not interact with it.
     With "sudo docker run -i kodekloud/simple-prompt-docker" you can.

-t - Terminal mode. You can read everything from the container.

-it - Runs in interactive and terminal mode.
			"sudo docker run -it debian:buster"


Run -PORT mapping

-p					- Starting the container on the port at your choice.
--publish			"sudo docker run -p 8080:80 kodekloud/simple-webapp".
					It means any request sent to port 8080 of your host
					system will be forwarded to port 80 inside the container‌.


Dockerfile:

	Exemplo

		FROM Ubuntu								<--- Starts with the OS.

		RUN apt-get update						<---
		RUN apt-get install python				<---

		RUN pip install flask					<---
		RUN pip install flask-mysql				<--- Installing dependencies.

		COPY . /opt/source-code

		ENTRYPOINT FLASK_APP=/opt/source-code/app.py flask run

Everything in CAPS are Instructions, and on it's right are arguments.
Dockerfles have to start with FROM.
To create an image it's "docker build Dockerfile -t "name" "directory"
To run a new image it's "docker run "nome que deste"

CMD e ENTRYPOINT:

	Example CMD:

		FROM Ubuntu

		CMD ["sleep", "5"]

  If you do "docker build -t ubuntu-sleeper . ". It will create the image.
  You run "docker run ubuntu-sleeper" and Ubuntu will run for only 5 seconds.
	Se fizeres agora "docker build -t ubuntu-sleeper . ". Crias a image.

	Example ENTRYPOINT:

		FROM Ubuntu

		ENTRYPOINT ["sleep"]

  If you do "docker build -t ubuntu-sleeper . ". It will create the image.
  You run "docker run ubuntu-sleeper 5" and Ubuntu will run for only 5 seconds.
	If you don't specify the "5", it will give an error because you didn't say the time.
  To put this better optimized you do like the example bellow.


	Example CMD and ENTRYPOINT:

		FROM Ubuntu

		ENTRYPOINT ["sleep"]
		CMD ["5"]

  In this example if you don't specify the time, it will automatically be 5 seconds.
	"docker run ubuntu-sleeper" -> It will sleep 5 seconds.
	"docker run ubuntu-sleeper 50" -> It will sleep 50 seconds.


ARG:

	FROM ubuntu:latest

	ARG HELLO="Hello! This is an arg!"
	RUN touch hello.txt && echo ${HELLO} > hello.txt

ARG can be used several times.


COPY:

	FROM debian:latest

	COPY lvl_2_ft_server.txt .

COPY copies the files from the directory inside your PC, from where you're doing the build 
(usually where the dockerfile is) and copies inside the debian in this case.


ADD:

	FROM os:mac

	ARG FILENAME="nginx-1.19.2"
	ARG EXTENSION="tar.gz"

	ADD https://nginx.org/download/${FILENAME}.${EXTENSION} .

ADD downloads the file from the link.

</pre>
