### Docker presentation example

## Dockerfile

To run this repository with docker file, just run this commands:

`docker build -t IMAGE_NAME .`

then, with the created image, run:

`docker run --name CONTAINER_NAME -p PORT:80 IMAGE_NAME`

## Docker-compose

Just run `docker-compose up`

Then access the app at `localhost:3002`