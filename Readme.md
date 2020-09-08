# About

This repository is project template for PHP CLI application.

# Usage

```
git clone --depth 1 ssh://git@github.com/t-kuni/php-cli-app-template [ProjectName]
cd [ProjectName]
rm -rf .git 
```

パッケージ名の変更

1. プロジェクト全体の`TKuni\PhpCliAppTemplate`を任意の名称に置換する
2. composer.jsonの`TKuni\\PhpCliAppTemplate`を上記と同様に変更する（\記号が２つな点に注意）


# Build

Build container.

```
docker-compose build app-debug
```

Install php libraries.

```
docker-compose run --rm app-debug composer install
```

Install node packages.  
Run follow command on host OS.

```
npm install
```

# Run app

```
docker-compose run --rm app-debug
```

# Start shell

```
docker-compose run --rm app-debug sh
```