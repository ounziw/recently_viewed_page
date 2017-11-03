# Recently Viewed Page (最近見たページ)

ウェブサイトの閲覧履歴を記録して、最近見たページを表示するアドオン。

local storageを使用して、訪問者のブラウザに閲覧情報を保存するので、サーバー側のキャッシュの影響を受けない。ただし、同じユーザーであっても、異なる端末(パソコンとスマホなど)からアクセスした場合は、閲覧履歴は共有されない。

ホームページの訪問者のブラウザ上で処理を行うため、閲覧者数が多くなっても、サーバー負荷への影響が少ない。

## 導入事例

[名古屋セミナーポータル](http://www.seminar-portal.org/)  セミナー情報サイト。メルマガ読者6000人の不定期ビジネスニュースと連携している。セミナー情報の閲覧履歴を表示するのに使用している。

[計算フォーム](https://calculator.jp/) concrete5のfaqブロックをカスタマイズした計算フォームブロックにより、GUIで計算フォームが作れるウェブサービス。

[マイミツブログ](https://my-mitsu.com/blog/) 自動見積フォーム&見積書PDF発行するウェブサービス。ホームページ上で発注側が見積書を作ることができ、顧客の待ち時間をゼロにすることが可能。

[全国の鉄道](https://www.rescuework.jp/railway/) concrete5のアドオンPrefecture(都道府県をトピック登録＆日本地図を表示する)のサンプルとして作成したウェブサイト。

## 導入方法

concrete5の管理画面から検索して導入可能。また[http://www.concrete5.org/marketplace/addons/recently-viewed-page](http://www.concrete5.org/marketplace/addons/recently-viewed-page) からもダウンロードできる。


## カスタムテンプレート

underscore.js(concrete5同梱)を利用してテンプレートを作成できる。利用しているテーマに合わせた見栄えの調節が可能。詳細はwithimageカスタムテンプレートを参照。


## 対応バージョン

concrete5.7.5以降


## ライセンス

MIT
