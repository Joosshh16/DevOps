FROM python:3.9.9-slim

# adding label
LABEL name ="Python API"\
    description ="For backend API"\
    authors="Email" \
    company="Company"

# setup app directory
WORKDIR /app

# copy source code
COPY . .

# install packages/dependencies
RUN pip3 install -r requirements.txt

# expose port
EXPOSE 3001

#for non-root user
RUN useradd -r -m node
USER node

# run application
CMD [ "python", "index.py"]
