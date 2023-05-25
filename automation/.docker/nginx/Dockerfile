ARG NGINX_VERSION=1.19

FROM nginx:${NGINX_VERSION}-alpine

ARG NGINX_VHOST_FILE=default.conf

# override the default nginx config file with one optimized for PHP apps
COPY automation/configs/nginx/nginx.conf /etc/nginx/nginx.conf

# copy the includes files
COPY automation/configs/nginx/includes/. /etc/nginx/conf.d/

# copy the vhost config file
COPY automation/configs/nginx/hosts/${NGINX_VHOST_FILE} /etc/nginx/conf.d/default.conf
