#!/bin/sh

mkdir -p .config

docker run -it --rm --name code-server -p 127.0.0.1:8080:8080 \
  -v "$PWD/.vscode:/home/coder/.vscode" \
  -v "$PWD/.vscode-config:/home/coder/.local/share/code-server" \
  -v "$PWD/.config:/home/coder/.config" \
  -v "$PWD:/home/coder/project" \
  -u "$(id -u):$(id -g)" \
  -e "DOCKER_USER=$USER" \
  dev-challenge --log debug
