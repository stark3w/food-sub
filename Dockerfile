FROM ubuntu:latest
LABEL authors="w"

ENTRYPOINT ["top", "-b"]
