FROM node:14.18.0-slim

# adding label
LABEL name ="JS API"\
    description ="For backend API"\
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
EXPOSE 3000

#for non-root user
USER node

# run application
CMD [ "npm", "run", "start" ]
