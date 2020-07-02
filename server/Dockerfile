FROM centos:7

RUN yum -y install epel-release \
    && rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm \
    && echo -e "[epel]\nname=Extra Packages for Enterprise Linux 7 - \$basearch\n#baseurl=http://download.fedoraproject.org/pub/epel/7/\$basearch\nmirrorlist=https://mirrors.fedoraproject.org/metalink?repo=epel-7&arch=\$basearch\nfailovermethod=priority\nenabled=0\ngpgcheck=1\ngpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-EPEL-7" > etc/yum.repos.d/epel.repo \
    && yum install -y --enablerepo=remi,remi-php73,epel php php-devel php-mbstring php-pdo php-gd php-xml php-mcrypt php-pecl-zip php-mysqlnd \
    && yum -y install git \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer global require "laravel/installer" \
    && curl -sL https://rpm.nodesource.com/setup_10.x | bash - \
    && yum -y install nodejs \
    && yum -y install make \
    && npm install \
    && npm install vuetify \
    && npm install sass sass-loader fibers deepmerge -D \
    && npm install vue-chartjs chart.js


WORKDIR /app/CutModelMatching