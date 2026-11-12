# Use Debian-based PHP 8.4-fpm image
FROM php:8.4-fpm

# 1. Install required system dependencies (รองรับทั้ง libaio1 และ libaio1t64 สำหรับ Debian Trixie/Bookworm)
RUN apt-get update && apt-get install -y --no-install-recommends \
    wget \
    unzip \
    libaio-dev \
    git \
    libzip-dev \
    libicu-dev \
    && (apt-get install -y --no-install-recommends libaio1t64 || apt-get install -y --no-install-recommends libaio1) \
    && rm -rf /var/lib/apt/lists/*

# 2. Download and extract Oracle Instant Client 21 (v21.15)
WORKDIR /opt/oracle
RUN wget https://download.oracle.com/otn_software/linux/instantclient/2115000/instantclient-basic-linux.x64-21.15.0.0.0dbru.zip && \
    wget https://download.oracle.com/otn_software/linux/instantclient/2115000/instantclient-sdk-linux.x64-21.15.0.0.0dbru.zip && \
    unzip instantclient-basic-linux.x64-21.15.0.0.0dbru.zip && \
    unzip instantclient-sdk-linux.x64-21.15.0.0.0dbru.zip && \
    rm -f *.zip

# 3. Configure Oracle symlinks and system dynamic linker paths
RUN ln -s /opt/oracle/instantclient_21_15 /opt/oracle/instantclient && \
    echo /opt/oracle/instantclient > /etc/ld.so.conf.d/oracle-instantclient.conf && \
    ldconfig

# 4. Set global environment variables for Oracle Client
ENV LD_LIBRARY_PATH="/opt/oracle/instantclient"
ENV ORACLE_HOME="/opt/oracle/instantclient"

# 5. Install PHP extensions via installer (รวม oci8, pdo_oci และ gd ไว้ในชุดเดียว)
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions bcmath opcache zip intl mbstring oci8 pdo_oci gd

# 6. Inject Composer binary
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 7. Map www-data UID/GID (1000) for Windows Host file permissions
ARG USER_ID=1000
ARG GROUP_ID=1000
RUN usermod -u ${USER_ID} www-data && groupmod -g ${GROUP_ID} www-data

# Set working directory to standard /var/www/html
WORKDIR /var/www/html

# Create directories and set permissions
RUN mkdir -p /var/www/.composer \
    storage \
    bootstrap/cache \
    /tmp/php_tmp && \
    chown -R www-data:www-data /var/www/.composer /var/www/html /tmp/php_tmp && \
    chmod -R 775 /tmp/php_tmp

# 8. Set PHP configuration
RUN echo "upload_max_filesize=100M" > /usr/local/etc/php/conf.d/uploads.ini && \
    echo "post_max_size=100M" >> /usr/local/etc/php/conf.d/uploads.ini && \
    echo "sys_temp_dir=/tmp/php_tmp" >> /usr/local/etc/php/conf.d/uploads.ini && \
    echo "upload_tmp_dir=/tmp/php_tmp" >> /usr/local/etc/php/conf.d/uploads.ini

# กำหนด Safe Directory สำหรับ Git
RUN git config --system --add safe.directory "*"

EXPOSE 9000

CMD ["php-fpm"]
