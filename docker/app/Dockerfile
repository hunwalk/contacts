FROM serversideup/php:8.3-fpm-nginx

USER root

# Install the Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash

# Move the Symfony CLI to the bin directory
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Save the build arguments as a variable
ARG USER_ID
ARG GROUP_ID

# Use the build arguments to change the UID
# and GID of www-data while also changing
# the file permissions for NGINX
RUN docker-php-serversideup-set-id www-data $USER_ID:$GROUP_ID && \
    \
    # Update the file permissions for our NGINX service to match the new UID/GID
    docker-php-serversideup-set-file-permissions --owner $USER_ID:$GROUP_ID --service nginx

# Set the working directory
WORKDIR /var/www/html

# Copy from fs
COPY --chown=www-data:www-data . /var/www/html

# Drop back to our unprivileged user
USER www-data