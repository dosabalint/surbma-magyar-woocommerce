=== HuCommerce - Magyar WooCommerce kiegészítések ===
Contributors: Surbma, HuCommerce
Donate link: https://www.hucommerce.hu/
Tags: woocommerce, magyar, magyarország, webáruház, hungarian, hungary
Requires at least: 4.9
Tested up to: 5.0
Stable tag: 5.2
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hasznos javítások a magyar WooCommerce webáruházakhoz.

== Description ==

>Hasznos javítások a magyar WooCommerce webáruházakhoz.

A WooCommerce a világ és most már Magyarország legnépszerűbb webáruház platformja is. De ez a tény a WooCommerce fejlesztőket nem érdekli annyira, hogy a magyar igényekhez igazítsák a bővítmény bizonyos funkcióit. Szerencsére adnak bőven lehetőséget a módosításokra, de ezekhez az átlag felhasználó nem ért. Ezért hoztam létre ezt a bővítményt, hogy a magyar WooCommerce webáruházak is végre rendben legyenek.

A funkciók folyamatosan bővülnek, de itt a WordPress.org fórumban is lehet új funkciókat kérni.

### A bővítmény funkciói

- Plusz/minusz mennyiségi gombok a termékekhez
- Vezetéknév és keresztnév rendbetétele
- Megye mező elrejtése
- Pénztár oldal formázása
- Fordítási hiányosságok javítása
- További funkciók hamarosan...

#### Plusz/minusz mennyiségi gombok a termékekhez

A WooCommerce alapból csak egy szám típusú mezőt használ a termékek mennyiségénél, de ez felhasználói szemmel nézve nem elég. Ez a funkció a mennyiségi mező elé és után betesz egy plusz/minusz gombot, amivel a felhasználók könnyedén tudják változtatni a mennyiséget mind a termék végoldalon, mind pedig a kosár összegzés oldalán.

FIGYELEM! A gombok a különböző sablonoknál esetleg másképp vagy nem megfelelően jelenhetnek meg. Ez minden esetben javítható egy kis CSS segítségével. Én azon vagyok, hogy a lehető legnépszerűbb sablonoknál már automatikusan jól nézzen ki, illetve kap egy alap formázást is, hogy a legtöbb esetben megfelelő legyen, de biztosan lesznek olyan sablonok, ahol ez még így is igényel majd további CSS formázást. A bővítmény támogatás fórumában lehet ezeket jelezni, de nem tudom vállalni, hogy mindenkinek, gyorsan tudok segíteni.

Jelenleg ezeket a sablonokat támogatja alapból a bővítmény:

- Storefront
- Divi

#### Vezetéknév és keresztnév rendbetétele

A keresztnév és vezetéknév sorrendjének a megfordítása, ha a cím Magyarország. Ahogy mi szeretjük. :) Mindezt úgy, hogy reszponzív nézetben is jó legyen és a CRM, számlázó programok is tudják értelmezni.

#### Megye mező elrejtése

Mert ezt nálunk nem szokás használni, így csak plusz felesleges lépés. De ha valakinek nagyon kell, akkor visszaállítható.

#### Pénztár oldal formázása

Az Irányítószám és Város mezők nagy monitoron egymás mellé kerültek és az Ország mező alatt jelennek meg közvetlenül, hogy logikusabb legyen a megjelenési sorrend.

#### Fordítási hiányosságok javítása

Ideiglenes fordítási hiányosságok javítása, amíg a hivatalos fordításban esetleg nem jelenik meg vagy nem frissíti a rendszer. Én hivatalos szerkesztője is vagyok a magyar WooCommerce fordítási csapatának, ezért ott sokmindent megcsinálok, de néha szükség van erre a kis trükkre.

### Egyéb fejlesztői infók

#### Szeretnél résztvenni vagy segíteni a bővítmény fejlesztésében?

