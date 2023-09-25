FROM node:18-alpine

ENV NODE_ENV=production

# Node Install
RUN node -v
RUN npm -v
RUN npm install laravel-echo-server -g

# Set working directory
WORKDIR /var/www