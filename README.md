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

# 各ツールについて

## Xdebug

### 準備

[VSCode拡張機能「PHP Debug」](https://marketplace.visualstudio.com/items?itemName=xdebug.php-debug)を追加する。
使い方は上記リンクのドキュメントを参照。

### Profilingモード

・Profilingモードを使って解析結果を出力してデータを可視化したい場合
```bash
$ make profile-mode
```
を実行します。するとphp.iniのxdebug.modeを「profileモード」で上書きした状態でdockerが立ち上がります。
postmanなどでリクエストを送った後、tmp/xdebug_profileディレクトリにcachegrind.out.***.gzというファイルが生成されます。これを展開します。

次に、下記を実行して可視化ツールを立ち上げます。（※可視化ツールは別途インストールする必要があります。参考：https://xdebug.org/docs/profiler#Introduction）
```bash
$ make profile-visualize
```
可視化ツールが立ち上がったら、先ほど展開したファイルを指定します。
