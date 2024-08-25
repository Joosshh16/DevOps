# Deploying Simple Application on Compute Engine

This project deploys a simple web application on Google Cloud Compute Engine, providing secure external access.

# Project Directory
Refer to this directory for the sample source code.

- [Simple web app](./Source-code)

## Table of Contents
* [Architecture and Functionalities](#architecture-and-funtionalities)
* [Prerequisites](#)


## Architecture and Functionalities

One option for deploying your application on Google Cloud Platform is to use Compute Engine. This provides a secure and accessible environment for your app.

![Simple Webapp Architecture](architecture/Simple-Webapp.png)

As shown in the architecture diagram, the application is deployed to Compute Engine with the specified machine configurations based on the complexity of the application. It is accessible through a Load Balancer, which distributes traffic to the application instances.