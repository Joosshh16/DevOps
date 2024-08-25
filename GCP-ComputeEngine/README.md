# Deploying Simple Application on Compute Engine

This project deploys a simple web application on Google Cloud Compute Engine, providing secure external access.

# Project Directory
Refer to this directory for the sample source code.

- [Simple web app](./Source-code)

## Table of Contents
* [Architecture and Functionalities](#architecture-and-funtionalities)
* [Prerequisites](#prerequisites)
* [GCP Deployment](#gcp-deployment)
* [Key Takeaways and Conclusions](#key-takeways-and-conclusions)

## Architecture and Functionalities

One option for deploying your application on Google Cloud Platform is to use Compute Engine. This provides a secure and accessible environment for your app.

![Simple Webapp Architecture](architecture/Simple-Webapp.png)

As shown in the architecture diagram, the application is deployed to Compute Engine with the specified machine configurations based on the complexity of the application. It is accessible through a Load Balancer, which distributes traffic to the application instances.

## Prerequisites

1. Save the [source code](./Source-code) or any desired code you want to deploy on GCP.

2. If you don't have a GCP account, you can create one. New users are eligible for free credits. For setup instructions, please refer to this [link](https://cloud.google.com/free?hl=en).

3. Set up your GCP account, including billing, to access GCP services.

## GCP Deployment

1. After setting up your Google Cloud environment, enable the Compute Engine API to access and use the Compute Engine service.

2. Create a VPC to serve as the network infrastructure for your GCP cloud services.

3. Go to the Compute Engine page to create a new VM instance. Enter the following information and click "Create":

    * Name of the VM
    * Region and Zone
    * Machine Configuration - for testing use the lower specs atleast 2 vCPU and 1 GB memory.
    * Boot Disk - you can choose Debian for this project with atleast 10 GB Balanced Persistent Disk.
    * Allow HTTP and HTTPS - for the access of external users.
    * Network Interface - choose the created VCP within your environment.

4. After creating the VM instance, click its "SSH" button to connect to the server.

5. Once connected to your VM instance, run the following Bash script.

    ```
    # execute command as root user
    sudo -i

    # install dependecies
    apt-get update

    # install dependecies for your web server
    sudo apt-get install apache2
    ```

6. To confirm that Apache2 is running correctly on your VM, access its external IP address. You can then copy and paste this IP address into a web browser to test the connection. Refer the image for the expected output.

![Simple Webapp Architecture](architecture/Apache2.png)

7. To deploy your application, access the server again and follow the deployment process.

    ```
    # access the web directory
    cd /var/www/html

    # to edit the index page
    nano index.html

    # but also you can remove it and create new one
    # delete index
    rm index.html

    # create new index
    nano index.html

    # in index.html input your source code here
    ```

8. Try accessing the external IP address again. It should now display the updated index page that you recently edited.

![Simple Webapp](architecture/Web.png)

## Optional but recommended

9. To establish a secure connection, we can deploy our application behind a load balancer using the frontend IP. This will prevent users from directly accessing the VM and route traffic through the load balancer instead.

10. Stop the instance, edit its configuration, and remove the external IP. Save the changes and then restart the VM instance.

11. Go to the instance group and select the Unmanaged Instance Group. This will group your VM instances and serve as the backend that the load balancer can access.

12. After creating the instance group, go to Load Balancing and create an Application Load Balancer. Select the instance group as the target for the load balancer and also create a Health Check to monitor the health of the VMs.

13. Finally, once the Load Balancer is fully provisioned, copy the frontend IP and test it in your web browser. This IP will serve as the frontend IP for your application, ensuring security and health through the use of the Load Balancer.

---

### Key takeways and Conclusions

1. You can create a VM instance template as part of an instance group to enable autoscaling and ensure on-demand access for external users.

2. Always remove the external IP associated with the VM to prevent direct access by external users.

3. Load Balancers are essential for any application that needs to manage traffic to backend servers or applications.

4. Health Checks are crucial for ensuring and controlling traffic and autoscaling features.

5. You can use Cloud Armor as part of your application's Web Application Firewall (WAF) security. Refer to this link for [preconfigured firewall rules](https://cloud.google.com/armor/docs/waf-rules).

6. When deploying your application to the cloud, carefully plan to improve fault tolerance and optimize services.

7. Refer to industry best practices when deploying your application to any cloud platform. This will ensure optimal performance, security, and scalability, ultimately leading to a successful and reliable service.

---



