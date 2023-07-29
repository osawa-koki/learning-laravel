# learning-laravel

😩😩😩 Laravelに入門する！  

![成果物](./docs/img/fruit.gif)  

## 実行方法

```shell
docker build -t learning-laravel .
docker run -it --rm -p 8000:8000 --name learning-laravel learning-laravel
```

## 準備方法

```shell
# Laravelプロジェクトの初期化
composer create-project laravel/laravel ⭐️プロジェクト名⭐️

# `.env`の作成
cp .env.example .env

# キーの生成
php artisan key:generate

# データベースの作成・マイグレーション・シーディング
touch ./database/database.sqlite && php artisan migrate && php artisan db:seed

# サーバの起動
php artisan serve --host=localhost --port=8000
```

## 説明イロイロ

```shell
# プロジェクトの作成
composer create-project laravel/laravel ⭐️プロジェクト名⭐️

# プロジェクトの起動
php artisan serve --host=localhost --port=8000

# データベースの作成
touch ./database/database.sqlite

# マイグレーション
php artisan migrate

# シーディング
php artisan db:seed

# マイグレーションファイルの作成
php artisan make:migration ⭐️マイグレーション名⭐️

# モデルの作成
php artisan make:model ⭐️モデル名⭐️

# コントローラの作成
php artisan make:controller ⭐️コントローラ名⭐️

# リソースコントローラの作成
php artisan make:controller ⭐️コントローラ名⭐️ --resource

# シーダーファイルの作成
php artisan make:seeder ⭐️シーダー名⭐️
```