Megtalálod a teljes forráskódot a GitHub-on:
[https://github.com/Surbma/surbma-magyar-woocommerce](https://github.com/Surbma/surbma-magyar-woocommerce)

#### További bővítményeket és projekteket is találsz a GitHub oldalamon:

[https://github.com/Surbma](https://github.com/Surbma)

Nyugodtan segíthetsz a bővítmények, sablonok és egyéb projektek fejlesztésében.

#### Szeretnél többet tudni rólam és a szolgáltatásaimról?

Nézd meg a weboldalam: [Surbma.hu](https://surbma.hu/)

== Installation ==

### Automatikus telepítés

1. A "Bővítmények -> Új hozzáadása" menüpont alatt keress rá a *HuCommerce - Magyar WooCommerce kiegészítések* bővítményre.
2. A bővítmény dobozában kattints a "Telepítés most" gombra.
3. Telepítés után ugyanebben a dobozban kattints a "Bekapcsol" gombra, hogy aktiváld a *HuCommerce - Magyar WooCommerce kiegészítések* bővítményt.
4. A "WooCommerce -> HuCommerce" menüpont alatt állítsd be, hogy melyik modult szeretnéd használni.
5. Ennyi az egész. :)

### Manuális telepítés az admin felületen

1. Töltsd le a bővítményt: [HuCommerce - Magyar WooCommerce kiegészítések](https://downloads.wordpress.org/plugin/surbma-magyar-woocommerce.zip)
2. Töltsd fel a `surbma-magyar-woocommerce.zip` fájlt a "Bővítmények -> Új hozzáadása" menüpont alatt a "Bővítmény feltöltése" gombra kattintva.
3. Aktiváld a *HuCommerce - Magyar WooCommerce kiegészítések* bővítményt a feltöltés után.
4. A "WooCommerce -> HuCommerce" menüpont alatt állítsd be, hogy melyik modult szeretnéd használni.
5. Ennyi az egész. :)

### Manuális telepítés FTP használatával

1. Töltsd le a bővítményt: [HuCommerce - Magyar WooCommerce kiegészítések](https://downloads.wordpress.org/plugin/surbma-magyar-woocommerce.zip)
2. Tömörítsd ki a zip fájlt a számítógépeden.
3. Töltsd fel a `surbma-magyar-woocommerce` mappát a `/wp-content/plugins/` mappába.
4. Aktiváld a *HuCommerce - Magyar WooCommerce kiegészítések* bővítményt a "Bővítmények" menüpont alatt a WordPress admin felületen.
5. A "WooCommerce -> HuCommerce" menüpont alatt állítsd be, hogy melyik modult szeretnéd használni.
6. Ennyi az egész. :)

== Frequently Asked Questions ==

= Hol találom a bővítmény beállításait? =

A *HuCommerce - Magyar WooCommerce kiegészítések* bővítmény beállításait a "WooCommerce -> HuCommerce" menüpont alatt éred el.

= Nem cserélődtek meg a nevek a Pénztár oldalon. =

Először töröld a szerver oldali és a böngésző gyorsítótárát és frissítsd az oldalt! Győződj meg róla, hogy esetleg más bővítmény nem okoz-e konfliktust! Ha a fordítást módosítottad, az is lehet probléma. Illetve a sablonok is tartalmazhatnak olyan egyedi kódokat, amivel ez a funkció felülírható.

Figyelem! A nevek cseréje csak akkor történik meg, ha Magyarország a választott ország.

= Mit jelent az, hogy Surbma? =

A vezetéknevem visszafelé. ;)

== Changelog ==

= 5.2 =

- FRISSÍTÉS - 2019-01-12
- MÓDOSÍTÁS- Admin UIkit frissítése.

= 5.1 =

- FRISSÍTÉS - 2019-01-12
- JAVÍTÁS - Divi sablon egyedi formázások a plusz/minusz gombokhoz.
- JAVÍTÁS - Kisebb kód optimalizálás a plusz/minusz gombok CSS formázásánál.

= 5.0 =

- FRISSÍTÉS - 2019-01-11
- ÚJ - Mennyiségi gombok a termékekhez.
- ÚJ - A bővítmény nevének módosítása: HuCommerce - Magyar WooCommerce kiegészítések
- ÚJ - Admin beállítások a bővítményhez. Minden modul ki- bekapcsolható.
- ÚJ - Moduláris felépítés első lépései, felkészítés további hasznos funkciók optimális implementálásához.
- JAVÍTÁS - A WooCommerce myaccount/form-edit-account.php sablon frissítése a 3.5.0 verzióra.
- MÓDOSÍTÁS - A megye mező elrejtésének a kikapcsolása már nem működik az eddigi globális változó megadásával, ezt is az admin felületen lehet beállítani.
- MÓDOSÍTÁS - Kisebb javítások a leírásban.

= 4.5 =

- Kis javítás a leírásban.
- Tesztelve a WooCommerce 3.5 verziójával.
- Tesztelve a WordPress 5.0 verziójával.

= 4.4 =

- FIX - A form-edit-account template fájl frissítése a legújabb verzióra.

= 4.3 =

- Autofocus beállítása a vezetéknévre. (Köszönet: @nagygabor) #1

= 4.2 =

- A keresztnév mező autofocus törlése. #1

= 4.1 =

- A szerződési feltételek szövegének a felülírása már nem kell, mert az új verzióban helyesen jelenik meg.
- Tesztelve a WooCommerce 3.3 verziójával.

= 4.0 =

- A bővítmény most már felül tudja írni a WooCommerce template fájlokat.
- Fiók adatoknál is jól jelenik meg a nevek sorrendje, ha a számlázási cím Magyarország.
- Szállítási és számlázási címeknél is helyes a név megjelenítése magyarországi cím esetén.
- Kisebb kód javítások.

= 3.0 =

- A WooCommerce 3.2 verziónál a szerződési feltételek elfogadása szöveg fordítása nem jelenik meg, erre van egy javítás, amíg nem lesz elérhető a hivatalos fordítás javított változata.

= 2.0 =

- Az Irányítószám és Város mezők nagy monitoron egymás mellé kerültek és az Ország mező alatt jelennek meg közvetlenül, hogy logikusabb legyen a megjelenési sorrend.
- A Megye mező elrejtését most már WooCommerce filter kezeli. (Köszönet: Viszt Péter - @passatgt)
- További címkék a bővítményhez a jobb keresési találatok miatt.

= 1.1 =

- Kód elírás javítása.
- Leírások hozzáadása a függvényekhez.

= 1.0.0 =

- Első kiadás.
