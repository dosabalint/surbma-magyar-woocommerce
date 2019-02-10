=== HuCommerce - Magyar WooCommerce kiegészítések ===
Contributors: Surbma
Donate link: https://www.hucommerce.hu/
Tags: woocommerce, magyar, magyarország, webáruház, hungarian, hungary
Requires at least: 4.9
Tested up to: 5.0
Stable tag: 10.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hasznos javítások a magyar WooCommerce webáruházakhoz.

== Description ==

>Hasznos javítások a magyar WooCommerce webáruházakhoz.

A WooCommerce a világ és most már Magyarország legnépszerűbb webáruház platformja is. De ez a tény a WooCommerce fejlesztőket nem érdekli annyira, hogy a magyar igényekhez igazítsák a bővítmény bizonyos funkcióit. Szerencsére adnak bőven lehetőséget a módosításokra, de ezekhez az átlag felhasználó nem ért. Ezért hoztam létre ezt a bővítményt, hogy a magyar WooCommerce webáruházak is végre rendben legyenek.

A funkciók folyamatosan bővülnek, de itt a WordPress.org fórumban is lehet új funkciókat kérni.

### A bővítmény funkciói

- Vezetéknév és keresztnév rendbetétele
- Adószám bekérése vásárlásnál
- Jogi megfelelés (GDPR, ePrivacy, stb.)
- Pénztár oldal formázása
- Megye mező elrejtése
- Plusz/minusz mennyiségi gombok a termékekhez
- Vásárlás folytatása gomb megjelenítése a Kosár és/vagy a Pénztár oldalakon
- Belépés és regisztráció utáni átirányítás
- Ingyenes szállítás értesítés
- Város automatikus kitöltése az irányítószám alapján
- Fordítási hiányosságok javítása
- WPML és Polylang kompatibilitás
- További funkciók hamarosan...

#### Vezetéknév és keresztnév rendbetétele

A keresztnév és vezetéknév sorrendjének a megfordítása, ha a webáruház magyar nyelvre van állítva. Ahogy mi szeretjük. :) Mindezt úgy, hogy reszponzív nézetben is jó legyen és a CRM, számlázó programok is tudják értelmezni.

A megjelenítés kompatibilis a WPML bővítménnyel, így többnyelvű webáruháznál is magyar sorrendben jelenik meg a név, ha magyar nyelven nézik a webáruházat a látogatók.

A név sorrendje a megrendelés visszaigazolásánál, a vásárló fiókjában és az értesítő levelekben is jól jelenik meg.

#### Adószám bekérése vásárlásnál

A Pénztár oldalon a Cég mező alatt már Adószámot is be lehet kérni. Az adószám a rendelésen kívül az adott felhasználó profil adatainál is elmentésre kerül. Az adószám megjelenik mind a visszaigazoláson, mind a rendelés szerkesztésénél, valamint az értesítő levelekben is.

#### Jogi megfelelés (GDPR, ePrivacy, stb.)

**FIGYELEM!** A webáruház jogi megfelelése az aktuális törvényeknek és adatvédelmi rendeleteknek minden esetben a webáruház tulajdonosának a felelőssége. Ez az opció nem mentesít senkit sem az alól, hogy a megfelelést felülvizsgáltassa szakértővel vagy jogásszal. A fejlesztők nem vállalnak semmilyen felelősséget a webáruház jogi megfeleléséért.

Lehetőség van az Általános Szerződési Feltételek és az Adatkezelési tájékoztató aktív cselekvésen alapuló elfogadtatására, azaz ki kell pipálnia a vásárlónak ezek elfogadását, mielőtt a rendelést leadhatná. Az adatok a rendeléseknél kerülnek elmentésre és a rendelés szerkesztése oldalon megjelenik az elfogadott státusz.

A vásárló profil adatainál nem kerül elmentésre az elfogadás, így azt bejelentkezve is minden vásárlás alkalmával el kell fogadnia.

Opcionális a két mező használata, így ha valakinek csak az egyik elfogadtatására és megerősítésére van szüksége, akkor egyik vagy másik kikapcsolható.

#### Pénztár oldal formázása

Az Irányítószám és Város mezők nagy monitoron egymás mellé kerültek és az Ország mező alatt jelennek meg közvetlenül, hogy logikusabb legyen a megjelenési sorrend.

#### Megye mező elrejtése

Mert ezt nálunk nem szokás használni, így csak plusz felesleges lépés. De ha valakinek nagyon kell, akkor visszaállítható.

#### Plusz/minusz mennyiségi gombok a termékekhez

A WooCommerce alapból csak egy szám típusú mezőt használ a termékek mennyiségénél, de ez felhasználói szemmel nézve nem elég. Ez a funkció a mennyiségi mező elé és után betesz egy plusz/minusz gombot, amivel a felhasználók könnyedén tudják változtatni a mennyiséget mind a termék végoldalon, mind pedig a kosár összegzés oldalán.

