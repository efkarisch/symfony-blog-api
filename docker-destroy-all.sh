#!/bin/bash
# Stop all containers
docker stop $(docker ps -a -q) -f
# Delete all containers
docker rm $(docker ps -a -q) -f
# Delete all images
docker rmi $(docker images -q) -f
# find all volumes no in use
docker volume ls -f dangling=true
# Delete all volumes
docker volume prune