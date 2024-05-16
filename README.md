# バックエンドの技術スタック

このプロジェクトのバックエンドには、以下の技術が使用されています。

## プログラミング言語
- **PHP 8.2**: 効率的で安全なバックエンド開発のための最新のPHPバージョンを使用しています。

## フレームワーク
- **Laravel 10**: 高性能なアプリケーションを迅速に開発するために、この広く使われているPHPフレームワークを採用しています。

## テストフレームワーク
- **PHPUnit**: ユニットテストを効率的に行うためのPHPのテストフレームワーク。

## コードフォーマッター
- **Prettier**: コードのフォーマットを一貫性あるものにするために使用しています。PHPプロジェクトでのコードスタイルを統一します。

## コンテナ化
- **Docker**: 開発環境のセットアップと分離を容易にするためにコンテナ技術を使用しています。

## デバッグツール
- **Xdebug**: 開発中のデバッグやパフォーマンスのプロファイリングに使用するツール。

# セットアップ

## Dockerを起動

```bash
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

Profilingモードを使って解析結果を出力してデータを可視化したい場合、以下を実行します。

```bash
$ make profile-mode
```

これを実行すると、php.iniのxdebug.modeを「profileモード」で上書きした状態でdockerが立ち上がります。postmanなどでリクエストを送った後、`tmp/xdebug_profile`ディレクトリに`cachegrind.out.***.gz`というファイルが生成されます。これを展開します。

次に、以下を実行して可視化ツールを立ち上げます。 (※可視化ツールは別途インストールする必要があります。参考：[Xdebug Profiler Introduction](https://xdebug.org/docs/profiler#Introduction))

```
make profile-visualize
```

可視化ツールが立ち上がったら、先ほど展開したファイルを指定します。

## Prettier (PHPコードフォーマッター)

Prettierはコードのフォーマットを整えるツールです。PHPプロジェクトのコードを整形するために、`@prettier/plugin-php`を使用します。以下の手順でPrettierを実行してコードを整形できます。

### Prettierの実行

プロジェクトのルートディレクトリで以下のコマンドを実行して、コードを自動で整形します。

```bash
$ make prettier
```

特定のディレクトリ配下のphpファイルに対してのみ実行したい場合は、下記のようにします。
```bash
$ npm run prettier -- --write "特定のディレクトリ/**/*.php"
```

このコマンドは、プロジェクト内のすべてのPHPファイルを検索し、Prettierを使用してコードスタイルを自動で整えます。--write オプションはファイルを上書きして整形します。
もし確認のみを行いたい場合は、--check オプションを使用してください。

### 設定
Prettierの設定は、プロジェクトのルートに .prettierrc ファイルを作成してカスタマイズすることができます。

## PHPUnit
PHPUnitはLaravelプロジェクトでのユニットテストをサポートするフレームワークです。Laravelには、PHPUnitがプリインストールされており、phpunit.xmlファイルで設定をカスタマイズすることができます。

### PHPUnitの実行
LaravelプロジェクトでPHPUnitテストを実行するには、以下のコマンドを使用します。

```bash
$ php artisan test
```

このコマンドは、プロジェクトに含まれるすべてのテストケースを実行し、コンソールにテスト結果を出力します。Laravelのテストランナーは、phpunit.xmlファイルに基づいて設定されたオプションに従ってPHPUnitを実行します。

### 詳細情報
PHPUnitの詳細な使用方法やテストの書き方については、Laravelの公式ドキュメントを参照してください。公式ドキュメントでは、テストの設定、実行方法、アサーションの使い方などが詳しく説明されています。

https://laravel.com/docs/10.x/testing

この情報を利用して、効率的にテストを管理し、アプリケーションの品質を保つためのベストプラクティスを実装してください。
