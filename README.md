# Dummy server
for testing the infrastructure

### What is it
When you are building and testing your whole infrastructure, you will need a simple server that will respond to your requests.

### How can you use it
It's a simple Docker-based server that you can bind to on port 80.
On a local environment you can use docker-compose:

```
docker-compose up
```

But you can always run the container by `docker run` itself:

```
docker run -d -t -i -e name=web1 -e type=plain -p 80:80 dummy-server
```

There are two variables you can use:
- name: you can define the name of the service which will be shown 
- type: the response type of the server

Name can be any string. Default value is "noname".
Type can be
- html (default value)
- plain
- json

You can override these variables by the get parameter, like
```
http://localhost?type=json&name=web1
```