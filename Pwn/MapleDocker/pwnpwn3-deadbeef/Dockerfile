FROM ubuntu:16.04

RUN sed -i 's/archive.ubuntu.com/asia-east1.gce.archive.ubuntu.com/g' /etc/apt/sources.list && apt update && apt-get install -y lib32z1 xinetd && rm -rf /var/lib/apt/lists/ && rm -rf /root/.cache && apt-get autoclean && rm -rf /tmp/* /var/lib/apt/* /var/cache/* /var/log/*
#apt update && apt-get install -y lib32z1 xinetd && rm -rf /var/lib/apt/lists/ && rm -rf /root/.cache && apt-get autoclean && rm -rf /tmp/* /var/lib/apt/* /var/cache/* /var/log/*

COPY ./pwn.xinetd /etc/xinetd.d/pwn

COPY ./service.sh /service.sh

RUN chmod +x /service.sh

# useradd and put flag
RUN useradd -m ctf

# copy bin
COPY ./bin/pwnpwn3-deadbeef /home/ctf/pwnpwn3-deadbeef
COPY ./sh /home/ctf/bin/sh


# chown & chmod
RUN chown -R root:ctf /home/ctf && chmod -R 750 /home/ctf

# copy lib,/bin 
RUN cp -R /lib* /home/ctf && cp -R /usr/lib* /home/ctf && mkdir /home/ctf/dev && mknod /home/ctf/dev/null c 1 3 && mknod /home/ctf/dev/zero c 1 5 && mknod /home/ctf/dev/random c 1 8 && mknod /home/ctf/dev/urandom c 1 9 && chmod 666 /home/ctf/dev/* && cp /bin/sh /home/ctf/bin && cp /bin/ls /home/ctf/bin && cp /bin/cat /home/ctf/bin

CMD ["/service.sh"]