FIGYELEM! A gombok a különböző sablonoknál esetleg másképp vagy nem megfelelően jelenhetnek meg. Ez minden esetben javítható egy kis CSS segítségével. Én azon vagyok, hogy a lehető legnépszerűbb sablonoknál már automatikusan jól nézzen ki, illetve kap egy alap formázást is, hogy a legtöbb esetben megfelelő legyen, de biztosan lesznek olyan sablonok, ahol ez még így is igényel majd további CSS formázást. A bővítmény támogatás fórumában lehet ezeket jelezni, de nem tudom vállalni, hogy mindenkinek, gyorsan tudok segíteni.

Jelenleg ezeket a sablonokat támogatja alapból a bővítmény:

- Storefront
- Divi

#### Vásárlás folytatása gomb megjelenítése a Kosár és/vagy a Pénztár oldalakon

A Kosár és a Pénztár oldalakon megjeleníthető egy plusz Vásárlás folytatása gomb, ami az üzlet oldalra viszi a látogatókat, hogy esetleg még tovább válogassanak a termékek között. Sokszor csak kíváncsiságból kattintanak a látogatók a Kosár gombra, de még nem fejezték be a vásárlásukat.

A gombok pozíciója mind a Kosár, mind a Pénztár oldalon beállítható, valamint van lehetőség egyedi üzenet megjelenítésére is bizonyos pozíciókban.

#### Belépés és regisztráció utáni átirányítás

Beállítható, hogy a látogatók a belépés és regisztráció után a meghatározott oldalra legyenek automatikusan átirányítva. A belépéshez és regisztrációhoz külön-külön állítható be a cél URL. A Pénztár oldalon nem veszi figyelembe az egyedi beállítást, hogy ott ne zavarja a vásárlás befejezését.

#### Ingyenes szállítás értesítés

A Kosár oldalon kijelzi, hogy mennyi vásárlási összeg hiányzik még az ingyenes szállításhoz. A szöveg módosítható és többnyelvűsíthető.

#### Város automatikus kitöltése az irányítószám alapján

A Pénztár oldalon az irányítószám mező kitöltése után automatikusan megjeleníti a várost. Ha már manuálisan lett módosítva a város, akkor nem módosítja az irányítószám alapján.

Vannak olyan irányítószámok, amikkel nem működik, mert vagy még hiányzik az indexből vagy egy irányítószám több településhez is tartozik. Igyekszem az ilyen hiányosságokat javítani.

#### Fordítási hiányosságok javítása

Ideiglenes fordítási hiányosságok javítása, amíg a hivatalos fordításban esetleg nem jelenik meg vagy nem frissíti a rendszer. Én hivatalos szerkesztője is vagyok a magyar WooCommerce fordítási csapatának, ezért ott sokmindent megcsinálok, de néha szükség van erre a kis trükkre.

#### WPML és Polylang kompatibilitás

A szöveges mezők kompatibilisek a WPML, Polylang bővítményekkel, így azok beállíthatók a különböző nyelveken is.

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

Figyelem! A nevek cseréje csak akkor történik meg, ha magyar nyelvre van állítva a webáruház.

= Mit jelent az, hogy Surbma? =

A vezetéknevem visszafelé. ;)

== Changelog ==

= 10.0 =

- FRISSÍTÉS - 2019-02-10
- ÚJ - Város automatikus kitöltése az irányítószám alapján.
- JAVÍTÁS - Kisebb javítások az admin felület megjelenítésén.

= 9.0 =

- FRISSÍTÉS - 2019-02-09
- ÚJ - Adószám bekérése vásárlásnál
- ÚJ - Jogi megfelelés (GDPR, ePrivacy, stb.)
- MÓDOSÍTÁS - A magyar név sorrend mostantól nem akkor érvényes, ha a cím magyar, hanem minden esetben, ha magyar nyelvű a webáruház.
- JAVÍTÁS - A magyar név sorrend kompatibilis a WPML bővítménnyel, így többnyelvű webáruháznál igazodik a választott nyelvhez.
- MÓDOSÍTÁS - Kisebb változtatás az admin megjelenésén.

= 8.0 =

- FRISSÍTÉS - 2019-02-06
- ÚJ - Ingyenes szállítás értesítés.
- JAVÍTÁS - Mező értékek validálásának a javítása.

= 7.1 =

- FRISSÍTÉS - 2019-02-06
- JAVÍTÁS - Vásárlás folytatása gomb class meghatározásainak módosítása a könnyebb formázás érdekében.

= 7.0 =

- FRISSÍTÉS - 2019-02-06
- ÚJ - Belépés és regisztráció utáni átirányítás.
- ÚJ - WPML és Polylang kompatibilitás a szöveges mezőkhöz.

= 6.0 =

- FRISSÍTÉS - 2019-02-06
- ÚJ - Vásárlás folytatása gomb megjelenítése a Kosár és/vagy a Pénztár oldalakon. A gomb pozíciója is beállítható.

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
