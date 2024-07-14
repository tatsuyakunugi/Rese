# Rese

このアプリは飲食店予約サービスアプリになります。

会員登録をすることで飲食店の予約をすることが出来、

予約した情報は後から変更・削除することが出来ます。

利用した店舗のレビューを投稿することもできます。

また、店舗をお気に入り登録することもできます。

## 作成した目的

このアプリは模擬案件の課題として制作しました。

与えられた要件や完成イメージ図をもとに、

テーブル設計・ER図作成・コーディングを行いました。

追加実装項目についてはコーチとの面談時にアイデアを出し、

実装しました。

## アプリケーションURL

デプロイをしていないのでアプリケーションURLはありません。

## 他のリポジトリ

ありません。

## 機能一覧

・会員登録機能（入力項目は名前、メールアドレス、パスワード）

・会員登録時のメール認証機能(登録時にメールが届きます)

・ログイン機能（メールアドレスとパスワードで認証）

・ログアウト機能

・飲食店検索機能(エリア・ジャンル・店舗名で検索可能)

・飲食店予約機能

・飲食店予約情報変更機能

・飲食店予約情報削除機能

・飲食店お気に入り追加・削除機能

・レビュー投稿機能

・予約情報のリマインドメール機能

### 機能に関する注釈

・メールはmailhogにアクセスすることで確認できます。(http://localhost:8025)

## 使用技術

・php 8.3.1

・laravel 8.83.8

・MYSQL:8.0.26

## テーブル設計

![image](https://github.com/user-attachments/assets/05284830-c7e5-4604-8171-bb090511bef1)
![image](https://github.com/user-attachments/assets/f58c72e5-1689-4e85-9b04-42f01b7423b6)
![image](https://github.com/user-attachments/assets/4d0a3eaf-acd8-4735-93d0-a1e06f643c0d)
![image](https://github.com/user-attachments/assets/d5f6160a-97ae-418f-a4f5-0131ae7810f1)
![image](https://github.com/user-attachments/assets/f8c51288-75ec-4624-8898-fa57b57d95c9)
![image](https://github.com/user-attachments/assets/dcd61d21-5746-4cdc-a580-c91b211df54c)
![image](https://github.com/user-attachments/assets/f2bb1a86-67e5-4e11-a509-1e77b68e5039)

## ER図

![image](https://github.com/user-attachments/assets/bd880aae-fb73-41d5-8a1d-61f7032e77d7)

### Dockerビルド

1．git clone git@github.com:coachtech-material/laravel-docker-template.git

2．docker-compose up -d --build

### laravel環境構築

1．docker-compose exec php bash

2．composer install

3．cp .env.example .env（.env.exampleファイルから.envを作成し、環境変数を変更）

4．php artisan key:generate

5．(composer.jsonの"require"内に"laravel/tinker": "^2.5",と"nesbot/carbon": "^2.31"を追記し)composer update

6．php artisan migrate

7．php artisan db:seed

8．php artisan storage:link

9．composer require livewire/livewire

10. docker-compose.ymlにメールサーバコンテナの記述を追記し、docker-compose build、docker-compose up -d

## その他

### テスト用ユーザー

名前：テスト太郎

メールアドレス：test@example.com

パスワード：testpass

### 機能検証用データ

機能確認用のデータとして、

・
 
・
