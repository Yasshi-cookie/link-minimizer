# セットアップ
```.bash
# Dockerを起動
$ docker compose build
$ docker compose up -d
$ cp .env.local .env # 環境変数をセット
$ docker compose exec app php artisan migrate # DBをセットアップ
# node_modulesをインストール
$ npm ci
```

# このリポジトリの作り方
## ①Laravelアプリを作成
```.bash
$ composer create-project laravel/laravel your-project-name
```

## ②Dockerファイルのセットアップ
参考：https://github.com/Yasshi-cookie/link-minimizer/commit/ff0ba807248e58fa68b7812de75c5eb3716b20a8

## ③laravel/breeze（api only）のインストール
```.bash
$ docker compose exec app composer require laravel/breeze --dev
$ docker compose exec app php artisan breeze:install // 選択オプション:api only, PUPUnit
```

## ④Prettierのインストールと設定
@prettier/plugin-phpをインストール

```.bash
$ npm install --save-dev prettier @prettier/plugin-php
```

prettierの設定を行う。参考：https://github.com/Yasshi-cookie/link-minimizer/commit/01e68a2b3c0dcbe9f752b11e8243f08fbd19beef

公式ドキュメント：https://github.com/prettier/plugin-php

## ⑤Xdebugの設定を追加
参考：https://github.com/Yasshi-cookie/link-minimizer/commit/eb0b86a7443be60b1f83ba4d6781eb7157f70330
