#SPA -01

## 説明

* gulp を用いた PHP 実行/開発環境
* ちょっとしたサンプル実行にも便利
* SASS とか LESS とか意識しなくても簡単に動かせる
* JavaScript 追加するたびに \<script・・・/script\> を書かなくてもいい

## 機能

* SASS 自動コンパイル （gulp-sass）
* LESS 自動コンパイル（gulp-less）
* 複数の JavaScript ファイルを scripts.js へ連結 & ミニファイ(gulp-uglify)
* 画像ファイルをロスレスで軽量化（png, jpg, gif, svg 対応）(imagemin)
* PHP 対応の WEB サーバー起動する（node.js & gulp-connect-php）
* 全てのファイルを監視して変更あれば自動コンパイル & オートリロード（browserSync）
* コンパイルなどの処理後のファイル出力先は /build ディレクトリに集約
* なので /build 以下を丸ごと本番環境へアップロードすればデプロイ完了

## クイックスタート

```
$ mkdir myprojects
$ cd myprojects
$ git clone https://github.com/ontheroadjp/SPA-01.git
$ cd SPA-01
$ npm install
$ gulp build
$ gulp
```
## コマンド

```
$ gulp build
```

ファイル種別に応じてコンパイルなどの処理をして /build ディレクトリに出力する。  
ファイルは /src 以下に配置する。

* SASS ファイル　→　/src/sass
* LESS ファイル　→　/src/less
* JavaScript ファイル　→　/src/js
* 画像ファイル　→　/src/img
* その他（.html など）　→　/src/ext

それぞれ sass/, less, などのディレクトリ内にディレクトリ構造を作っても OK

ビルドを実行すると・・

* /src/sass ディレクトリ内の SASS ファイル（.scss）がコンパイルされる
* /src/less ディレクトリ内の LESS ファイル（.less）がコンパイルされる
* /src/js ディレクトリ内の JavaScript ファイル（.js）が連結されミニファイされる
* /src/img ディレクトリ内の画像ファイル（.png .jpg .gif .svg）がロスレス最適化される
* /src/ext ディレクトリ内の全てのファイルが /build へコピーされる

ビルド後のファイル出力先

* SASS は /build/css ディレクトリ内へ
* LESS は /build/css ディレクトリ内へ
* JavsScript は /build/js ディレクトリ内へ
* 画像ファイルは /build/img ディレクトリ内へ
* /ext ディレクトリ内のファイルは /build/ディレクトリ内へ 
* 全て /build 以下に集約されるので本番環境へは /build 以下を丸ごとアップロードで OK


```
$ gulp
```

* 9999 番ポートで WEB サーバーが起動する
* ドキュメントルートは /build ディレクトリ
* /src 以下のファイルを監視して変更があるたびに自動コンパイル等の処理がされて WEB ブラウザの内容が自動でリロードされる
* PHP 動く

## 個別コマンド

```
$ gulp sass
```

* SASS ファイルの処理のみを行う  
/src/sass にある SASS ファイルを /build/css へコンパイルして出力

```
$ gulp less
````

* LESS ファイルの処理のみを行う  
/src/less にある LESS ファイルを /build/css へコンパイルして出力

```
$ gulp js
```

* JavaScript ファイルの処理のみを行う  
/src/js にある JavaScript ファイルを連結 & ミニファイして /build/js/scripts.js へ出力

```
$ gulp img
```

* 画像ファイルの処理のみを行う  
/src/img になる 画像ファイル（png, jpg, gif, svg）をロスレスで最適化して /build/img へ出力

```
$ gulp php
```

* WEB サーバーを起動する（PHP対応）
* オートリロードには対応しない
* ポートは 9998番
* ドキュメントルートは /build ディレクトリ
* ほぼ使うことないかも

## 補足

### npm モジュール

```
$ npm install
```
* 以下のモジュールが /node_modules にインストールされる

1. gulp
2. golp-connect 
3. gupl-connect-php
4. gulp-filter
5. gulp-imagemin
6. gulp-sass
7. gulp-less
8. gulp-pleeease
9. gulp-uglify
10. main-bower-files
11. vinyl-buffer
12. vinyl-source-stream


## 今後の予定

* bower の組み込み
* デプロイ機能の組み込み


