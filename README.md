# yii2-online-shop-starter
Yii2 starter application for online shop system

PHP versiyasi: 7.2

#Sozlash:<br>
Composerni update qiling
~~~
composer update
~~~
Migratsiyalarni o'rnating
~~~
yii migrate
~~~
#DB strukturasi:
<pre>
categories => Productlar kategoriyasi:
    related_product_id -> Shu kategoriyada ko'rinadigan product
    img -> Agar product bo'lmasa image qo'yish mumkin
</pre>
<pre>
products => Maxsulotlar
    main_params_json => Maxsulot sahifasi ochilganda bosh qismda chiqadigan parametrlar
</pre>
<pre>
main_filter => Maxsulot asosiy filterlari. M: Yangi, Tavsiya qilamiz ...
</pre>
<pre>
add_filter => Maxsulotning qo'shimcha filterlari. M: rang, og'irlik ...
</pre>
<pre>
product_sort_attrs => Maxsulotni sort qilish qiymatlari
    sort_data => Products jadvalidagi ustunlar nomi
</pre>
<pre>
product_main_params => Maxsulotning asosiy parametrlari
</pre>
<pre>
product_self_params => Maxsulotning qo'shimcha parametrlari
</pre>
<pre>
product_relations => Maxsulotga bog'liq bo'lgan boshqa maxsulotlar
</pre>
<pre>
articles => Maqolalar
    key => Kalit
</pre>
<pre>
search_stats => Qidiruvlar statistikasi
</pre>
<pre>
widget_carousel => Sliderlar
    key => Kalit. Page nomi
</pre>


Licensed under the [MIT License](LICENSE.md)
