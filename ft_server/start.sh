sudo docker build -t ft_server . && \
sudo docker run --name ft_server -it -p 80:80 -p 443:443 ft_server
