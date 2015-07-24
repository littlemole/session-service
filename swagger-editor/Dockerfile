# This is a comment
FROM debian
MAINTAINER me <little.mole@arcor.de>

RUN /bin/echo -e "#!/bin/bash\nexit 0" > /usr/sbin/policy-rc.d 
RUN cat /usr/sbin/policy-rc.d
RUN /bin/echo -e "\nAcquire { \nRetries \"5\"; \n};\n" >> /etc/apt/apt.conf.d/70debconf
RUN cat /etc/apt/apt.conf.d/70debconf
RUN DEBIAN_FRONTEND=noninteractive apt-get update

RUN apt-get install -y wget git python
RUN wget --no-check-certificate https://nodejs.org/dist/v0.12.7/node-v0.12.7-linux-x64.tar.gz -O /opt/node.tgz
RUN tar -C /opt -xzf /opt/node.tgz
RUN ln -s /opt/node-v0.12.7-linux-x64 /opt/node
RUN /opt/node/bin/npm install -g grunt
RUN /opt/node/bin/npm install -g grunt-cli
RUN /opt/node/bin/npm install --silent -g bower

# install swagger editor
RUN git clone https://github.com/swagger-api/swagger-editor.git /opt/swagger/
RUN cd /opt/swagger/ && NODE_PATH=/opt/node PATH=$PATH:/opt/node/bin /opt/node/bin/npm i
RUN cd /opt/swagger/ && NODE_PATH=/opt/node PATH=$PATH:/opt/node/bin bower --allow-root i
RUN cd /opt/swagger/ && NODE_PATH=/opt/node PATH=$PATH:/opt/node/bin grunt build

EXPOSE 80


