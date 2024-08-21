FROM node:14.18.0-slim

# adding label
LABEL name ="Webtool"\
    description ="Front web application"\
    authors="johnjosua.ong@stratpoint.com" \
    company="Stratpoint Technologies"

# setup app directory
WORKDIR /usr/src/app

# copy package list
COPY package*.json ./

# install packages/dependencies
RUN npm install

# copy source code
COPY . .

# expose port
EXPOSE 3002

#for non-root user
USER node

# run application
CMD [ "npm", "run", "start" ]
